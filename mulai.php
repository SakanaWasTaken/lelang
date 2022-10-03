<?php

require 'function.php';

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>alert('Barang berhasil Dimasukan')</script>";
    } else {
        echo "<script>alert('Barang gagal Dimasukan')</script>";
    }
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

<body>
    <form action="" method="post">
        <div>
            <label for="username">Masukan Nama Pelelang</label>
            <input type="text" name="username" id="username" name="username">
        </div>
        <div>
            <label for="merek">Merek</label>
            <input type="text" name="merek" id="merek" name="merek">
        </div>
        <div>
            <label for="tipe">Tipe</label>
            <input type="text" name="tipe" id="tipe" class="tipe">
        </div>
        <div>
            <label for="gambar">gambar</label>
            <input type="text" name="gambar" id="gambar" class="gambar">
        </div>
        <div>
            <label for="thn_buat">Tahun buat</label>
            <input type="text" name="thn_buat" id="thn_buat" class="tipe">
        </div>
        <div>
            <label for="harga">Masukan Harga</label>
            <input type="text" name="harga_awal" id="harga_awal" class="harga">
        </div>
        <div>
            <label for="tanggal">Tanggal Lelang berakhir</label>
            <input type="date" name="tanggal_tutup" id="tanggal_tutup">
        </div>
        <button type="submit" name="submit">Mulai Lelang</button>
    </form>
</body>

</html>