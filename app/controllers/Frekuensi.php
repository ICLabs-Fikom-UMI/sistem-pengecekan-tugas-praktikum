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
                $Nama_asisten = $_POST['nama_frekuensi'];
                $kelas = $_POST['kelas'];
                $id_dosen = $_POST['id_dosen'];
                $id_asisten = $_POST['id_matkul'];
    
                $dosen_model = $this->model('Frekuensi_model');
                $dosen_model->addFrekuensi($Nama_asisten, $kelas, $id_dosen, $id_asisten);
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}