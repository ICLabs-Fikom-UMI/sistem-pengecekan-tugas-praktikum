<div class="content">
    <h2 style="margin-top: 70px;">Pengguna</h2>
    <div class="crud-pengguna">
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Pengguna</th>
                <th>Role</th>
                <th>Reset Password</th>  
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
                    <!-- <td style="position: relative;"><a class="btn-crud" href="<?= BASEURL; ?>/pengguna/edit/<?= $user['id_user']; ?>"><i class="fa fa-pencil"></i> </a></td> -->
                    <td style="position: relative;">
    <a class="btn-crud" href="<?= BASEURL; ?>/pengguna/resetPassword/<?= $pengguna['id_user']; ?>" onclick="return confirm('Apakah Anda yakin ingin mereset password pengguna ini?')">
    <i class="fa fa-arrow-rotate-right"></i>
    </a>
</td>

                    
                    <td style="position: relative;">
                <a class="btn-crud" href="<?= BASEURL; ?>/Pengguna/" onclick="hapusPengguna('<?= $pengguna['id_user']; ?>')">
                    <i class="fa fa-trash-can"></i>
                </a>
            </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

   
</div>



