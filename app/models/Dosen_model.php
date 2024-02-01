<?php

class Dosen_model {
    private $table = "mst_dosen";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllDosen(){
        try {
            $this->db->query('SELECT mst_dosen.*, mst_matkul.nama_matkul FROM mst_dosen LEFT JOIN mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul');
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function addDosen($nip_dosen, $nama_dosen, $id_matkul, $kelas){
        try {
            $this->db->query("INSERT INTO $this->table (nip_dosen, nama_dosen, id_matkul, kelas) VALUES (:nip_dosen, :nama_dosen, :id_matkul, :kelas)");
            $this->db->bind(':nip_dosen', $nip_dosen);
            $this->db->bind(':nama_dosen', $nama_dosen);
            $this->db->bind(':id_matkul', $id_matkul);
            $this->db->bind(':kelas', $kelas);
    
            $this->db->execute();
            $idMatkul = $this->db->lastInsertId(); 
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
   

    public function getDosenById($id_dosen) {
        try {
            $this->db->query("SELECT * FROM $this->table WHERE id_dosen = :id_dosen");
            $this->db->bind(':id_dosen', $id_dosen);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }
    
        public function getMatkulById($id_matkul) {
            try {
                $this->db->query("SELECT * FROM mst_matkul WHERE id_matkul = :id_matkul");
                $this->db->bind(':id_matkul', $id_matkul);
                return $this->db->single();
            } catch (\Throwable $th) {
                // Handle error jika perlu
                echo 'Error: ' . $th->getMessage();
            }
        }
        
        public function hapusDosen($id) {
            $query = "DELETE FROM mst_dosen WHERE id_dosen = :id_dosen";
            $this->db->query($query);
            $this->db->bind("id_dosen", $id);
            $this->db->execute();
            return $this->db->rowCount();
        }
    
}

