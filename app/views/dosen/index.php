<div class="content">
    <h2 style="margin-top: 70px;">Dosen Pengampuh</h2>
    <div class="crud-dosen">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP Dosen</th>
                <th>Nama Nama</th>
                <th>Mata Kuliah</th>
                <th>Program Studi</th>
                <th>Kelas</th>  
                <th>Edit</th>
                <th>Hapus</th>                  
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($data['dosen'] as $dosen): ?>
        <tr>
            <td><?= $i++?></td>
            <td><?= $dosen['nip_dosen']; ?></td>
            <td><?= $dosen['nama_dosen']; ?></td>
            <td>
                <?php
                // Ambil nama_matkul dari tabel mst_matkul berdasarkan id_matkul
                $matakuliah = $this->model('Dosen_model')->getMatkulById($dosen['id_matkul']);
                echo $matakuliah['nama_matkul'];
                ?>
            </td>
            <td>
                <?php
                // Ambil prodi dari tabel mst_matkul berdasarkan id_matkul
                $matakuliah = $this->model('Dosen_model')->getMatkulById($dosen['id_matkul']);
                echo $matakuliah['prodi'];
                ?>
            </td>           
            <td><?= $dosen['kelas']; ?></td>
            <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
            <td style="position: relative;"><a class="btn-crud" href="<?= BASEURL; ?>/Dosen/edit/<?= $dosen['id_dosen']; ?>"><i class="fa fa-pencil"></i></a></td>
            <td style="position: relative;">
                <a class="btn-crud" href="<?= BASEURL; ?>/Dosen/" onclick="hapusDosen('<?= $dosen['id_dosen']; ?>')">
                    <i class="fa fa-trash-can"></i>
                </a>
            </td>
        <?php endforeach; ?>
        </tbody>
    </table>
    <!-- POP UP TAMBAH -->
    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTambahModal()">&times;</span>
            <h2>Tambah Dosen</h2>
            <form id="tambahForm" action="<?= BASEURL; ?>/Dosen/add" method="POST">
                
                <label for="inputNipDosen">NIP Dosen :</label>
                <!-- <input type="text" id="inputNipDosen" name="nip_dosen" required placeholder="Masukkan NIP Dosen"> -->
                <input type="text" id="inputNipDosen" name="nip_dosen" required placeholder="Masukkan NIP Dosen" pattern="[0-9]+" title="Hanya masukkan angka (0-9)">

                <label for="inputNamaDosen">Nama Dosen :</label>
                <input type="text" id="inputNamaDosen" name="nama_dosen" required placeholder="Masukkan Nama Dosen">

                <label for="inputNamaMatkul">Mata Kuliah:</label>
                <select id="inputNamaMatkul" name="id_matkul">
                <option value="" disabled selected>Pilih</option>
                <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
                    <?php foreach ($matakuliah as $matkul): ?>
                        <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['prodi'];?> - <?= $matkul['nama_matkul']; ?> </option>

                    <?php endforeach; ?>
                </select>
                <label for="inputKelas">Kelas :</label>
                <input type="text" id="inputKelas" name="kelas">
                        <a href="<?= BASEURL; ?>/Dosen/" onclick="submitFormById('tambahForm')"><button type = "submit">Submit</button></a>
                
                <button type="button" class="btn" onclick="closeTambahModal()">Batal</button>
            </form>
        </div>
    </div>
</div>

<script>

function submitFormById(formId) {
    var form = document.getElementById(formId);

    // Periksa apakah formulir ditemukan
    if (form) {
        form.submit();
    } else {
        console.error("Form with ID '" + formId + "' not found.");
    }
}



</script>

