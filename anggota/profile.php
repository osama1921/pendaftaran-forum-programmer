<?php
include '../assets/config.php';
session_start();

if (empty($_SESSION['nik'])) {
header("location:../index.html");
}
$nik=$_SESSION['nik'];
$querypengguna=mysqli_query($kon, "SELECT * FROM pengguna WHERE nik='$nik'");
$querymapping=mysqli_query($kon, "SELECT * FROM mapping_pengguna WHERE nik='$nik'");
$datapengguna=mysqli_fetch_array($querypengguna);
$datamapping=mysqli_fetch_array($querymapping);
$dataposisi=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM posisi WHERE id_posisi='".$datamapping['id_posisi']."'"));
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
			<h1>Profile</h1>
				<?php
				if (!empty($_GET['update'])) { ?>
				<form class="content-form" action="proses_update.php"  method="POST" >
				<label>NIK</label>
				<input type="text" name="nik" class="content-form-text" placeholder="NIK" disabled value="<?= $datapengguna['nik'];?>">
				<input type="hidden" name="nik" class="content-form-text" placeholder="NIK" required value="<?= $datapengguna['nik'];?>">
				<label>Nama</label>
				<input type="text" name="nama" class="content-form-text" placeholder="Nama" required value="<?= $datapengguna['name'];?>">
				<label>Tanggal Lahir</label>
				<input type="date" name="ttl" class="content-form-text" required value="<?= $datapengguna['ttl'];?>">
				<label>Alamat</label>
				<textarea placeholder="Alamat" class="content-form-text" name="alamat" required><?= $datapengguna['alamat'];?></textarea>
				<label>Provinsi</label>
				<input type="text" name="provinsi" class="content-form-text" placeholder="Provinsi" required value="<?= $datapengguna['provinsi'];?>">
				<label>Email</label>
				<input type="Email" name="email" class="content-form-text" placeholder="email" required value="<?= $datapengguna['email'];?>">
				<input type="submit" name="update" class="content-form-submit" value="Register">
			</form>
				<?php }else { ?>
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
				<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">Alamat</p>
						<p class="card-text"><?= $datapengguna['alamat'];?></p>
					</div>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">E-mail</p>
						<p class="card-text"><?= $datapengguna['email'];?></p>
					</div>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">Provinsi</p>
						<p class="card-text"><?= $datapengguna['provinsi'];?></p>
					</div>
				</div>
				<div class="col-6 col-md-6 col-sm-6">
					<div class="card">
						<p class="card-header">Posisi</p>
						<p class="card-text"><?= $dataposisi['posisi'];?></p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-sm-12">
					<a href="?update='1'" class="btn btn-warning">Update Profile</a>
				</div>				
			</div>
		</div>
		<?php } ?>
<script type="text/javascript">
	$(".btni").on("click",function(){
		$('.menu').toggleClass("show");
	});
</script>
</body>
</html>