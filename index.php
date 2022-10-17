<?php

require 'function.php';


if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$id_user = $_SESSION["login"];
$user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
$row_username = mysqli_fetch_assoc($user);

?>


<!DOCTYPE html>
<html>

<head>
	<title>Lelang</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- menghubungkan dengan file jquery -->
	<script type="text/javascript" src="jquery.js"></script>
</head>

<body>

	<div class="content">
		<header>
			<div class="column">
				<div class="logo">
					<img src="properti/logole.png" alt="rusak nih">
				</div>
				<div class="cari">
					<input type="text" placeholder="Search">
				</div>
				<div class="pp">
					<a href="propil.php?page=profile"><img src="properti/202-2024792_profile-icon-png.png" alt=""></a>
				</div>
			</div>
		</header>

		<div class="menu">
			<ul>
				<li><a href="logout.php">logout</a></li>
				<!-- <li><a href="daftar1.php?page=signin">sign up</a></li> -->
				<li><a href="about.php?page=about">about</a></li>
				<li><a href="index.php?page=home">HOME</a></li>
			</ul>
		</div>
		<a href="mulai.php?id=<?php $id_user ?>" class="buat">
			<img src="properti/icons8-plus-48.png" alt="Buat Lelang">
			<span>buat lelang baru</span>
		</a>

		<div class="badan">
			<?php
			if (isset($_GET['page'])) {
				$page = $_GET['page'];

				switch ($page) {
					case 'home':
						include "home.php";
						break;
					case 'about':
						include "about.php";
						break;
						// case 'daftar':
						// 	include "daftar.php";
						// 	break;
					case 'profile':
						include "propil.php";
						break;
					default:
						echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
						break;
				}
			} else {
				include "home.php";
			}

			?>

		</div>
	</div>
</body>

</html>