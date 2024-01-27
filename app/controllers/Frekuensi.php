<?php

class Frekuensi extends Controller {
    public function index(){
        $data['judul'] = 'Frekuensi';
        try {
        $data['frekuensi'] = $this->model('Frekuensi_model')->getAllFrekuensi(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('frekuensi/index', $data);
        $this->view('templates/footer');
    }

    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $Nama_frekuensi = $_POST['nama_frekuensi'];
                $id_dosen = $_POST['id_dosen'];
                $id_asisten = $_POST['id_asisten'];
    
                $frekuensi_model = $this->model('Frekuensi_model');
                $frekuensi_model->addFrekuensi($Nama_frekuensi, $id_dosen, $id_asisten);
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}