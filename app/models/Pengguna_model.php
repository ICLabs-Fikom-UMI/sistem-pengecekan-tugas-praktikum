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

    // public function getDataUserById($id) {
    //     try {
    //         $this->db->query("SELECT mst_praktikan.nama_praktikan, mst_asisten.nama_asisten FROM mst_praktikan INNER JOIN mst_asisten ON mst_praktikan.id_user = mst_asisten.id_user WHERE id_user = :id_user");
    //         $this->db->bind(':id_user', $id);
    //         return $this->db->single();
    //     } catch (\Throwable $th) {
    //         // Handle error jika perlu
    //         echo 'Error: ' . $th->getMessage();
    //     }
    // }
    public function getDataUserById($id) {
        try {
            $this->db->query("SELECT 
                                mst_administrator.nama_admin, 
                                mst_asisten.nama_asisten,
                                mst_praktikan.nama_praktikan
                              FROM mst_user
                              LEFT JOIN mst_administrator ON mst_user.id_user = mst_administrator.id_user
                              LEFT JOIN mst_asisten ON mst_user.id_user = mst_asisten.id_user
                              LEFT JOIN mst_praktikan ON mst_user.id_user = mst_praktikan.id_user
                              WHERE mst_user.id_user = :id_user");
            $this->db->bind(':id_user', $id);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    public function hapusPengguna($id) {
        $query = "DELETE FROM mst_user WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind("id_user", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    


    
}
