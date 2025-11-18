-- 1. Buat Database
CREATE DATABASE IF NOT EXISTS tp_mvc25;
USE tp_mvc25;

-- ========================================================
-- 2. Tabel Dosen (Lecturers)
-- ========================================================
DROP TABLE IF EXISTS `lecturers`;
CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Isi Data Dummy Dosen (Total 4 Data)
INSERT INTO `lecturers` (`id`, `name`, `nidn`, `phone`, `join_date`) VALUES
(1, 'Dr. Amanda Zahra', '12345', '08111', '2020-01-01'),
(2, 'Prof. Dr. Eko Kurniawan, M.Kom', '99887766', '081299887766', '2015-08-01'),
(3, 'Dian Sastrowardoyo, M.T.I', '55443322', '085655443322', '2022-02-14'),
(4, 'Fajar Nugraha, S.T., M.Sc.', '11221122', '081311221122', '2021-11-10');

-- ========================================================
-- 3. Tabel Mata Kuliah (Courses)
-- ========================================================
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `credits` int(2) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_lecturer` (`lecturer_id`),
  CONSTRAINT `fk_course_lecturer` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Isi Data Dummy Mata Kuliah (Total 4 Data)
INSERT INTO `courses` (`id`, `course_name`, `credits`, `lecturer_id`) VALUES
(1, 'Pemrograman Web', 3, 1),
(2, 'Kecerdasan Buatan (AI)', 3, 2),
(3, 'Desain Pengalaman Pengguna (UI/UX)', 3, 3),
(4, 'Keamanan Jaringan', 4, 4);

-- ========================================================
-- 4. Tabel Riwayat Pendidikan (Educations)
-- ========================================================
DROP TABLE IF EXISTS `educations`;
CREATE TABLE `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `institution` varchar(100) NOT NULL COMMENT 'Nama Kampus',
  `degree` varchar(10) NOT NULL COMMENT 'S1/S2/S3',
  `major` varchar(100) NOT NULL COMMENT 'Jurusan',
  `grad_year` int(4) NOT NULL COMMENT 'Tahun Lulus',
  `lecturer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_edu_lecturer` (`lecturer_id`),
  CONSTRAINT `fk_edu_lecturer` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Isi Data Dummy Pendidikan (Total 5 Data)
INSERT INTO `educations` (`id`, `institution`, `degree`, `major`, `grad_year`, `lecturer_id`) VALUES
(1, 'ITB', 'S1', 'Teknik Informatika', 2015, 1),
(2, 'UGM', 'S2', 'Ilmu Komputer', 2018, 1),
(3, 'Institut Teknologi Sepuluh Nopember', 'S3', 'Teknik Informatika', 2014, 2),
(4, 'Universitas Indonesia', 'S2', 'Manajemen Teknologi', 2020, 3),
(5, 'Nanyang Technological University', 'S2', 'Computer Engineering', 2019, 4);