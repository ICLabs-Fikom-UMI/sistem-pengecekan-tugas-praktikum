function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var navbar = document.querySelector('.navbar');
    var content = document.querySelector('.content');

    sidebar.classList.toggle('active');
    navbar.classList.toggle('active');
    content.classList.toggle('active');

    var sidebarWidth = sidebar.offsetWidth;

    if (sidebar.classList.contains('active')) {
        sidebar.style.left = '0';
        content.style.marginLeft = sidebarWidth + 'px';
    } else {
        sidebar.style.left = -sidebarWidth + 'px';
        content.style.marginLeft = '0';
    }
}




document.addEventListener('DOMContentLoaded', function() {
    var profileDropdown = document.getElementById('profileDropdown');
    
    // Fungsi untuk menampilkan atau menyembunyikan dropdown saat gambar profil diklik
    function toggleDropdown() {
        profileDropdown.classList.toggle('active');
    }

    // Menambahkan event listener untuk klik pada gambar profil
    profileDropdown.addEventListener('click', function(event) {
        event.stopPropagation(); // Mencegah penutupan dropdown saat gambar profil diklik
        toggleDropdown();
    });

    // Menutup dropdown saat dokumen di klik di tempat lain
    document.addEventListener('click', function() {
        if (profileDropdown.classList.contains('active')) {
            profileDropdown.classList.remove('active');
        }
    });
});
