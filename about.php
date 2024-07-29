<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa Household Furniture</title>
    <link rel="stylesheet" href="assets/css/sty.css"/>
</head>
<div class="header">
<p>
<img src="assets/images/banner.jpg" width="1137" height="200"/>
</p>
</div>
</div>
<div class="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Produk</a></li>
        <li><a href="cart.php">Keranjang</a></li>
        <li><a href="about.php">Tentang</a></li>
        <li><a href="contact.php">Kontak</a></li>
        <li><a href="register.php">Registrasi</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="profile.php">Profil</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        <li><a href="laporan_harian.php">Lap Harian</a></li>
        <li><a href="laporan_stok.php">Lap Stok</a></li>
    </ul>
</div>
<body>
<main>
<div class="content">
<div class="jarak">
<div class="border">
<section class="about-us">
            <h3>Tentang Kami</h3>
            <p>Perabotan rumah tangga adalah istilah yang digunakan untuk menyebut benda-benda yang digunakan dalam rumah untuk mendukung kegiatan sehari-hari penghuninya. Perabotan ini meliputi berbagai jenis barang mulai dari yang berfungsi untuk duduk, menyimpan barang, tidur, makan, dan lain sebagainya. Tujuan utamanya adalah untuk menciptakan lingkungan yang nyaman dan fungsional di dalam rumah.</p>
            <p>Misi perabotan rumah tangga secara umum adalah untuk meningkatkan kualitas hidup penghuninya dengan menyediakan kenyamanan, fungsionalitas, dan estetika dalam lingkungan rumah.</p>
            <p>Untuk informasi lebih lanjut tentang produk kami atau jika Anda memiliki pertanyaan, jangan ragu untuk <a href="contact.php">menghubungi kami</a>.</p>
        </section>
    </main>
    <div class="footer">
    <div class="jarak">
        <p>&copy; <?php echo date("Y"); ?> Aneka Perabotan Rumah Tangga. Semua hak dilindungi.</p>
    </div>
    </div>
</body>
</html>
