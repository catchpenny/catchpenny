<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Files;
use Storage;
use Auth;
use Image;
use Response;
use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $image = Files::find($id);
        $contents = Storage::get($image->path);
        return Image::make($contents)->response('jpg');
    }

    public function userProfileImage($userId, $size)    {

        $profile = Profile::find($userId);
//        dd($size);
        if($profile[$size]){
            $image = Files::find($profile[$size]);
//            dd($profile[$size]);
//            dd($image->path);
            $contents = \File::get($image->path);
            return Image::make($contents)->response('jpg');
        }else{
            // return default user image
            $contents = \File::get(storage_path().'/app/users/default/profile.png');
            return Image::make($contents)->response('png');
        }

    }
}
