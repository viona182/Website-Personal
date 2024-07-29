<!DOCTYPE html>
<html>
<head>
    <title>Laporan Users</title>
    <link rel="stylesheet" type="text/css" href="assets/css/lis.css">
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>

<h1>Laporan Users</h1>
<button onclick="printReport()">Cetak Laporan</button>

<?php
include 'database.php';

$sql = "SELECT u.username, u.email, u.alamat, u.no_telp, u.jenis_kelamin  FROM users u";

$result = $conn->query($sql);

echo "<h2>Data-data users</h2>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>Username</th><th>Email</th><th>Alamat</th><th>No Telepon</th><th>Jenis Kelamin</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $row["alamat"]. "</td><td>" . $row["no_telp"]. "</td><td>" . $row["jenis_kelamin"]. "</td></tr>";
}
    echo "</table>";
} else {
    echo "Tidak ada data users.";
}
?>

</body>
</html>
