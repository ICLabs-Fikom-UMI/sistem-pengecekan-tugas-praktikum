  
<div class="content">
<form action="<?= BASEURL; ?>/dosen/update" method="post">
<h2 style="margin-top:70px;">Edit Dosen </h2>
    <input type="hidden" name="id_dosen" value="<?= $data['dosen']['id_dosen']; ?>">
    <label for="nip_dosen">NIP Dosen:</label>
    <input type="text" id="nip_dosen" name="nip_dosen" value="<?= $data['dosen']['nip_dosen']; ?>"><br>
    <label for="nama_dosen">Nama Dosen:</label>
    <input type="text" id="nama_dosen" name="nama_dosen" value="<?= $data['dosen']['nama_dosen']; ?>"><br>
    <!-- Tambahkan elemen untuk memilih mata kuliah dan kelas -->
    <!-- Contoh: -->
    <label for="id_matkul">Mata Kuliah:</label>
        <select id="id_matkul" name="id_matkul">
            <option value="" disabled selected>Pilih</option>
            <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
            <?php foreach ($matakuliah as $matkul): ?>
                <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['prodi'];?> - <?= $matkul['nama_matkul']; ?> </option>
            <?php endforeach; ?>
        </select><br>
    <label for="kelas">Kelas:</label>
    <input type="text" id="kelas" name="kelas" value="<?= $data['dosen']['kelas']; ?>"><br>
    <button type="submit">Simpan Perubahan</button>
    <a href="<?= BASEURL; ?>/Dosen/index" class="kembali">Kembali</a>
</form>
</div>
























<!-- <form action="<?= BASEURL; ?>/dosen/update" method="post">
    <input type="hidden" name="id_dosen" value="<?= $data['dosen']['id_dosen']; ?>">
    <label for="nip_dosen">NIP Dosen:</label>
    <input type="text" id="nip_dosen" name="nip_dosen" value="<?= $data['dosen']['nip_dosen']; ?>"><br>
    <label for="nama_dosen">Nama Dosen:</label>
    <input type="text" id="nama_dosen" name="nama_dosen" value="<?= $data['dosen']['nama_dosen']; ?>"><br>
    
    <label for="inputNamaMatkul">Mata Kuliah:</label>
        <select id="inputNamaMatkul" name="id_matkul">
            <option value="" disabled selected>Pilih</option>
            <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
            <?php foreach ($matakuliah as $matkul): ?>
                <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['prodi'];?> - <?= $matkul['nama_matkul']; ?> </option>
            <?php endforeach; ?>
        </select><br>
    <label for="kelas">Kelas:</label>
    <input type="text" id="kelas" name="kelas" value="<?= $data['dosen']['kelas']; ?>"><br>
    <button type="submit">Simpan Perubahan</button>
    <a href="<?= BASEURL; ?>/Dosen/index" class="kembali">Kembali</a>
</form> -->

<!-- <div class="content">
    <form action="<?= BASEURL; ?>/dosen/update" method="post">
        <h2 style="margin-top:70px;">Edit Dosen </h2>
        <input type="hidden" name="id_dosen" value="<?= $data['dosen']['id_dosen']; ?>">
        <label for="nip_dosen">NIP Dosen:</label>
        <input type="text" id="nip_dosen" name="nip_dosen" value="<?= $data['dosen']['nip_dosen']; ?>"><br>
        <label for="nama_dosen">Nama Dosen:</label>
        <input type="text" id="nama_dosen" name="nama_dosen" value="<?= $data['dosen']['nama_dosen']; ?>"><br>
        <label for="inputNamaMatkul">Mata Kuliah:</label>
        <select id="inputNamaMatkul" name="id_matkul">
            <option value="" disabled selected>Pilih</option>
            <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
            <?php foreach ($matakuliah as $matkul): ?>
                <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['prodi'];?> - <?= $matkul['nama_matkul']; ?> </option>
            <?php endforeach; ?>
        </select><br>
        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" value="<?= $data['dosen']['kelas']; ?>"><br>
        <button type="submit">Simpan</button>
        <a href="<?= BASEURL; ?>/Dosen/index" class="kembali">Kembali</a>
    </form>
</div> -->