<?php

class Asisten extends Controller {
    public function index(){
        $data['judul'] = 'Asisten';
        try {
        $data['asisten'] = $this->model('Asisten_model')->getAllAsisten(); 
        } catch (\Throwable $th) {
            echo $th;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('asisten/index', $data);
        $this->view('templates/footer');
    }


    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nim_asisten = $_POST['nim_asisten'];
                $nama_asisten = $_POST['nama_asisten'];
                $kelas = $_POST['kelas'];
                $prodi = $_POST['prodi'];
                $id_user = $_POST['id_user'];
                $asisten_model = $this->model('Asisten_model');
                $asisten_model->addAsisten($nim_asisten, $nama_asisten, $kelas, $prodi, $id_user);
                echo "Berhasil Mengimputkan Data";
                // var_dump($nim_asisten);
            } else {
                echo "Gagal Mengimputkan Data";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Asisten.php

public function hapus($id) {
    
    if ($this->model('Asisten_model')->hapusAsisten($id)) {
        // Flasher::setFlash('berhasil', 'dihapus', 'success');
        header('Location: ' . BASEURL . '/Asisten');
        exit;
    } else {
        // Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASEURL . '/asisten');
        exit;
    }
}


// public function edit(){
//     try {
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $id_asisten = $_POST['id_asisten'];
//             $nim_asisten = $_POST['nim_asisten'];
//             $nama_asisten = $_POST['nama_asisten'];
//             $kelas = $_POST['kelas'];
//             $prodi = $_POST['prodi'];
//             $asisten_model = $this->model('Asisten_model');
//             $asisten_model->editAsisten($id_asisten, $nim_asisten, $nama_asisten, $kelas, $prodi);
//             header('Location: ' . BASEURL . '/Asisten');
//             exit;
//         } else {
//             echo "Gagal Mengedit Data";
//         }
//     } catch (\Throwable $th) {
//         echo $th;
//     }
// }




public function edit($id) {
    $data['asisten'] = $this->model('Asisten_model')->getAsistenById($id);
    $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('asisten/edit', $data); 
        $this->view('templates/footer');
    // Menampilkan halaman edit dengan data asisten yang akan diubah
}

public function update() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_asisten = $_POST['id_asisten'];
        $nim_asisten = $_POST['nim_asisten'];
        $nama_asisten = $_POST['nama_asisten'];
        $kelas = $_POST['kelas'];
        $prodi = $_POST['prodi'];
        $this->model('Asisten_model')->updateAsisten($id_asisten, $nim_asisten, $nama_asisten, $kelas, $prodi);
        // Redirect atau tampilkan pesan sukses
        header('Location: ' . BASEURL . '/asisten');
    } else {
        // Tampilkan pesan error jika metode request bukan POST
    }
}




// public function ubahModal(){
//     $this->isAdmin();
//     $id = $_POST['id'];
//     $data['ubahdata'] = $this->model('Asisten_model')->ubah($id);
//     $data['viewAsisten'] = $this->model('Asisten_model')->viewAsisten();
  

//     $data['kelasDetail'] = $this->model('Asisten_model')->getKelasById($data['ubahdata']['nim']);
//     $data['angkatanDetail'] = $this->model('Asisten_model')->getAngkatanById($data['ubahdata']['ID_Angkatan']);
//     $data['jurusanDetail'] = $this->model('Asisten_model')->getJurusanById($data['ubahdata']['ID_Jurusan']);
//     $data['statusDetail'] = $this->model('Asisten_model')->getStatusById($data['ubahdata']['ID_Status']);
//     $data['userDetail'] = $this->model('Asisten_model')->getUserById($data['ubahdata']['ID_User']);

//     $this->view('asisten/ubah_asisten', $data);
// }

// public function prosesUbah(){
//     $this->isAdmin();
//     if($this->model('Asisten_model')->prosesUbah($_POST) > 0){
//         header('Location: '.BASEURL. '/Asisten');
//         exit;
//     }
// }



}