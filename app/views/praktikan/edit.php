<div class="content">

<form action="<?= BASEURL; ?>/Praktikan/update" method="POST">
<h2 style="margin-top:70px;">Edit Praktikan </h2>
    <input type="hidden" name="id_praktikan" value="<?= $data['praktikan']['id_praktikan']; ?>">
    <label for="nim_praktikan">NIM Praktikan:</label>
    <input type="text" id="nim_praktikan" name="nim_praktikan" value="<?= $data['praktikan']['nim_praktikan']; ?>">

    <label for="nama_praktikan">Nama Praktikan:</label>
    <input type="text" id="nama_praktikan" name="nama_praktikan" value="<?= $data['praktikan']['nama_praktikan']; ?>">

    <label for="inputFrekuensi">Frekuensi :</label>
                <select id="inputFrekuensi" name="id_frekuensi">
                <option value="" disabled selected>Pilih</option>
                <?php $frekuensi = $this->model('Frekuensi_model')->getAllFrekuensi(); ?>
                    <?php foreach ($frekuensi as $frek): ?>
                        <option value="<?= $frek['id_frekuensi']; ?>"><?= $frek['nama_frekuensi']; ?></option>

                    <?php endforeach; ?>
                </select>

    <button type="submit" onclick='location.href="<?= BASEURL; ?>/Asisten/update"'>Update</button>
    <a href="<?= BASEURL; ?>/Praktikan/index" class="kembali">Kembali</a>
</form>
</div>
