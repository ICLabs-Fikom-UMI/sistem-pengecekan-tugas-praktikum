<?php

class Riwayat_model {
    private $table = "trx_tugas";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllRiwayat() {
        try {
            $this->db->query('SELECT nama_tugas, status_tugas, tgl_pengecekan FROM trx_tugas;');

            return $this->db->resultSet();
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
}