<div class="content">
    <h2 style="margin-top: 70px;">Frekuensi</h2>
    <div class="crud-frekuensi">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
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
            <?php $i = 1;foreach ($data['frekuensi'] as $frekuensi): ?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $frekuensi['nama_frekuensi']; ?></td>
                    <td>
                        <?php
                        // Ambil kelas dari tabel mst_dosen berdasarkan id_dosen
                        $dosen = $this->model('Frekuensi_model')->getDosenById($frekuensi['id_dosen']);
                        echo $dosen['kelas'];
                        ?>
                    </td>
                    <td>
                        <?php
                        // Ambil matakuliah dari tabel mst_dosen berdasarkan id_dosen
                        // $id_matkul = $frekuensi['id_matkul'];
                        $dosen = $this->model('Frekuensi_model')->getDosenById($frekuensi['id_dosen']);
                        echo $dosen['nama_matkul'];
                        ?>
                    </td>
                    <td>
                        <?php
                        // Ambil kelas dari tabel mst_dosen berdasarkan id_dosen
                        $dosen = $this->model('Frekuensi_model')->getDosenById($frekuensi['id_dosen']);
                        echo $dosen['nama_dosen'];
                        ?>
                    </td>
                    <td>
                        <?php
                        // Ambil kelas dari tabel mst_dosen berdasarkan id_dosen
                        $dosen = $this->model('Frekuensi_model')->getAsisten1ById($frekuensi['id_asisten1']);
                        echo $dosen['nama_asisten'];
                        ?>
                    </td>
                    <td>
                        <?php
                        // Ambil kelas dari tabel mst_dosen berdasarkan id_dosen
                        $dosen = $this->model('Frekuensi_model')->getAsisten2ById($frekuensi['id_asisten2']);
                        echo $dosen['nama_asisten'];
                        ?>
                    </td>
                            
                    
                    <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
                    <td><a href="<?= BASEURL; ?>/frekuesni/edit/<?= $frekuensi['id_frekuensi']; ?>"><i class="fa fa-pencil"></i> </a></td>
                    <!-- <td><a href="<?= BASEURL; ?>/frekuensi/hapus/<?= $frekuensi['id_frekuensi']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="fa fa-trash-can"></i></a></td> -->
                    <td>
                <a href="<?= BASEURL; ?>/Frekuensi/" onclick="hapusFrekuensi('<?= $frekuensi['id_frekuensi']; ?>')">
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
            <h2>Tambah Frekuensi</h2>
            <form id="tambahForm" action="<?= BASEURL; ?>/Frekuensi/add" method="POST">
                
                <label for="inputNamaFrekuensi">Nama Frekuensi :</label>
                <!-- <input type="text" id="inputNipDosen" name="nip_dosen" required placeholder="Masukkan NIP Dosen"> -->
                <input type="text" id="inputNamaFrekuensi" name="nama_frekuensi" required placeholder="Masukkan Nama Frekuensi">

                <label for="inputDosenPengampuh">Dosen Pengampuh :</label>
                <select id="inputDosenPengampuh" name="id_dosen">
                <option value="" disabled selected>Pilih</option>
                <?php $dosenpengampuh = $this->model('Dosen_model')->getAllDosen(); ?>
                    <?php foreach ($dosenpengampuh as $dosen): ?>
                        <option value="<?= $dosen['id_dosen']; ?>"><?= $dosen['nama_dosen']; ?> - <?= $dosen['nama_matkul'];?> (<?= $dosen['kelas'];?>)</option>

                    <?php endforeach; ?>
                </select>
                <label for="inputNamaAsisten1">Asisten 1 :</label>
                <select id="inputNamaAsisten1" name="id_asisten1">
                <option value="" disabled selected>Pilih</option>
                <?php $asistenlab = $this->model('Asisten_model')->getAllAsisten(); ?>
                    <?php foreach ($asistenlab as $asisten): ?>
                        <option value="<?= $asisten['id_asisten']; ?>"><?= $asisten['nama_asisten']; ?> </option>

                    <?php endforeach; ?>
                </select>
                <label for="inputNamaAsisten2">Asisten 2 :</label>
                <select id="inputNamaAsisten2" name="id_asisten2">
                <option value="" disabled selected>Pilih</option>
                <?php $asistenlab = $this->model('Asisten_model')->getAllAsisten(); ?>
                    <?php foreach ($asistenlab as $asisten): ?>
                        <option value="<?= $asisten['id_asisten']; ?>"><?= $asisten['nama_asisten']; ?> </option>

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

