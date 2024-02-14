<?php

class Praktikan extends Controller {
    public function index(){
        $data['judul'] = 'Profile';
        try {
        $data['praktikan'] = $this->model('Praktikan_model')->getAllProfile(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }

}