<?php

include "function.php";

if (isset($_SESSION["login"])) {
    $id_user = $_SESSION["login"];
    $users = query("SELECT * FROM user WHERE id_user=$id_user");
}

if (isset($_GET["id_lelang"])) {
    $id_user = $_GET["id_lelang"];
    // var_dump($id_user);
    $users = query("SELECT * FROM user WHERE id_user=$id_user");
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/propil.css">
</head>

<body>
    <div class="contain">
        <div class="pic">
            <img src="properti/202-2024792_profile-icon-png.png" alt="">
        </div>
        <div class="data">
        </div>
    </div>
    <div class="informasi">
        <div class="isi">
            <?php foreach ($users as $user) : ?>
                <p>Nama : <?= $user["username"] ?></p>
                <p>Alamat : <?= $user["alamat"]  ?></p>
                <p>Telpon : <?= $user["no_telp"] ?></p>
                <p>Email : <?= $user["email"] ?></p>
            <?php endforeach; ?>
        </div>

    </div>
</body>

</html>