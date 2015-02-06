<?php

class RegisterController extends Controller
{

    public function register()
    {
        $model = new $this->model;
        if(isset($_POST["firstname"], $_POST["lastname"],        $_POST["email"],
                 $_POST["password"],  $_POST["confirmpassword"], $_POST["invitecode"],
                 $_POST["role"],      $_POST["gender"],          $_POST["day"],
                 $_POST["month"],     $_POST["year"])){
            
                //perform validation
                $model = new $this->model;
                $result = $model->register($_POST["firstname"], $_POST["lastname"],   $_POST["email"],
                                           $_POST["password"],  $_POST["invitecode"], $_POST["role"],                                                                  $_POST["gender"],    $_POST["day"],        $_POST["month"],     
                                           $_POST["year"]);
                if($result=true){
                    header('Location: redirect.php?to=register/success');                    
                }else{
                    header('Location: redirect.php?to=register/fail');
                }
            
         
        
        }
        
    }
    
    public function success()
    {     
    }
    public function fail()
    {     
    }

}