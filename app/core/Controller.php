<?php
    // session_start();
class Controller {
    public function __construct(){
        $this->db = new Database();
        session_start();
    }

    public function view($view, $data = [])
    {
        if(!isset($_SESSION['id_user'])){
            require_once '../app/views/login/index.php';
        } else {
            require_once '../app/views/' . $view . '.php';
        }
    }

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    // public function checkLogin() {
    //     // Sesuaikan ini dengan cara Anda mengecek login
    //     if(!isset($_SESSION['nama'])){
    //         // Redirect atau proses login sesuai kebutuhan
    //         header('Location: ' . BASEURL . '/login');
    //         exit();
    //     }
    // }
}
