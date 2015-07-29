<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Channel;
use App\Post;
use App\DomainUserLevel;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $domains = array();
        $domainSubscribed = DomainUserLevel::where('userId', $userId)->get();

        foreach ($domainSubscribed as $domainId) {
            array_push($domains, Domain::where('id', $domainId['domainId'])->first());
        }

        return view("domain.index", compact('domains'));
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
     * @param  int $id
     * @return Response
     */
    public function show($domainId, $channelId = null)
    {
        $userId = Auth::user()->id;
        if(DomainUserLevel::where('userId',$userId)->where('domainId',$domainId)->first()){
            $channels = Channel::where('domainId', $domainId)->get();
            $domain   = Domain::where('id',$domainId)->first();
            if(!$channelId){
                $channelId = $domain->generalId;
            }
            $posts = Post::where('belongsTo', $channelId)->get();
            return view('domain.channel', compact('channels','domain','posts'));
        }
        return 'user does not belong to this domain';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    //temporary
    public function joinDomain($id)
    {
        $userId = Auth::user()->id;

        DomainUserLevel::create([
            'userId' => $userId,
            'domainId' => $id,
            'level' => 1
        ]);

        return redirect('domain/' . $id);
    }
}
