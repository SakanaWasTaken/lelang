<?php

require 'function.php';
global $koneksi;

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

$id_user = (int)$_SESSION["login"];
$table_username = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
$row_username = mysqli_fetch_assoc($table_username);
$username = $row_username["username"];

if (isset($_POST["submit"])) {
    if (tambah($_POST)) {
        echo "<script>
                alert('Barang berhasil Dimasukan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Barang gagal Dimasukan')
              </script>";
    }
}



// var_dump($id_user)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/mulai.css">
</head>

<body>
    <div class="judul">
        <h1>Mulai Lelang Anda</h1>
    </div>
    <div class="wadah">
        <form action="mulai.php" method="POST" enctype="multipart/form-data">
            <div class="bebas">
                <div class="input-box">
                    <label for="username">Masukan Nama Pelelang</label><br>
                    <input type="hidden" name="id_user" value=<?= $id_user ?>>
                    <input type="text" name="username" id="username" name="username" value="<?= $username ?>">
                </div>
                <div class="input-box">
                    <label for="merek">Merek</label><br>
                    <input type="text" name="merek" id="merek" name="merek">
                </div>
                <div class="input-box">
                    <label for="tipe">Tipe</label><br>
                    <input type="text" name="tipe" id="tipe" class="tipe">
                </div>
                <div class="input-box">
                    <label for="thn_buat">Tahun buat</label><br>
                    <input type="text" name="thn_buat" id="thn_buat" class="tipe">
                </div>
                <div class="input-box">
                    <label for="harga">Masukan Harga</label><br>
                    <input type="text" name="harga_awal" id="harga_awal" class="harga">
                </div>
                <div class="input-box" id="tgl-tutup">
                    <label for="tanggal">Tanggal Lelang berakhir</label><br>
                    <input type="date" name="tanggal_tutup" id="tanggal_tutup">
                </div>
                <div class="desc">
                    <label for="deskripsi">Deskripsi barang</label><br>
                    <textarea name="deskripsi" id="deskripsi"></textarea>
                </div>
                <div class="input-box">
                    <label for="gambar">Gambar</label><br>
                    <input type="file" name="gambar" id="gambar" class="gambar">
                </div>
                <button class="button" type="submit" name="submit">Mulai Lelang</button>
            </div>
        </form>
    </div>
</body>

</html>