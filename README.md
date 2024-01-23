# SISTEM PENGECEKAN TUGAS PRAKTIKUM
> [!NOTE]
> NURUL AZMI 13020210066

### Deskripsi Aplikasi
#### Masalah Umum:
1. **Ketidakjelasan Status Pengumpulan Tugas:**
   - Praktikan merasa tugas sudah dikumpulkan, tetapi asisten tidak memiliki informasi yang jelas terkait pengumpulan tersebut.
   - Kejadian ini seringkali menimbulkan ketidakpastian dan pertentangan antara praktikan dan asisten.

#### Tujuan Aplikasi:
1. **Mempermudah Komunikasi:**
   - Menciptakan platform yang memfasilitasi komunikasi antara praktikan dan asisten praktikum.
   - Meminimalkan ketidakjelasan terkait status tugas yang sudah dikumpulkan.

2. **Rekapan Tugas:**
   - Memungkinkan praktikan melihat rekapan tugas yang sudah mereka kumpulkan dan diterima oleh asisten.
   - Memberikan visibilitas terhadap status tugas, baik yang sudah diterima maupun yang memerlukan revisi.

3. **Input Tugas oleh Asisten:**
   - Memberikan kemudahan bagi asisten untuk mengimput tugas yang sudah diterima ke dalam sistem.
   - Memastikan bahwa data terkait tugas praktikum tersedia secara akurat dan up-to-date di dalam aplikasi.

4. **Pencegahan Pertentangan:**
   - Mengurangi kemungkinan konflik antara praktikan dan asisten dengan memberikan transparansi terhadap status tugas.
   - Membantu mengatasi ketidaksepahaman yang mungkin muncul terkait pengumpulan dan penerimaan tugas.

5. **Notifikasi:**
   - Memberikan notifikasi kepada praktikan ketika tugas mereka sudah diimput oleh asisten.
   - Meningkatkan komunikasi instan dan memastikan praktikan mendapatkan informasi terbaru.

6. **Histori Rekaman:**
   - Menyimpan riwayat tugas praktikan untuk referensi masa depan.
   - Memudahkan asisten dan praktikan untuk melacak perkembangan dan pengumpulan tugas dari waktu ke waktu.

Dengan mencapai tujuan-tujuan tersebut, diharapkan aplikasi dapat memberikan solusi efektif terhadap masalah umum yang dihadapi dalam proses praktikum, serta meningkatkan transparansi dan efisiensi dalam manajemen tugas praktikan.

#### Teknologi Yang Digunakan
- PHP
- HTML
- CSS

### Fitur MVP Aplikasi
- Login (All User)
- Logout (All User)
- CRUD data Dosen (Admin)
- CRUD data mata kuliah (Admin)
- CRUD data asisten (Admin)
- CRUD data Frekuensi (Admin)
- Tugas Lengkap yang sudah divalidasi oleh asisten (Admin dan asisten)
- View Profile Praktikan (All User)
- view frekuensi (All User)
- view all praktikan (Admin dan Asisten)
- CRUD tugas praktikum (Asisten)
- View Tugas praktikum (Asisten dan Praktikan)
- validasi atau proses pengecekan tugas (Asisten)
- view hasil pengecekan tugas (praktikan)
- Edit Profile Praktikan (admin dan praktikan)
- Ganti password (praktikan)


### Penjelasan Mengenai Arsitektur MVC
Model-View-Controller (MVC) adalah pola desain arsitektur perangkat lunak yang digunakan untuk mengorganisir struktur dalam pengembangan aplikasi. Arsitektur ini terdiri dari tiga komponen utama: Model, View, dan Controller.

Model:

Model mewakili data dan logika aplikasi. Ini bertanggung jawab untuk memanipulasi data dan memberikan informasi kepada View atau menerima instruksi dari Controller untuk memperbarui dirinya sendiri.
Model tidak tergantung pada View atau Controller, sehingga dapat digunakan ulang dengan mudah dalam berbagai konteks.

View:

View menangani tampilan atau antarmuka pengguna. Ini mewakili presentasi data dan dapat menampilkan informasi dari Model kepada pengguna atau menerima input pengguna.
View dapat berupa elemen grafis seperti tombol, teks, tabel, atau halaman web, tergantung pada jenis aplikasi yang dikembangkan.

Controller:

Controller bertindak sebagai perantara antara Model dan View. Ini menginterpretasikan input pengguna dari View dan memprosesnya, seringkali dengan memperbarui Model atau menginstruksi View untuk melakukan perubahan tampilan.
Controller memisahkan logika bisnis dari tampilan, memungkinkan pengembang untuk dengan mudah mengubah tampilan atau logika tanpa memengaruhi satu sama lain.


### LINK UML [Click here](https://github.com/NurulAzmi0066/SIPETA-UML-ERD.git)
### LINK ERD [Click here](https://github.com/NurulAzmi0066/SIPETA-UML-ERD.git)
### LINK UI/UX [Click here](https://github.com/NurulAzmi0066/SIPETA-UI-UX.git)


> [!CAUTION]
> PHP VERSION 8.3.2
