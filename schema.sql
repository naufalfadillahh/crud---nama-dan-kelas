CREATE DATABASE IF NOT EXISTS kota_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kota_db;
CREATE TABLE IF NOT EXISTS pengguna (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(40) NOT NULL,
  kota VARCHAR(40) NOT NULL
);
INSERT INTO pengguna (nama, kota) VALUES ('Andi', 'Bogor'), ('Budi', 'Depok'), ('Citra', 'Jakarta');
