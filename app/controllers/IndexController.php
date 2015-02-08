<?php

class IndexController extends Controller
{
    public function index()
    {
        Auth::checkLogin(true);
      
        
    }
}