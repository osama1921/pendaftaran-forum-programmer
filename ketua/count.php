<?php
include '../assets/config.php';
	session_start();
$pendaftar=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM pengguna WHERE status='Baru'"));
$anggota=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM pengguna WHERE status!='Baru'"));
$provinsi=mysqli_query($kon, "SELECT DISTINCT(provinsi) as prov FROM pengguna WHERE status!='Baru'");
while ($prov=mysqli_fetch_array($provinsi)) {
	$data[] = $prov;
}
foreach ($data as $prov) {
$dcek = $prov[0].",";
$jumlah=mysqli_fetch_array(mysqli_query($kon, "SELECT COUNT(IF(provinsi='".$prov[0]."',1, NULL)) '".$prov[0]."' FROM pengguna WHERE status!='Baru'"));
// echo $jumlah[0].",";
}

$bulan=mysqli_query($kon, "SELECT DISTINCT(month(waktu)) as mon FROM pengguna WHERE status!='Baru' ORDER BY mon ASC");
while ($mon=mysqli_fetch_array($bulan)) {
	$bulann[] = $mon['mon'];
	switch ($mon['mon']){
					case 1: 
						$bul[] = "Januari";
						break;
					case 2:
						$bul[] = "Februari";
						break;
					case 3:
						$bul[] = "Maret";
						break;
					case 4:
						$bul[] = "April";
						break;
					case 5:
						$bul[] = "Mei";
						break;
					case 6:
						$bul[] = "Juni";
						break;
					case 7:
						$bul[] = "Juli";
						break;
					case 8:
						$bul[] = "Agustus";
						break;
					case 9:
						$bul[] = "September";
						break;
					case 10:
						$bul[] = "Oktober";
						break;
					case 11:
						$bul[] = "November";
						break;
					case 12:
						$bul[] = "Desember";
						break;
				}
} 
foreach ($bulann as $month) {
	$jumlahbulan=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM pengguna WHERE month(waktu)=".$month[0]." AND status!='Baru'"));
// echo $jumlahbulan;
}