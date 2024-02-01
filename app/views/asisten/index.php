<div class="content">
    <h2 style="margin-top: 70px;">Asisten</h2>
    <div class="crud-asisten">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM Asisten</th>
                <th>Nama Asisten</th>
                <th>Kelas</th>
                <th>Prodi</th> 
                <th>Edit</th>
                <th>Hapus</th>                  
            </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        foreach ($data['asisten'] as $asisten): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $asisten['nim_asisten']; ?></td>
            <td><?= $asisten['nama_asisten']; ?></td>
            <td><?= $asisten['kelas']; ?></td>
            <td><?= $asisten['prodi']; ?></td>
            
            <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
            <td><a href="<?= BASEURL; ?>/asisten/edit/<?= $asisten['id_asisten']; ?>"><i class="fa fa-pencil"></i></a></td>
            <!-- <td><a href="<?= BASEURL; ?>/Asisten/hapus/<?= $asisten['id_asisten']; ?>" onclick="hapus('<?= $asisten['id_asisten']; ?>')"><i class="fa fa-trash-can"></i></a></td> -->
            <td>
                <a href="<?= BASEURL; ?>/Asisten/" onclick="hapus('<?= $asisten['id_asisten']; ?>')">
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
            <h2>Tambah asisten</h2>
            <form id="tambahForm" action="<?= BASEURL; ?>/asisten/add" method="POST">
                <label for="inputNimasisten">NIM asisten :</label>
                <!-- <input type="text" id="inputNipasisten" name="nip_asisten" required placeholder="Masukkan NIP asisten"> -->
                <input type="text" id="inputNimasisten" name="nim_asisten" required placeholder="Masukkan NIM Asisten" pattern="[0-9]+" title="Hanya masukkan angka (0-9)">
                <label for="inputNamaAsisten">Nama Asisten :</label>
                <input type="text" id="inputNamaAsisten" name="nama_asisten" required placeholder="Masukkan Nama Asisten">
                <label for="inputKelas">Kelas :</label>
                <input type="text" id="inputKelas" name="kelas" required placeholder="Masukkan Kelas">
                <label for="inputProdi">Program Studi:</label>
                <select id="inputProdi" name="prodi">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
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

