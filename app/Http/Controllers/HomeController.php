<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Domain;
use App\DomainSubscriptions;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Notifications;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user =  Auth::user();
        $domains = array();
        $domainSubscribed = DomainSubscriptions::where('userId', $user->id)->where('level','!=','-1')->get();

        foreach ($domainSubscribed as $domainId) {
            array_push($domains, Domain::where('id', $domainId['domainId'])->first());
        }

        $notifications = Notifications::where('toId',$user->id)->get();

        return view('home.homeBS', compact('domains', 'notifications'));
    }
}
