<?php

class Connections {

    protected $connection; 

    public function __construct(){
        $this->connect();
    }

    private function connect(){
        $servername = "localhost";
        $username = "root";
        $database = "dkgallery";
        
        try {
          $this->connection = new PDO("mysql:host=$servername;dbname=$database", $username);
          $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }
}