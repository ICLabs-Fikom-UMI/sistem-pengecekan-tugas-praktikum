<?php

class Praktikan extends Controller {
    public function index(){
        $data['judul'] = 'Praktikan';
        try {
        $data['praktikan'] = $this->model('Praktikan_model')->getAllPraktikan(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('praktikan/index', $data);
        $this->view('templates/footer');
    }

    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nim_praktikan = $_POST['nim_praktikan'];
                $jenis_kelamin = $_POST['nejis_kelamin'];
                $prodi = $_POST['prodi'];
                $email = $_POST['kelas'];
                $no_hp = $_POST['no_hp'];
                $id_user = $_POST['id_user'];
                $id_frekuensi = $_POST['id_frekuensi'];
    
                $dosen_model = $this->model('Praktikan_model');
                $dosen_model->addDosen($nim_praktikan,$jenis_kelamin, $prodi, $email, $no_hp, $id_user, $id_frekuensi );
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}