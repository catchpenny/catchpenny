<?php


class PDOquery
{

protected $_dbconnect;
protected $_result;

    public function connect($dbname, $host, $dbusername, $dbpassword)
    {
        try {
            $this->_dbconnect = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
            $this->_dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            //handle the error
        }
    }

    public function close()
    {
        $this->_dbconnect = null;
    }

    //ADD CRUD
}
