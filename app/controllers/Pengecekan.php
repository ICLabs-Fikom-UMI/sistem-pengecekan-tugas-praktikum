<?php

class Pengecekan extends Controller {
    public function index(){
        $data['judul'] = 'Pengecekan';
        try {
        $data['pengecekan'] = $this->model('Pengecekan_model')->getAllPengecekan(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengecekan/index', $data);
        $this->view('templates/footer');
    }

    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama_tugas = $_POST['nama_tugas'];
                $deskripsi_tugas = $_POST['deskripsi_tugas'];
                $status = $_POST['status_tugas']; // Sesuaikan dengan nama input di formulir
                $tgl_tugas = $_POST['tgl_tugas'];
                $tgl_pengecekan = $_POST['tgl_pengecekan'];
                $id_frekuensi = $_POST['id_frekuensi'];
                // $id_praktikan = $_POST['id_praktikan'];
                $tugas_model = $this->model('Tugas_model');
                $tugas_model->addTugas($nama_tugas, $deskripsi_tugas, $status, $tgl_tugas, $tgl_pengecekan, $id_frekuensi);
                echo "Berhasil Mengimputkan Data";
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function cari(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_matkul = $_POST['id_matkul'];
                $id_frekuensi = $_POST['id_frekuensi'];
                $id_tugas = $_POST['id_tugas'];
            } else {
                header('Location: ' . BASEURL . '/pengecekan/cari/'.$id_matkul.'/'.$id_frekuensi.'/'.$id_tugas.'/');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
        
    }

    public function cari($id_matkul, $id_frekuensi, $id_tugas){

    }
    

}