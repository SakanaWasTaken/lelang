<?php

// include 'function.php';
$koneksi = mysqli_connect("localhost", "root", "", "lelang-online");

$result = mysqli_query($koneksi, "SELECT * FROM produk");


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lelang</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <?php $id = $row["id_mobil"] ?>
            <div class="itembox">
                <img src="properti/<?php echo $row["gambar"] ?>" alt="">
                <a href="detail.php?id=<?php echo $id ?>" class="namabrg"><?php echo $row["merek"] ?> <?php echo $row["tipe"] ?></a>
                <p class="hargabrg">Rp. <?php echo $row["harga_awal"] ?></p>
                <p class="nama">Pelelang : <?php echo $row["username"] ?></p>
                <p class="tanggal">Berakhir pada <?php echo $row["tanggal_tutup"] ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>