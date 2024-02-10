<?php

class Riwayat_model {
    private $table = "trx_pengecekan";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllRiwayat() {
        try {
            $this->db->query('SELECT* FROM trx_pengecekan');

            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
}