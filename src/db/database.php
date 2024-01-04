<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;


    public function __construct(){
        $this->host = "localhost";
        $this->db = "schema_loja_tenis";
        $this->user = "root";
        $this->password = "1234";
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            return new PDO($connection, $this->user, $this->password, $options);
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}

?>