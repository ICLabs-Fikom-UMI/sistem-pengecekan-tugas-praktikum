<div class="content">
    <h2 style="margin-top: 70px;">Pengguna</h2>
    <div class="crud-pengguna">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Pengguna</th>
                <th>Role</th>
                <th>Edit</th>  
                <th>Hapus</th>                
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($data['pengguna'] as $pengguna): ?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $pengguna['username']; ?></td>
                    <!-- Pada bagian kolom "Nama Pengguna" -->
                    <td>
                        <?php
                        $id_user = $pengguna['id_user']; // Sesuaikan dengan nama kolom id_user di tabel
                        $dataUser = $this->model('Pengguna_model')->getDataUserById($id_user);

                        // Menggabungkan nama praktikan dan asisten dalam satu field
                        $nama_pengguna = $dataUser['nama_admin'] . ' ' . $dataUser['nama_praktikan'] . ' ' . $dataUser['nama_asisten'];
                        
                        echo $nama_pengguna;
                        ?>
                    </td>

                    <td><?= $pengguna['role']; ?></td>
                  
                    
                    <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
                    <td><a href="<?= BASEURL; ?>/pengguna/edit/<?= $user['id_user']; ?>"><i class="fa fa-pencil"></i> </a></td>
                    <td>
                <a href="<?= BASEURL; ?>/Pengguna/" onclick="hapusPengguna('<?= $pengguna['id_user']; ?>')">
                    <i class="fa fa-trash-can"></i>
                </a>
            </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

   
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

