<?php

namespace App\Http\Controllers;

use App\Domain;
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
        $domains = Domain::all();
        return view("domain.index", compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param array $data
     * @return Domain
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
    public function show($id)
    {
        //
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
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->create($request->all(), $user);

        return redirect()->action('DomainController@index');
    }
}
