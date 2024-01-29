<?php

class Dosen_model {
    private $table = "trx_tugas";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllTugas(){
        try {
            $this->db->query('SELECT trx_tugas.*, mst_matkul.nama_matkul FROM mst_dosen LEFT JOIN mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul');
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function addTugas($nama_tugas, $deskripsi_tugas, $status, $tgl_tugas, $tgl_pengecekan, $id_asisten, $id_praktikan, $id_dosen){
        try {
            $this->db->query("INSERT INTO $this->table (nama_tugas, deskripsi_tugas, status_tugas, tgl_tugas, tgl_pengecekan, id_asisten, id_praktikan, id_dosen) VALUES (:nama_tugas, :deskripsi_tugas, :status_tugas, :tgl_tugas, :tgl_pengecekan, :id_asisten, :id_praktikan, :id_dosen)");
            $this->db->bind(':nama_tugas', $nama_tugas);
            $this->db->bind(':deskripsi_tugas', $deskripsi_tugas);
            $this->db->bind(':status_tugas', $status);
            $this->db->bind(':tgl_tugas', $tgl_tugas);
            $this->db->bind(':tgl_pengecekan', $tgl_pengecekan);
            $this->db->bind(':id_asisten', $id_asisten);
            $this->db->bind(':id_praktikan', $id_praktikan);
            $this->db->bind(':id_dosen', $id_dosen);
    
            $this->db->execute();
          
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
   

    public function getDosenById($id_dosen) {
        try {
            $this->db->query("SELECT * FROM mst_dosen WHERE id_dosen = :id_dosen");
            $this->db->bind(':id_dosen', $id_dosen);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function getAsistenById($id_asisten) {
        try {
            $this->db->query("SELECT * FROM mst_praktikan WHERE id_asisten = :id_asisten");
            $this->db->bind(':id_asisten', $id_asisten);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    public function getFrekuensiById($id_frekuensi) {
        try {
            $this->db->query("SELECT * FROM trx_frekuesni WHERE id_frekuensi = :id_frekuensi");
            $this->db->bind(':id_frekuensi', $id_frekuensi);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    } 
        
    
    
}

