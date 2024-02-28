<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'Home';
        $data['asisten'] = $this->model('Asisten_model')->getAllAsisten(); 
        $data['jml_matkul'] = $this->model('Matakuliah_model')->getJumlahMatakuliah();
        $data['jml_asisten'] = $this->model('Asisten_model')->getJumlahAsisten();
        $data['jml_dosen'] = $this->model('Dosen_model')->getJumlahDosen();
        $data['jml_praktikan'] = $this->model('Praktikan_model')->getJumlahPraktikan();
        $data['jml_frek'] = $this->model('Frekuensi_model')->getJumlahFrekuensi();
        $data['time'] = $this->model('Home_model')->getTime(); // Memuat waktu dari model
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('Home/index', $data); // Mengirim waktu ke tampilan Home
        $this->view('templates/footer');
    }
}

?>
