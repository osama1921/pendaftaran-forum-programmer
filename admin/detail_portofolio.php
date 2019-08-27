<?php
include '../assets/config.php';
$nik=$_GET['nik'];
$data=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pengguna WHERE nik='$nik'"));
$portofolio=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM portofolio WHERE nik='$nik'"));
session_start();
if (empty($_SESSION['nik'])) {
header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../admin/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="navbar">
	<div class="logo">
	<p><a href="index.html">Asosiasi Programmer</a></p>
	</div>
	<div class="btni">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<div class="menu">
	<a href="menu.php">Dashboard</a>
		<a href="anggota.php">Anggota</a>
		<a href="portofolio.php">Portofolio</a>
		<a href="pendaftar.php">Pendaftar</a>
		<a href="logout.php">Log Out</a>

	</div>
</div>
		<div class="content w1" style="color: black;">
			<h1>Detail Portofolio</h1>
			<div class="row">
				<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">NIK</p>
						<p class="card-text"><?= $data['nik'];?></p>
					</div>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">Nama</p>
						<p class="card-text"><?= $data['name'];?></p>
					</div>
				</div>
					
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Bidang Keahlian</p>
						<p class="card-text"><?= $portofolio['bidang_keahlian'];?></p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Sertifikasi Pelatihan</p>
						<p class="card-text"><?= $portofolio['sertifikasi_pelatihan'];?></p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Riwayat Pelatihan</p>
						<p class="card-text"><?= $portofolio['riwayat_pelatihan'];?></p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Riwayat Project</p>
						<p class="card-text"><?= $portofolio['riwayat_project'];?></p>
					</div>
				</div>				
				<div class="col-12 col-md-12 col-sm-12">
					<a href="portofolio.php" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
<script type="text/javascript">
	$(".btni").on("click",function(){
		$('.menu').toggleClass("show");
	});
</script>
</body>
</html>