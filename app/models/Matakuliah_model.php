<?php

class Matakuliah_model {
    private $table = "mst_matkul";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMatakuliah(){
        try {
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function addMatakuliah($kode_matkul, $nama_matkul, $prodi, $semester, $tingkat_semester){
        try {
            $this->db->query("INSERT INTO $this->table (kode_matkul, nama_matkul, prodi, semester, tingkat_semester) VALUES (:kode_matkul, :nama_matkul, :prodi, :semester, :tingkat_semester)");
            $this->db->bind(':kode_matkul', $kode_matkul);
            $this->db->bind(':nama_matkul', $nama_matkul);
            $this->db->bind(':prodi', $prodi);
            $this->db->bind(':semester', $semester);
            $this->db->bind(':tingkat_semester', $tingkat_semester);
            $this->db->execute();
            
            // Handle jika perlu memberikan respons
            // echo 'Data Berhasil Ditambahkan'; 
            // echo json_encode(['status' => 'success', 'message' => 'Data Berhasil Ditambahkan']);

        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function getMatakuliahById($id_matkul) {
        try {
            $this->db->query("SELECT * FROM $this->table WHERE id_matkul = :id_matkul");
            $this->db->bind(':id_matkul', $id_matkul);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    
    public function hapusMatkul($id) {
        $query = "DELETE FROM mst_matkul WHERE id_matkul = :id_matkul";
        $this->db->query($query);
        $this->db->bind("id_matkul", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
}