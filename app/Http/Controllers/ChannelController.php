<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Channel;
use App\ChannelSubscriptions;
use App\DomainSubscriptions;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $domain   = Domain::find($did);
        //check if domain exists
        if(!$domain)
        {
            dd(404);
        }

        //check if domain not joined
        if(!DomainSubscriptions::where('domainId',$did)->where('userId', Auth::user()->id)->first())
        {
           if($domain->privacy==0){
               return view(); //return form for joining
           } elseif($domain->privacy==1){
               //check if already asked for permission
               return view(); //return form for ask for permission
           }else{
               dd(404);
           }
        }

        $currentChannel  = Channel::find($cid);

        // check if channel exists
        if(!$currentChannel){
            dd(404);
        }

        //check if channel joined
        if(!ChannelSubscriptions::where('channelId',$cid)->where('userId', Auth::user()->id)->first())
        {
            //display joining page
        }

        $channels = Channel::where('domainId',$did)->get();
        return view('channel.indexBS', compact('domain', 'currentChannel', 'channels'));
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
