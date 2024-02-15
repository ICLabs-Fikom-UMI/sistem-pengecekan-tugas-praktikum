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

    
public function resetPassword($id) {
    try {
        // Ambil role pengguna
        $roleData = $this->model('Pengguna_model')->getRoleById($id);
        $role = $roleData['role'];

        // Reset password berdasarkan role pengguna
        $initialPassword = $this->model('Pengguna_model')->getInitialPassword($id, $role);

        // Update password pengguna dengan password awal
        $this->model('Pengguna_model')->resetUserPassword($id, $initialPassword);

        header('Location: ' . BASEURL . '/Pengguna');

    } catch (\Throwable $th) {
        echo 'Error: ' . $th->getMessage();
    }
}


public function ubahPassword(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id_user'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
  

        // Validasi input
        if (empty($newPassword) || empty($confirmPassword)) {
            echo "Password tidak boleh kosong.";
            return;
        }

        if ($newPassword !== $confirmPassword) {
            echo "Konfirmasi password tidak sesuai.";
            return;
        }

        // Panggil model untuk melakukan update password
        $success = $this->model('Pengguna_model')->updatePassword($id, $newPassword);

        if ($success) {
            // Redirect ke halaman login setelah mengubah password
            header('Location: ' . BASEURL . '/Log/logout');
            exit;
        } else {
            echo "Gagal mengubah password.";
        }
    } else {
        // Jika bukan metode POST, tampilkan halaman form ubah password
        $data['id_user'] = $_SESSION['id_user']; // Sesuaikan dengan cara Anda mendapatkan ID pengguna yang sedang login
        $this->view('templates/header');
        $this->view('pengguna/ubah_password', $data);
        $this->view('templates/footer');
    }
}
}



