<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul'] ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .form-group {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-group select {
            width: 200%;
            /* Sesuaikan lebar label sesuai kebutuhan */
            text-align: left;
            margin-right: 10px;
        }

        .form-group label {
            width: 40%;
            /* Sesuaikan lebar label sesuai kebutuhan */
            text-align: left;
            margin-right: 10px;
        }

        .form-group input {
            width: 200%;
            /* Sesuaikan lebar input sesuai kebutuhan */
            background-color: #E7F4EF;
            border: none;
            color: #526D82;
        }

        .sidebar-links li {
            padding: 5px;
            margin: 1px;
            position: relative;
            z-index: 1;
        }

        .sidebar-links li:hover::after {
            content: '';
            position: absolute;
            top: 20%;
            /* Menetapkan posisi vertikal ke tengah */
            right: 10px;
            /* Menetapkan posisi horizontal ke paling kiri */
            width: 100%;
            /* Menetapkan lebar sejajar dengan lebar elemen utama */
            height: 100%;
            background-color: rgba(231, 244, 239, 0.8);
            z-index: -1;
            border-radius: 5px;
        }

        .sidebar-links .sidebar-li a i,
        .sidebar-links .sidebar-li a {
            color: black;
            /* Warna ikon dan teks saat tidak dipilih */
        }

        .sidebar-links .sidebar-li:hover a i,
        .sidebar-links .sidebar-li a.active i {
            color: #51A8B1;
            /* Warna ikon saat fitur dipilih */
        }

        .sidebar-links .sidebar-li:hover a,
        .sidebar-links .sidebar-li a.active {
            color: #51A8B1;
            /* Warna teks pada ikon saat fitur dipilih */
        }



        #clock {
            font-family: 'Arial', sans-serif;
            font-size: 2em;
            color: #333;
        }

        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            grid-gap: 30px;
        }

        .card {
            /* background-color: rgba(82, 109, 130, 0.9); Warna latar belakang dengan opasitas */
            border: 1px solid #E7F4EF;
            color: black;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            /* text-align: center; */
            display: flex;
            flex-direction: column;
            width: 210px;
            margin-top: 50px;


            /* align-items: center; */
        }

        .card i {
            font-size: 48px;
            margin-bottom: 10px;
            color: #fff;

        }

        .card h3 {
            text-align: right;
            margin: 0;
            font-weight: normal;
            color: #A9A9A9;
        }

        .card p {
            text-align: right;
            margin: 0;
            font-size: 30px;
            font-weight: 500;
            margin-top: 10px;

        }

        .i i {
            /* border: solid; */
            /* background-color: orange; */
            border-radius: 5px;
            padding: 20px;
            margin-right: 200px;
            margin-top: -50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

        }

        .ii {
            margin-top: -50px;


        }

        .line {
            margin-top: 50px;

            /* border: solid; */
            border-radius: 5PX;
            background-color: #ffff;
        }

        /* KALENDER */
        .calendar {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            width: 50%;
            padding: 10px;
        }

        .calendar-header {
            background-color: #52AFB9;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
        }

        .calendar-header i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .calendar-header i.left {
            left: 10px;
        }

        .calendar-header i.right {
            right: 10px;
        }

        .calendar-table {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar-table th,
        .calendar-table td {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
        }

      

        .calendar-table td {
            height: 40px;
        }

        .highlight-today {
            background-color: green;
            color: #fff;
            border-radius: 0%;
            padding: 10px;
        }

        .lead {
            font-size: 15px;
            font-weight: normal;
        }

        .form-control {
            width: 100px;

        }

        .form-inline {
            display: flex;
            margin-top: 15px;
            gap: 10px;
            align-items: center;
        }
    </style>


</head>

<body>
    <div class="navbar" style="position: fixed; width:99%;">
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
                $dataUser = $this->model('Pengguna_model')->getDataUserById($id);

                // Menggabungkan nama praktikan, asisten, atau admin (sesuai dengan data yang tersedia) dalam satu field
                $nama_pengguna = $dataUser['nama_admin'] ?? $dataUser['nama_praktikan'] ?? $dataUser['nama_asisten'] ?? $dataUser['nama_praktikan'];

                // Menampilkan nama pengguna
                echo $nama_pengguna;
                ?>
            </div>


        </div>
        <div class="profile-picture">
            <div class="profile-dropdown" id="profileDropdown">
                <!-- <img src="<?= BASEURL; ?> /img/back1.png" alt="Profile Picture"> -->

                <div class="dropdown-content">
                    <?php if ($_SESSION['role'] == 'Praktikan') { ?>
                        <a href="<?= BASEURL; ?>/Praktikan/profile"><i class="fa fa-id-card-clip"> </i> Profil</a>

                    <?php } ?>

                    <a href="<?= BASEURL; ?>/Pengguna/ubahPassword"><i class="fa-solid fa-key"></i> Ganti Sandi</a>

                    <a href="<?= BASEURL; ?>/log/logout"><i class="fa fa-right-from-bracket"></i> Keluar</a>
                </div>
                <div class="arrow"></div>
            </div>
        </div>
    </div>