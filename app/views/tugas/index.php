<div class="content">
    <h2>Tugas Praktikum</h2>
    <div class="crud-tugas">
        <!-- <a href="<?= BASEURL ?>/Tugas/tambahTugas" class="crud tambah-crud">Tambah <i class="fa fa-folder-plus"></i></a> -->
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Tugas</th>
                <th>Frekuensi</th>
                <th>Detail</th>
                <th>Edit</th>  
                <th>Hapus</th>                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['tugas'] as $tugas): ?>
                <tr>
                    <td><?= $tugas['nama_tugas']; ?></td>
                    <td>
                        <?php
                        $namafrekuensi = $this->model('Tugas_model')->getFrekuensiById($tugas['id_frekuensi']);
                        echo $namafrekuensi['nama_frekuensi'];                        
                        ?>
                    </td>                  
                    <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
                    <!-- <td><a href="<?= BASEURL; ?>/Tugas/detailTugas"><i class="fa-solid fa-circle-info"></i></a></td> -->
                    <td><a href="<?= BASEURL; ?>/Tugas/detailTugas/<?= $tugas['id_tugas']; ?>"><i class="fa-solid fa-circle-info"></i></a></td>

                    <td><a href="<?= BASEURL; ?>/tugas/edit/<?= $tugas['id_tugas']; ?>"><i class="fa fa-pencil"></i> </a></td>
                    <td><a href="<?= BASEURL; ?>/tugas/hapus/<?= $tugas['id_tugas']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="fa fa-trash-can"></i></a></td>
                   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTambahModal()">&times;</span>
            <h2>Tambah Tugas</h2>
            <form id="tambahForm" action="<?= BASEURL; ?>/tugas/add" method="POST">
       <!-- Input for Nama Tugas -->
            <label for="nama_tugas">Nama Tugas:</label>
            <input type="text" id="nama_tugas" name="nama_tugas" required>
            <!-- Input for Frekuensi -->
            <label for="inputFrekuensi">Frekuensi :</label>
                <select id="inputFrekuensi" name="id_frekuensi">
                <option value="" disabled selected>Pilih</option>
                <?php $frekuensi = $this->model('Frekuensi_model')->getAllFrekuensi(); ?>
                    <?php foreach ($frekuensi as $frek): ?>
                        <option value="<?= $frek['id_frekuensi']; ?>"><?= $frek['nama_frekuensi']; ?></option>

                    <?php endforeach; ?>
                </select>
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <!-- Input for Deskripsi Tugas -->
            <label for="deskripsi_tugas">Deskripsi Tugas:</label>
            <textarea id="deskripsi_tugas" name="deskripsi_tugas" rows="4" required></textarea>
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

