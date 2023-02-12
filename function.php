<?php


$koneksi = mysqli_connect("localhost", "root", "", "lelang-online");
session_start();

function register($post)
{

    global $koneksi;
    $username = $post["username"];
    $alamat = $post["alamat"];
    $telp = $post["telp"];
    $email = $post["email"];
    $password = $post["password"];
    $password2 = $post["password2"];

    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username yang ada pilih tidak tersedia')
            </script>";

        return false;
    }


    if ($password != $password2) {
        echo "<script>
                alert('password anda tidak sama');
             </script>";
        return false;
    } else {
        $enkripsi = password_hash($post["password"], PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$alamat', '$telp' , '$email' , '$enkripsi')");
        if (mysqli_affected_rows($koneksi) == 1) {
            echo "<script>
                    alert('Berhasil Daftar!');
                    document.location.href = 'login.php';
                 </script>";
        } else {
            echo "<script>
                    alert('Daftar gagal');
                 </script>";
        }
    }
}


function login($post)
{
    global $koneksi;
    $username = $post["username"];
    $password = $post["password"];
    $table = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    $rows = mysqli_fetch_assoc($table);



    if (password_verify($password, $rows["password"])) {
        $_SESSION["login"] = $rows["id_user"];
        
        echo "
           <script>
                alert('anda berhasil login!');
                document.location.href = 'index.php';
           </script>
        ";
        exit;
    } else {
        echo "
           <script>
                alert('username atau password anda salah!');
                document.location.href = 'login.php';
           </script>
        ";
    }
}


function addBid($post)
{
    global $koneksi;

    $id_barang = $post["id_barang"];
    $id_user = $post["id_user"];
    $username = $post["username"];
    intval($harga_barang = $post["harga_barang"]);
    $bid = $post["nominal"];
    $tanggal = $post["tanggal"];

    if ($bid === $harga_barang) {
        mysqli_query($koneksi, "INSERT INTO tab_lelang VALUES('','$id_barang','$id_user','$username','$harga_barang','$bid','$tanggal')");
    } elseif ($bid > $harga_barang) {
        $harga_naik = $bid;
        mysqli_query($koneksi, "INSERT INTO tab_lelang VALUES('','$id_barang','$id_user','$username','$harga_naik','$bid','$tanggal')");
    } elseif ($bid < $harga_barang) {
        echo "
           <script>
                alert('bid anda dibawah harga');
           </script>
        ";
        return false;
    }
}

function tambah($post)
{
    global $koneksi;
    $id_user = $post["id_user"];
    $username = $post["username"];
    $merek = $post["merek"];
    $tipe = $post["tipe"];
    $thn_buat = $post["thn_buat"];
    $harga_awal = $post["harga_awal"];
    $tanggal_tutup = $post["tanggal_tutup"];
    $deskripsi = $post["deskripsi"];

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO produk VALUES ('', $id_user, '$username', '$merek', '$tipe', '$gambar', '$thn_buat', '$harga_awal', '$tanggal_tutup','$deskripsi')";
    mysqli_query($koneksi, $query);

    // var_dump($query);


    return mysqli_affected_rows($koneksi);
}

function upload() {
    $nama_file = $_FILES["gambar"]["name"];
    $tmp_file = $_FILES["gambar"]["tmp_name"];
    $size = $_FILES["gambar"]["size"];

    $ekstensiGambarValid = ['jpg','png','jpeg'];
    $ekstensiGambar = explode('.',$nama_file);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
        echo"
                <script>
                    alert('Yang anda masukkan bukan gambar!');
                </script>
            ";
        return false;
    }

    if ($size > 1000000) {
        echo"
                <script>
                    alert('ukuran gambar anda terlalu besar!');
                </script>
            ";
        return false;
    }

    move_uploaded_file($tmp_file,'properti/'.$nama_file);

    return $nama_file;
}

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
