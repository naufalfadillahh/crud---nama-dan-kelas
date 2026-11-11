<?php
require __DIR__ . '/db.php';
$id = (int)(body()['id'] ?? 0);
if ($id <= 0) reply(400, ['error' => 'ID tidak valid']);
$stmt = $conn->prepare('DELETE FROM pengguna WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute() ? reply(200, ['ok' => true]) : reply(500, ['error' => 'Gagal menghapus']);
