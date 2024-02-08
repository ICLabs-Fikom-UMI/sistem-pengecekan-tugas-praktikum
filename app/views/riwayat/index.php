<div class="content">
<form method="POST" action="<?= BASEURL; ?>/riwayat/cariTugas">    
<h2 style="margin-top: 70px;">Riwayat Pengecekan</h2>
<div class="form-group">
<label for="pilihTugas">Frekuensi</label>
<select id="inputFrekuensi" name="id_frekuensi" onchange="populateAsisten()">
    <option value="" disabled selected>Pilih</option>
    <?php $frekuensi = $this->model('Frekuensi_model')->getAllFrekuensi(); ?>
    <?php foreach ($frekuensi as $frek): ?>
        <option class="frekuensi-option" 
                value="<?= $frek['id_frekuensi']; ?>" 
                data-dosen="<?= $frek['nama_dosen']; ?>" 
                data-asisten1="<?= $frek['nama_asisten1']; ?>" 
                data-asisten2="<?= $frek['nama_asisten2']; ?>">
            <?= $frek['nama_frekuensi']; ?> 
        </option>
    <?php endforeach; ?>
</select>
</div>
<div class="form-group">
    <label for="dosenInput">Dosen Pengampuh </label>
    <input type="text" id="dosenInput" readonly>
</div>

<div class="form-group">
    <label for="asisten1Input">Asisten 1 </label>
    <input type="text" id="asisten1Input" readonly>
</div>

<div class="form-group">
    <label for="asisten2Input">Asisten 2 </label>
    <input type="text" id="asisten2Input" readonly>
</div>


    </form>

    <table  id="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tugas</th>
                <th>Status</th>     
                <th>Tanggal</th>        
            </tr>
        </thead>
        <tbody>
    


        </tbody>
    </table>

</div>


