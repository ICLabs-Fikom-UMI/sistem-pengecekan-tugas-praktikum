<!-- View profile.php -->
<!-- views/praktikan/profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Praktikan</title>
    <!-- Tambahkan stylesheet atau link CSS Anda di sini -->
</head>
<body>
    <h1>Profil Praktikan</h1>
    <div>
        <label>NIM Praktikan:</label>
        <span><?php echo $data['praktikan']['nim_praktikan']; ?></span>
    </div>
    <div>
        <label>Nama Praktikan:</label>
        <span><?php echo $data['praktikan']['nama_praktikan']; ?></span>
    </div>
    <div>
        <label>Jenis Kelamin:</label>
        <span><?php echo $data['praktikan']['jk']; ?></span>
    </div>
    <div>
        <label>Program Studi:</label>
        <span><?php echo $data['praktikan']['prodi']; ?></span>
    </div>
    <div>
        <label>Email:</label>
        <span><?php echo $data['praktikan']['email']; ?></span>
    </div>
    <div>
        <label>No. HP:</label>
        <span><?php echo $data['praktikan']['no_hp']; ?></span>
    </div>
    <!-- Tambahkan tag HTML dan PHP lainnya sesuai kebutuhan -->
</body>
</html>
