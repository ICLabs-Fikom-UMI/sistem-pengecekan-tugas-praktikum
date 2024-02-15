<div class="sidebar">
   
<ul class="sidebar-links">
    <a href="<?= BASEURL; ?>"><i class="fa fa-gauge-high"></i></i>&nbsp;&nbsp; Dashboard</a>

    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <a href="<?= BASEURL; ?>/matakuliah"><i class="fa fa-swatchbook"></i>&nbsp;&nbsp; Mata Kuliah</a>
        <a href="<?= BASEURL; ?>/dosen"><i class="fa fa-chalkboard-user"></i>&nbsp;&nbsp;&nbsp; Dosen</a>
        <a href="<?= BASEURL; ?>/asisten"><i class="fa-brands fa-teamspeak"></i>&nbsp;&nbsp; Asisten</a>
    <?php } ?>

    <a href="<?= BASEURL; ?>/frekuensi"><i class="fa fa-podcast"></i>&nbsp;&nbsp; Frekuensi</a>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <a href="<?= BASEURL; ?>/praktikan"><i class="fa fa-book-open-reader"></i>&nbsp;&nbsp; Praktikan</a>
    <?php } ?>

    <a href="<?= BASEURL; ?>/tugas"><i class="fa fa-laptop-file"></i></i>&nbsp;&nbsp; Tugas</a>

    <?php if ($_SESSION['role'] == 'Asisten') { ?>
        <a href="<?= BASEURL; ?>/pengecekan"><i class="fa fa-file-circle-check"></i></i></i>&nbsp;&nbsp;&nbsp; Pengecekan</a>
    <?php } ?>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <a href="<?= BASEURL; ?>"><i class="fa fa-check-double"></i></i>&nbsp;&nbsp;&nbsp; Tugas Lengkap</a>
    <?php } ?>
    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <a href="<?= BASEURL; ?>/pengguna"><i class="fa fa-users"></i>&nbsp;&nbsp; Pengguna</a>
    <?php } ?>
    <?php if ($_SESSION['role'] == 'Praktikan') { ?>
        <a href="<?= BASEURL; ?>/riwayat"><i class="fa fa-clock-rotate-left"></i>&nbsp;&nbsp;&nbsp; Riwayat</a>
    <?php } ?>
</ul>

</div>