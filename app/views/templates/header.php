<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style2.css">
</head>
<body>
<div class="navbar">
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
                <input type="text" placeholder="Search...">
                <button type="button"><i class="fa fa-magnifying-glass"></i></button>
            </div>
            

        </div>
        <div class="profile-picture">
            <div class="profile-dropdown" id="profileDropdown">
                <img src="<?= BASEURL; ?> /img/back1.png" alt="Profile Picture">
                <div class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="#">Ganti Password</a>
                    <a href="#">Logout</a>
                </div>
                <div class="arrow"></div>
            </div>
        </div>   
    </div>
    <div class="sidebar">
        <ul class="sidebar-links">
            <!-- <li><img src="asset/dash.svg" alt=""><a href="#"> <i class="fa-solid fa-table-columns">Dasboard</i></a></li> -->
            <!-- <li><i class="fa fa-table-columns"> <a href="">Dasboard</a></i></li> -->
            <a href="">
                <i class="fa fa-table-columns"></i> 
                Dasboard
            </a>
            <a href="#">
                <i class="fa fa-folder"></i> 
                Matakuliah
            </a>
            <a href="#">
                <i class="fa fa-user"></i>
                Dosen
            </a>
            <a href=""><i class="fa fa-user-group"></i> 
                Asisten
            </a>
            <a href="">
                <i class="fa fa-code-branch"></i>
                Praktikan
            </a>
            <a href="">
                <i class="fa fa-file"></i>
                Tugas Praktikum
            </a>
            <a href="#">
                <i class="fa fa-users"></i>
                Pengguna
            </a>
        </ul>
</div>