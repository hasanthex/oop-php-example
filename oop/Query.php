<?php
/**
 * Created by PhpStorm.
 * User: hasan
 * Date: 1/23/17
 * Time: 1:12 PM
 */
include_once 'Database.php';

Class Query{

    private $dataobj;
    private $result;

    public function __construct(){
        $this->dataobj = new Database();
    }

    function getAllStudentInfo(){
        $query = "Select * From student";
        $this->result = $this->dataobj->executeQuery($query);
        return $this->result;
    }

    function insertStudentInfo($data){
        $name = $data['name'];
        $age  = $data['age'];
        if(strlen($name) > 1 && strlen($age) > 1) {
            $query = "Insert into student (`name`,`age`) VALUES ('$name','$age')";
            return $this->dataobj->executeQuery($query);
        }
    }

    function deleteStudentInfo($id){
            $query = "Delete From student WHERE `sl`='$id'";
            return $this->dataobj->executeQuery($query);
    }

}

