<?php
include '../assets/config.php';
$nik=$_GET['nik'];
$data=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pengguna WHERE nik='$nik'"));
if($data['status']=='Baru'){
	$status = "Not Yet Approved";
}
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
			<h1>Detail Pendaftar</h1>
			<div class="row">
				<div class="col-6 col-md-6 col-sm-6">
					<p class="card">NIK : <?= $data['nik'];?></p>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<p  class="card">Nama : <?= $data['name'];?></p>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<p  class="card">Alamat : <?= $data['alamat'];?></p>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<p  class="card">Tanggal Lahir : <?= $data['ttl'];?></p>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<p  class="card">Email : <?= $data['email'];?></p>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<p  class="card">Provinsi : <?= $data['provinsi'];?></p>
				</div>
				<div class="col-12 col-md-12 col-sm-12">
					<p  class="card" style="text-align: center;">Status : <?= $status;?></p>
				</div>
				<div class="col-12 col-md-12 col-sm-12">
					<a href="approve.php?nik=<?= $nik; ?>" class="btn btn-success" style="float: right;">Approved</a>
					<a href="unapprove.php?nik=<?= $nik; ?>" class="btn btn-warning" style="float: right;">Unapproved</a>
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