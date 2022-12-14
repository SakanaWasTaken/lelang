<?php

require 'function.php';
$koneksi;

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

$id_user = $_SESSION["login"];
$table_username = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
$row_username = mysqli_fetch_assoc($table_username);
$username = $row_username["username"];
$id_mobil = $_GET["id"];

if (isset($_POST["submit"])) {
    addBid($_POST);
}

$peserta = mysqli_query($koneksi, "SELECT id_user FROM user");

// sebelum ngebid check dulu si user ini yg login udh ngebid apa belum nah disini misalnya gua bikin variabel asal namanya check_bid nah nanti variabel ini di check di bagian tr nya (liat ke bawah)
$check_Bid = mysqli_query($koneksi, "SELECT * FROM tab_lelang WHERE id_user=$id_user");
// var_dump($check_Bid);
// var_dump($id_user);
// die;
$result = query("SELECT * FROM tab_lelang WHERE id_barang='$id_mobil'");
$mobil =  query("SELECT * FROM produk WHERE id_mobil='$id_mobil'");
// $newbid = $post["nominal"];

$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$timestamp = $dt->format('Y-m-d G:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/ikut.css">

<body>
    <div class="container">
        <a href="index.php" class="judul">Lelang Online</a>
        <header>
            <?php foreach ($mobil as $row) : ?>
                <div class="info">
                    <p><?php echo $row["merek"] ?> <?php echo $row["tipe"] ?></p>
                    <p><?php echo $row["username"] ?></p>
                    <p><?php echo $row["tanggal_tutup"] ?></p>
                </div>
                <img src="properti/<?php echo $row["gambar"] ?>" alt="">
                <p class="hrg">Harga awal : Rp. <?php echo $row["harga_awal"] ?></p>
            <?php endforeach; ?>
        </header>
        <div class="bid">
            <table class="tabel" cellspacing="0" cellpadding="10">
                <tr>
                    <th bgcolor="lightblue">NAMA</th>
                    <th bgcolor="lightblue">TANGGAL</th>
                    <th bgcolor="lightblue">BID</th>
                </tr>
                <?php foreach ($result as $key) : ?>
                    <tr>
                        <td><a href="propil.php?page=profile&id_lelang=<?= $key["id_user"] ?>"><?= $key["username"] ?></a></td>
                        <td><?= $key["tanggal"] ?></td>
                        <td>Rp. <?= $key["bid"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <form action="" method="post">
            <?php foreach ($mobil as $key) : ?>
                <div class="masukbid">
                    <input type="hidden" name="id_barang" value="<?= $key["id_mobil"] ?>">
                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                    <input type="hidden" name="harga_barang" value="<?= $key["harga_awal"] ?>">
                    <input type="hidden" name="username" value="<?= $username ?>">
                    <input type="hidden" name="tanggal" value="<?= $timestamp ?>">
                    <input type="text" placeholder="Masukan Bid Anda" name="nominal" autofocus>
                    <button type="submit" name="submit">Masukan Bid</button>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</body>

</html>