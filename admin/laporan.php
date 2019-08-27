<?php
session_start();
if (empty($_SESSION['nik'])) {
header("location:index.php");
}
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
		<a href="laporan.php">Laporan</a>
		<a href="logout.php">Log Out</a>
	</div>
</div>
	<div class="content w1" style="color: black;">
			<h1>Laporan</h1>
			<div class="row">
					<table class="table table-responsive table-hover">
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
						<tr>
							<td>1</td>
							<td>1</td>
							<td>sa</td>
							<td><a href="detail_portofolio.php" class="btn btn-info">Detail</a><a href="hapus_portofolio.php" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
						</tr>
					</table>
			</div>
		</div>
<script type="text/javascript">
	$(".btni").on("click",function(){
		$('.menu').toggleClass("show");
	});
</script>
</body>
</html>