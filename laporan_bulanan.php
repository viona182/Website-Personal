<!DOCTYPE html>

<html>
<head>
    <title>Laporan Transaksi Bulanan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/sa.css">
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <h1>Laporan Transaksi Bulanan</h1>
    <form method="get" id="form-input">
        <select id="bulan" name="bulan">
            
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <label for="tahun">Pilih Tahun:</label>
        <input type="number" id="tahun" name="tahun" value="<?php echo isset($_GET['tahun']) ? $_GET['tahun'] : date('Y'); ?>">
        <br><br>
        <label for="pimpinan">Nama Pimpinan:</label>
        <input type="text" id="pimpinan" name="pimpinan" value="<?php echo isset($_GET['pimpinan']) ? $_GET['pimpinan'] : ''; ?>">
        <br><br>
        <button type="submit">Tampilkan</button>
    </form>
    <button onclick="printReport()">Cetak Laporan</button>

   <?php
include 'database.php';

// Cek apakah bulan dan tahun telah dipilih
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$pimpinan = isset($_GET['pimpinan']) ? $_GET['pimpinan'] : '';

$bulan_tahun = $tahun . '-' . $bulan;


if ($bulan && $tahun) {
    // Jika bulan dan tahun dipilih, tampilkan orders berdasarkan bulan dan tahun
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
        DATE_FORMAT(time, '%Y-%m') = ?
    ");
    $sql->bind_param('s', $bulan_tahun);
    echo "<h2>Transaksi pada bulan $bulan-$tahun</h2>";
} else {
    // Jika tidak ada bulan yang dipilih, tampilkan semua orders
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

// Debugging: Menampilkan jumlah transaksi yang ditemukan
echo "<p>Ditemukan: " . $result->num_rows . " transaksi</p>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Order</th><th>User ID</th><th>Status</th><th>Alamat</th><th>Tanggal</th><th>Total Harga</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["user_id"]. "</td><td>" . $row["status"]. "</td><td>" . $row["alamat"]. "</td><td>" . $row["time"]. "</td><td>" . $row["total_price"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada transaksi pada bulan ini.";
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
