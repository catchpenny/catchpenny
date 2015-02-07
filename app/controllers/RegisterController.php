<?php

class RegisterController extends Controller
{

    public function register()
    {
       
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
                    if($result=true){
                        header('Location: redirect.php?to=register/status/value=pass');                    
                    }else{
                        header('Location: redirect.php?to=register/status/value=fail');
                    }
                }else{
                    $this->set('error','email already exists');
                }
         
        
        }
        
    }
    
    public function status()
    {
        if(isset($_GET['value'])){
                if($_GET['value']=='fail'){
                    $this->set('statusMessage','Account creation failed');
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
    {
        if(isset($_GET['key'],$_GET['email']))
        {
           $model = new $this->model;
           if($model->activate($_GET['key'],$_GET['email']))
           {
               $this->set('activateMessage','Your Account has been activated you can now login');
               Email::send("root@localhost","bunny",'activated'); 
           }
        }else{
               $this->set('activateMessage','Invalid Activation');
            
        }
    }

}