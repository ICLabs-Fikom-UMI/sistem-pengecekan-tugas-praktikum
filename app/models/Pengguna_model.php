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
    // Di dalam class Pengguna_model

public function getUserById($id) {
    try {
        $this->db->query("SELECT * FROM $this->table WHERE id_user = :id_user");
        $this->db->bind(':id_user', $id);
        return $this->db->single();
    } catch (\Throwable $th) {
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

    public function getUsernameById($id) {
        try {
            $this->db->query("SELECT username FROM $this->table WHERE id_user = :id_user");
            $this->db->bind(':id_user', $id);
            $result = $this->db->single();
            return $result['username'];
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    public function resetUserPassword($id, $password) {
        try {
            $this->db->query("UPDATE $this->table SET password = :password WHERE id_user = :id_user");
            $this->db->bind(':password', $password);
            $this->db->bind(':id_user', $id);
            $this->db->execute();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function getRoleById($id) {
        try {
            $this->db->query("SELECT role FROM $this->table WHERE id_user = :id_user");
            $this->db->bind(':id_user', $id);
            return $this->db->single();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
            die(); // Tambahkan die() untuk memastikan kode berhenti di sini jika ada error
        }
    }
    
    
    

    public function getInitialPassword($id, $role) {
        try {
            switch($role) {
                case 'Administrator':
                    return 'Admin';
                    break;
                case 'Asisten':
                    return 'asisten';
                    break;
                case 'Praktikan':
                    // Get the username of the praktikan
                    return $this->getUsernameById($id);
                    break;
                default:
                    return ''; // Default password is empty if no role matches
            }
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    public function updatePassword($id, $newPassword) {
        try {
            $this->db->query("UPDATE $this->table SET password = :password WHERE id_user = :id_user");
            $this->db->bind(':password', $newPassword);
            $this->db->bind(':id_user', $id);
            $this->db->execute();
            return true; // Berhasil memperbarui password
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
            return false; // Gagal memperbarui password
        }
    }
    
}
