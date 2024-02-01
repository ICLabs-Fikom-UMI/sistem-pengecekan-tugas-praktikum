<?php

class Pengecekan_model {
    private $table = "trx_tugas";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllPengecekan() {
    try {
        $this->db->query('SELECT 
            trx_tugas.*, 
            trx_frekuensi.nama_frekuensi,
            mst_matkul.nama_matkul
        FROM 
            trx_tugas 
        LEFT JOIN 
            trx_frekuensi ON trx_tugas.id_frekuensi = trx_frekuensi.id_frekuensi
        LEFT JOIN
            mst_matkul ON trx_frekuensi.id_matkul = mst_matkul.id_matkul');

        return $this->db->resultSet();
    } catch (\Throwable $th) {
        echo 'Error: ' . $th->getMessage();
    }
}


    public function addPengecean($nama_tugas, $deskripsi_tugas, $status, $tgl_tugas, $tgl_pengecekan, $id_frekuensi) {
        try {
            $this->db->query("INSERT INTO $this->table (nama_tugas, deskripsi_tugas, status_tugas, tgl_tugas, tgl_pengecekan, id_frekuensi) VALUES (:nama_tugas, :deskripsi_tugas, :status_tugas, :tgl_tugas, :tgl_pengecekan, :id_frekuensi)");
            $this->db->bind(':nama_tugas', $nama_tugas);
            $this->db->bind(':deskripsi_tugas', $deskripsi_tugas);
            $this->db->bind(':status_tugas', $status);
            $this->db->bind(':tgl_tugas', $tgl_tugas);
            $this->db->bind(':tgl_pengecekan', $tgl_pengecekan);
            $this->db->bind(':id_frekuensi', $id_frekuensi);
            // $this->db->bind(':id_praktikan', $id_praktikan);
    
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
            $query = "SELECT nama_frekuensi FROM trx_frekuensi WHERE id_frekuensi = :id_frekuensi";
            $this->db->query($query);
            $this->db->bind(':id_frekuensi', $id_frekuensi);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    public function getMatkulById($id_matkul) {
        $query = "SELECT mf.nama_matkul
                  FROM mst_dosen md
                  JOIN trx_frekuensi tf ON md.id_dosen = tf.id_dosen
                  JOIN trx_tugas tt ON tf.id_frekuensi = tt.id_frekuensi
                  JOIN trx_matkul fm ON tt.id_matkul = fm.id_matkul
                  WHERE md.id_matkul = :id_matkul";
    
        $this->db->query($query);
        $this->db->bind(':id_matkul', $id_matkul);
    
        return $this->db->single(); // Mengembalikan satu baris hasil query
    }
    
    
}

