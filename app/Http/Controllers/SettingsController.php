<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('settings.profileBS', compact('profile'));
    }
}
