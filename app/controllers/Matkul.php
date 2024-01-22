<?php

class Matkul extends Controller{
    public function index(){
        $data['judul'] = 'Mata Kuliah';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('Matkul/index', $data);
        $this->view('templates/footer');
    }
}