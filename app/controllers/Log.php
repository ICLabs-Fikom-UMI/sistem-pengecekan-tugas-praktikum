<?php



class Log extends Controller {
    public function index()
    {
        $data['title'] = 'Login';

        if(isset($_SESSION['id_user'])){
            header('Location: ' . BASEURL);
            exit;
        }
        
        $this->view('login/index', $data);
    }
    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];    
        
        $role = $this->model("Login_model")->getRole($username);

        echo var_dump($_POST);
        
        // echo "<br></br>";
        
        $id_user = $this->model('Login_model')->validateLogin($username, $password);

        if ($id_user) {
            echo "Anda Berhasil Login";

            $is_password_default = $this->model('Login_model')->isDefaultPassword($password);
            if (!$is_password_default) {
                // echo " Password Default";
                session_start();
                $_SESSION['id_user'] = $id_user;
                $_SESSION['role'] = $role['role'];
                header('Location: ' . BASEURL);
                exit();
            }
            else {
                session_start();
                $_SESSION['id_user'] = $id_user;
                $_SESSION['role'] = $role['role'];
                header('Location: ' . BASEURL . '/home');
                exit;
            }
        }
        else {
            header('Location: ' . BASEURL . '/login');
        }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
