<div class="content">
    <h2>Pengguna</h2>
    <div class="crud-pengguna">
        <a href="#" class="crud tambah-crud" onclick="openTambahModal()">Tambah <i class="fa fa-folder-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <!-- <th>Nama Pengguna</th> -->
                <th>Role</th>
                <th>Edit</th>  
                <th>Hapus</th>                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['pengguna'] as $pengguna): ?>
                <tr>
                    <td><?= $pengguna['username']; ?></td>
                    <td><?= $pengguna['role']; ?></td>
                  
                    
                    <!-- Tambahkan link atau tombol Edit dan Hapus di sini -->
                    <td><a href="<?= BASEURL; ?>/pengguna/edit/<?= $user['id_user']; ?>"><i class="fa fa-pencil"></i> </a></td>
                    <td><a href="<?= BASEURL; ?>/pengguna/hapus/<?= $user['id_user']; ?>" onclick="return confirm('Anda yakin ingin menghapus?');"><i class="fa fa-trash-can"></i></a></td>
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

