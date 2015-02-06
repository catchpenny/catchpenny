<?php

class RegisterModel extends Model
{
    public function register($firstname,  $lastname, $email,  $password, $invitecode, 
                             $role,       $gender,   $day,    $month,    $year)
    {
       $password_hashed = password_hash($password, PASSWORD_BCRYPT);
       $stmt = $this->_dbconnect->prepare('INSERT INTO users (username,password) VALUES (:username,:password)');
       $stmt->execute(array(':username'=>$username,':password'=>$password_hashed));
    }
}