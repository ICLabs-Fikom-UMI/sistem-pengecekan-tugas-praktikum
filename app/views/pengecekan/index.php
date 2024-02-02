<div class="content">
    <h2 style="margin-top: 70px;">Pengecekan</h2>
    <label for="inputNamaMatkul">Mata Kuliah:</label>
    <select id="inputNamaMatkul" name="id_matkul" onchange="updateFrekuensiOptions()">
        <option value="" disabled selected>Pilih</option>
        <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
        <?php foreach ($matakuliah as $matkul): ?>
            <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['prodi'];?> - <?= $matkul['nama_matkul']; ?>  </option>
        <?php endforeach; ?>
    </select>

    <label for="inputFrekuensi">Frekuensi :</label>
    <select id="inputFrekuensi" name="id_frekuensi">
        <option value="" disabled selected>Pilih</option>
        <?php $frekuensi = $this->model('Frekuensi_model')->getAllFrekuensi(); ?>
        <?php foreach ($frekuensi as $frek): ?>
            <option class="frekuensi-option" value="<?= $frek['id_frekuensi']; ?>" data-matkul="<?= $frek['id_matkul']; ?>">
                <?= $frek['nama_frekuensi']; ?> - <?= $frek['nama_dosen']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <label for="pilihTugas">Nama Tugas :</label>
    <select id="pilihTugas" name="id_tugas" onchange="updateTugasOptions()">
        <option value="" disabled selected>Pilih</option>
        <?php $namaTugas = $this->model('Tugas_model')->getAllTugas(); ?>
        <?php foreach ($namaTugas as $tugas): ?>
            <option class="tugas-option" value="<?= $tugas['id_tugas']; ?>" data-frekuensi="<?= $tugas['id_frekuensi']; ?>">
                <?= $tugas['nama_tugas']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button style="margin-top: 20px;" onclick="cariPaktikan()">Cari</button>

    <table  id="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Praktikan</th>
                <th>Status</th>     
                <th>Tanggal</th>        
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($data['pengecekan'] as $pengecekan): ?>
    <tr>
        <td><?= $i++ ?> </td>
        <td><?php 
            $nim_praktikan = $this->model('Tugas_model')->getPraktikanByFrekuensi($pengecekan['id_frekuensi']);
            echo $nim_praktikan['nim_praktikan'];
        ?></td>
        <td><?php 
            $nama_praktikan = $this->model('Tugas_model')->getPraktikanByFrekuensi($pengecekan['id_frekuensi']);
            echo $nama_praktikan['nama_praktikan'];
        ?></td>
        <td>
            <!-- Dropdown Status -->
            <select name="status" id="status_<?php echo $pengecekan['id_pengecekan']; ?>">
                <option value="ACC">ACC</option>
                <option value="Revisi">Revisi</option>
            </select>
        </td> 
        <td><?= $pengecekan['tgl_pengecekan']; ?></td>     
    </tr>
    
<?php endforeach; ?>


        </tbody>
    </table>
    <div style="margin-top: 30px;">
        <button onclick="editPengecekan(<?php echo $pengecekan['id_tugas']; ?>)">Edit</button>
        <button onclick="simpanPengecekan(<?php echo $pengecekan['id_tugas']; ?>)">Simpan</button>
    </div>


</div>



