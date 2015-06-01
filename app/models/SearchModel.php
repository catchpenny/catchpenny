<?php

class SearchModel extends Model
{
    public function search($value)
    {
        $stmt            = $this->dbconnect->prepare('SELECT * FROM users WHERE email = LOWER(:email)');
        $stmt->execute(array('email' => $value));
        $row             = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1)
            return $row['user_id'];
        else 
            return false;
    }
    
    public function details($user_id)
    {
        $stmt            = $this->dbconnect->prepare('SELECT * FROM users WHERE user_id = :u_id');
        $stmt->execute(array('u_id' => $user_id));
        $row             = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1)
            return $row;
        else 
            return false;
    }
}