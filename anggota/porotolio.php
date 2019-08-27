<?php
include '../assets/config.php';
session_start();

if (empty($_SESSION['nik'])) {
header("location:../index.html");
}
$nik=$_SESSION['nik'];
$query=mysqli_query($kon, "SELECT * FROM portofolio WHERE nik='$nik'");
$querypengguna=mysqli_query($kon, "SELECT * FROM pengguna WHERE nik='$nik'");
$dataportofolio=mysqli_fetch_array($query);
$datapengguna=mysqli_fetch_array($querypengguna);
$cek=mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../admin/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">

	</style>
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
		<a href="porotolio.php">Upload Portofolio</a>
		<a href="profile.php">Profile</a>
		<a href="logout.php">Log Out</a>
	</div>
</div>
		<div class="content w1" style="color: black;">
			<h1>Portofolio</h1>
				<?php
				if ($cek==0) { 
					include 'tambah_protofolio.php';
				 }else{ 
				 	if (empty($_GET['update'])) {
				 	?>
			<div class="row">
		<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">NIK</p>
						<p class="card-text"><?= $datapengguna['nik'];?></p>
					</div>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">Nama</p>
						<p class="card-text"><?= $datapengguna['name'];?></p>
					</div>
				</div>
					
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Bidang Keahlian</p>
						<p class="card-text"><?= $dataportofolio['bidang_keahlian'];?></p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Sertifikasi Pelatihan</p>
						<p class="card-text"><?= $dataportofolio['sertifikasi_pelatihan'];?></p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Riwayat Pelatihan</p>
						<p class="card-text"><?= $dataportofolio['riwayat_pelatihan'];?></p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-sm-12" style="margin-top: 10px;">
					<div class="card">
						<p class="card-header">Riwayat Project</p>
						<p class="card-text"><?= $dataportofolio['riwayat_project'];?></p>
					</div>
				</div>	
				<div class="col-12 col-md-12 col-sm-12">
					<a href="?update='1'" class="btn btn-warning">Update</a>
				</div>			
			</div>

				<?php 
			}else{
				include 'editportofolio.php';
			}
			}
				?>
		</div>
<script type="text/javascript">
	$(".btni").on("click",function(){
		$('.menu').toggleClass("show");
	});
</script>
</body>
</html>