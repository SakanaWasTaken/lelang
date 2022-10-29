<?php
include 'function.php';



if (isset($_POST["login"])) {
    login($_POST);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/login.css">

<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>Login to Lelang Online</h1>

                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style: italic;">Username / Password salah</p>
                <?php endif; ?>

                <label for="username">Username</label>
                <input type="text" placeholder="Enter Username" id="username" name="username" autofocus>

                <label for="">Password</label>
                <input type="password" placeholder="Enter Password" id="password" name="password" autofocus>

                <div><button Type="submit" name="login" class="log">log in</button></div>
                <div><button type="submit" formaction="daftar1.php" class="sign">Sign up</button></div>
            </form>
        </div>

    </div>
</body>

</html>