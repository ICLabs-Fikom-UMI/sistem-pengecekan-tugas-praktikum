<?php

class Asisten extends Controller {
    public function index(){
        $data['judul'] = 'Asisten';
        try {
        $data['asisten'] = $this->model('Asisten_model')->getAllAsisten(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('asisten/index', $data);
        $this->view('templates/footer');
    }



    // public function add(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $kode_matkul = $_POST['kode_matkul'];
    //         $nama_matkul = $_POST['nama_matkul'];
    //         $prodi = $_POST['prodi'];
    //         $semester = $_POST['semester'];

    //         // Validasi data jika diperlukan

    //         // Panggil model untuk menyimpan data
    //         $matakuliah_model = $this->model('Matakuliah_model');
    //         $matakuliah_model->addMatakuliah($kode_matkul, $nama_matkul, $prodi, $semester);

    //         // Redirect atau berikan respons jika diperlukan
    //         // ...
    //     }
    // }

    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nim_asisten = $_POST['nim_asisten'];
                $nama_asisten = $_POST['nama_asisten'];
                $kelas = $_POST['kelas'];
                $prodi = $_POST['prodi'];
                $asisten_model = $this->model('Asisten_model');
                $asisten_model->addAsisten($nim_asisten, $nama_asisten, $kelas, $prodi);
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}