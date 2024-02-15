<div class="content" style="margin-left:40%;">
    <div>
        <h2 style="margin-top:30%;">Ubah Kata Sandi</h2>

        <form id="changePasswordForm" action="<?= BASEURL; ?>/Pengguna/ubahPassword" method="POST">
            <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
            <label for="new_password">Password Baru:</label>
            <input style="width:300px;" type="password" name="new_password" id="new_password">
            <label for="confirm_password">Konfirmasi Password:</label>
            <input style="width:300px;" type="password" name="confirm_password" id="confirm_password">
            <div style="margin-top: 30px;">
                <button type="button" style="width:100px;" onclick="validatePassword()">Simpan</button>
                <a href="<?= BASEURL; ?>" class="kembali">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    function validatePassword() {
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (newPassword !== confirmPassword) {
            alert("Konfirmasi password tidak cocok. Mohon periksa kembali.");
            return false;
        }

        if (newPassword.length < 8) {
            alert("Password harus memiliki setidaknya 8 karakter.");
            return false;
        }

        // Jika semua validasi berhasil, submit formulir
        document.getElementById("changePasswordForm").submit();
    }
</script>
