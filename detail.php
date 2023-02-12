<?php

require 'function.php';

global $koneksi;

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

$id = $_GET["id"];
$barang = query("SELECT * FROM produk WHERE id_mobil='$id'");

$tanggalskrng = date("Y/m/d");


$hargaTinggi = query("SELECT MAX(bid) FROM tab_lelang WHERE id_barang=$id");
$bidder = (int)$hargaTinggi[0]["MAX(bid)"];
$pemenang = query("SELECT * FROM tab_lelang WHERE id_barang=$id AND bid=$bidder");
// var_dump($pemenang);


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
                        <p>Harga Awal : Rp. <?php echo $row["harga_awal"] ?>
                    </div>
                    <div class="info">
                        <p>Pelelang : <?php echo $row["username"] ?></p>
                        <p>Merek : <?php echo $row["merek"] ?></p>
                        <p>Tipe : <?php echo $row["tipe"] ?></p>
                        <p>Tahun buat : <?php echo $row["thn_buat"] ?></p>
                        <?php if ($tanggalskrng >= $row["tanggal_tutup"]) : ?>
                            <p style="color: red;">lelang sudah berakhir</p>
                        <?php else : ?>
                            <p>Tanggal berakhir :</p>
                            <p> <?= $row["tanggal_tutup"] ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ($tanggalskrng >= $row["tanggal_tutup"]) : ?>
                        <?php foreach ($pemenang as $key) : ?>
                            <p style="font-size: 20px; margin-left: 10px;">Pemenang : <?= $key["username"] ?></p>
                        <?php endforeach; ?>
                    <?php else :  ?>
                        <a href="ikut.php?id=<?= $row["id_mobil"] ?>" class="join" disabled>Join Lelang</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="infop">
                <div class="judul">Deskripsi Mobil</div>
                <div class="isi">
                    <p><?= $row["deskripsi"] ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>