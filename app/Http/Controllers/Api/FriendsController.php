<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\FriendRequest;
use App\Friends;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function request($id)
    {
        $userId = Auth::user()->id;

        if($id!=$userId){

            if(!Friends::where('userOneId', $id)->where('userTwoId', $userId)->first()){
                $instance = Friends::firstOrCreate(['userOneId' => $id, 'userTwoId' => $userId]);
            }
        }
        return redirect('profile/'.$id);
    }

    public function accept($id)
    {
        $userId = Auth::user()->id;

        if($id!=$userId){

            if(FriendRequest::where('userOneId', $userId)->where('userTwoId', $id)->first()){
                FriendRequest::where('userOneId', $userId)->where('userTwoId', $id)->delete();
                $instance = Friends::firstOrCreate(['userOneId' => $id, 'userTwoId' => $userId]);
                $instance = Friends::firstOrCreate(['userOneId' => $userId, 'userTwoId' => $id]);
            }
        }
        return redirect('profile/'.$id);
    }

    public function remove($id)
    {
        if($id!=Auth::user()->id) {
            $instance = Following::firstOrCreate(['userOneId' => Auth::user()->id, 'userTwoId' => $id]);
            $instance = Following::where('userOneId', Auth::user()->id)->where('userTwoId', $id)->delete();
            $instance = Following::where('userOneId', Auth::user()->id)->where('userTwoId', $id)->delete();
            return redirect('profile/'.$id);
        }
    }
}
