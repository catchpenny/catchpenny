<?php

namespace App\Http\Controllers\Api;

use App\Domain;
use App\Channel;
use App\DomainUserLevel;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(array $data, $id)
    {
        $invite_code = $this->generateInviteCode($data['name']);

        return Domain::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
            'created_by'    => $id,
            'invite_code'   => $invite_code
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:30',
            'description' => 'required|max:255',
        ]);
    }

    protected function generateInviteCode($name)
    {
        $code = str_replace(' ', '', (substr(uniqid(), 0, 7) . substr(md5($name), 0, 6)));
        return $code;
    }

    public function registerDomain(Request $request)
    {
        $user = Auth::user()->id;
        $data = $request->all();

        $validator = $this->validator($data);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $domain = $this->create($data, $user);

        DomainUserLevel::create([
            'userId'   => $user,
            'domainId' => $domain->id,
            'level'    => 0
        ]);


        Channel::create([
            'name'          => 'general',
            'description'   => 'this channel is for general talks',
            'created_by'    => $user,
            'domainId' => $domain->id,
            'invite_code'   => uniqid()
        ]);


        Channel::create([
            'name'          => 'random',
            'description'   => 'this channel is for random talks',
            'created_by'    => $user,
            'domainId' => $domain->id,
            'invite_code'   => uniqid()

        ]);

        return $domain;
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
