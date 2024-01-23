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
}