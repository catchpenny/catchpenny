<?php

class RegisterModel extends Model
{
    public function register($firstname,  $lastname, $email,  $password, $invitecode, 
                             $role,       $gender,   $day,    $month,    $year)
    {
       $password_hashed   = password_hash($password, PASSWORD_BCRYPT);
       $invitecode_hashed = password_hash($invitecode, PASSWORD_BCRYPT);  
       $ip                = $_SERVER['REMOTE_ADDR'];
       $date              = $month." ".$day." ".$year;
       $date              = date('Y-m-d', strtotime($date));        
       
       if(strtolower($role)=='teacher')
          $level=1;
       elseif(strtolower($role)=='student')
          $level=2;
       else
          $level=3;
       
       $stmt = $this->dbconnect->prepare('INSERT INTO users (email, password,
                                                             level, registration_datetime,
                                                             registration_ip) 
                                                     VALUES (:email,:password,
                                                             :level,   NOW(),
                                                             :r_ip)');
       $stmt->execute(array(':email'=>$email,':password'=>$password_hashed
                           ,':level'=>$level,':r_ip'=>$ip));  
        
       $user_id=$this->exists($email);
       $this->registerProfile($user_id, $firstname, $lastname, $gender, $date);
       $random=$this->generateActivationKey($user_id);
       //Email::send($email,$firstname,'activation',$random);
       $link=BASE_PATH."register/activate/key=".$random."&email=".$email."&name=".$firstname;    
       Email::send("root@localhost",$firstname,'activation',$link);
       
       return true;
        
    }
    
    public function exists($email)
    {
        $stmt            = $this->dbconnect->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(array('email' => $email));
        $row             = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1)
            return $row['user_id'];
        else 
            return false;
    }
    
    public function registerProfile($user_id, $firstname, $lastname, $gender, $date_ob)
    {
        $stmt = $this->dbconnect->prepare('INSERT INTO user_profile (user_id, first_name, last_name,
                                                                      date_ob, sex) 
                                                              VALUES (:user_id, :first_name,:last_name,
                                                                      :date_ob, :sex)');
        $stmt->execute(array(':user_id'=>$user_id,':first_name'=>$firstname
                           ,':last_name'=>$lastname,      ':date_ob'=>$date_ob
                           ,':sex'=>$gender));          
    }    
    
    public function generateActivationKey($user_id)
    {
        $random      = rand(10000,99999);
        $random_hash = password_hash($random, PASSWORD_BCRYPT);
        
        
        $stmt = $this->dbconnect->prepare('UPDATE users set activation_key=:activation_key, activation_validity=NOW() 
                                                      WHERE user_id=:user_id');
        $stmt->execute(array(':activation_key'=>$random_hash,':user_id'=>$user_id));  
        return $random;
    }
    
    public function activate($key,$email)
    {
        $stmt = $this->dbconnect->prepare('SELECT status, activation_key, activation_validity, 
                                           NOW() as now FROM users WHERE email = :email');
        $stmt->execute(array('email' => $email));
        $row             = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if($stmt->rowCount() == 1){
            
            if ($row['status']==0){
                
                if(password_verify($key,$row['activation_key']))
                 {  
                    $val1=$row['activation_validity'];
                    $val2=$row['now'];
                    $datetime1 = new DateTime($val1);
                    $datetime2 = new DateTime($val2);
                    if($datetime1 <= $datetime2){
                        $stmt = $this->dbconnect->prepare('UPDATE users set status=1, activation_key=NULL,  
                                                           activation_validity = NOW() WHERE email=:email');
                        $stmt->execute(array(':email'=>$email));
                        return true;
                    }else{
                        return 'The Activation Key Expired';
                    }    
                 }else{
                    return 'The Activation Key Invalid';
                 }
            }else{
                return 'The Account is Already Active';
            }
        }else{
            return 'The Email Account does not Exists';
        }
        
    }
}