<?php
session_start();
if (empty($_SESSION['nik'])) {
header("location:index.php");
}
include 'count.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
			<h1>Dashboard</h1>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body bg-info" style="text-transform: uppercase; font-weight: 1000; color: white;padding: 0;"> <p style="display: inline; float: left;">Jumlah Pendaftar</p><p style="display: inline; float: right;"><?= $pendaftar ;?></p></div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body bg-info" style="text-transform: uppercase; font-weight: 1000; color: white; padding: 0;"> <p style="display: inline; float: left;">Jumlah Anggota</p><p style="display: inline; float: right;"><?= $anggota ;?></p></div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body bg-info" style="text-transform: uppercase; font-weight: 1000; color: white; padding: 0;"> <p>Statistic Jumlah Anggota</p>
						</div>
							<canvas id="myChart" height="10vh" width="20vw"></canvas>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body bg-info" style="text-transform: uppercase; font-weight: 1000; color: white; padding: 0;"> <p>Jumlah Anggota Per-provinsi</p></div>
							<canvas id="myChart2" height="10vh" width="20vw"></canvas>
					</div>
				</div>
			</div>
		</div>
<script type="text/javascript">
	$(".btni").on("click",function(){
		$('.menu').toggleClass("show");
	});
	var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php 
foreach ($bul as $mont) {
	echo "'$mont',";
}
        	?>],
        datasets: [{
            label: '# Jumlah Per Bulan',
            data: [<?php
foreach ($bulann as $month) {
	$jumlahbulan=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM pengguna WHERE month(waktu)=".$month[0]." AND status!='Baru'"));
echo "'$jumlahbulan',";
}
            	?>],
            borderColor: [
                '#3498db',
            ],
            borderWidth: 4
        }]
    }
});
	var ctx2 = document.getElementById("myChart2").getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: [<?php 
foreach ($data as $prov) {
echo "'".$prov[0]."',";
}
?>
],
        datasets: [{
            label: '# Jumlah Perprovinsi',
            data: [<?php
foreach ($data as $prov) {
$jumlah=mysqli_fetch_array(mysqli_query($kon, "SELECT COUNT(IF(provinsi='".$prov[0]."',1, NULL)) '".$prov[0]."' FROM pengguna "));
echo "'".$jumlah[0]."',";
}
            	?>],
            borderColor: [
                '#3498db',
            ],
            borderWidth: 4
        }]
    }
});
</script>
</body>
</html>