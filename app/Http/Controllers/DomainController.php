<?php

namespace App\Http\Controllers;

use App\Domain;
use App\DomainUserLevel;
use App\Channel;
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

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
        //validation

        $input = $request->all();
        $user = Auth::user()->id;

        $invite_code = str_replace(' ', '', (substr(uniqid(), 0, 7) . substr(md5($input['name']), 0, 6)));

        $domain = Domain::create([
            'name'          => $input['name'],
            'description'   => $input['description'],
            'created_by'    => $user,
            'invite_code'   => $invite_code
        ]);

        DomainUserLevel::create([
            'userId'   => $user,
            'domainId' => $domain->id,
            'level'    => 0
        ]);

        $general = Channel::create([
            'name'          => 'general',
            'description'   => 'this channel is for general talks',
            'created_by'    => $user,
            'domainId' => $domain->id,
            'invite_code'   => uniqid()
        ]);


        $random = Channel::create([
            'name'          => 'random',
            'description'   => 'this channel is for random talks',
            'created_by'    => $user,
            'domainId' => $domain->id,
            'invite_code'   => uniqid()

        ]);

        $domain->generalId = $general->id;
        $domain->save();

        $request->session()->flash('alert-success', 'Domain was successful created!!');
        return redirect('domain/create');
    }

}
