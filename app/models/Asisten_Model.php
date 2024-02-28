<?php

class Asisten_model {
    private $table = "mst_asisten";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllAsisten(){
        try {
            $this->db->query('SELECT * FROM ' . $this->table);
            // $this->db->query('SELECT mst_asisten.*, mst_matkul.nama_matkul FROM mst_asisten LEFT JOIN mst_matkul ON mst_asisten.id_matkul = mst_matkul.id_matkul');
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function addAsisten($nim_asisten, $nama_asisten,$kelas, $prodi, $id_user){
        try {
            // $this->db->query("INSERT INTO $this->table (nim_asisten, nama_asisten, kelas, prodi) VALUES (:nim_asisten, :nama_asisten, :kelas, :prodi)");
            $this->db->query("CALL tambah_asisten(:nim_asisten, :nama_asisten, :kelas, :prodi)");
            $this->db->bind(':nim_asisten', $nim_asisten);
            $this->db->bind(':nama_asisten', $nama_asisten);
            $this->db->bind(':kelas', $kelas);
            $this->db->bind(':prodi', $prodi);
            // $this->db->bind(':id_user', $id_user);
            // var_dump($nim_asisten);
    
            $this->db->execute();
            $idMatkul = $this->db->lastInsertId(); 
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    public function getAsistenById($id_asisten) {
        try {
            $this->db->query("SELECT * FROM $this->table WHERE id_asisten = :id_asisten");
            $this->db->bind(':id_asisten', $id_asisten);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }  
    
   // HAPUS

    public function hapusAsisten($id) {
        $query = "DELETE FROM mst_asisten WHERE id_asisten = :id_asisten";
        $this->db->query($query);
        $this->db->bind("id_asisten", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    //UPDATE

    public function viewAsisten(){
        $this->db->query("SELECT * FROM mst_asisten");
        return $this->db->resultSet();
    }



    public function updateAsisten($id_asisten, $nim_asisten, $nama_asisten, $kelas, $prodi) {
        try {
            $query = "UPDATE $this->table SET nim_asisten = :nim_asisten, nama_asisten = :nama_asisten, kelas = :kelas, prodi = :prodi WHERE id_asisten = :id_asisten";
            $this->db->query($query);
            $this->db->bind(':nim_asisten', $nim_asisten);
            $this->db->bind(':nama_asisten', $nama_asisten);
            $this->db->bind(':kelas', $kelas);
            $this->db->bind(':prodi', $prodi);
            $this->db->bind(':id_asisten', $id_asisten);
            $this->db->execute();
            // Handle pesan sukses atau error jika perlu
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    public function getJumlahAsisten() {
        try {
            $this->db->query('SELECT COUNT(*) AS jumlah FROM ' . $this->table);
            $result = $this->db->single();
            return $result['jumlah'];
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    
    
}
