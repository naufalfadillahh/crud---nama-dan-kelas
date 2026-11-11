<?php
require __DIR__ . '/db.php';
$data = body();
$nama = clean($data['nama'] ?? '');
$kota = clean($data['kota'] ?? '');
if ($nama === '' || $kota === '') reply(400, ['error' => 'Nama dan kota wajib diisi']);
$stmt = $conn->prepare('INSERT INTO pengguna (nama, kota) VALUES (?, ?)');
$stmt->bind_param('ss', $nama, $kota);
$stmt->execute() ? reply(200, ['ok' => true, 'id' => $stmt->insert_id]) : reply(500, ['error' => 'Gagal menyimpan']);
