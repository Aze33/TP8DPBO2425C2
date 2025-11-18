# Janji

Saya Zahran Zaidan Saputra dengan NIM 2415429 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain Pemrograman Berorientasi Objek (DPBO) untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# 🪄 Fitur Utama

Aplikasi ini mendukung fungsionalitas CRUD (Create, Read, Update, Delete) penuh untuk tiga entitas utama:

* **CRUD Lecturers:** Menambah, melihat, mengubah, dan menghapus data dosen (termasuk fitur melihat ringkasan riwayat pendidikan di tabel utama).
* **CRUD Courses:** Menambah, melihat, mengubah, dan menghapus data mata kuliah beserta penugasan dosen pengampu.
* **CRUD Educations:** Menambah, melihat, mengubah, dan menghapus data riwayat pendidikan dosen.

# ↔️ Relasi Database

Sistem ini menggunakan database relasional dengan skema sebagai berikut:

* **Lecturers ke Courses (1-N):** Satu dosen dapat mengampu banyak mata kuliah (One-to-Many). Tabel `courses` memiliki foreign key `lecturer_id`.
* **Lecturers ke Educations (1-N):** Satu dosen dapat memiliki banyak riwayat pendidikan (One-to-Many). Tabel `educations` memiliki foreign key `lecturer_id`.

# 🔮 Struktur Proyek
```text
TP_MVC/
│
├── 📂 assets/                  # Menyimpan file statis (Resource Frontend)
│   ├── 📂 css/
│   │   └── bootstrap.min.css   # Framework CSS untuk styling 
│   └── 📂 js/
│       ├── bootstrap.bundle.min.js
│       ├── bootsrap.min.js
│       ├── jquery.min.js
│       └── popper.min.js
│
├── 📂 config/                  # Konfigurasi Sistem
│   └── database.php            # Class koneksi ke database MySQL (menggunakan MySQLi)
│
├── 📂 controllers/             # [CONTROLLER] Pengendali Alur
│   ├── LecturerController.php  # Mengatur CRUD data Dosen
│   ├── CourseController.php    # Mengatur CRUD data Mata Kuliah
│   └── EducationController.php # Mengatur CRUD data Riwayat Pendidikan
│
├── 📂 models/                  # [MODEL] Akses Data & Query Database
│   ├── Lecturer.php            # Query SQL untuk tabel 'lecturers'
│   ├── Course.php              # Query SQL untuk tabel 'courses'
│   └── Education.php           # Query SQL untuk tabel 'educations'
│
├── 📂 views/                   # [VIEW] Antarmuka Pengguna (User Interface)
│   ├── 📂 includes/            # Komponen UI parsial (Reusable)
│   │   └── navbar.php          # Navigasi menu utama
│   ├── 📂 lecturers/           # Tampilan modul Dosen
│   │   ├── index.php           # Tabel data dosen
│   │   ├── create.php          # Form tambah dosen
│   │   └── edit.php            # Form edit dosen
│   ├── 📂 courses/             # Tampilan modul Mata Kuliah
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   └── 📂 educations/          # Tampilan modul Riwayat Pendidikan
│       ├── index.php
│       ├── create.php
│       └── edit.php
│
├── db_mvc.sql                  # File dump database SQL untuk instalasi
├── index.php                   # [ROUTER] Entry point utama aplikasi
└── README.md                   # Dokumentasi teknis proyek
```

# 🎨 Desain Program
<img width="847" height="503" alt="image" src="https://github.com/user-attachments/assets/169739c9-d74a-4635-b031-f92ea898fced" />


# 🛣️ Alur Program

**1. Entry Point (Routing)**
Semua interaksi pengguna berpusat pada file index.php.

* Tugas utamanya adalah membaca parameter ?mod= (modul) dan ?action= (aksi) dari URL.
* Router menangkap parameter mod (modul), action (aksi), dan id.
* Berdasarkan parameter mod, router memilih Controller mana yang akan dijalankan (apakah LecturerController, CourseController, atau EducationController).

**2. Config (Konfigurasi)**

* database.php: Class yang bertanggung jawab membuat koneksi ke database MySQL menggunakan mysqli.

**3. Models (Model - Akses Data)**
Bertanggung jawab untuk semua interaksi langsung dengan database (Query SQL).

* Lecturer.php: Berisi query CRUD untuk tabel lecturers. Menggunakan query khusus (GROUP_CONCAT & JOIN) untuk mengambil ringkasan riwayat pendidikan dosen dalam satu baris.
* Course.php: Berisi query CRUD untuk tabel courses. Melakukan LEFT JOIN ke tabel lecturers untuk mendapatkan nama dosen pengampu.
* Education.php: Berisi query CRUD untuk tabel educations. Melakukan LEFT JOIN ke tabel lecturers untuk mendapatkan nama dosen pemilik riwayat tersebut.

**4. Controllers**
Bertindak sebagai "otak" aplikasi yang menghubungkan Model (Data) dan View (Tampilan).

* LecturerController.php: Mengatur logika untuk menampilkan daftar dosen, memproses input tambah/edit dosen, dan menghapus data dosen.
* CourseController.php: Mengatur logika CRUD mata kuliah. Controller ini juga memanggil LecturerModel untuk menyediakan data dosen pada fitur dropdown (pilihan) saat menambah/mengedit mata kuliah.
* EducationController.php: Mengatur logika CRUD riwayat pendidikan. Sama seperti Course, ini juga memanggil LecturerModel untuk keperluan dropdown pemilihan dosen.

**5. Views (View - Antarmuka Pengguna)**

Berisi file HTML yang disisipi PHP untuk menampilkan data kepada pengguna.

* **includes**  : Menyimpan potongan layout yang digunakan berulang, seperti navbar.php.
* **lecturers** : Folder khusus tampilan modul Dosen (index, create, edit).
* **courses**   : Folder khusus tampilan modul Mata Kuliah.
* **educations**: Folder khusus tampilan modul Riwayat Pendidikan.


