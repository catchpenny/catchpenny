<?php

namespace App\Http\Controllers;

use App\Domain;
use App\DomainSubscriptions;
use App\Channel;
use Carbon\Carbon;
use App\ChannelSubscriptions;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDomainRequest;
use Illuminate\Support\Facades\Auth;

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
    {
        return view('domain.createBS');
    }

    public function store(CreateDomainRequest $request)
    {

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
            'level'    => 0
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
        return redirect('domain/create');
    }

    public function edit($did)
    {
        $domain  = Domain::find($did);
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
                $channels = Channel::where('domainId', $did)->get();
                return view('domain.settingsBS', compact('domain', 'channels'));
        } else{
            dd(404);
        }
    }

    public function update($did, CreateDomainRequest $request)
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

    public function destroy($did, Request $request)
    {
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
            Domain::destroy($did);
            $request->session()->flash('alert-success', 'Domain deleted successfully');
            return redirect('home');
        } else{
            dd(404);
        }
    }

    public function editUsers($did)
    {
        $domain  = Domain::find($did);
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
            $channels = Channel::where('domainId', $did)->get();
            return view('domain.settingsBS', compact('domain', 'channels'));
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
        $domain  = Domain::find($did);
        $userId  = Auth::user()->id;
        $level = DomainSubscriptions::where('userId',$userId)->where('domainId',$did)->select('level')->first();
        if($level && $level->level==0){
            $channels = Channel::where('domainId', $did)->get();
            return view('domain.settings.channelsBS', compact('domain', 'channels'));
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
