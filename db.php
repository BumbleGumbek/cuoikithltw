<?php

class db{
    protected $conn;
    public function __construct()
    {
        $this->conn = new mysqli("localhost","root","","db_t2c4");
        $this->conn->set_charset('utf8');
    }
}

?>