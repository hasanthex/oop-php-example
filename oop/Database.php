<?php
/**
 * Created by PhpStorm.
 * User: hasan
 * Date: 1/23/17
 * Time: 11:55 AM
 */

Class Database {

    private $user   = "root";
    private $host   = "localhost";
    private $dbname = "testdb1";
    private $pass   = "";
    public $connection;
    public $msg;

    public function __construct(){
        $this->databaseconnect();
    }

    private function databaseconnect(){
        if(!isset($this->connection)){
            $this->connection = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        }
        if(!$this->connection){
            $this->msg = "Connection Error No: ".$this->connection->connect_errno;
            return false;
        }
    }

    function executeQuery($query){
        $result = $this->connection->query($query);
        return $result;
    }
}