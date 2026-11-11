<?php
require __DIR__ . '/db.php';
$result = $conn->query('SELECT id, nama, kota FROM pengguna ORDER BY id');
reply(200, $result ? $result->fetch_all(MYSQLI_ASSOC) : []);
