<?php

class Pengecekan_model {
    private $table = "trx_pengecekan";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllPengecekan() {
        try {   
            $this->db->query('SELECT 
                trx_tugas.*, 
                trx_frekuensi.nama_frekuensi,
                mst_matkul.nama_matkul,
                mst_praktikan.nim_praktikan,
                mst_praktikan.nama_praktikan
            FROM 
                trx_tugas 
            LEFT JOIN 
                trx_frekuensi ON trx_tugas.id_frekuensi = trx_frekuensi.id_frekuensi
            LEFT JOIN
                mst_dosen ON trx_frekuensi.id_dosen = mst_dosen.id_dosen
            LEFT JOIN
                mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul
            LEFT JOIN
                mst_praktikan ON trx_frekuensi.id_frekuensi = mst_praktikan.id_frekuensi');
    
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    // public function addPengecekan($data, $tgl) {
    //     try {
    //         // Query SQL untuk memasukkan data ke dalam tabel
    //         $this->db->query("INSERT INTO trx_pengecekan (id_praktikan, id_tugas, status_pengecekan, tgl_pengecekan)
    //         VALUES (:id_praktikan, :id_tugas, :status_pengecekan, :tgl_pengecekan)");
            
    //         // Bind nilai ke parameter dalam query
    //         $this->db->bind(':id_praktikan', $_POST['id_praktikan']);
    //         $this->db->bind(':id_tugas', $_POST['id_tugas']);
    //         $this->db->bind(':status_pengecekan', $_POST['status']);
    //         $this->db->bind(':tgl_pengecekan', $tgl);
            
    //         // Eksekusi query
    //         $this->db->execute();
    //     } catch (\Throwable $th) {
    //         echo 'Error: ' . $th->getMessage();
    //     }
    // }

    public function addPengecekan($data, $tgl, $i) {
        try {
            // Prepare the SQL query for insertion
            // var_dump($data);
            $this->db->query("INSERT INTO trx_pengecekan (id_praktikan, id_tugas, status_pengecekan, tgl_pengecekan)
            VALUES (:id_praktikan, :id_tugas, :status_pengecekan, :tgl_pengecekan)");
    
            // Loop through each data row and execute the query
            // foreach ($data as $row) {
                // Bind parameters for the current row
                $this->db->bind(':id_praktikan', $data['id_praktikan' . $i]);
                $this->db->bind(':id_tugas', $data['id_tugas'. $i]);
                $this->db->bind(':status_pengecekan', $data['status'. $i]);
                $this->db->bind(':tgl_pengecekan', $tgl);
    
                // Execute the query for the current row
                $this->db->execute();
            // }
    
            // echo "Data berhasil dimasukkan ke dalam database.";
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


    public function cariPengecekan($id_matkul, $id_frekuensi, $id_tugas) {
        try {
            // Modify the query to filter the results based on the provided parameters
            $this->db->query('SELECT 
                trx_tugas.*, 
                trx_frekuensi.nama_frekuensi,
                mst_matkul.nama_matkul,
                mst_praktikan.id_praktikan,
                mst_praktikan.nim_praktikan,
                mst_praktikan.nama_praktikan
            FROM 
                trx_tugas 
            LEFT JOIN 
                trx_frekuensi ON trx_tugas.id_frekuensi = trx_frekuensi.id_frekuensi
            LEFT JOIN
                mst_dosen ON trx_frekuensi.id_dosen = mst_dosen.id_dosen
            LEFT JOIN
                mst_matkul ON mst_dosen.id_matkul = mst_matkul.id_matkul
            LEFT JOIN
                mst_praktikan ON trx_frekuensi.id_frekuensi = mst_praktikan.id_frekuensi
            WHERE
                mst_matkul.id_matkul = :id_matkul
                AND trx_frekuensi.id_frekuensi = :id_frekuensi
                AND trx_tugas.id_tugas = :id_tugas');
        
            $this->db->bind(':id_matkul', $id_matkul);
            $this->db->bind(':id_frekuensi', $id_frekuensi);
            $this->db->bind(':id_tugas', $id_tugas);
    
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public function getPraktikanByFrekuensi($id_frekuensi) {
        try {
            $this->db->query("SELECT * FROM mst_praktikan WHERE id_frekuensi = :id_frekuensi");
            $this->db->bind(':id_frekuensi', $id_frekuensi);
            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    

    public function getIdPraktikan($nama_praktikan) {
        try {
            $query = $this->db->query("SELECT id_praktikan FROM mst_praktikan WHERE nama_praktikan = :nama_praktikan");
            $this->db->bind(':nama_praktikan', $nama_praktikan);
            $result = $this->db->single();
            if ($result) {
                return $result['id_praktikan'];
            } else {
                return null; // Jika tidak ada hasil ditemukan, kembalikan null
            }
        } catch (\Throwable $th) {
            // Catat pesan kesalahan ke log atau konsol
            error_log('Error: ' . $th->getMessage());
            return null; // Mengembalikan null jika terjadi error
        }
    }


    
    
}

