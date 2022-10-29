<?php

require 'function.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

$id = $_GET["id"];
$barang = query("SELECT * FROM produk WHERE id_mobil='$id'");


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/detail.css">

<body>
    <?php $i = 1; ?>
    <header class="lelang">
        <h1>Lelang Online</h1>
    </header>
    <?php foreach ($barang as $row) : ?>
        <div>
            <div class="gambar">
                <div>
                    <img src="properti/<?php echo $row["gambar"] ?>" alt=""><br>
                    <img src="properti/<?php echo $row["gambar"] ?>" alt="">
                </div>
                <div class="content">
                    <div class="detail">
                        <p>Brand : <?php echo $row["merek"] ?></p>
                        <p>Tipe : <?php echo $row["tipe"] ?></p>
                        <p>Harga Awal : <?php echo $row["harga_awal"] ?></p>
                    </div>
                    <div class="info">
                        <p>Pelelang : <?php echo $row["username"] ?></p>
                        <p>Merek : <?php echo $row["merek"] ?></p>
                        <p>Tipe : <?php echo $row["tipe"] ?></p>
                        <p>Tahun buat : <?php echo $row["thn_buat"] ?></p>
                        <p>Tanggal berakhir : <?php echo $row["tanggal_tutup"] ?></p>
                    </div>
                    <a href="ikut.php?id=<?= $row["id_mobil"] ?>" class="join">Join Lelang</a>
                </div>
            </div>
            <div class="infop">
                <div class="judul">Deskripsi Mobil</div>
                <div class="isi">
                    <p>Warna merah, perawatan bagus</p>
                    <!-- <p>Kontak : 093928932</p> -->
                    <!-- <p>Email : nama@gmail.com</p> -->
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>