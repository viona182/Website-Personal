<?php
session_start(); // Memulai sesi
include 'database.php'; // Memasukkan file konfigurasi database
if(isset($_SESSION['user_id'])){
    $userid = $_SESSION['user_id'];}


if(isset($_POST['add_to_cart']) && isset($_SESSION['user_id'])) {
    $product_id = $_POST['product_id'];
    $cek = mysqli_query($conn, "SELECT * FROM shopping_cart WHERE user_id = '$userid' and product_id='$product_id'");
    $jml = mysqli_num_rows($cek);
    $row1 = mysqli_fetch_assoc($cek);
    $cekharga = mysqli_query($conn, "SELECT price FROM products WHERE id='$product_id'");
    $rowcekharga = mysqli_fetch_assoc($cekharga);
    if($jml > 0){
        //update
        $set = $row1['qty']+1;
        $q=$rowcekharga['price']*$set;
        $update = mysqli_query($conn, "UPDATE shopping_cart SET qty = '$set',jumlah='$q' WHERE product_id = '$product_id' and user_id = '$userid'");
        if($update){
            echo "
            <script>
            alert('BERHASIL UPDATE KERANJANG');
            window.location = '../Vionalisa_22101152610204_SI3_UAS/products.php';
            </script>
            ";
            die;
        }
    }else{
        $q= $rowcekharga['price'];
        $insert = mysqli_query($conn, "INSERT INTO shopping_cart(user_id,product_id,qty,harga,jumlah) VALUES('$userid','$product_id', '1','$q','$q' )");
        if($insert){
            echo "
            <script>
            alert('BERHASIL DITAMBAHKAN KE KERANJANG');
            window.location = '../Vionalisa_22101152610204_SI3_UAS/products.php';
            </script>
            ";
            die;
        }
    }

}
?>