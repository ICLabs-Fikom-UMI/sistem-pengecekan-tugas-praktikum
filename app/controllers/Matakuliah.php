<?php

class Matakuliah extends Controller {
    public function index(){
        $data['judul'] = 'Mata Kuliah';
        $data['matkul'] = $this->model('Matakuliah_model')->getAllMatakuliah(); // Perbaikan di sini
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }
}