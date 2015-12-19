<?php

namespace App\Http\Controllers\Api;

use App\Channel;
use App\ChannelPosts;
use App\ChannelSubscriptions;
use App\Domain;
use App\DomainSubscriptions;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class ApiController extends Controller {

    /**
     * @param Request $credentials
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $credentials)
    {
        return $this->authenticate($credentials);
    }

    public function access()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    public function channel($did, $cid)
    {
        $page = 1;

        // check if channel is subscribed to receive notification
        // check if current user is admin
        // Handle privacy

        $user = JWTAuth::parseToken()->authenticate();

        $domain   = Domain::find($did);
        if(!$domain){
            dd(404);
        }

        $currentChannel  = Channel::find($cid);
        if(!$currentChannel){
            dd(404);
        }
        $currentChannel = $currentChannel->id;

        if(!DomainSubscriptions::where('domainId',$did)->where('userId', $user->id)->where('level','!=','-1')->first())
        {
            // If user is not subscribed and domain is private
            if($domain->privacy!=2){
                return redirect('/d/'.$domain->id.'/request');
            } else {
                dd(404);
            }
        }

        //check if channel joined
        if(!ChannelSubscriptions::where('channelId',$cid)->where('userId', $user->id)->first())
        {
            //
        }

        if (\Input::has('page')) {
            $page = (int) \Input::get('page');
        } else {
            $page = 1;
        }

        $channels = Channel::where('domainId',$did)->get();
        $channel_messages = $this->posts($did, $cid, $page);
        $total = ChannelPosts::where(['domainID' => $did, 'channelID' => $cid])->get()->count();
        $per_page = 10;
        $current_page = $page;
        $last_page = floor($total/10);
        $next_page = ($current_page == $last_page ? null : ($current_page+1));
        $prev_page = ($current_page == 1 ? null : ($current_page-1));

        return response()->json(compact(
            'total', 'per_page', 'current_page', 'last_page', 'next_page', 'prev_page',
            'domain', 'currentChannel', 'channel_messages', 'channels'));

    }

    public function posts($did, $cid, $page)
    {
        $messages = ChannelPosts::where(['domainID' => $did, 'channelID' => $cid])->orderBy('created_at', 'desc')->skip($page)->take(10)->get();
//        $messages = ChannelPosts::where(['domainID' => $did, 'channelID' => $cid])->get();
        foreach ($messages as $message)
        {
            $user = User::where('id', $message->created_by)->first();
            $message->created_by_id = $message->created_by;
            $message->created_by = $user->firstName.' '.$user->lastName;
        }
        return $messages;
    }

    public function logout()
    {
        
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}