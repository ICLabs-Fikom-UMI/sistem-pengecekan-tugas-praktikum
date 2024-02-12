  
<!-- Edit.php -->

<div class="content">
    <h2 style="margin-top: 70px;">Edit Frekuensi</h2>
    <form action="<?= BASEURL; ?>/Frekuensi/update" method="POST">
        <input type="hidden" name="id_frekuensi" value="<?= $data['frekuensi']['id_frekuensi']; ?>">
        <label for="inputNamaFrekuensi">Nama Frekuensi :</label>
        <input type="text" id="inputNamaFrekuensi" name="nama_frekuensi" required placeholder="Masukkan Nama Frekuensi" value="<?= $data['frekuensi']['nama_frekuensi']; ?>">

        <label for="inputDosenPengampuh">Dosen Pengampuh :</label>
                <select id="inputDosenPengampuh" name="id_dosen">
                <option value="" disabled selected>Pilih</option>
                <?php $dosenpengampuh = $this->model('Dosen_model')->getAllDosen(); ?>
                    <?php foreach ($dosenpengampuh as $dosen): ?>
                        <option value="<?= $dosen['id_dosen']; ?>"> <?= $dosen['nama_dosen']; ?> - <?= $dosen['nama_matkul'];?> (<?= $dosen['kelas'];?>)<?= $dosen['prodi']; ?></option>

                    <?php endforeach; ?>
                </select>
                <label for="inputNamaAsisten1">Asisten 1 :</label>
                <select id="inputNamaAsisten1" name="id_asisten1">
                <option value="" disabled selected>Pilih</option>
                <?php $asistenlab = $this->model('Asisten_model')->getAllAsisten(); ?>
                    <?php foreach ($asistenlab as $asisten): ?>
                        <option value="<?= $asisten['id_asisten']; ?>"><?= $asisten['nama_asisten']; ?> </option>

                    <?php endforeach; ?>
                </select>
                <label for="inputNamaAsisten2">Asisten 2 :</label>
                <select id="inputNamaAsisten2" name="id_asisten2">
                <option value="" disabled selected>Pilih</option>
                <?php $asistenlab = $this->model('Asisten_model')->getAllAsisten(); ?>
                    <?php foreach ($asistenlab as $asisten): ?>
                        <option value="<?= $asisten['id_asisten']; ?>"><?= $asisten['nama_asisten']; ?> </option>

                    <?php endforeach; ?>
                </select>

        <button type="submit">Update</button>
        <button type="button" onclick="window.history.back();">Cancel</button>
    </form>
</div>
