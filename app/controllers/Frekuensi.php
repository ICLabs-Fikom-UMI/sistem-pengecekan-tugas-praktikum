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
                $id_asisten1 = $_POST['id_asisten1'];
                $id_asisten2 = $_POST['id_asisten2'];
    
                $frekuensi_model = $this->model('Frekuensi_model');
                $frekuensi_model->addFrekuensi($Nama_frekuensi, $id_dosen, $id_asisten1, $id_asisten2);
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function hapus($id) {
    
        if ($this->model('Frekuensi_model')->hapusFrekuensi($id)) {
            header('Location: ' . BASEURL . '/Frekuensi');
            exit;
        } 
    }

    public function edit($id_frekuensi) {
        $data['judul'] = 'Edit Frekuensi';
        $data['frekuensi'] = $this->model('Frekuensi_model')->getFrekuensiById($id_frekuensi);
        // Menampilkan form edit
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('frekuensi/edit', $data);
        $this->view('templates/footer');
    }
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_frekuensi = $_POST['id_frekuensi'];
            $nama_frekuensi = $_POST['nama_frekuensi'];
            $id_dosen = $_POST['id_dosen'];
            $id_asisten1 = $_POST['id_asisten1'];
            $id_asisten2 = $_POST['id_asisten2'];
    
            $frekuensi_model = $this->model('Frekuensi_model');
            $frekuensi_model->updateFrekuensi($id_frekuensi, $nama_frekuensi, $id_dosen, $id_asisten1, $id_asisten2);
            // Redirect ke halaman index setelah berhasil melakukan update
            header('Location: ' . BASEURL . '/Frekuensi');
            exit;
        } else {
            // Handle jika bukan request POST
            echo "Invalid request method";
        }
    }
    

    

}