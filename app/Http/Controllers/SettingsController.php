<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;
use File;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('settings.generalBS');
    }

    public function profileIndex()
    {
        $profile = \App\Profile::firstOrCreate(['id' => Auth::user()->id]);
        return view('settings.profileBS', compact('profile'));
    }

    public function profileUpdate(\App\Http\Requests\User\ProfileRequest $request)
    {
        $profile  = \App\Profile::find(Auth::user()->id);
        $profile->update($request->all());
        if(Input::hasFile('profilePhoto')){

            //          small - 120x90 Pixel
            //          medium - 240x180 Pixel
            //          large - 480x360 Pixel

            File::exists(storage_path('app/users/'.Auth::user()->id)) or File::makeDirectory(storage_path('app/users/'.Auth::user()->id));
            Image::make(Input::file('profilePhoto'))->resize(300, 200)->save( storage_path().'/app/users/'.Auth::user()->id.'/foo.jpg');
        }
        return view('settings.profileBS', compact('profile'));
    }
}
