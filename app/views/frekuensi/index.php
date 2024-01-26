<div class="content">
    <h2>Mata Kuliah</h2>
    <div class="crud-matkul">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Frekuensi</th>
                <th>Kelas</th>
                <th>Matakuliah</th>
                <th>Dosen Pengampuh</th>  
                <th>Asisten 1</th>  
                <th>Asisten 2</th>  
                <th>Edit</th>
                <th>Hapus</th>                  
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['frekuensi'] as $fekuensi): ?>
                <tr>
                    <td><?= $frekuensi['nama_frekuensi']; ?></td>
                    <td>
                        <?php
                        // Ambil kelas dari tabel mst_dosen berdasarkan id_dosen
                        $matakuliah = $this->model('Dosen_model')->getMatkulById($dosen['id_matkul']);
                        echo $matakuliah['prodi'];
                        ?>
                    </td>
                    <td>
                    <?php
                        // Ambil nama_matkul dari tabel mst_dosen berdasarkan id_dosen
                        $matakuliah = $this->model('Dosen_model')->getMatkulById($dosen['id_matkul']);
                        echo $matakuliah['nama_matkul'];
                    ?>
                    </td>
                    <td>
                    <?php
                        // Ambil nama_dosen dari tabel mst_dosen berdasarkan id_dosen
                        $matakuliah = $this->model('Dosen_model')->getMatkulById($dosen['id_matkul']);
                        echo $matakuliah['nama_matkul'];
                    ?>
                    </td>  
                    <td>
                    <?php
                        // Ambil nama_asisteb dari tabel mst_asisten berdasarkan id_asisten
                        $matakuliah = $this->model('Dosen_model')->getMatkulById($dosen['id_matkul']);
                        echo $matakuliah['nama_matkul'];
                    ?>
                    </td>             
                    
                    <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
                    <td><a href="<?= BASEURL; ?>/matakuliah/edit/<?= $matakuliah['id_matkul']; ?>"><i class="fa fa-pencil"></i> </a></td>
                    <td><a href="<?= BASEURL; ?>/matakuliah/hapus/<?= $matakuliah['id_matkul']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="fa fa-trash-can"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- POP UP TAMBAH -->
    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTambahModal()">&times;</span>
            <h2>Tambah Frekuensi</h2>
            <form id="tambahForm" action="<?= BASEURL; ?>/Dosen/add" method="POST">
                
                <label for="inputNipDosen">Nama Frekuensi :</label>
                <!-- <input type="text" id="inputNipDosen" name="nip_dosen" required placeholder="Masukkan NIP Dosen"> -->
                <input type="text" id="inputNipDosen" name="nip_dosen" required placeholder="Masukkan NIP Dosen" pattern="[0-9]+" title="Hanya masukkan angka (0-9)">

                <label for="inputNamaMatkul">Dosen Pengampuh :</label>
                <select id="inputNamaMatkul" name="id_matkul">
                <option value="" disabled selected>Pilih</option>
                <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
                    <?php foreach ($matakuliah as $matkul): ?>
                        <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['nama_matkul']; ?> (<?= $matkul['prodi'];?>) </option>

                    <?php endforeach; ?>
                </select>
                <label for="inputNamaMatkul">Asisten 1 :</label>
                <select id="inputNamaMatkul" name="id_matkul">
                <option value="" disabled selected>Pilih</option>
                <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
                    <?php foreach ($matakuliah as $matkul): ?>
                        <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['nama_matkul']; ?> (<?= $matkul['prodi'];?>) </option>

                    <?php endforeach; ?>
                </select>
                <label for="inputNamaMatkul">Asisten 2 :</label>
                <select id="inputNamaMatkul" name="id_matkul">
                <option value="" disabled selected>Pilih</option>
                <?php $matakuliah = $this->model('Matakuliah_model')->getAllMatakuliah(); ?>
                    <?php foreach ($matakuliah as $matkul): ?>
                        <option value="<?= $matkul['id_matkul']; ?>"><?= $matkul['nama_matkul']; ?> (<?= $matkul['prodi'];?>) </option>

                    <?php endforeach; ?>
                </select>
                <input type="text" id="inputKelas" name="kelas">

                <button onclick="submitFormById('tambahForm')">Submit</button>
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

