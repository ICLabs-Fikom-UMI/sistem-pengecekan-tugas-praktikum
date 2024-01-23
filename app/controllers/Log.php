<?php

class Log extends Controller {
    public function index()
    {
        $data['title'] = 'Login';
        
        $this->view('login/index', $data);
    }
    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password']; 
        // $role = $_POST['role'];   
        
        // $data['login'] = $this->model("Login_model")->getUser($username, $password);
        
        session_start();
        if ($data['login'] == NULL) {
            header("Location:" . BASEURL . "/404");
        } else {
            $_SESSION['nama'] = $data['login']['nama'];
            // $_SESSION['role'] = $role;  
            header("Location:" . BASEURL . "/home/index.php");
        }
    }
    
    // public function logout(){
    //     session_start();
    //     unset($_SESSION['nama']);
    //     session_destroy();
        
    //     echo json_encode(['redirect' => BASEURL]);
    // }
}