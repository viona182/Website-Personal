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

$total_bayar = 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Checkout</title>
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
        .header {
            background: linear-gradient(45deg,#0f844b, #ff357a);
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background: linear-gradient(45deg,#0f844b, #ff357a);
        }
        tr:nth-child(even) {background-color: #f9f9f9;}
        textarea {
            width: 100%;
            height: 200px;
            padding: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: linear-gradient(45deg,#0f844b, #ff357a);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #27AE60;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Halaman Checkout</h1>
    </div>
    <div class="container">
        <h2>Detail</h2>
        <form method="post" action="checkout_action.php">
            <table>
                <thead>
                    <tr>
                        <th>Rincian Produk</th>
                        <th>Rincian Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row["name"]); ?></td>
                                <td>Rp<?= number_format($row["jumlah"], 2, ',', '.'); ?></td>
                            </tr>
                            <?php $total_bayar += $row["jumlah"]; ?>
                        <?php endwhile; ?>
                        <tr>
                            <td><strong>Total Bayar</strong></td>
                            <td><strong>Rp<?= number_format($total_bayar, 2, ',', '.'); ?></strong></td>
                        </tr>
                    <?php else: ?>
                        <tr><td colspan='2'>Belum ada produk yang ditambahkan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <input type="hidden" name="total_bayar" value="<?= $total_bayar ?>">
            <textarea id="alamat" name="alamat" placeholder="Masukkan alamat pengiriman Anda..." required autofocus></textarea>
            <button type="submit" name="checkout">Bayar</button>
        </form>
    </div>
</body>
</html>
