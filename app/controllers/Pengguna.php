<?php

class Pengguna extends Controller {
    public function index(){
        $data['judul'] = 'Pengguna';
        try {
        $data['pengguna'] = $this->model('Pengguna_model')->getAllUser(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengguna/index', $data);
        $this->view('templates/footer');
    }

    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password']; // Note: Make sure to hash the password before storing it in the database for security reasons.
                $role = $_POST['role'];
    
                $asisten_model = $this->model('Asisten_model');
                $asisten_model->addUser($username, $password, $role);
                echo "Berhasil Mengimputkan Data";
                
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
    
    public function hapus($id) {
    
        if ($this->model('Pengguna_model')->hapusPengguna($id)) {
            header('Location: ' . BASEURL . '/Pengguna');
            exit;
        } 
    }

    // public function resetPassword($id) {
    //     try {
    //         // Ambil password awal dari database atau dari suatu sumber lain
    //         $initialPassword = $this->model('Pengguna_model')->getInitialPassword($id);
    
    //         // Update password pengguna dengan password awal
    //         $this->model('Pengguna_model')->resetUserPassword($id, $initialPassword);
    
    //         echo "Password berhasil direset ke password awal.";
    //     } catch (\Throwable $th) {
    //         echo 'Error: ' . $th->getMessage();
    //     }
    // }
    // Panggil metode resetPassword() dalam controller Anda
// Panggil metode resetPassword() dalam controller Anda
// Panggil metode resetPassword() dalam controller Anda
public function resetPassword($id) {
    try {
        // Ambil role pengguna
        $roleData = $this->model('Pengguna_model')->getDataUserById($id);
        $role = $roleData['role'];

        // Reset password berdasarkan role pengguna
        $initialPassword = $this->model('Pengguna_model')->getInitialPassword($id, $role);

        // Update password pengguna dengan password awal
        $this->model('Pengguna_model')->resetUserPassword($id, $initialPassword);

        echo "Password berhasil direset ke password awal.";
    } catch (\Throwable $th) {
        echo 'Error: ' . $th->getMessage();
    }
}



    

}