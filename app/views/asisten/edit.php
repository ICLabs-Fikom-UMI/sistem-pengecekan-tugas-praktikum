  
<div class="content">
<form action="<?= BASEURL; ?>/asisten/update" method="post" >
<h2 style="margin-top:70px;">Edit Asisten </h2>
    <input type="hidden" name="id_asisten" value="<?= $data['asisten']['id_asisten']; ?>">
    <label for="nim_asisten">NIM Asisten:</label>
    <input type="text" id="nim_asisten" name="nim_asisten" value="<?= $data['asisten']['nim_asisten']; ?>"><br>
    <label for="nama_asisten">Nama Asisten:</label>
    <input type="text" id="nama_asisten" name="nama_asisten" value="<?= $data['asisten']['nama_asisten']; ?>"><br>
    <label for="kelas">Kelas:</label>
    <input type="text" id="kelas" name="kelas" value="<?= $data['asisten']['kelas']; ?>"><br>
    <label for="prodi">Prodi:</label>
    <select id="prodi" name="prodi">
        <option value="Teknik Informatika" <?= ($data['asisten']['prodi'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
        <option value="Sistem Informasi" <?= ($data['asisten']['prodi'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
    </select><br>
    <button type="submit" onclick='location.href="<?= BASEURL; ?>/Asisten/update"'>Simpan</button>
    <a href="<?= BASEURL; ?>/Asisten/index" class="kembali">Kembali</a>
</form>
</div>


    