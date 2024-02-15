<div class="content">
    <h2 style="margin-top: 70px;">Asisten</h2>
    <div class="crud-asisten">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-user-plus"></i></a>
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
            <!-- <td><a href="<?= BASEURL; ?>/asisten/" onclick="openEditPopup(<?= $asisten['id_asisten']; ?>)" ><i class="fa fa-pencil"></i></a></td> -->
            <td   style="position: relative;"><a class="btn-crud" href="<?= BASEURL; ?>/asisten/edit/<?= $asisten['id_asisten']; ?>"><i class="fa fa-pen-to-square"></i></a></td>
            <!-- <td><a href="#" class="crud tambah-crud" onclick="openEditModal(<?= $asisten['id_asisten']; ?>)"><i class="fa fa-pencil"></i></a></td> -->

            <td style="position: relative;" >
                <a class="btn-crud" href="<?= BASEURL; ?>/Asisten/" onclick="hapus('<?= $asisten['id_asisten']; ?>')">
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
                <input type="text" id="inputNimasisten" name="nim_asisten" required placeholder="Masukkan NIM Asisten" >
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


</div>

<SCript>



</SCript>





