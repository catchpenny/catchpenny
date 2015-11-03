<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Channel;
use App\ChannelPosts;
use App\ChannelSubscriptions;
use App\DomainSubscriptions;
use App\User;
use App\Events\TestEvents;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($did, $cid)
    {
        // check if channel is subscribed to receive notification
        // check if current user is admin
        // Handle privacy

        $domain   = Domain::find($did);
        if(!$domain){
            dd(404);
        }

        $currentChannel  = Channel::find($cid);
        if(!$currentChannel){
            dd(404);
        }

        if(!DomainSubscriptions::where('domainId',$did)->where('userId', Auth::user()->id)->where('level','!=','-1')->first())
        {
            // If user is not subscribed and domain is private
           if($domain->privacy!=2){
               return redirect('/d/'.$domain->id.'/request');
           } else {
               dd(404);
           }
        }

        //check if channel joined
        if(!ChannelSubscriptions::where('channelId',$cid)->where('userId', Auth::user()->id)->first())
        {
            //
        }

        $customClaims = ['foo' => 'bar', 'baz' => 'bob'];
        $_jwttoken = JWTAuth::fromUser(Auth::user(), $customClaims);
//        dd($_jwttoken . Auth::user());
        $channels = Channel::where('domainId',$did)->get();

        $channel_messages = $this->posts($did, $cid, 0);

        return view('channel.index', compact('domain', 'currentChannel', 'channels', 'channel_messages', '_jwttoken'));
    }

    public function fire($did, $cid, Request $request)
    {
        // verify if user is subscribed to the domain
        $message = ChannelPosts::create([
            'domainID'      => $did,
            'channelID'     => $cid,
            'body'          => $request['message'],
            'created_by'    => Auth::user()->id,
        ]);
        event(new TestEvents($did, $cid, Auth::user()->firstName.' '.Auth::user()->lastName, Auth::user()->id, $request['message']));
        return 200;
    }

    public function posts($did, $cid)
    {
        $messages = ChannelPosts::where(['domainID' => $did, 'channelID' => $cid])->orderBy('created_at', 'desc')->paginate(10);
        foreach ($messages as $message)
        {
            $user = User::where('id', $message->created_by)->first();
            $message->created_by = $user->firstName.' '.$user->lastName;
        }
        return $messages;
    }
}
