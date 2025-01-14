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
$nama = $data['nama'];
$kota = $data['kota'];

$sql = "INSERT INTO pengguna (nama, kota) VALUES ('$nama', '$kota')";
$conn->query($sql);
$conn->close();
?>