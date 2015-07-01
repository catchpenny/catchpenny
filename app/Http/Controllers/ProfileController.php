<?php

namespace App\Http\Controllers;

use App\User;
use Image;
use Storage;
use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        $profile = Profile::findOrNew(Auth::user()->id);
        $user    = Auth::user();
        return view("profile.index", compact('profile','user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $profile  = Profile::findOrFail($id);
        $user     = User::findOrFail($id);
        return view("profile.show", compact('profile','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request)
    {
        $profile = Profile::findOrNew(Auth::user()->id);
        return view("profile.edit", compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($request->hasFile('profilePhoto')) {
            Storage::makeDirectory('users/'.Auth::user()->id.'/img');
            Image::make($request->file('profilePhoto'))->resize(300, 200)->save('./../storage/app/users/'.Auth::user()->id.'/img/fooBig.jpeg');
            Image::make($request->file('profilePhoto'))->resize(300, 200)->save('./../storage/app/users/'.Auth::user()->id.'/img/fooSmall.jpeg');
            Image::make($request->file('profilePhoto'))->resize(300, 200)->save('./../storage/app/users/'.Auth::user()->id.'/img/fooMedium.jpeg');
        }

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $instance = Profile::updateOrCreate([ 'id' => Auth::user()->id], $request->all());
        return redirect('profile/edit');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'contactNumber' => 'numeric',
            'profilePhoto'  => 'mimes:jpeg,png',
        ]);
    }
}
