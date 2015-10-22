<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Files;
use Storage;
use Auth;
use Image;
use Response;
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
        return Image::make($contents)->response('png');
    }
}
