<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Household Furniture</title>
    <link rel="stylesheet" href="assets/css/sty.css"> <!-- Sesuaikan path jika diperlukan -->
</head>
<body>
    <body id="bg-login">
    <div class="box-login">
    <h2>LOGIN</h2>
    <form action="process_login.php" method="post">

        <div class="input-box">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br>
        </div>

        <div class="input-box">
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br>
        </div>
        
        <input type="submit" value="Login" class="btn">

        <div class="register-link">
            <p>Belum punya akun? <a href="register.php">Silahkan daftar akun baru</a> </p>
        </div>
    </form>
    
</div>
</body>
</body>
</html>
