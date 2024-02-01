<script src="<?= BASEURL; ?>/js/javascript.js"></script>
<script>
    function search() {
        // Dapatkan nilai input pencarian
        var searchInput = document.getElementById("searchInput").value.toLowerCase();

        // Dapatkan semua elemen baris pada tabel
        var rows = document.getElementsByTagName("tr");

        // Loop melalui setiap baris
        for (var i = 0; i < rows.length; i++) {
            var isRowMatch = false;

            // Dapatkan sel dalam setiap kolom
            var cells = rows[i].getElementsByTagName("td");

            // Loop melalui setiap sel
            for (var j = 0; j < cells.length; j++) {
                var cellText = cells[j].textContent.toLowerCase() || cells[j].innerText.toLowerCase();
                if (cellText.includes(searchInput)) {
                    isRowMatch = true;
                    break; // Keluar dari loop jika ada kecocokan di salah satu sel
                }
            }

            // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
            rows[i].style.display = isRowMatch ? "" : "none";
        }
    }

    function updateFrekuensiOptions() {
    var selectedMatkul = document.getElementById('inputNamaMatkul').value;
    var frekuensiOptions = document.getElementsByClassName('frekuensi-option');

    for (var i = 0; i < frekuensiOptions.length; i++) {
        var option = frekuensiOptions[i];
        var optionMatkul = option.getAttribute('data-matkul');

        if (selectedMatkul === optionMatkul || selectedMatkul === "") {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    }
}

function updateTugasOptions() {
        var selectedFrekuensi = document.getElementById('inputFrekuensi').value;
        var tugasOptions = document.getElementsByClassName('tugas-option');

        for (var i = 0; i < tugasOptions.length; i++) {
            var option = tugasOptions[i];
            var optionFrekuensi = option.getAttribute('data-frekuensi');

            if (selectedFrekuensi === optionFrekuensi || selectedFrekuensi === "") {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }
    }

    function hapus(id) {
        var isConfirmed = confirm('Anda yakin ingin menghapus?');
        if (isConfirmed) {
            window.location.href = '<?= BASEURL; ?>/Asisten/hapus/' + id;
        }
    }
    function hapusDosen(id) {
        var isConfirmed = confirm('Anda yakin ingin menghapus?');
        if (isConfirmed) {
            window.location.href = '<?= BASEURL; ?>/Dosen/hapus/' + id;
        }
    }

    function hapusFrekuensi(id) {
        var isConfirmed = confirm('Anda yakin ingin menghapus?');
        if (isConfirmed) {
            window.location.href = '<?= BASEURL; ?>/Frekuensi/hapus/' + id;
        }
    }

    function hapusTugas(id) {
        var isConfirmed = confirm('Anda yakin ingin menghapus?');
        if (isConfirmed) {
            window.location.href = '<?= BASEURL; ?>/Tugas/hapus/' + id;
        }
    }

    function hapusMatkul(id) {
        var isConfirmed = confirm('Anda yakin ingin menghapus?');
        if (isConfirmed) {
            window.location.href = '<?= BASEURL; ?>/Matakuliah/hapus/' + id;
        }
    }

    function hapusPengguna(id) {
        var isConfirmed = confirm('Anda yakin ingin menghapus?');
        if (isConfirmed) {
            window.location.href = '<?= BASEURL; ?>/Pengguna/hapus/' + id;
        }
    }

    function hapusPraktikan(id) {
        var isConfirmed = confirm('Anda yakin ingin menghapus?');
        if (isConfirmed) {
            window.location.href = '<?= BASEURL; ?>/Praktikan/hapus/' + id;
        }
    }

    function updateTingkatSemester() {
            var semesterDropdown = document.getElementById("inputSemester");
            var tingkatSemesterDropdown = document.getElementById("inputTingkatSemester");

            // Clear existing options
            tingkatSemesterDropdown.innerHTML = "";

            // Get selected semester value
            var selectedSemester = semesterDropdown.value;

            // Populate Tingkat Semester based on the selected semester
            if (selectedSemester === "Ganjil") {
                for (var i = 1; i <= 7; i += 2) {
                    var option = document.createElement("option");
                    option.value = i;
                    option.text = i;
                    tingkatSemesterDropdown.add(option);
                }
            } else if (selectedSemester === "Genap") {
                for (var i = 2; i <= 8; i += 2) {
                    var option = document.createElement("option");
                    option.value = i;
                    option.text = i;
                    tingkatSemesterDropdown.add(option);
                }
            }
        }

        // Call the function initially to set default values
        updateTingkatSemester();

    
</script>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>