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
           
                $nim_praktikan = $_POST['nim_praktikan'];
                $nama_praktikan = $_POST['nama_praktikan'];
                $id_user = $_POST['id_user'];
                $id_frekuensi = $_POST['id_frekuensi'];
    
                $dosen_model = $this->model('Praktikan_model');
                $dosen_model->addPraktikan($nim_praktikan, $nama_praktikan, $id_user, $id_frekuensi);
                header('Location: ' . BASEURL . '/Praktikan');
               
    }

    public function hapus($id) {
    
        if ($this->model('Praktikan_model')->hapusPraktikan($id)) {
            header('Location: ' . BASEURL . '/Praktikan');
            exit;
        } 
    }


    public function edit($id) {
        $data['judul'] = 'Edit Praktikan';
        $data['praktikan'] = $this->model('Praktikan_model')->getPraktikanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('praktikan/edit', $data); // Buat file edit.php di folder praktikan
        $this->view('templates/footer');
    }
    
    public function update() {
        $id = $_POST['id_praktikan'];
        $nim_praktikan = $_POST['nim_praktikan'];
        $nama_praktikan = $_POST['nama_praktikan'];
        $id_frekuensi = $_POST['id_frekuensi'];
        $this->model('Praktikan_model')->updatePraktikan($id, $nim_praktikan, $nama_praktikan, $id_frekuensi);
        header('Location: ' . BASEURL . '/Praktikan');
    }
    
    
    

}