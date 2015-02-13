<?php


class PDOquery
{

public $dbconnect;
protected $result;

    public function connect($dbname, $host, $dbusername, $dbpassword)
    {
        try {
            $this->dbconnect = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
            $this->dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            //handle the error
        }
    }

    public function close()
    {
        $this->dbconnect = null;
    }

    //ADD CRUD
    public function query($query)
    {
        $this->stmt = $this->dbconnect->prepare($query);
    }
    
    public function execute()
    {
        return $this->stmt->execute();
    }
    
    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function bind($param, $value, $type = null)
    {
         if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                }
            }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
