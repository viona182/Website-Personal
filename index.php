<?php
session_start(); 
include 'database.php';
?>

<DOCTYPE! html>
<html>
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
<div class="menu">
	<ul>
		<li><a href="index.php">Beranda</a></li>
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
        <li><a href="laporan_harian.php">Lp_Harian</a></li>
        <li><a href="laporan_stok.php">Lp_Stok</a></li>
        <li><a href="laporan_users.php">Lp_User</a></li>
        <li><a href="laporan_bulanan.php">Lp_Bulanan</a></li>
        
    
	</ul>
</div>
<div class="content">
	<h2><marquee>SELAMAT DATANG DI TOKO LISA HOUSEHOLD FURNITURE</marquee></h2>

	<main>
        <section id="featured-products">
            
            <div class="products">
                <?php
                // Query untuk mendapatkan produk unggulan
                $query = "SELECT * FROM products LIMIT 3";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='assets/images/" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["name"]) . "'>";
                        echo "<h3>" . htmlspecialchars($row["name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                        echo "<p>Rp" . htmlspecialchars($row["price"]) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Tidak ada produk unggulan saat ini.</p>";
                }
                ?>
            </div>
        </section>
    </main></div>	

<div class="footer">
    <div class="jarak">
        <p>&copy; <?php echo date("Y"); ?> Aneka Perabotan Rumah Tangga. Semua hak dilindungi.</p>
    </div>
</body>
</html>