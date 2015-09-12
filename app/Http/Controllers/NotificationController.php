<?php

namespace App\Http\Controllers;

use App\DomainSubscriptions;
use App\Notifications;
use App\DomainNotifications;
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
        $notification = Notifications::where('toId',Auth::user()->id)->find($nid);

        if($notification){
                $notification->read = 1;
                $notification->save();
                return redirect($notification->url);
        }else{
            dd(404);
        }
    }

    public function accept($nid)
    {
        $notification = Notifications::where('toId',Auth::user()->id)->find($nid);

        if($notification){
            $notification->delete();
            return redirect($notification->accept);
        }else {
            dd(404);
        }
    }

    public function cancel($nid)
    {
        $notification = Notifications::where('toId',Auth::user()->id)->find($nid);

        if($notification){
            $notification->delete();
            return redirect($notification->cancel);
        }else {
            dd(404);
        }
    }

    public function destroy($nid)
    {
        $notification = Notifications::where('toId',Auth::user()->id)->find($nid);
        if($notification){
            $notification->delete();
            return redirect('home')->with('alert-success', 'Notification Deleted');
        }else {
            dd(404);
        }
    }

    public function indexDomain($nid)
    {

        $notification = DomainNotifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->toId)->select('level')->first();

        if($notification && $level->level==0){
            $notification->read = 1;
            $notification->save();
            return redirect($notification->url);
        }else{
            dd(404);
        }
    }

    public function acceptDomain($nid)
    {
        $notification = DomainNotifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->toId)->select('level')->first();

        if($notification && $level->level==0){
            $notification->delete();
            return redirect($notification->accept);
        }else{
            dd(404);
        }
    }

    public function cancelDomain($nid)
    {
        $notification = DomainNotifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->toId)->select('level')->first();

        if($notification && $level->level==0){
            $notification->delete();
            return redirect($notification->cancel);
        }else{
            dd(404);
        }
    }

    public function destroyDomain($nid)
    {
        $notification = DomainNotifications::find($nid);
        $user = Auth::user();

        $level = DomainSubscriptions::where('userId',$user->id)->where('domainId',$notification->toId)->select('level')->first();

        if($notification && $level->level==0){
            $notification->delete();
            return redirect('d/'.$notification->toId.'/settings/notifications')->with('alert-success', 'Notification Deleted');
        }else{
            dd(404);
        }
    }
}
