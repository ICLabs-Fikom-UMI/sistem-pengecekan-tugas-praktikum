<script src="<?= BASEURL; ?>/js/javascript.js"></script>
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
    

    function search() {
    // Dapatkan nilai input pencarian
    var searchInput = document.getElementById("searchInput").value.toLowerCase();

    // Dapatkan semua elemen baris pada tabel di dalam tbody
    var tbodyRows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    // Loop melalui setiap baris dalam tbody
    for (var i = 0; i < tbodyRows.length; i++) {
        var isRowMatch = false;

        // Dapatkan sel dalam setiap kolom
        var cells = tbodyRows[i].getElementsByTagName("td");

        // Loop melalui setiap sel dalam baris tbody
        for (var j = 0; j < cells.length; j++) {
            var cellText = cells[j].textContent.toLowerCase() || cells[j].innerText.toLowerCase();
            if (cellText.includes(searchInput)) {
                isRowMatch = true;
                break; // Keluar dari loop jika ada kecocokan di salah satu sel
            }
        }

        // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
        tbodyRows[i].style.display = isRowMatch ? "" : "none";
    }
}


    function filterPraktikanByFrekuensi() {
    var selectedFrekuensi = document.getElementById('inputFrekuensi').value;
    var praktikanRows = document.querySelectorAll('.praktikan-row');

    praktikanRows.forEach(function(row) {
        var frekuensi = row.getAttribute('data-frekuensi');

        if (selectedFrekuensi === "" || selectedFrekuensi === "Semua" || selectedFrekuensi === frekuensi) {
            row.style.display = 'table-row'; // Tampilkan baris jika frekuensi cocok atau tidak ada yang dipilih
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika frekuensi tidak cocok
        }
    });
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
    var selectedFrekuensi = document.getElementById('pilihFrekuensi').value; // Mengambil nilai frekuensi yang dipilih
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

        function cariPaktikan() {
    // Dapatkan nilai-nilai dari elemen formulir
    var idMatkul = document.getElementById("inputNamaMatkul").value;
    var idFrekuensi = document.getElementById("inputFrekuensi").value;
    var idTugas = document.getElementById("pilihTugas").value;

    // Lakukan pengiriman data ke server dengan menggunakan XMLHttpRequest atau fetch API
    // Di sini Anda perlu menggunakan AJAX untuk mengirim data ke endpoint `<?= BASEURL; ?>/pengecekan/cari`
    // Anda dapat memilih untuk menggunakan XMLHttpRequest atau fetch API
    // Contoh menggunakan fetch API:
    fetch('<?= BASEURL; ?>/pengecekan/cari', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            id_matkul: idMatkul,
            id_frekuensi: idFrekuensi,
            id_tugas: idTugas,
        }),
    })
    .then(response => {
        // Handle respons dari server jika perlu
        return response.json();
    })
    .then(data => {
        // Lakukan sesuatu dengan data yang diterima dari server, misalnya memperbarui tabel praktikan
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function cariPengecekan() {
    // Mengambil nilai dari semua input formulir pencarian
    var id_matkul = document.getElementById('inputNamaMatkul').value;
    var id_frekuensi = document.getElementById('inputFrekuensi').value;
    var id_tugas = document.getElementById('pilihTugas').value;

    // Kirim permintaan ke server
    fetch(BASEURL + '/pengecekan/cari', {
        method: 'POST',
        body: JSON.stringify({ id_matkul: id_matkul, id_frekuensi: id_frekuensi, id_tugas: id_tugas }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Tampilkan data yang diterima ke dalam tabel HTML
        var tbody = document.querySelector('#data-table tbody');
        tbody.innerHTML = ''; // Mengosongkan isi tabel sebelum menambahkan data baru

        data.forEach((pengecekan, index) => {
            var row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${pengecekan.nim_praktikan}</td>
                    <td>${pengecekan.nama_praktikan}</td>
                    <td>
                        <select name="status" class="status-dropdown" id="status_${pengecekan.id_pengecekan}" onchange="updatePengecekan(this)">
                            <option value="" disabled selected>Pilih</option>
                            <option value="ACC">ACC</option>
                            <option value="Revisi">Revisi</option>
                        </select>
                    </td>
                    <td class="tgl_pengecekan">${pengecekan.tgl_pengecekan}</td>
                </tr>`;
            tbody.innerHTML += row;
        });
    })
    .catch(error => console.error('Error:', error));
}


function updatePengecekan(select) {
    var selectedValue = select.value;
    var row = select.closest('tr'); // Mendapatkan baris terdekat (closest) dari elemen select
    var tanggalPengecekanCell = row.querySelector('.tgl_pengecekan'); // Mendapatkan sel dengan kelas 'tgl_pengecekan'
    var customStatusInput = document.getElementById('customStatusInput');

    if (selectedValue === 'ACC' || selectedValue === 'Revisi') {
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleString(); // Konversi tanggal menjadi format yang sesuai

        // Isi nilai tanggal pengecekan dengan tanggal saat ini
        tanggalPengecekanCell.textContent = formattedDate;
        customStatusInput.style.display = 'none'; // Sembunyikan input teks jika opsi ACC atau Revisi dipilih
    } else if (selectedValue === 'Manual') {
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleString(); // Konversi tanggal menjadi format yang sesuai

        // Isi nilai tanggal pengecekan dengan tanggal saat ini
        tanggalPengecekanCell.textContent = formattedDate;
        customStatusInput.style.display = 'block'; // Tampilkan input teks jika opsi Manual dipilih
    } else {
        tanggalPengecekanCell.textContent = ''; // Kosongkan nilai tanggal pengecekan
        customStatusInput.style.display = 'none'; // Sembunyikan input teks jika opsi lainnya dipilih
    }
}

function togglePraktikanOptions() {
    var inputMatkul = document.getElementById("inputNamaMatkul");
    var inputFrekuensi = document.getElementById("inputFrekuensi");
    var inputTugas = document.getElementById("pilihTugas");
    var buttonCari = document.getElementById("btnCari");

    // Periksa apakah semua input sudah dipilih
    if (inputMatkul.value !== "" && inputFrekuensi.value !== "" && inputTugas.value !== "") {
        // Tampilkan opsi praktikan
        document.getElementById("selectPraktikan").style.display = "block";
    } else {
        // Sembunyikan opsi praktikan
        document.getElementById("selectPraktikan").style.display = "none";
    }
}

// Tambahkan event listener untuk setiap input yang berubah
document.getElementById("inputNamaMatkul").addEventListener("change", togglePraktikanOptions);
document.getElementById("inputFrekuensi").addEventListener("change", togglePraktikanOptions);
document.getElementById("pilihTugas").addEventListener("change", togglePraktikanOptions);
document.getElementById("btnCari").addEventListener("click", togglePraktikanOptions);

document.getElementById("btnCari").addEventListener("click", function() {
    // Cek apakah semua input sudah terisi
    var matkul = document.getElementById("inputNamaMatkul").value;
    var frekuensi = document.getElementById("inputFrekuensi").value;
    var tugas = document.getElementById("pilihTugas").value;

    if (matkul !== "" && frekuensi !== "" && tugas !== "") {
        document.getElementById("selectPraktikan").style.display = "block";
    } else {
        alert("Harap lengkapi semua input terlebih dahulu.");
    }
});

function editPengecekan(id_tugas) {
    // Aktifkan dropdown status
    var statusDropdown = document.getElementById('status_' + id_tugas);
    statusDropdown.disabled = false;
}

function simpanPengecekan(id_tugas) {
    // Nonaktifkan dropdown status
    var statusDropdown = document.getElementById('status_' + id_tugas);
    statusDropdown.disabled = true;
}


function populateAsisten() {
    var select = document.getElementById('inputFrekuensi');
    var selectedOption = select.options[select.selectedIndex];
    var dosenInput = document.getElementById('dosenInput');
    var asisten1Input = document.getElementById('asisten1Input');
    var asisten2Input = document.getElementById('asisten2Input');
    
    
    dosenInput.value = selectedOption.getAttribute('data-dosen');
    asisten1Input.value = selectedOption.getAttribute('data-asisten1');
    asisten2Input.value = selectedOption.getAttribute('data-asisten2');
}

function ubahdata(x){
      $('.modal-title').html('Ubah Data');
      let url = '<?= BASEURL?>/Asisten/ubahModal';
      $.post(url, {
        id : x
      }, function(data, success){
        $('.modal-body').html(data);
      });
  }

// Fungsi untuk memvalidasi formulir sebelum pengiriman
function validateForm() {
    // Ambil nilai dari input atau elemen formulir lainnya
    var idTugas = document.getElementById('pilihTugas').value;
    var idPraktikan = document.getElementById('inputIdPraktikan').value;
    var statusPengecekan = document.getElementById('inputStatusPengecekan').value;
    var tglPengecekan = document.getElementById('inputTglPengecekan').value;

    // Lakukan validasi sesuai kebutuhan
    if (idTugas === "" || idPraktikan === "" || statusPengecekan === "" || tglPengecekan === "") {
        alert("Harap lengkapi semua field sebelum mengirimkan formulir.");
        return false; // Mengembalikan false untuk mencegah pengiriman formulir jika ada field yang kosong
    }

    
    return true;
}
function getAsistenById(id) {
    var table = document.getElementById('tabel-asisten'); // Gantilah 'tabel-asisten' dengan ID tabel yang sesuai
    for (var i = 1; i < table.rows.length; i++) {
        if (table.rows[i].cells[0].innerText == id) { // Asumsikan ID asisten terdapat di kolom pertama tabel
            return {
                id_asisten: table.rows[i].cells[0].innerText,
                nim_asisten: table.rows[i].cells[1].innerText,
                nama_asisten: table.rows[i].cells[2].innerText,
                kelas: table.rows[i].cells[3].innerText,
                prodi: table.rows[i].cells[4].innerText
            };
        }
    }
    return null; // Return null jika tidak ditemukan data asisten dengan ID yang diberikan
}


function validateForm() {
    // Ambil nilai dari input
    var idMatkul = document.getElementById('inputNamaMatkul').value;
    var idFrekuensi = document.getElementById('inputFrekuensi').value;
    var idTugas = document.getElementById('pilihTugas').value;

    // Lakukan validasi, contoh:
    if (idMatkul === '' || idFrekuensi === '' || idTugas === '') {
        alert('Harap lengkapi semua bidang sebelum mengirimkan formulir.');
        return false; // Mencegah pengiriman formulir jika validasi gagal
    }

    return true; // Izinkan pengiriman formulir jika validasi berhasil
}


</script>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>