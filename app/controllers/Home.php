<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'Home';
        $data['time'] = $this->model('Home_model')->getTime(); // Memuat waktu dari model
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('Home/index', $data); // Mengirim waktu ke tampilan Home
        $this->view('templates/footer');
    }
}

?>
