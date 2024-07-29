<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


include 'database.php'; 


$user_id = $_SESSION['user_id'];

$sql = "SELECT shopping_cart.*, products.* FROM shopping_cart
        INNER JOIN products ON shopping_cart.product_id = products.id
        WHERE shopping_cart.user_id = $user_id";
$result = $conn->query($sql);
$no = 1;

if(isset($_GET['del'])){
    $product_id = $_GET['id'];
    $del = mysqli_query($conn, "DELETE FROM shopping_cart WHERE user_id='$user_id' and product_id='$product_id'");
    if($del){
        echo "
        <script>
        alert('1 PRODUK DIHAPUS');
        window.location = 'cart.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa Household Furniture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: linear-gradient(45deg,#ff357a, #0f844b);
        }
        tr:nth-child(even) {background-color: #27AE60;}
        a {
            text-decoration: none;
            color: #27AE60;
        }
        a:hover {
            color: #27AE60;
        }
        .header {
            background: linear-gradient(45deg,#ff357a, #0f844b);
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .add-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #27AE60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-btn:hover {
            background-color: #27AE60;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Keranjang Belanja</h1>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Foto</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Action</th>   
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["name"]); ?></td>
                            <td><img src="assets/images/<?= htmlspecialchars($row["image"]); ?>" alt="" width="100px" height="100px"></td>
                            
                            <td><?= number_format($row["qty"], 2, ',', '.'); ?></td>
                            <td>Rp<?= number_format($row["price"], 2, ',', '.'); ?></td>
                            <td>Rp.<?= number_format($row['price'] * $row['qty']);  ?></td>
                            <td><button><a href="cart.php?del=1&id=<?= $row['product_id']; ?>" onclick="return confirm('Yakin ingin dihapus ?')">Delete</a></button></td>
                            
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan='3'>Belum ada produk yang ditambahkan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <br>

      <button type="submit"  class="button"> <a href="checkout.php">Checkout</a></button>
      <button type="submit"  class="button"> <a href="index.php">Kembali ke Home</a></button>
      <button type="submit"  class="button"> <a href="products.php">Tambah Keranjang</a></button>
    </div>
</body>
</html>
