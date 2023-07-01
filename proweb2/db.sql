-- Tabel User
CREATE TABLE User (
  id_user INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  status ENUM('admin', 'member') NOT NULL
);

-- Tabel Jadwal
CREATE TABLE Jadwal (
  id_jadwal INT PRIMARY KEY AUTO_INCREMENT,
  mata_pelajaran VARCHAR(50) NOT NULL,
  hari VARCHAR(50) NOT NULL,
  waktu VARCHAR(50) NOT NULL
);

-- Tabel Tugas
CREATE TABLE Tugas (
  id_tugas INT PRIMARY KEY AUTO_INCREMENT,
  mata_pelajaran VARCHAR(50) NOT NULL,
  deskripsi TEXT NOT NULL,
  deadline DATE NOT NULL,
  img VARCHAR(100),
  status ENUM('selesai', 'belum selesai') NOT NULL,
  id_user INT,
  FOREIGN KEY (id_user) REFERENCES User(id_user)
);

-- Tabel Jadwal_Piket
CREATE TABLE Jadwal_Piket (
  id_jadwal_piket INT PRIMARY KEY AUTO_INCREMENT,
  hari VARCHAR(50) NOT NULL,
  id_user INT,
  FOREIGN KEY (id_user) REFERENCES User(id_user)
);

-- Tabel Pesan
CREATE TABLE Pesan (
  id_pesan INT PRIMARY KEY AUTO_INCREMENT,
  pengirim VARCHAR(50) NOT NULL,
  penerima VARCHAR(50) NOT NULL,
  isi_pesan TEXT NOT NULL
);


INSERT INTO User (username, password, status) VALUES
('admin1', 'admin123', 'admin'),
('member1', 'pass123', 'member'),
('admin2', 'admin456', 'admin'),
('member2', 'pass456', 'member'),
('admin3', 'admin789', 'admin'),
('member3', 'pass789', 'member'),
('admin4', 'admin101112', 'admin'),
('member4', 'pass101112', 'member'),
('admin5', 'admin131415', 'admin'),
('member5', 'pass131415', 'member');

INSERT INTO Jadwal (mata_pelajaran, hari, waktu) VALUES
('Matematika', 'Senin', '08:00 - 09:30'),
('Fisika', 'Selasa', '10:00 - 11:30'),
('Kimia', 'Rabu', '13:00 - 14:30'),
('Biologi', 'Kamis', '15:00 - 16:30'),
('Bahasa Indonesia', 'Jumat', '08:00 - 09:30'),
('Bahasa Inggris', 'Senin', '10:00 - 11:30'),
('Sejarah', 'Selasa', '13:00 - 14:30'),
('Geografi', 'Rabu', '15:00 - 16:30'),
('Ekonomi', 'Kamis', '08:00 - 09:30'),
('Sosiologi', 'Jumat', '10:00 - 11:30');


INSERT INTO Tugas (mata_pelajaran, deskripsi, deadline, img, status, id_user) VALUES
('Matematika', 'Kerjakan soal halaman 50-60.', '2023-07-10', NULL, 'belum selesai', 2),
('Fisika', 'Eksperimen gaya gesek', '2023-07-15', NULL, 'belum selesai', 3),
('Kimia', 'Presentasi unsur periode 3', '2023-07-12', NULL, 'belum selesai', 4),
('Biologi', 'Penelitian hewan langka', '2023-07-18', NULL, 'belum selesai', 5),
('Bahasa Indonesia', 'Buat esai tema kehidupan', '2023-07-11', NULL, 'belum selesai', 1),
('Bahasa Inggris', 'Listening practice', '2023-07-14', NULL, 'belum selesai', 2),
('Sejarah', 'Diskusi tentang revolusi industri', '2023-07-13', NULL, 'belum selesai', 3),
('Geografi', 'Penelitian fenomena alam', '2023-07-16', NULL, 'belum selesai', 4),
('Ekonomi', 'Analisis pasar modal', '2023-07-12', NULL, 'belum selesai', 5),
('Sosiologi', 'Studi kasus interaksi sosial', '2023-07-17', NULL, 'belum selesai', 1);

INSERT INTO Jadwal_Piket (hari, id_user) VALUES
('Senin', 1),
('Selasa', 2),
('Rabu', 3),
('Kamis', 4),
('Jumat', 5),
('Senin', 2),
('Selasa', 3),
('Rabu', 4),
('Kamis', 5),
('Jumat', 1);

INSERT INTO Pesan (pengirim, penerima, isi_pesan) VALUES
('admin1', 'member1', 'Halo, ada yang bisa saya bantu?'),
('member1', 'admin1', 'Saya memiliki pertanyaan tentang tugas.'),
('admin2', 'member2', 'Selamat pagi! Ada yang perlu saya bantu?'),
('member2', 'admin2', 'Apakah jadwal mata pelajaran berubah?'),
('admin3', 'member3', 'Hai, ada yang bisa saya bantu?'),
('member3', 'admin3', 'Bagaimana cara mengumpulkan tugas?'),
('admin4', 'member4', 'Ada yang bisa saya bantu?'),
('member4', 'admin4', 'Saya kesulitan dengan tugas matematika.'),
('admin5', 'member5', 'Apakah ada yang perlu saya bantu?'),
('member5', 'admin5', 'Apakah ada jadwal piket minggu depan?');
