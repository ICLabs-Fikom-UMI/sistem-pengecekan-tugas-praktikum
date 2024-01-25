<?php

class Dosen extends Controller {
    public function index(){
        $data['judul'] = 'Dosen Pengampuh';
        try {
        $data['dosen'] = $this->model('Dosen_model')->getAllDosen(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dosen/index', $data);
        $this->view('templates/footer');
    }

    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nip_dosen = $_POST['nip_dosen'];
                $nama_dosen = $_POST['nama_dosen'];
                $id_matkul = $_POST['id_matkul'];
                $kelas = $_POST['kelas'];
    
                $dosen_model = $this->model('Dosen_model');
                $dosen_model->addDosen($nip_dosen, $nama_dosen, $id_matkul, $kelas);
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}