<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Profile;
use App\Following;
use Auth;
use Response;
use App\Http\Controllers\Controller;

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
        return Response::json(array('profile' => $profile, 'user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user     = User::find($id);
        if($user) {
            $profile  = Profile::find($id);
            return Response::json(array('profile' => $profile, 'user' => $user));
        }
        abort(404);
    }

    public function removeFollower($id)
    {
        if($id!=Auth::user()->id){
            $instance = Following::where('userOneId', Auth::user()->id)->where('userTwoId', $id)->delete();
            //return $instance;
            return redirect('profile/'.$id);
        }
    }

    public function addFollower($id)
    {
        if($id!=Auth::user()->id) {
            $instance = Following::firstOrCreate(['userOneId' => Auth::user()->id, 'userTwoId' => $id]);
            return redirect('profile/'.$id);
        }
    }
}
