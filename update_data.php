<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kota_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$nama = $data['nama'];
$kota = $data['kota'];

$sql = "UPDATE pengguna SET nama='$nama', kota='$kota' WHERE id=$id";
$conn->query($sql);
$conn->close();
?>