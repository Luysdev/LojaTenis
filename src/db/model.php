<?php

require_once __DIR__ . "/database.php";
class Model{


    /**
     * @var Database
     */
    private $db;

    function __construct(){
        $this->db = new Database();
    }

    function query($query){
        return $this->db->connect()->query($query);
    }

    function prepare($query){
        return $this->db->connect()->prepare($query);
    }
}

?>