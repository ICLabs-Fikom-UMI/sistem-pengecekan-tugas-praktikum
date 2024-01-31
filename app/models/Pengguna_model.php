<?php

class Pengguna_model {
    private $table = "mst_user";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUser(){
        try {
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function addUser($username, $password, $role){
        try {
            $this->db->query("INSERT INTO $this->table (username, password, role) VALUES (:username, :password, :role)");
            $this->db->bind(':username', $username);
            $this->db->bind(':password', $password);
            $this->db->bind(':role', $role);
    
            $this->db->execute();
            $userId = $this->db->lastInsertId(); 
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
}
