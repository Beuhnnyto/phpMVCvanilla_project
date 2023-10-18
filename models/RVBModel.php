<?php

require_once 'config/database.php';

class RVBModel {
    private $conn;

    public function __construct() {
        $this->conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function getCountRed() {
        $query = $this->conn->query('SELECT COUNT(*) as count FROM colorchart WHERE rvb = "red"');
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($result && is_numeric($result['count'])) {
            return (int)$result['count'];
        } else {
            return 0; // Return 0 if there's an issue with the query, no results, or a non-numeric count
        }
    }


    public function getCountGreen() {
        $query = $this->conn->query('SELECT COUNT(*) as count FROM colorchart WHERE rvb = "green"');
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($result && is_numeric($result['count'])) {
            return (int)$result['count'];
        } else {
            return 0; // Return 0 if there's an issue with the query, no results, or a non-numeric count
        }
    }
    

    public function getCountBlue() {
        $query = $this->conn->query('SELECT COUNT(*) as count FROM colorchart WHERE rvb = "blue"');
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result && is_numeric($result['count'])) {
            return (int)$result['count'];
        } else {
            return 0; // Return 0 if there's an issue with the query, no results, or a non-numeric count
        }
    }   

    public function insertData($rvb) {
        $query = $this->conn->prepare('INSERT INTO colorchart (rvb) VALUES (?)');
        $query->execute([$rvb]);
    }

}
