<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "household_furniture_online"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$jenis_kelamin = $_POST['jenis_kelamin'];



$sql = "INSERT INTO users (username, email, password, alamat, no_telp, jenis_kelamin) VALUES ('$username', '$email', '$password', '$alamat', '$no_telp', '$jenis_kelamin')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
