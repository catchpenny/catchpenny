<?php

namespace App\Http\Controllers;

use App\DomainSubscriptions;
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

        $notification = Notifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->forId)->select('level')->first();

        if($notification){
            if($notification->forId == $user->id){
                $notification->read = 1;
                $notification->save();
                return redirect($notification->url);
            }elseif($level->level==0) {
                $notification->read = 1;
                $notification->save();
                return redirect($notification->url);
            }
        }else{
            dd(404);
        }
    }

    public function accept($nid)
    {
        $notification = Notifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->forId)->select('level')->first();

        if($notification){
            if($notification->forId == $user->id){
                $notification->delete();
                return redirect($notification->accept);
            }elseif($level->level==0) {
                $notification->delete();
                return redirect($notification->accept);
            }
        }else{
            dd(404);
        }
    }

    public function cancel($nid)
    {
        $notification = Notifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->forId)->select('level')->first();

        if($notification){
            if($notification->forId == $user->id){
                $notification->delete();
                return redirect($notification->cancel);
            }elseif($level->level==0) {
                $notification->delete();
                return redirect($notification->cancel);
            }
        }else{
            dd(404);
        }
    }

    public function destroy($nid)
    {
        $notification = Notifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->forId)->select('level')->first();

        if($notification){
            if($notification->forId == $user->id){
                $notification->delete();
                return redirect('home')->with('alert-success', 'Notification Deleted');
            }elseif($level->level==0) {
                $notification->delete();
                return redirect('d/'.$notification->forId.'/settings/notifications')->with('alert-success', 'Notification Deleted');
            }
        }else{
            dd(404);
        }
    }
}
