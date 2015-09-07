<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Channel;
use App\ChannelSubscriptions;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($did, $cid)
    {
        // check if domain joined
        // check if channel exists
        // check if channel is subscribed to receive notification

//        $usersId  = ChannelSubscriptions::where('channelId',$cid)->get();
//        $users    = User::find($usersId);
//
//        $channel = Channel::find($cid);
//        foreach($channel->users as $user)
//        {
//            dd($user);
//        }
//        dd();
        //dd($channel->users);
        $domain   = Domain::find($did);
        $channel  = Channel::find($cid);
        $channels = Channel::where('domainId',$did)->get();
        return view('channel.indexBS', compact('domain', 'channel', 'channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
