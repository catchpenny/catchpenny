<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Domain;
use App\DomainUserLevel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        $userId = Auth::user()->id;
        $user =  Auth::user();
        $domains = array();
        $domainSubscribed = DomainUserLevel::where('userId', $userId)->get();

        foreach ($domainSubscribed as $domainId) {
            array_push($domains, Domain::where('id', $domainId['domainId'])->first());
        }
        return view('home.homeBS', compact('domains', 'user'));
    }
}
