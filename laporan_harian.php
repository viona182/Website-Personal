<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Harian</title>
    <link rel="stylesheet" type="text/css" href="assets/css/sa.css">
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>

<h1>Laporan Transaksi Harian</h1>
<form method="get" id="form-input">
    <label for="tanggal">Pilih Tanggal:</label>
    <input type="date" id="bulan" name="bulan" value="<?php echo isset($_GET['bulan']) ? $_GET['bulan'] : date('Y-m-d'); ?>">
    <br><br>
    <label for="pimpinan">Nama Pimpinan:</label>
    <input type="text" id="pimpinan" name="pimpinan" value="<?php echo isset($_GET['pimpinan']) ? $_GET['pimpinan'] : ''; ?>">
    <br><br>
    <button type="submit">Tampilkan</button>
</form>
<button onclick="printReport()">Cetak Laporan</button>

<?php
include 'database.php';

// Cek apakah tanggal telah dipilih
$tanggal = isset($_GET['bulan']) ? $_GET['bulan'] : date('Y-m-d');
$pimpinan = isset($_GET['pimpinan']) ? $_GET['pimpinan'] : '';



if ($tanggal) {
    // Jika tanggal dipilih, tampilkan orders berdasarkan tanggal
    $sql = $conn->prepare("
    SELECT 
    orders.id,
    orders.user_id,
    orders.status,
    orders.alamat,
    orders.time,
    orders.total_price
    FROM 
        orders
    WHERE 
        DATE(time) = ?
    ");
    $sql->bind_param('s', $tanggal);
    echo "<h2>Transaksi pada $tanggal</h2>";
} else {
    // Jika tidak ada tanggal yang dipilih, tampilkan semua orders
    $sql = $conn->prepare("
    SELECT 
        id AS order_id,
        user_id,
        status,
        alamat,
        time,
        total_price
    FROM 
        orders
    ");
    echo "<h2>Semua Transaksi</h2>";
}

if (!$sql) {
    die("Query preparation failed: " . $conn->error);
}

$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Order</th><th>User ID</th><th>Status</th><th>Alamat</th><th>Tanggal</th><th>Total Harga</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . (isset($row["id"]) ? $row["id"] : 'N/A') . "</td><td>" . (isset($row["user_id"]) ? $row["user_id"] : 'N/A') . "</td><td>" . (isset($row["status"]) ? $row["status"] : 'N/A') . "</td><td>" . (isset($row["alamat"]) ? $row["alamat"] : 'N/A') . "</td><td>" . (isset($row["bulan"]) ? $row["bulan"] : 'N/A') . "</td><td>" . (isset($row["total_price"]) ? $row["total_price"] : 'N/A') . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada transaksi pada tanggal ini.";
}

if ($pimpinan) {
    echo "<div class='signature'>";
    echo "<h3>Disetujui oleh:</h3>";
    echo "<p><strong>$pimpinan</strong></p>";
    echo "<br><br>";
    echo "<p>_______________________</p>";
    echo "<p>Tanda Tangan</p>";
    echo "</div>";
}

$conn->close();
?>

</body>
</html>
