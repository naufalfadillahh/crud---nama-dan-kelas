<?php
// Koneksi bersama + helper respons JSON.
header('Content-Type: application/json; charset=utf-8');
mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli('localhost', 'root', '', 'kota_db');
if ($conn->connect_error) {
    http_response_code(500);
    exit(json_encode(['error' => 'Koneksi database gagal']));
}
$conn->set_charset('utf8mb4');

function body() {
    $data = json_decode(file_get_contents('php://input'), true);
    return is_array($data) ? $data : [];
}
function clean($s) {
    return mb_substr(trim(strip_tags((string)$s)), 0, 40);
}
function reply($code, $data) {
    http_response_code($code);
    exit(json_encode($data));
}
