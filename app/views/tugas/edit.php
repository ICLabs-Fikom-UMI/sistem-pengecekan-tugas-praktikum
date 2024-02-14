<div class="content">
    <form action="<?= BASEURL; ?>/Tugas/update" method="POST">
    <h2 style="margin-top:70px;">Edit Praktikan </h2>
        <input type="hidden" name="id_tugas" value="<?= $data['tugas']['id_tugas']; ?>">
        <label for="nama_tugas">Nama Tugas:</label>
        <input type="text" id="nama_tugas" name="nama_tugas" value="<?= $data['tugas']['nama_tugas']; ?>">

        <label for="deskripsi_tugas">Deskripsi Tugas:</label>
        <textarea id="deskripsi_tugas" name="deskripsi_tugas" rows="4"><?= $data['tugas']['deskripsi_tugas']; ?></textarea>

        <label for="status_tugas">Status Tugas:</label>
        <input type="text" id="status_tugas" name="status_tugas" value="<?= $data['tugas']['status_tugas']; ?>">

        <label for="tgl_tugas">Tanggal:</label>
        <input type="date" id="tgl_tugas" name="tgl_tugas" value="<?= $data['tugas']['tgl_tugas']; ?>">

        <label for="id_frekuensi">Frekuensi:</label>
        <select id="id_frekuensi" name="id_frekuensi">
            <?php foreach ($data['frekuensi'] as $frek): ?>
                <option value="<?= $frek['id_frekuensi']; ?>" <?php if ($frek['id_frekuensi'] == $data['tugas']['id_frekuensi']) echo 'selected'; ?>>
                    <?= $frek['nama_frekuensi']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" onclick='location.href="<?= BASEURL; ?>/Tugas/update"'>Simpan</button>
        <a href="<?= BASEURL; ?>/tugas/detail_tugas" class="kembali">Kembali</a>
    </form>

</div>