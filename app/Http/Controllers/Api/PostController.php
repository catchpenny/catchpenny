<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Auth;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
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
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id ,Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $instance = Post::create(['content' => $request['status'],
                                  'ownerId' => Auth::user()->id,
                                  'belongsTo' => $id,
                                  'type' => 'status']);
        return $instance;
        //return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $instance = Post::where('ownerId', Auth::user()->id)->find($id)->delete();
        return redirect('dashboard');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'content' => 'required|max:255'
        ]);
    }
}
