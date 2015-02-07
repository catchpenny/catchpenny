<?php

class LoginController extends Controller
{
    function login()
    {
        $this->doNotRenderHeader=1;
        if(Auth::checkLogin())
        {
            header('Location: '.BASE_PATH.'redirect.php?to=index');
        }
        
        if(isset($_POST['email'],$_POST['password'])){
             
             $result = Auth::login($_POST['email'],$_POST['password']);
             if($result === true){
                  header('Location: '.BASE_PATH.'redirect.php?to=index');
             }else{
                $this->set('error',$result);
            }
        }
    }
    
    function out()
    {
        $this->render=0;
        Auth::logout();
        header('Location: '.BASE_PATH.'redirect.php?to=home');
    }
}