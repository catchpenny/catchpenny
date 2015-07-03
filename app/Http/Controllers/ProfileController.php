<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Image;
use App\Files;
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
        $profile         = Profile::findOrNew(Auth::user()->id);
        $profile['self'] = true;
        $user            = Auth::user();
        $posts = Post::where('ownerId', Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->get();
        return view("profile.index", compact('profile', 'user', 'posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $profile  = Profile::findOrNew($id);
        if(Auth::user()->id == $id)
            $profile['self'] = true;
        $user     = User::findOrFail($id);
        return view("profile.index", compact('profile', 'user's));
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
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
    public function update(Request $request)
    {
        $validator      = $this->validator($request->all());
        $id             = Auth::user()->id;

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if ($request->hasFile('profilePhoto')) {
            $name                     = uniqid();
            $request['photoBig']      = $this->savePhotoInFiles('users/'.$id.'/img/'.$name.'Big.jpeg',$id);
            $request['photoMedium']   = $this->savePhotoInFiles('users/'.$id.'/img/'.$name.'Medium.jpeg',$id);
            $request['photoSmall']    = $this->savePhotoInFiles('users/'.$id.'/img/'.$name.'Small.jpeg',$id);


            Storage::makeDirectory('users/'.Auth::user()->id.'/img');
            Image::make($request->file('profilePhoto'))->resize(1024, 768)->save('./../storage/app/users/'.$id.'/img/'.$name.'Big.jpeg');
            Image::make($request->file('profilePhoto'))->resize(680, 480)->save('./../storage/app/users/'.$id.'/img/'.$name.'Small.jpeg');
            Image::make($request->file('profilePhoto'))->resize(160, 120)->save('./../storage/app/users/'.$id.'/img/'.$name.'Medium.jpeg');
        }

        if ($request->hasFile('coverPhoto')) {
            $name                   = uniqid();
            $request['coverBig']    = $this->savePhotoInFiles('users/'.$id.'/img/'.$name.'Big.jpeg',$id);
            $request['coverSmall']  = $this->savePhotoInFiles('users/'.$id.'/img/'.$name.'Small.jpeg',$id);;
            Storage::makeDirectory('users/'.$id.'/img');
            Image::make($request->file('coverPhoto'))->resize(1024, 768)->save('./../storage/app/users/'.Auth::user()->id.'/img/'.$name.'Big.jpeg');
            Image::make($request->file('coverPhoto'))->resize(300, 200)->save('./../storage/app/users/'.Auth::user()->id.'/img/'.$name.'small.jpeg');
        }

        $instance = Profile::updateOrCreate([ 'id' => $id], $request->all());
        return redirect('profile/edit');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'contactNumber' => 'numeric',
            'profilePhoto'  => 'mimes:jpeg,png',
            'coverPhoto'    => 'mimes:jpeg,png',
        ]);
    }

    protected function savePhotoInFiles($path, $id)
    {
        $file           =  Files::create(['path'=> $path,'ownerId'=> $id]);
        return $file->id;
    }
}
