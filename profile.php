<?php
session_start();
require 'database.php'; // Pastikan database.php terhubung dengan benar

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM users WHERE id = '$userId'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("Pengguna tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Household Furniture</title>
    <style>
        body {
            background: #27AE60;
            font-family: sans-serif;
            background: #0F844B;
            background: linear-gradient(45deg,#ff357a, #0f844b);
        }

        h2 {
            color: #fff;
            text-align: center;
        }

        .profil {
            padding: 1em;
            margin: 2em auto;
            width: 17em;
            background: #98FB98;
            border-radius: 30px;

        }

        label {
            font-size: 12pt;
            color: #27AE60;
        }

        input[type="email"],
        textarea {
            padding: 8px;
            width: 95%;
            border-radius: 40px;
            background: #fff;
            border: 5;
            font-size: 10pt;
            margin: 6px 0px;
            background: #0F844B;
            background: linear-gradient(45deg,#ff357a, #0f844b);
        }
        .btn{
            width: 95%;
            padding: 7px 12px;
            background: #0F844B;
            background: linear-gradient(45deg,#ff357a, #0f844b);
            border: none;
            color: #fff;
            border: 5;
            cursor: pointer;
            border-radius: 40px;
        }
        .btn:hover{
            background: #036635;
            color: #333;
        }


    </style>
</head>
<body>
    <body id="bg-login">
    <div class="box-login">
    <h2>Profil Pengguna</h2>
    <div class="Profil">
    <form action="update_profile.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
        
        <!-- Tambahkan field lain sesuai kebutuhan -->
        
        <input type="submit" value="Update Profil" class="btn">
    </form>
</body>
</html>