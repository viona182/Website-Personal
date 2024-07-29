<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Household Furniture</title>
    <link rel="stylesheet" href="assets/css/sty.css"> <!-- Sesuaikan path jika diperlukan -->
</head>
<body>
    <body id="bg-login">
    <div class="box-login">
    <h2>DAFTAR AKUN BARU</h2>
    <form action="process_register.php" method="post">

    <div class="input-box">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br>
    </div>

    <div class="input-box">
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
    </div>


    <div class="input-box">
        <label for="alamat">Alamat</label><br>
        <input type="alamat" id="alamat" name="alamat" required><br>
    </div>

    <div class="input-box">
        <label for="no_telp">No Telepon</label><br>
        <input type="no_telp" id="no_telp" name="no_telp" required><br>
    </div>

    <div class="input-box">
        <label for="jenis_kelamin">Jenis Kelamin</label><br>
        <input type="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" required><br>
    </div>

    <div class="input-box">
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br>
    </div>

        <input type="submit" value="Daftar" class="btn">
        
    </form>
</body>
</html>
