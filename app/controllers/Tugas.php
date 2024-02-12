<?php

class Tugas extends Controller {
    public function index(){
        $data['judul'] = 'Tugas';
        try {
        $data['tugas'] = $this->model('Tugas_model')->getAllTugas(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('tugas/index', $data);
        $this->view('templates/footer');
    }

    // public function detailTugas($id_tugas){
    //     $data['judul'] = 'Detail Tugas';
    //     try {
    //     $data['tugas'] = $this->model('Tugas_model')->getDetailTugas($id_tugas); 
    //     // $data['tugas'] = $this->model('Tugas_model')->getTugasById($id_tugas);
    //     } catch (\Throwable $th) {
    //         echo $th;
    //     }
    //     $this->view('templates/header', $data);
    //     $this->view('templates/sidebar', $data);
    //     $this->view('tugas/detail_tugas', $data);
    //     $this->view('templates/footer');
    // }

 
    public function detailTugas($id_tugas) {
        // Panggil model untuk mendapatkan detail tugas berdasarkan ID
        $data['detailTugas'] = $this->model('Tugas_model')->getDetailTugas($id_tugas);
    
        // Tampilkan tampilan detail tugas dengan data yang diteruskan

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('tugas/detail_tugas', $data);
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

    public function hapus($id) {
    
        if ($this->model('Tugas_model')->hapusTugas($id)) {
            header('Location: ' . BASEURL . '/Tugas');
            exit;
        } 
    }

    public function edit($id) {
        $data['judul'] = 'Edit Tugas';
        $data['tugas'] = $this->model('Tugas_model')->getTugasById($id);
        // Ambil data frekuensi untuk dropdown
        $data['frekuensi'] = $this->model('Frekuensi_model')->getAllFrekuensi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('tugas/edit', $data); // Buat file edit.php di folder tugas
        $this->view('templates/footer');
    }
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_tugas'];
            $nama_tugas = $_POST['nama_tugas'];
            $deskripsi_tugas = $_POST['deskripsi_tugas'];
            $status_tugas = $_POST['status_tugas'];
            $tgl_tugas = $_POST['tgl_tugas'];
            $id_frekuensi = $_POST['id_frekuensi'];
            $this->model('Tugas_model')->updateTugas($id, $nama_tugas, $deskripsi_tugas, $status_tugas, $tgl_tugas, $tgl_pengecekan, $id_frekuensi);
            header('Location: ' . BASEURL . '/Tugas');
            exit;
        }
    }
    
    

}