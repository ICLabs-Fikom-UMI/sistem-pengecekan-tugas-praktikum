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

    public function hapus($id) {
    
        if ($this->model('Dosen_model')->hapusDosen($id)) {
            header('Location: ' . BASEURL . '/Dosen');
            exit;
        }
    }

    public function edit($id) {
        $data['judul'] = 'Edit Dosen';
        $data['dosen'] = $this->model('Dosen_model')->getDosenById($id); 
        // Ambil data dosen berdasarkan id
        // Tampilkan view edit dengan data dosen yang akan diubah
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dosen/edit', $data);
        $this->view('templates/footer');
    }
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_dosen = $_POST['id_dosen'];
            $nip_dosen = $_POST['nip_dosen'];
            $nama_dosen = $_POST['nama_dosen'];
            $id_matkul = $_POST['id_matkul'];
            $kelas = $_POST['kelas'];
            $result = $this->model('Dosen_model')->updateDosen($id_dosen, $nip_dosen, $nama_dosen, $id_matkul, $kelas);
            if ($result) {
                header('Location: ' . BASEURL . '/dosen');
            } else {
                // Tampilkan pesan error jika gagal update
                echo "Gagal melakukan update.";
            }
        } else {
            // Tampilkan pesan error jika metode request bukan POST
            echo "Metode request tidak valid.";
        }
    }
    

}