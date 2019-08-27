<?php
include '../assets/config.php';
$data=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pengguna WHERE nik='".$_GET['nik']."'"));
$posisi=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mapping_pengguna WHERE nik='".$_GET['nik']."'"));
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
			<h1>Edit Anggota</h1>
			<div class="content" style="margin-top:0;">
				<form class="content-form" action="proses_anggota.php" method="POST">
				<label>NIK</label>
				<input type="hidden" name="nik" class="content-form-text" value="<?= $data['nik'];?>">
				<input type="text" name="nik" class="content-form-text" value="<?= $data['nik'];?>" disabled>
				<label>Nama</label>
				<input type="text" name="nama" class="content-form-text" value="<?= $data['name'];?>">
				<label>Tanggal Lahir</label>
				<input type="date" name="ttl" class="content-form-text" value="<?= $data['ttl'];?>">
				<label>Alamat</label>
				<textarea class="content-form-text" name="alamat"><?= $data['alamat'];?></textarea>
				<label>Provinsi</label>
				<input type="text" name="provinsi" class="content-form-text" value="<?= $data['provinsi'];?>">
				<label>Email</label>
				<input type="Email" name="email" class="content-form-text" value="<?= $data['email'];?>">
				<label>Password</label>
				<input type="password" name="password" class="content-form-text">
				<label>Status</label>
				<select class="content-form-text" name="status">
					<option value="Baru" <?php if ($data['status']=="Baru"){ echo "selected ";}?>>Baru</option>
					<option value="Approved" <?php if ($data['status']=="Approved"){ echo "selected ";}?>>Approved</option>
					<option value="Unapproved" <?php if ($data['status']=="Unapproved"){ echo "selected ";}?>>Unapproved</option>
				</select>
				<label>Hak Akses</label>
				<select class="content-form-text" name="akses">
					<option value="1" <?php if($posisi['id_posisi']==1) echo "selected"; ?>>Anggota</option>
					<option value="2" <?php if($posisi['id_posisi']==2) echo "selected"; ?>>Admin</option>
					<option value="3" <?php if($posisi['id_posisi']==3) echo "selected"; ?>>Ketua</option>
					<option value="4" <?php if($posisi['id_posisi']==4) echo "selected"; ?>>Sekre</option>
				</select>
				<input type="submit" name="edit" class="content-form-submit" value="Save">

			</form>
			<br>
				<br>
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