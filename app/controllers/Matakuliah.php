<?php

class Matakuliah extends Controller {
    public function index(){
        $data['judul'] = 'Mata Kuliah';
        try {
        $data['matakuliah'] = $this->model('Matakuliah_model')->getAllMatakuliah(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }



    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $kode_matkul = $_POST['kode_matkul'];
                $nama_matkul = $_POST['nama_matkul'];
                $prodi = $_POST['prodi'];
                $semester = $_POST['semester'];
                $tingkat_semester = $_POST['tingkat_semester'];
    
                $matakuliah_model = $this->model('Matakuliah_model');
                $matakuliah_model->addMatakuliah($kode_matkul, $nama_matkul, $prodi, $semester, $tingkat_semester);
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function hapus($id) {
    
        if ($this->model('Matakuliah_model')->hapusMatkul($id)) {
            header('Location: ' . BASEURL . '/Matakuliah');
            exit;
        } 
    }

}