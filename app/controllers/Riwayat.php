<?php

class Riwayat extends Controller {
    public function index(){
        $data['judul'] = 'Riwayat Pengecekan';
        try {
        $data['pengecekan'] = $this->model('Riwayat_model')->getAllRiwayat(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('riwayat/index', $data);
        $this->view('templates/footer');
    }

}