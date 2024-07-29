<?php
session_start(); // Memulai sesi
include 'database.php'; // Memasukkan file konfigurasi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Lisa Household Furniture</title>
    <link rel="stylesheet" href="assets/css/sty.css"> <!-- Sesuaikan path jika diperlukan -->
</head>
<body>

    <main>
        <section id="featured-products">
            <h2>Produk Household Furniture</h2>
            <div class="products">
                <?php
                $query = "SELECT * FROM products";
                $result = $conn->query($query);
                foreach ($result as $data)
                {
                    echo '<div class="product">';
                    echo '<img src="assets/images/'. $data['image']. '" alt="'. $data['name']. '">';
                    echo '<h3>'. $data['name']. '</h3>';
                    echo '<p>'. $data['description']. '</p>';
                    echo '<p>'."Rp. ". number_format($data['price']). '</p>';
                    if(isset($_SESSION['user_id'])){
                    echo '<form method="post" action="cart_action.php">';
                    echo '<input type="hidden" name="product_id" value="' . $data['id'] . '">';
                            echo '<button type="submit" name="add_to_cart" class="button">Tambah ke Keranjang</button>';
                        }else{
                            echo 'Silahkan login untuk menambah produk ini';
                        }
                    echo '</form>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>
</body>
</html>
