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

    
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>