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
                    $id_tugas = $_POST['id_tugas'];
                    $status = $_POST['status_pengecekan'];
                    $tgl_pengecekan = $_POST['tgl_pengecekan'];
                    $id_frekuensi = $_POST['id_frekuensi'];
        
                    // Mengambil id_praktikan dari id_frekuensi yang diterima dari form
                    $pengecekan_model = $this->model('Pengecekan_model');
                    $id_praktikan = $pengecekan_model->getIdPraktikan($id_frekuensi);
        
                    if ($id_praktikan) {
                        // Jika berhasil mendapatkan id_praktikan, lanjutkan dengan memanggil fungsi addPengecean
                        $pengecekan_model->addPengecean($id_praktikan, $id_tugas, $status, $tgl_pengecekan, $id_frekuensi);
                        echo "berhasil";
                        exit();
                    } else {
                        // Jika gagal mendapatkan id_praktikan, tampilkan pesan kesalahan
                        echo "Gagal mendapatkan id praktikan dari id frekuensi yang diberikan";
                    }
                } else {
                    echo "Gagal Mengimputkan Data";
                }
            } catch (\Throwable $th) {
                echo 'Error: ' . $th->getMessage();
            }
        }
        
        
        
        

        public function cariPengecekan($id_matkul = null, $id_frekuensi = null, $id_tugas = null) {
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