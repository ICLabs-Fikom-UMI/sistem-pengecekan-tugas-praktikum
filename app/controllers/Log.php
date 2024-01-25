<?php

// class Log extends Controller {
//     public function index()
//     {
//         $data['title'] = 'Login';
        
//         $this->view('login/index', $data);
//     }
//     public function login(){
//         $username = $_POST['username'];
//         $password = $_POST['password']; 
        
        // saya cari dlu usernamenya pake getUserbyUsername,
        // kapan kalau ada datanya ditemukan dari database, maka periksa password (hash dlu password dari post baru dibandingkan dengan yang di database)
        // kapan kalau hash password dari inputan (post) sama dengan password dari database (data yang ditemukan dari username) maka start session.
        // kapan kalau username saja tidak ditemukan, langsung header login, kapan kalau username ditemukan dan password salah, maka kembali juga ke halaman login.
        
        
    //     session_start();
    //     if ($data['login'] == NULL) {
    //         header("Location:" . BASEURL . "/404");
    //     } else {
    //         $_SESSION['nama'] = $data['login']['nama'];
           
    //         header("Location:" . BASEURL . "/home/index.php");
    //     }
    // }
    
    // public function logout(){
    //     session_start();
    //     unset($_SESSION['nama']);
    //     session_destroy();
        
    //     echo json_encode(['redirect' => BASEURL]);
    // }
// }

class Log extends Controller {
    public function index() {
        $data['title'] = 'Login';
        $this->view('login/index', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = $this->model('Login_model');
            $user = $model->getUserByUsername($username);

            if ($user) {
                // User ditemukan, periksa password
                if (!strcmp($password, $user['password'])) {
                    // Password sesuai, start session
                    session_start();
                    $_SESSION['nama'] = $user['nama'];
                    header("Location: " . BASEURL . "/Home/index");
                    // echo "pasword sesuai, start session";
                    exit();
                } else {
                    // Password tidak sesuai, kembali ke halaman login
                    header("Location:" . BASEURL . "/login");
                    // echo "Password tidak sesuai, kembali ke halaman login ".strcmp($password, $user['password']);

                    exit();
                }
            } else {
                // Username tidak ditemukan, kembali ke halaman login
                header("Location:" . BASEURL . "/login");
                // echo "Username tidak ditemukan, kembali ke halaman login";
                exit();
            }
        } else {
            // Jika bukan metode POST, kembali ke halaman login
            header("Location:" . BASEURL . "/login");
            // echo "Jika bukan metode POST, kembali ke halaman login";
            exit();
        }
    }

  
}

