<?php
require __DIR__ . '/db.php';
$data = body();
$id = (int)($data['id'] ?? 0);
$nama = clean($data['nama'] ?? '');
$kota = clean($data['kota'] ?? '');
if ($id <= 0 || $nama === '' || $kota === '') reply(400, ['error' => 'Data tidak lengkap']);
$stmt = $conn->prepare('UPDATE pengguna SET nama = ?, kota = ? WHERE id = ?');
$stmt->bind_param('ssi', $nama, $kota, $id);
$stmt->execute() ? reply(200, ['ok' => true]) : reply(500, ['error' => 'Gagal memperbarui']);
