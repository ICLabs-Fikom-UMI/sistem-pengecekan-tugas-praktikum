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
                // var_dump($nim_asisten);
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Asisten.php

public function hapus($id) {
    
    if ($this->model('Asisten_model')->hapusAsisten($id)) {
        // Flasher::setFlash('berhasil', 'dihapus', 'success');
        header('Location: ' . BASEURL . '/Asisten');
        exit;
    } else {
        // Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASEURL . '/asisten');
        exit;
    }
}


}