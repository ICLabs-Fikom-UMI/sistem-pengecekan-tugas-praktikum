<div class="sidebar">
   
<ul class="sidebar-links">
    <a href="<?= BASEURL; ?>"><i class="fa fa-table-columns"></i> Dashboard</a>

    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <a href="<?= BASEURL; ?>/matakuliah"><i class="fa fa-folder"></i> Matakuliah</a>
        <a href="<?= BASEURL; ?>/dosen"><i class="fa fa-user"></i> Dosen</a>
        <a href="<?= BASEURL; ?>/asisten"><i class="fa fa-user-group"></i> Asisten</a>
    <?php } ?>

    <a href="<?= BASEURL; ?>/frekuensi"><i class="fa fa-code-branch"></i> Frekuensi</a>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <a href="<?= BASEURL; ?>/praktikan"><i class="fa fa-graduation-cap"></i> Praktikan</a>
    <?php } ?>

    <a href="<?= BASEURL; ?>/tugas"><i class="fa fa-file"></i> Tugas</a>

    <?php if ($_SESSION['role'] == 'Asisten') { ?>
        <a href="<?= BASEURL; ?>/pengecekan"><i class="fa fa-file"></i> Pengecekan</a>
    <?php } ?>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <a href="<?= BASEURL; ?>"><i class="fa fa-file"></i> Tugas Lengkap</a>
    <?php } ?>
    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <a href="<?= BASEURL; ?>/pengguna"><i class="fa fa-users"></i> Pengguna</a>
    <?php } ?>
</ul>


        <!-- <ul class="sidebar-links">
        <a href="<?= BASEURL; ?>"> <i class="fa fa-table-columns"></i> Dasboard</a>
        <a href="<?= BASEURL; ?>/matakuliah"> <i class="fa fa-folder"></i> Matakuliah</a>
        <a href="<?= BASEURL; ?>/dosen"> <i class="fa fa-user"></i>Dosen</a>
        <a href="<?= BASEURL; ?>/asisten"> <i class="fa fa-user-group"></i> Asisten</a>
        <a href="<?= BASEURL; ?>/frekuensi"> <i class="fa fa-code-branch"></i> Frekuensi</a>
        <a href="<?= BASEURL; ?>/praktikan"> <i class="fa fa-graduation-cap"></i> Praktikan</a>
        <a href="<?= BASEURL; ?>/tugas"> <i class="fa fa-file"></i> Tugas</a>
        <a href="<?= BASEURL; ?>/pengecekan"> <i class="fa fa-file"></i> Pengecekan</a>
        <a href="<?= BASEURL; ?>"> <i class="fa fa-file"></i> Tugas Lengkap</a>
        <a href="<?= BASEURL; ?>/pengguna"> <i class="fa fa-users"></i> Pengguna</a>

        </ul> -->
</div>