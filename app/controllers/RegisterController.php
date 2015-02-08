<?php

class RegisterController extends Controller
{

    public function register()
    {
        Auth::checkLogin(false);
        if(isset($_POST["firstname"], $_POST["lastname"],        $_POST["email"],
                 $_POST["password"],  $_POST["confirmpassword"], $_POST["invitecode"],
                 $_POST["role"],      $_POST["gender"],          $_POST["day"],
                 $_POST["month"],     $_POST["year"])){
                 
                $model = new $this->model;
            
                if($model->exists($_POST["email"])===false){
                    
                    //perform validation
                    $result = $model->register($_POST["firstname"], $_POST["lastname"],   $_POST["email"],
                                               $_POST["password"],  $_POST["invitecode"], $_POST["role"],                                                                $_POST["gender"],    $_POST["day"],        $_POST["month"],     
                                               $_POST["year"]);
                    if($result===true){
                        header('Location: '.BASE_PATH.'redirect.php?to=register/status/value=pass');                    
                    }else{
                        header('Location: '.BASE_PATH.'redirect.php?to=register/status/value=fail');
                    }
                }else{
                    header('Location: '.BASE_PATH.'redirect.php?to=register/status/value=fail&reason=emailexists');
                }
         
        
        }
        
    }
    
    public function status()
    {   Auth::checkLogin(false);
        if(isset($_GET['value'])){
                if($_GET['value']=='fail'){
                    $this->set('statusMessage','Email already exists');
                }elseif($_GET['value']=='pass'){
                    $this->set('statusMessage','Account created Please check your inbox for activation');
                }else{
                    $this->set('statusMessage','invalid status');
                }
        }else{
            $this->set('statusMessage','invalid status');
        }
    }
    
    public function activate()
    {   Auth::checkLogin(false);
        if(isset($_GET['key'],$_GET['email']))
        {
           $model  = new $this->model;
           $result = $model->activate($_GET['key'],$_GET['email']);
           if($result===true){
               $this->set('activateMessage','Your Account has been activated you can now login');
               Email::send("root@localhost",$_GET['name'],'activated'); 
           }else{
               $this->set('activateMessage',$result);
                }
        }else{
            $this->set('activateMessage','invalid url');
        }
    }

}