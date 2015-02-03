
<?php

class Model extends PDOquery
{
    protected $_model;
    protected $_table;

    public function __construct()
    {
        $this->connect(DB_NAME, DB_HOST, DB_USER, DB_PASSWORD);
        $this->_model = get_class($this);
        //$this->_table = $table;
    }

    public function __destruct()
    {
        $this->close();
    }
}
