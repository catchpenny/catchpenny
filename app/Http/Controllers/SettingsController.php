<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;
use File;
use App\Files;

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

            // Make Directory For User If It Does not Exists
            File::exists(storage_path('app/users/'.Auth::user()->id)) or File::makeDirectory(storage_path('app/users/'.Auth::user()->id));

            $small = Files::create([
                'path' => '',
                'name' => '',
                'description' => Auth::user()->firstName . ' ' . Auth::user()->lastName,
                'type' => 'jpg',
                'creatorId' => Auth::user()->id,
                'ownerId' => Auth::user()->id
            ]);
            $small->path = storage_path().'/app/users/'.Auth::user()->id.'/'.$small->id.'.jpg';
            $small->name = $small->id.'.jpg';
            $small->save();

            $medium = Files::create([
                'path' => '',
                'name' => '',
                'description' => Auth::user()->firstName . ' ' . Auth::user()->lastName,
                'type' => 'jpg',
                'creatorId' => Auth::user()->id,
                'ownerId' => Auth::user()->id
            ]);
            $medium->path = storage_path().'/app/users/'.Auth::user()->id.'/'.$medium->id.'.jpg';
            $medium->name = $medium->id.'.jpg';
            $medium->save();

            $big = Files::create([
                'path' => '',
                'name' => '',
                'description' => Auth::user()->firstName . ' ' . Auth::user()->lastName,
                'type' => 'jpg',
                'creatorId' => Auth::user()->id,
                'ownerId' => Auth::user()->id
            ]);
            $big->path = storage_path().'/app/users/'.Auth::user()->id.'/'.$big->id.'.jpg';
            $big->name = $big->id.'.jpg';
            $big->save();

            // save original photo in case of big
            Image::make(Input::file('profilePhoto'))->save( storage_path().'/app/users/'.Auth::user()->id.'/'. $big->id .'.jpg' );
            Image::make(Input::file('profilePhoto'))->fit(240)->save( storage_path().'/app/users/'.Auth::user()->id.'/'. $medium->id .'.jpg' );
            Image::make(Input::file('profilePhoto'))->fit(64)->save( storage_path().'/app/users/'.Auth::user()->id.'/'. $small->id .'.jpg' );


            //save entry in profile
           $profile->update([
               'photoSmall' => $small->id,
               'photoMedium' => $medium->id,
               'photoBig' => $big->id
           ]);


        }
        return view('settings.profileBS', compact('profile'));
    }
}
