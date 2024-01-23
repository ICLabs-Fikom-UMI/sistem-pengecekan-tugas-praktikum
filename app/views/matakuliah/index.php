<div class="content">
        <h2>Mata Kuliah</h2>
        <div class="crud-matkul">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
            <a href="#" class="crud edit-crud">Edit <i class="fa fa-pen-to-square"></i></a>
            <a href="#" class="crud delete-crud">Hapus <i class="fa fa-trash-can"></i></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Program Studi</th>
                    <th>Semester</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['matakuliah'] as $matakuliah): ?>
                    <tr>
                        <td><?= $matakuliah['kode_matkul']; ?></td>
                        <td><?= $matakuliah['nama_matkul']; ?></td>
                        <td><?= $matakuliah['prodi']; ?></td>           
                        <td><?= $matakuliah['semester']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- POP UP TAMBAH -->
        <div id="tambahModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeTambahModal()">&times;</span>
        <h2>Tambah Data</h2>
        <form id="tambahForm" action="proses_tambah.php" method="POST">
            <!-- Isi formulir tambah di sini -->
            <label for="inputKodeMatkul">Kode Mata Kuliah:</label>
            <input type="text" id="inputKodeMatkul" name="kode_matkul">

            <label for="inputNamaMatkul">Nama Mata Kuliah:</label>
            <input type="text" id="inputNamaMatkul" name="nama_matkul">

            <label for="inputProdi">Program Studi:</label>
            <select id="inputProdi" name="prodi">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <!-- Tambahkan opsi lain sesuai kebutuhan -->
            </select>

            <label for="inputSemester">Semester:</label>
            <select id="inputSemester" name="semester">
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
                <!-- Tambahkan opsi lain sesuai kebutuhan -->
            </select>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</div>

       
</div>
