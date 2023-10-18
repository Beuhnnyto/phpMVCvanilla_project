<?php
require_once 'config/database.php';
class DatabaseModel {
    private $conn;

    public function __construct() {
        $this->conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function getAllData() {
        $query = $this->conn->query('SELECT * FROM todos');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData($data) {
        $query = $this->conn->prepare('INSERT INTO todos (title) VALUES (?)');
        $query->execute([$data]);
    }

    public function deleteData($id) {
        $query = $this->conn->prepare('DELETE FROM todos WHERE id = ?');
        $query->execute([$id]);
    }
}
