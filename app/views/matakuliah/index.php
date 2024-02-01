<div class="content">
    <h2 style="margin-top: 70px;">Mata Kuliah</h2>
    <div class="crud-matkul">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Program Studi</th>
                <th>Semester</th> 
                <th>Tingkat Semester</th> 
                <th>Edit</th>
                <th>Hapus</th>                  
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
                foreach ($data['matakuliah'] as $matakuliah): ?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $matakuliah['kode_matkul']; ?></td>
                    <td><?= $matakuliah['nama_matkul']; ?></td>
                    <td><?= $matakuliah['prodi']; ?></td>           
                    <td><?= $matakuliah['semester']; ?></td>
                    <td><?= $matakuliah['tingkat_semester']; ?></td>
                    <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
                    <td><a href="<?= BASEURL; ?>/matakuliah/edit/<?= $matakuliah['id_matkul']; ?>"><i class="fa fa-pencil"></i> </a></td>
                    <!-- <td><a href="<?= BASEURL; ?>/matakuliah/hapus/<?= $matakuliah['id_matkul']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="fa fa-trash-can"></i></a></td> -->
                    <td>
                <a href="<?= BASEURL; ?>/Matakuliah/" onclick="hapusMatkul('<?= $matakuliah['id_matkul']; ?>')">
                    <i class="fa fa-trash-can"></i>
                </a>
            </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- POP UP TAMBAH -->
    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTambahModal()">&times;</span>
            <h2>Tambah Mata Kuliah</h2>
            <form id="tambahForm" action="<?= BASEURL; ?>/Matakuliah/add" method="POST">
                
                <label for="inputKodeMatkul">Kode Mata Kuliah:</label>
                <input type="text" id="inputKodeMatkul" name="kode_matkul">

                <label for="inputNamaMatkul">Nama Mata Kuliah:</label>
                <input type="text" id="inputNamaMatkul" name="nama_matkul">

                <label for="inputProdi">Program Studi:</label>
                <select id="inputProdi" name="prodi">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                </select>

                <label for="inputSemester">Semester:</label>
                <select id="inputSemester" name="semester" onchange="updateTingkatSemester()">
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>

                <label for="inputTingkatSemester">Tingkat Semester:</label>
                <select id="inputTingkatSemester" name="tingkat_semester">
                    <!-- Options will be dynamically updated using JavaScript -->
                </select>

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

