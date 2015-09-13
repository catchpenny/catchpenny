<?php

namespace App\Http\Controllers;

use App\Domain;
use App\DomainSubscriptions;
use App\Channel;
use App\User;
use Carbon\Carbon;
use App\ChannelSubscriptions;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDomainRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications;
use App\DomainInvitations;
use App\DomainRequests;
use App\DomainNotifications;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create()
    {   //stable
        return view('domain.createBS');
    }

    public function store(CreateDomainRequest $request)
    {
        //stable
        $input = $request->all();
        $user = Auth::user()->id;

        $invite_code = str_replace(' ', '', (substr(uniqid(), 0, 7) . substr(md5($input['name']), 0, 6)));

        $domain = Domain::create([
            'name'          => $input['name'],
            'description'   => $input['description'],
            'created_by'    => $user,
            'invite_code'   => $invite_code,
            'privacy'       => $input['privacy']
        ]);

        DomainSubscriptions::create([
            'userId'   => $user,
            'domainId' => $domain->id,
            'level'    => 0,
            'status'   => 1
        ]);

        $general = Channel::create([
            'name'          => 'general',
            'description'   => 'this channel is for general talks',
            'created_by'    => $user,
            'domainId'      => $domain->id
        ]);

        ChannelSubscriptions::create([
            'userId'        => $user,
            'channelId'     => $general->id,
            'lastRead'      => Carbon::now()
        ]);


        $domain->generalId = $general->id;
        $domain->save();

        $request->session()->flash('alert-success', 'Domain was successful created!!');
        return redirect('d/'.$domain->id.'/c/'.$general->id);
    }

    public function edit($did)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }

        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level){
                if($level->level==0){
                    return view('domain.settings.admin.generalBS', compact('domain','channel'));
                }else{
                    return view('domain.settings.generalBS', compact('domain'));
                }
        } else{
            dd(404);
        }
    }

    public function update($did, CreateDomainRequest $request)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }

        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level){
            if($level->level==0){
                $input = $request->all();
                Domain::where('id',$did)->update(['name' => $input['name'], 'description' => $input['description'], 'privacy' => $input['privacy']]);
                $request->session()->flash('alert-success', 'Domain successfully updated!!');
                return redirect('d/'.$did.'/settings');
            }else{
                $request->session()->flash('alert-success', 'Domain successfully updated!!');
                return redirect('d/'.$did.'/settings');
            }
        } else{
            dd(404);
        }
    }

    public function destroy($did, Request $request)
    {
        // no admins present condition
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }

        $userId  = Auth::user()->id;
        DomainSubscriptions::where('userId', $userId)->where('domainId', $did)->delete();
        $channels = Channel::where('domainId',$did)->get();
        foreach($channels as $channel){
            ChannelSubscriptions::where('userId', $userId)->where('channelId', $channel->id)->delete();
        }


        if(!DomainSubscriptions::where('domainId', $domain->id)->first()){
            Domain::where('id',$did)->delete();

        }else{
            $admins = DomainSubscriptions::where('domainId', $domain->id)->where('level', 0)->first();
            if(!$admins){
                Domain::where('id',$did)->delete();
            }
        }

        $request->session()->flash('alert-success', 'Domain left');
        return redirect('home');
    }

    public function invite($did, Request $request)
    {
        //validate request
        $input = $request->all();

        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }
        $user = Auth::user();
        $userInvited = User::where('email', $input['username'])->first();

        if(!$userInvited){
            return redirect('d/'.$did.'/settings/users')->with('alert-danger', 'username does not exists');
        }

        $domainRequest = domainRequests::where('userId',$userInvited->id)->where('domainId',$did)->first();
        if($domainRequest){
            DomainNotifications::where('toId',$domain->id)
                                ->where('fromId',$userInvited->id)
                                ->where('type',0)
                                ->where('deleteOnAction',$domainRequest->id)->delete();
            $domainRequest->delete();

            DomainSubscriptions::create([
                'userId'   => $userInvited->id,
                'domainId' => $domain->id,
                'level'    => 1,
                'status'   => 1
            ]);

            ChannelSubscriptions::create([
                'userId'        => $userInvited->id,
                'channelId'     => $domain->generalId,
                'lastRead'      => Carbon::now()
            ]);

            return redirect('d/'.$domain->id.'/settings/users')->with('alert-success', 'User Joined Successful');
        }

        if(DomainInvitations::where('userId',$userInvited->id)->where('domainId',$did)->first()){
            return redirect('d/'.$did.'/settings/users')->with('alert-warning', 'username already invited');
        }

        $level = DomainSubscriptions::where('userId',$userInvited->id)->where('domainId',$did)->select('level')->first();

        if($level){

            if($level->level==-1){
                return redirect('d/'.$did.'/settings/users')->with('alert-warning', 'user is banned. to invite remove user from ban list');

            }
            else {
                return redirect('d/' . $did . '/settings/users')->with('alert-warning', 'username already present');
            }
        } else{

            $domainInvite = DomainInvitations::create([
                'domainId' => $domain->id,
                'userId'   => $userInvited->id
            ]);

            Notifications::create([
                'data' =>$user->firstName.' '.$user->lastName.' has invited to join '.$domain->name,
                'toId'   => $userInvited->id,
                'deleteOnAction'=> $domainInvite->id,
                'fromId'  => $domain->id,
                'type'   =>1,
                'url'  => 'd/'.$domain->id.'/join',
                'accept'=>'d/'.$domain->id.'/invite/accept',
                'cancel'=>'d/'.$domain->id.'/invite/cancel'
            ]);

            return redirect('d/'.$did.'/settings/users')->with('alert-success', 'Request Sent');
        }
    }

    public function inviteAccept($did)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }
        $user = Auth::user();
        $domainInvite = domainInvitations::where('userId',$user->id)->where('domainId',$did)->first();
        if($domainInvite){
            Notifications::where('deleteOnAction',$domainInvite->id)
                           ->where('type',1)
                           ->where('fromId',$domain->id)
                           ->where('toId',$user->id)
                           ->delete();
            $domainInvite->delete();

            DomainSubscriptions::create([
                'userId'   => $user->id,
                'domainId' => $domain->id,
                'level'    => 1,
                'status'   => 1
            ]);

            ChannelSubscriptions::create([
                'userId'        => $user->id,
                'channelId'     => $domain->generalId,
                'lastRead'      => Carbon::now()
            ]);

            return redirect('d/'.$domain->id.'/c/'.$domain->generalId)->with('alert-success', 'Join Successful');
        }else{
            dd(404);
        }
    }

    public function inviteCancel($did)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }
        $user = Auth::user();
        $domainInvite = domainInvitations::where('userId',$user->id)->where('domainId',$did)->first();
        if($domainInvite){
            Notifications::where('fromId',$domain->id)
                            ->where('toId',$user->id)
                            ->where('type',1)
                            ->where('deleteOnAction',$domainInvite->id)->delete();
            $domainInvite->delete();
            return redirect('home')->with('alert-success', 'Invitation Canceled');
        }else{
            dd(404);
        }
    }

    public function inviteDestroy($did, $uid)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }

        if(DomainSubscriptions::where('domainId',$did)->where('userId',Auth::user()->id)->select('level')->first()->level==0){
            $domainInvite = domainInvitations::where('userId',$uid)->where('domainId',$did)->first();
            if($domainInvite){
                Notifications::where('fromId',$did)
                                ->where('toId',$uid)
                                ->where('type',1)
                                ->where('deleteOnAction',$domainInvite->id)->delete();
                $domainInvite->delete();
                return redirect('d/'.$did.'/settings/users')->with('alert-success', 'Invitation Canceled');
            }else{
                dd(404);
            }
        }else{
            dd(404);
        }
    }

    public function ban($did, Request $request)
    {
        //validate
        $input = $request->all();

        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }

        $userToBan = User::where('email', $input['username'])->first();

        if(!$userToBan){
            return redirect('d/'.$did.'/settings/users')->with('alert-danger', 'username does not exists');
        }

        if(DomainSubscriptions::where('domainId',$did)->where('userId',Auth::user()->id)->select('level')->first()->level==0){

            domainInvitations::where('userId',$userToBan->id)->where('domainId',$did)->delete();
            domainRequests::where('userId',$userToBan->id)->where('domainId',$did)->delete();

            Notifications::where('fromId',$domain->id)
                ->where('toId',$userToBan->id)
                ->where('type',1)->delete();

            DomainNotifications::where('toId',$domain->id)
                ->where('fromId',$userToBan->id)
                ->where('type',0)->delete();

            $domainSubscription = DomainSubscriptions::where('userId',$userToBan->id)->where('domainId',$did)->first();

            $channels = Channel::where('domainId',$did)->get();

            foreach($channels as $channel) {
                ChannelSubscriptions::where('userId', $userToBan->id)->where('channelId', $channel['id'])->delete();
            }

            if($domainSubscription){
                DomainSubscriptions::where('userId',$userToBan->id)->where('domainId',$did)->update(['level' => -1]);
                return redirect('d/'.$did.'/settings/users')->with('alert-success', 'User Added To Ban List');

            }else{
                DomainSubscriptions::create([
                    'userId' => $userToBan->id,
                    'domainId' => $did,
                    'level' => -1,
                    'status' => -1
                ]);
                return redirect('d/'.$did.'/settings/users')->with('alert-success', 'User Was Added To Ban List');
            }

        }else{
            dd(404);
        }
    }

    public function banRemove($did, $uid)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }

        if(DomainSubscriptions::where('domainId',$did)->where('userId',Auth::user()->id)->select('level')->first()->level==0){

            $level = DomainSubscriptions::where('userId',$uid)->where('domainId',$did)->select('level')->first();
            if($level)
            {
                if($level->level==-1){
                    DomainSubscriptions::where('userId',$uid)->where('domainId',$did)->delete();
                    return redirect('d/'.$did.'/settings/users')->with('alert-success', 'User Removed From Ban List');
                }
            }

        }else{
            dd(404);
        }
    }

    public function notification($did)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }
        $notifications = DomainNotifications::where('toId',$did)->get();
        return view('domain.settings.admin.notificationBS', compact('domain', 'notifications'));
    }

    public function registerRequest($did)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }
        $user = Auth::user();

        $domainInvite = domainInvitations::where('userId',$user->id)->where('domainId',$did)->first();
        if($domainInvite){
            Notifications::where('fromId',$did)
                            ->where('toId',$user->id)
                            ->where('type',1)
                            ->where('deleteOnAction',$domainInvite->id)->delete();
            $domainInvite->delete();

            DomainSubscriptions::create([
                'userId'   => $user->id,
                'domainId' => $domain->id,
                'level'    => 1,
                'status'   => 1
            ]);

            ChannelSubscriptions::create([
                'userId'        => $user->id,
                'channelId'     => $domain->generalId,
                'lastRead'      => Carbon::now()
            ]);

            return redirect('d/'.$domain->id.'/c/'.$domain->generalId)->with('alert-success', 'Join Successful');
        }

        if(DomainRequests::where('userId',$user->id)->where('domainId',$did)->first()){
            dd(404);
        }

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$did)->select('level')->first();

        if($level){

            if($level->level==-1){
                dd(404);
            }
            else {
                return redirect('d/'.$domain->id.'/c/'.$domain->generalId);
            }
        }else{

            if($domain->privacy==0)
            {
                DomainSubscriptions::create([
                    'userId'   => $user->id,
                    'domainId' => $domain->id,
                    'level'    => 1,
                    'status'   => 1
                ]);

                ChannelSubscriptions::create([
                    'userId'        => $user->id,
                    'channelId'     => $domain->generalId,
                    'lastRead'      => Carbon::now()
                ]);

                return redirect('d/'.$domain->id.'/c/'.$domain->generalId)->with('alert-success', 'Join Successful');

            }elseif($domain->privacy==1){

                $domainRequest = DomainRequests::create([
                    'domainId' => $domain->id,
                    'userId'   => $user->id
                ]);

                DomainNotifications::create([
                    'data' =>$user->firstName.' '.$user->lastName.' has requested to join '.$domain->name,
                    'fromId'   => $user->id,
                    'toId'  => $domain->id,
                    'deleteOnAction' => $domainRequest->id,
                    'type' => 0,
                    'url'  => 'user/'.$user->id,
                    'accept'=>'d/'.$domain->id.'/request/'.$user->id.'/accept',
                    'cancel'=>'d/'.$domain->id.'/request/'.$user->id.'/cancel'
                ]);

                return redirect('d/'.$domain->id.'/request')->with('alert-success', 'Request Sent Successfully');
            }else {
                dd(404);
            }
        }
    }

    public function request($did)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }
        $user = Auth::user();

        $domainInvite = domainInvitations::where('userId',$user->id)->where('domainId',$did)->first();
        $domainRequest = DomainRequests::where('userId',$user->id)->where('domainId',$did)->first();
        if($domainInvite || $domainRequest){
            // ask user for conformation// show option to cancel request
            return view('domain.requestCancelBS',compact('domain','domainRequest','domainInvite'));
        }

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$did)->select('level')->first();

        if($level){

            if($level->level==-1){
                dd(404);
            }
            else {
                return redirect('d/'.$domain->id.'/c/'.$domain->generalId);
            }
        }else{
            if($domain->privacy!=2) {
                return view('domain.requestBS',compact('domain'));
            } else {
                dd(404);
            }
        }
    }

    public function requestAccept($did, $uid)
    {
        // check if admin
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }
        $user = Auth::user();
        $domainRequest = domainRequests::where('userId',$uid)->where('domainId',$did)->first();
        if($domainRequest){
            DomainNotifications::where('fromId',$uid)
                                ->where('toId',$did)
                                ->where('type',0)
                                ->where('deleteOnAction',$domainRequest->id)->delete();
            $domainRequest->delete();

            DomainSubscriptions::create([
                'userId'   => $uid,
                'domainId' => $domain->id,
                'level'    => 1,
                'status'   => 1
            ]);

            ChannelSubscriptions::create([
                'userId'        => $uid,
                'channelId'     => $domain->generalId,
                'lastRead'      => Carbon::now()
            ]);

            return redirect('d/'.$domain->id.'/settings/users/')->with('alert-success', 'User Added Successfully');
        }else{
            dd(404);
        }
    }

    public function requestCancel($did, $uid)
    {
        $domain  = Domain::find($did);
        if(!$domain) {
            dd(404);
        }

        $domainRequest = DomainRequests::where('userId',$uid)->where('domainId',$did)->first();

        if($domainRequest){
            DomainNotifications::where('fromId',$uid)
                                ->where('toId',$did)
                                ->where('type',0)
                                ->where('deleteOnAction',$domainRequest->id)->delete();
            $domainRequest->delete();
            if($uid==Auth::user()->id){
                return redirect('d/'.$domain->id.'/request')->with('alert-success', 'Request Canceled');
            }
            return redirect('d/'.$domain->id.'/settings/users')->with('alert-success', 'Request Canceled');

        }else{
            dd(404);
        }

    }

    public function editUsers($did)
    {
        /*
         * Funtions for admin
         * add user
         * delete user or ban then
         * unban them
         * send invites
         * accept requests
         * make admins
         */
        /*
         * leave domain
         * create channel
         * manage notification
         */
        $domain  = Domain::find($did);
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
            $channels = Channel::where('domainId', $did)->get();
            return view('domain.settings.admin.userBS', compact('domain', 'channels'));
        } else{
            dd(404);
        }
    }

    public function updateUsers($did, CreateDomainRequest $request)
    {
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
            $input = $request->all();
            Domain::where('id',$did)->update(['name' => $input['name'], 'description' => $input['description'], 'privacy' => $input['privacy']]);
            $request->session()->flash('alert-success', 'Domain successfully updated!!');
            return redirect('d/'.$did.'/settings');
        } else{
            dd(404);
        }
    }

    public function editChannels($did)
    {
        /*
         * CRUD channels
         * add users to channel notifications
         */
        /*
         * general channel can not be leaved or changed
         */
        /*
         * manage channel subscription
         * remove or add them for notification
         */
        $domain  = Domain::find($did);
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
            $channels = Channel::where('domainId', $did)->get();
            return view('domain.settings.admin.channelBS', compact('domain', 'channels'));
        } else{
            dd(404);
        }
    }

    public function updateChannels($did, CreateDomainRequest $request)
    {
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
            $input = $request->all();
            Domain::where('id',$did)->update(['name' => $input['name'], 'description' => $input['description'], 'privacy' => $input['privacy']]);
            $request->session()->flash('alert-success', 'Domain successfully updated!!');
            return redirect('d/'.$did.'/settings');
        } else{
            dd(404);
        }
    }

}
