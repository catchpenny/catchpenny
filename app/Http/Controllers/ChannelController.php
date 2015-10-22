<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Channel;
use App\ChannelSubscriptions;
use App\DomainSubscriptions;
use App\User;
use App\Events\TestEvents;
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
        return view('channel.indexBS', compact('domain', 'currentChannel', 'channels', '_jwttoken'));
    }

    public function fire($did, $cid, Request $request)
    {
        // verify if user is subscribed to the domain
        event(new TestEvents($did, $cid, Auth::user()->firstName.' '.Auth::user()->lastName, Auth::user()->id, $request['m']));
        return 200;
    }
}
