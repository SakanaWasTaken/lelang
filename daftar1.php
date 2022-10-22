<?php

require 'function.php';

mysqli_query($koneksi, "SELECT * FROM tab_user");

if (isset($_POST["register"])) {
    register($_POST);
};



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/daftar1.css">

<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <div class="title">
                    <h1>Wellcome to lelang online</h1>
                </div>
                <div class="input-box">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-box">
                    <label for="">Masukan Alamat</label>
                    <input type="text" name="alamat" placeholder="Masukan Alamat">
                </div>
                <div class="input-box">
                    <label for="">Nomer Telpon</label>
                    <input type="text" name="telp" placeholder="Masukan Nomer Telpon">
                </div>
                <div class="input-box">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Enter email">
                </div>
                <div class="input-box">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter Password">
                </div>
                <div class="input-box">
                    <label for="">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="password2">
                </div>
                <button class="sign" type="submit" name="register">Sign in</button>
                <button class="cancel" formaction="login.php">Cancel</button>

            </form>
        </div>

    </div>
</body>

</html>