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
		<a href="pendaftar.php">Pendaftar</a>
		<a href="portofolio.php">Portofolio</a>
		<a href="anggota.php">Anggota</a>
		<a href="logout.php">Log Out</a>
	</div>
</div>
		<div class="content w1" style="color: black;">
			<h1>Data Anggota</h1>
			<div class="row">
				<table class="table table-responsive table-hover">
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
						<tr>
							<?php
						$no=1;
						include '../assets/config.php';

							$query=mysqli_query($kon, "SELECT * FROM pengguna WHERE status='Approved'");
						while ($dataanggota=mysqli_fetch_array($query)) { 
							?>
							<td><?= $no++;?></td>
							<td><?= $dataanggota['nik'];?></td>
							<td><?= $dataanggota['name'];?></td>
							<td><?= $dataanggota['alamat'];?></td>
							<td><?= $dataanggota['email'];?></td>
							<td><?= $dataanggota['status'];?></td>
							<td><a href="hapus_anggota.php?nik=<?= $dataanggota['nik'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
						</tr>
					<?php } ?>
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