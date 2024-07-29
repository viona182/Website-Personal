<?php
session_start();
include 'database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['checkout']) && isset($_POST['alamat'])) {
    $user_id = $_POST['user_id'];
    $abc = $_POST['total_bayar'];
    $alamat = $conn->real_escape_string($_POST['alamat']);

    $sql = "SELECT SUM(products.price) AS total_price FROM shopping_cart
            INNER JOIN products ON shopping_cart.product_id = products.id
            WHERE shopping_cart.user_id = $user_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_price = $row['total_price'];

       
        $query = "INSERT INTO orders (user_id, total_price, alamat) VALUES ($user_id, $abc, '$alamat')";
        
        if ($conn->query($query) === TRUE) {
            
            $deleteCartQuery = "DELETE FROM shopping_cart WHERE user_id = $user_id";
            if ($conn->query($deleteCartQuery) === TRUE) {
                echo "
                <script>
                alert('Produk telah di checkout dan keranjang belanja dikosongkan!');
                window.location = 'products.php';
                </script>
                ";
            } else {
                echo "Proses gagal";
            }
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Keranjang belanja Anda kosong atau terjadi kesalahan.";
    }
} else {
    echo "Alamat pengiriman harus diisi!";
}
?>
