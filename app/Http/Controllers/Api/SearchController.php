<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($query, Request $request)
    {
        if ($request->ajax())
        {
            if($query){
                $result  = User::where('firstName','LIKE', '%'.$query.'%')
                    ->orWhere('lastName','LIKE', '%'.$query.'%')
                    ->orWhere('email','LIKE', '%'.$query.'%')
                    ->orderBy('firstName', 'desc')
                    ->take(10)
                    ->select('id', 'firstName', 'lastName')
                    ->get();

                if($result->isEmpty()){
                    $result  = DB::select('SELECT id, firstName, lastName FROM users WHERE concat_ws('.'" "'.',firstName,lastName) like "%'.$query.'%"');
                }

                return $result;
            }else{
                return false;
            }
        }
    }
}
