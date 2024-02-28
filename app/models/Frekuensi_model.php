<?php

class Frekuensi_model {
    private $table = "trx_frekuensi";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllFrekuensi(){
        try {
            $this->db->query('SELECT trx_frekuensi.*, mst_dosen.*, 
            asisten1.nama_asisten AS nama_asisten1, 
            asisten2.nama_asisten AS nama_asisten2,
            mst_matkul.nama_matkul
            FROM trx_frekuensi
            LEFT JOIN mst_dosen ON trx_frekuensi.id_dosen = mst_dosen.id_dosen
            LEFT JOIN mst_asisten AS asisten1 ON trx_frekuensi.id_asisten1 = asisten1.id_asisten
            LEFT JOIN mst_asisten AS asisten2 ON trx_frekuensi.id_asisten2 = asisten2.id_asisten
            LEFT JOIN mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul');
            


            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function addFrekuensi($nama_frekuensi, $id_dosen, $id_asisten1, $id_asisten2){
        try {
            $this->db->query("INSERT INTO $this->table (nama_frekuensi, id_dosen, id_asisten1, id_asisten2) VALUES (:nama_frekuensi, :id_dosen, :id_asisten1, :id_asisten2)");
            $this->db->bind(':nama_frekuensi', $nama_frekuensi);
            $this->db->bind(':id_dosen', $id_dosen);
            $this->db->bind(':id_asisten1', $id_asisten1);
            $this->db->bind(':id_asisten2', $id_asisten2);

    
            $this->db->execute();
            
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
   

    public function getFrekuensiById($id_frekuensi) {
        try {
            $this->db->query("SELECT * FROM $this->table WHERE id_frekuensi = :id_frekuensi");
            $this->db->bind(':id_frekuensi', $id_frekuensi);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    } 

    public function getDosenById($id_dosen) {
        try {
            $this->db->query("SELECT mst_dosen.*, mst_matkul.nama_matkul 
                              FROM mst_dosen 
                              LEFT JOIN mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul
                              WHERE mst_dosen.id_dosen = :id_dosen");
            $this->db->bind(':id_dosen', $id_dosen);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error if needed
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    
    public function getAsisten1ById($id_asisten1) {
        try {
            $this->db->query("SELECT * FROM mst_asisten WHERE id_asisten = :id_asisten1");
            $this->db->bind(':id_asisten1', $id_asisten1);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    public function getAsisten2ById($id_asisten2) {
        try {
            $this->db->query("SELECT * FROM mst_asisten WHERE id_asisten = :id_asisten2");
            $this->db->bind(':id_asisten2', $id_asisten2);
            return $this->db->single();
        } catch (\Throwable $th) {
            // Handle error jika perlu
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    public function getMatkulById($id_matkul) {
        $query = "SELECT nama_matkul FROM mst_dosen WHERE id_matkul = :id_matkul";
        $this->db->query($query);
        $this->db->bind('id_matkul', $id_matkul);

        return $this->db->single(); // Mengembalikan satu baris hasil query
    }

    public function hapusFrekuensi($id) {
        $query = "DELETE FROM trx_frekuensi WHERE id_frekuensi = :id_frekuensi";
        $this->db->query($query);
        $this->db->bind("id_frekuensi", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

  
    // public function getLoggedInAssistantId() {
    //     if (isset($_SESSION['id_user']) && isset($_SESSION['role']) && $_SESSION['role'] == 'Asisten') {
    //         // Assuming 'user_id' is the key where the user ID is stored in the session
    //         return $_SESSION['id_user'];
    //     } else {
    //         // Return a default value or handle the case when the user is not logged in as an assistant
    //         return null;
    //     }
    // }
    public function getFrekuensibyUser($loggedInUserId) {
        $query = "SELECT trx_frekuensi.*, mst_dosen.*, 
        asisten1.nama_asisten AS nama_asisten1, 
        asisten2.nama_asisten AS nama_asisten2,
        mst_matkul.nama_matkul
        FROM trx_frekuensi
        LEFT JOIN mst_dosen ON trx_frekuensi.id_dosen = mst_dosen.id_dosen
        LEFT JOIN mst_asisten AS asisten1 ON trx_frekuensi.id_asisten1 = asisten1.id_asisten
        LEFT JOIN mst_asisten AS asisten2 ON trx_frekuensi.id_asisten2 = asisten2.id_asisten
        LEFT JOIN mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul 
                  WHERE asisten1.id_user = :id_user OR asisten2.id_user = :id_user";
        $this->db->query($query);
        $this->db->bind(":id_user", $loggedInUserId);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getFrekuensibyUserPrak($loggedInUserId) {
        $query = "SELECT trx_frekuensi.*, mst_dosen.*, mst_praktikan.*, 
        asisten1.nama_asisten AS nama_asisten1, 
        asisten2.nama_asisten AS nama_asisten2,
        mst_matkul.nama_matkul
        FROM trx_frekuensi
        LEFT JOIN mst_dosen ON trx_frekuensi.id_dosen = mst_dosen.id_dosen
        LEFT JOIN mst_asisten AS asisten1 ON trx_frekuensi.id_asisten1 = asisten1.id_asisten
        LEFT JOIN mst_asisten AS asisten2 ON trx_frekuensi.id_asisten2 = asisten2.id_asisten
        LEFT JOIN mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul
        LEFT JOIN mst_praktikan ON mst_praktikan.id_frekuensi = trx_frekuensi.id_frekuensi
        WHERE mst_praktikan.id_user =  :id_user";
    
        $this->db->query($query);
        $this->db->bind(":id_user", $loggedInUserId);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function updateFrekuensi($id_frekuensi, $nama_frekuensi, $id_dosen, $id_asisten1, $id_asisten2){
        try {
            $this->db->query("UPDATE $this->table SET nama_frekuensi = :nama_frekuensi, id_dosen = :id_dosen, id_asisten1 = :id_asisten1, id_asisten2 = :id_asisten2 WHERE id_frekuensi = :id_frekuensi");
            $this->db->bind(':id_frekuensi', $id_frekuensi);
            $this->db->bind(':nama_frekuensi', $nama_frekuensi);
            $this->db->bind(':id_dosen', $id_dosen);
            $this->db->bind(':id_asisten1', $id_asisten1);
            $this->db->bind(':id_asisten2', $id_asisten2);
    
            $this->db->execute();
            
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function getJumlahFrekuensi() {
        try {
            $this->db->query('SELECT COUNT(*) AS jumlah FROM ' . $this->table);
            $result = $this->db->single();
            return $result['jumlah'];
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    
    
    

    
    
}

