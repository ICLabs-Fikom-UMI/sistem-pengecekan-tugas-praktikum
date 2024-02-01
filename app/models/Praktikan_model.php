<?php

class Praktikan_model {
    private $table = "mst_praktikan";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllPraktikan(){
        try {
            $this->db->query('SELECT mst_praktikan.*, mst_user.*, trx_frekuensi.* FROM  mst_praktikan 
            LEFT JOIN mst_user ON mst_praktikan.id_user = mst_user.id_user
            LEFT JOIN trx_frekuensi ON mst_praktikan.id_frekuensi = trx_frekuensi.id_frekuensi');
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

//     public function getAllPraktikan()
// {
//     try {
//         $this->db->query('SELECT mst_praktikan.*, mst_user.*, trx_frekuensi.nama_frekuensi 
//                           FROM  mst_praktikan 
//                           LEFT JOIN mst_user ON mst_praktikan.id_user = mst_user.id_user
//                           LEFT JOIN trx_frekuensi ON mst_praktikan.id_praktikan = trx_frekuensi.id_praktikan');
//         return $this->db->resultSet();
//     } catch (\Throwable $th) {
//         echo 'Error: ' . $th->getMessage();
//     }
// }



    public function addPraktikan($nim_praktikan, $nama_praktikan,$id_user, $id_frekuensi){
        try {
            // $this->db->query("INSERT INTO $this->table (nim_praktikan, nama_praktikan, id_user, id_frekuensi) VALUES (:nim_praktikan, :nama_praktikan, :id_user, : id_frekuensi)");
            $this->db->query("CALL tambah_praktikan(:nim_praktikan, :nama_praktikan, :id_frekuensi)");
            $this->db->bind(':nim_praktikan', $nim_praktikan);
            $this->db->bind(':nama_praktikan', $nama_praktikan);
            $this->db->bind(':id_frekuensi', $id_frekuensi);
    
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
        
    
        public function getFrekuensiById($id_frekuensi) {
            try {
                $this->db->query("SELECT * FROM trx_frekuensi WHERE id_frekuensi = :id_frekuensi");
                $this->db->bind(':id_frekuensi', $id_frekuensi);
                return $this->db->single();
            } catch (\Throwable $th) {
                // Handle error jika perlu
                echo 'Error: ' . $th->getMessage();
            }
        } 

        public function getKelasById($kelas) {
            $query = "SELECT kelas FROM mst_dosen WHERE id_dosen = :id_dosen";
            $this->db->query($query);
            $this->db->bind('id_dosen', $kelas);
    
            return $this->db->single(); // Mengembalikan satu baris hasil query
        }

        public function getPraktikanByFrekuensi($id_frekuensi) {
            $query = "SELECT mst_praktikan.nim_praktikan, mst_praktikan.nama_praktikan
                      FROM trx_tugas
                      JOIN mst_praktikan ON trx_tugas.id_frekuensi = mst_praktikan.id_frekuensi
                      WHERE trx_tugas.id_frekuensi = :id_frekuensi";
            
            $this->db->query($query);
            $this->db->bind('id_frekuensi', $id_frekuensi);
        
            return $this->db->resultset(); // Mengembalikan hasil query sebagai array
        }
        public function hapusPraktikan($id) {
            $query = "DELETE FROM mst_praktikan WHERE id_praktikan = :id_praktikan";
            $this->db->query($query);
            $this->db->bind("id_praktikan", $id);
            $this->db->execute();
            return $this->db->rowCount();
        }

        
}

