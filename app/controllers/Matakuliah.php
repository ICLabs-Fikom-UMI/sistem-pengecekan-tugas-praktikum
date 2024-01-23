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
}