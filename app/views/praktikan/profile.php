<!-- View profile.php -->
<div class="content">
    <h2 style="margin-top: 70px;">Profil Praktikan</h2>
    <div class="profile-info">
        <p><strong>NIM Praktikan:</strong> <?= $data['praktikan']['nim_praktikan']; ?></p>
        <p><strong>Nama Praktikan:</strong> <?= $data['praktikan']['nama_praktikan']; ?></p>
        <p><strong>Role:</strong> Praktikan</p>
        <p><strong>Frekuensi:</strong> <?= $data['praktikan']['nama_frekuensi']; ?></p>
    </div>
    <div class="buttons">
        <a href="<?= BASEURL; ?>/Praktikan/edit/<?= $data['praktikan']['id_praktikan']; ?>" class="btn-edit">Edit Profil</a>
        <a href="<?= BASEURL; ?>/Praktikan" class="btn-back">Kembali</a>
    </div>
</div>
