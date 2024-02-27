    <?php

    class Pengecekan extends Controller {
        public function index(){
            $data['judul'] = 'Pengecekan';
            try {
            $data['pengecekan'] = $this->model('Pengecekan_model')->getAllPengecekan(); 
            } catch (\Throwable $th) {
                echo $th;
            }
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('pengecekan/index', $data);
            $this->view('templates/footer');
        }

       

        public function add() {
            try {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $tgl_pengecekan = date('Y-m-d H:i:s'); // Tanggal pengecekan dapat diambil dari server
        
                    // Memanggil model untuk menyimpan data
                    $this->model('Pengecekan_model')->addPengecekan($_POST, $tgl_pengecekan);
        
                    header('Location: ' . BASEURL . '/Pengecekan');
                } else {
                    echo "Form tidak disubmit atau tombol simpan tidak ditekan";
                }
            } catch (\Throwable $th) {
                echo 'Error: ' . $th->getMessage();
            }
        }
        

        public function cariPengecekan($id_matkul, $id_frekuensi , $id_tugas) {
            try {
                // Panggil model atau lakukan operasi pencarian sesuai kebutuhan
                $data['pengecekan'] = $this->model('Pengecekan_model')->cariPengecekan($id_matkul, $id_frekuensi, $id_tugas);
        
                // Muat tampilan hasil pencarian
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('pengecekan/index', $data);
                $this->view('templates/footer');
            } catch (\Throwable $th) {
                echo 'Error: ' . $th->getMessage();
            }
        }

        public function cari() {
            try {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id_matkul = $_POST['id_matkul'];
                    $id_frekuensi = $_POST['id_frekuensi'];
                    $id_tugas = $_POST['id_tugas'];
        
                    // Panggil fungsi cariPengecekan untuk memproses pencarian dan merender halaman hasil pencarian
                    $this->cariPengecekan($id_matkul, $id_frekuensi, $id_tugas);
                } else {
                    // Redirect jika akses langsung tanpa pengiriman formulir POST
                    header('Location: ' . BASEURL . '/pengecekan/cariPengecekan/');
                    exit();
                }
            } catch (\Throwable $th) {
                echo $th;
            }
        }
        

    }