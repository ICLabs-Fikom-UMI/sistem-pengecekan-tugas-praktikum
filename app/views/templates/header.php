<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>

        .form-group {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
.form-group select {
    width: 200%; /* Sesuaikan lebar label sesuai kebutuhan */
    text-align: left;
    margin-right: 10px;
}

.form-group label {
    width: 40%; /* Sesuaikan lebar label sesuai kebutuhan */
    text-align: left;
    margin-right: 10px;
}

.form-group input {
    width: 200%; /* Sesuaikan lebar input sesuai kebutuhan */
    background-color: #E7F4EF;
    border: none;
    color :#526D82;
}



.sidebar-links button {
    font-family: poppins;
    color: black;
    background-color: #ffffff;
    width: 200px;
    list-style: none;
    padding: 20px;
    float: right; /* Mengatur agar tombol-tombol berbaris secara horizontal */
    text-align: left; /* Mengatur agar teks di dalam tombol memiliki rata kiri */
    margin-right: 5px; /* Jika diperlukan, tambahkan jarak antara tombol dengan elemen lain */
    font-size:17px;
    
}

#clock {
    font-family: 'Arial', sans-serif;
    font-size: 2em;
    color: #333;
}





    </style>
    

</head>
<body>
<div class="navbar" style="position: fixed; width:99%;" >
        <div class="space">
            <div class="images">
                <img src="<?= BASEURL; ?>/img/sipetalogo.png" alt="SIPETA">
            </div>
            <div class="toggle-btn" onclick="toggleSidebar()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
      
            <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search..." onkeyup="search()">
            </div>
            <div class="nama_user">
            <?php
            // Mendapatkan ID pengguna dari variabel $pengguna
            $id_user = $pengguna['id_user'];
            // Mendapatkan data pengguna berdasarkan ID pengguna
            $dataUser = $this->model('Pengguna_model')->getDataUserById($id) ;
            
            // Menggabungkan nama praktikan, asisten, atau admin (sesuai dengan data yang tersedia) dalam satu field
            $nama_pengguna = $dataUser['nama_admin'] ?? $dataUser['nama_praktikan'] ?? $dataUser['nama_asisten'] ?? $dataUser['nama_praktikan'];
            
            // Menampilkan nama pengguna
            echo $nama_pengguna;
            ?>
            </div>


        </div>
        <div class="profile-picture">
            <div class="profile-dropdown" id="profileDropdown">
                <img src="<?= BASEURL; ?> /img/back1.png" alt="Profile Picture">
                <div class="dropdown-content">
                <?php if ($_SESSION['role'] == 'Praktikan') { ?>
                    <a href="<?= BASEURL; ?>/Praktikan/profile"><i class="fa fa-id-card-clip">  </i> Profil</a>

                <?php } ?>
                    
                <a href="<?= BASEURL; ?>/Pengguna/ubahPassword"><i class="fa-solid fa-key"></i> Ganti Sandi</a>

                    <a href="<?= BASEURL; ?>/log/logout"><i class="fa fa-right-from-bracket"></i> Keluar</a>
                </div>
                <div class="arrow"></div>
            </div>
        </div>   
    </div>
    