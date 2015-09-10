<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($nid)
    {
        $notification = Notifications::where('for', Auth::user()->id)->find($nid);

        if($notification){
            // mark read and goto the url
            $notification->read = 1;
            $notification->save();
            redirect($notification->url);
        }else{
            dd(404);
        }
    }

    public function accept($nid)
    {
        $notification = Notifications::where('forId', Auth::user()->id)->find($nid);

        if($notification){
            $notification->delete();
            return redirect($notification->accept);
        }else{
            dd(404);
        }
    }

    public function cancel($nid)
    {
        $notification = Notifications::where('forId', Auth::user()->id)->find($nid);

        if($notification){
            $notification->delete();
            return redirect($notification->cancel);
        }else{
            dd(404);
        }
    }

    public function destroy($nid)
    {
        $notification = Notifications::where('forId', Auth::user()->id)->find($nid);

        if($notification){
            $notification->delete();
            redirect('home')->with('alert-success', 'Notification Deleted');
        }else{
            dd(404);
        }
    }
}
