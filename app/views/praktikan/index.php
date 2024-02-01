<div class="content">
    <h2 style="margin-top: 70px;">Praktikan</h2>
    <div class="crud-praktikan">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Praktikan</th>
                <th>Kelas</th>
                <th>Frekuensi</th> 
                <th>Edit</th>  
                <th>Hapus</th>                
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($data['praktikan'] as $praktikan): ?>
                <tr>
                <td><?= $i++?></td>
                    <td><?= $praktikan['nim_praktikan']; ?></td>
                    <td><?= $praktikan['nama_praktikan']; ?></td>
                    <td>
                        <?php
                        $dosen = $this->model('Praktikan_model')->getKelasById($praktikan['id_dosen']);
                        echo $dosen['kelas'];
                        ?>
                    </td>
                    <td>
                        <?php
                        // Ambil kelas dari tabel mst_dosen berdasarkan id_dosen
                        $dosen = $this->model('Praktikan_model')->getFrekuensiById($praktikan['id_frekuensi']);
                        echo $dosen['nama_frekuensi'];
                        ?>
                    </td>                      
                    
                    <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
                    <td><a href="<?= BASEURL; ?>/praktikan/edit/<?= $frekuensi['id_praktikan']; ?>"><i class="fa fa-pencil"></i> </a></td>
                    <td>
                <a href="<?= BASEURL; ?>/Praktikan/" onclick="hapusPraktikan('<?= $praktikan['id_prktikan']; ?>')">
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
            <h2>Tambah Praktikan</h2>
            <form id="tambahForm" action="<?= BASEURL; ?>/Praktikan/add" method="POST">
                
                <label for="inputNimPraktikan">NIM Praktikan :</label>
                <!-- <input type="text" id="inputNipDosen" name="nip_dosen" required placeholder="Masukkan NIP Dosen"> -->
                <input type="text" id="inputNimPraktikan" name="nim_praktikan" required placeholder="Masukkan NIM Praktikan">
                <label for="inputNamaPraktikan">Nama Praktikan :</label>
                <!-- <input type="text" id="inputNipDosen" name="nip_dosen" required placeholder="Masukkan NIP Dosen"> -->
                <input type="text" id="inputNamaPraktikan" name="nama_praktikan" required placeholder="Masukkan Nama Praktikan">

                <label for="inputFrekuensi">Frekuensi :</label>
                <select id="inputFrekuensi" name="id_frekuensi">
                <option value="" disabled selected>Pilih</option>
                <?php $frekuensi = $this->model('Frekuensi_model')->getAllFrekuensi(); ?>
                    <?php foreach ($frekuensi as $frek): ?>
                        <option value="<?= $frek['id_frekuensi']; ?>"><?= $frek['nama_frekuensi']; ?></option>

                    <?php endforeach; ?>
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

