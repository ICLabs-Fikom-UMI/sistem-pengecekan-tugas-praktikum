
<div class="sidebar">
   
<!-- <ul class="sidebar-links" >
    <button onclick="location.href='<?= BASEURL; ?>'"><i class="fa fa-gauge-high"></i></i>&nbsp;&nbsp; Dashboard</button>

    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <button onclick="location.href='<?= BASEURL; ?>/matakuliah'"><i class="fa fa-swatchbook"></i>&nbsp;&nbsp; Mata Kuliah</button>
        <button onclick="location.href='<?= BASEURL; ?>/dosen'"><i class="fa fa-chalkboard-user"></i>&nbsp;&nbsp;&nbsp; Dosen</button>
        <button onclick="location.href='<?= BASEURL; ?>/asisten'"><i class="fa-brands fa-teamspeak"></i>&nbsp;&nbsp; Asisten</button>
    <?php } ?>

    <button onclick="location.href='<?= BASEURL; ?>/frekuensi'"><i class="fa fa-podcast"></i>&nbsp;&nbsp; Frekuensi</button>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <button onclick="location.href='<?= BASEURL; ?>/praktikan'"><i class="fa fa-book-open-reader"></i>&nbsp;&nbsp; Praktikan</button>
    <?php } ?>

    <button onclick="location.href='<?= BASEURL; ?>/tugas'"><i class="fa fa-laptop-file"></i></i>&nbsp;&nbsp; Tugas</button>

    <?php if ($_SESSION['role'] == 'Asisten') { ?>
        <button onclick="location.href='<?= BASEURL; ?>/pengecekan'" ><i class="fa fa-file-circle-check"></i></i></i>&nbsp;&nbsp;&nbsp; Pengecekan</button>
    <?php } ?>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <button onclick="location.href='<?= BASEURL; ?>'"><i class="fa fa-check-double"></i></i>&nbsp;&nbsp;&nbsp; Verifikasi</button>
    <?php } ?>
    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <button onclick="location.href='<?= BASEURL; ?>/pengguna'" ><i class="fa fa-users"></i>&nbsp;&nbsp; Pengguna</button>
    <?php } ?>
    <?php if ($_SESSION['role'] == 'Praktikan') { ?>
        <button onclick="location.href='<?= BASEURL; ?>/riwayat'"><i class="fa fa-clock-rotate-left"></i>&nbsp;&nbsp;&nbsp; Riwayat</button>
    <?php } ?>
</ul> -->

<ul class="sidebar-links" >
    <li class="sidebar-li">
        <a   href="<?= BASEURL; ?>"><i class="fa fa-gauge-high"></i></i>&nbsp;&nbsp; Dashboard</a>
    </li>

    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <li class="sidebar-li">
            <a href="<?= BASEURL; ?>/matakuliah"><i class="fa fa-swatchbook"></i>&nbsp;&nbsp; Mata Kuliah</a>
        </li>
        <li class="sidebar-li">
            <a href="<?= BASEURL; ?>/dosen"><i class="fa fa-chalkboard-user"></i>&nbsp;&nbsp;&nbsp; Dosen</a>
        </li>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>/asisten"><i class="fa-brands fa-teamspeak"></i>&nbsp;&nbsp; Asisten</a>
        </li>
    <?php } ?>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>/frekuensi"><i class="fa fa-podcast"></i>&nbsp;&nbsp; Frekuensi</a>
        </li>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>/praktikan"><i class="fa fa-book-open-reader"></i>&nbsp;&nbsp; Praktikan</a>
        </li>
    <?php } ?>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>/tugas"><i class="fa fa-laptop-file"></i></i>&nbsp;&nbsp; Tugas</a>
        </li>

    <?php if ($_SESSION['role'] == 'Asisten') { ?>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>/pengecekan" ><i class="fa fa-file-circle-check"></i></i></i>&nbsp;&nbsp;&nbsp; Pengecekan</a>
        </li>
    <?php } ?>

    <?php if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Asisten') { ?>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>"><i class="fa fa-check-double"></i></i>&nbsp;&nbsp;&nbsp; Verifikasi</a>
        </li>
    <?php } ?>
    <?php if ($_SESSION['role'] == 'Administrator') { ?>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>/pengguna" ><i class="fa fa-users"></i>&nbsp;&nbsp; Pengguna</a>
        </li>
    <?php } ?>
    <?php if ($_SESSION['role'] == 'Praktikan') { ?>
        <li  class="sidebar-li">
            <a href="<?= BASEURL; ?>/riwayat"><i class="fa fa-clock-rotate-left"></i>&nbsp;&nbsp;&nbsp; Riwayat</a>
        </li>
    <?php } ?>
</ul>

</div>