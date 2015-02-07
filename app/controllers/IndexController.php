<?php

class IndexController extends Controller
{
    public function index()
    {
        if(!Auth::checkLogin())
        {
            header('Location: home');            
        }
        
    }
}