<?php
include '../assets/config.php';
session_start();
if (isset($_POST['tambah'])) {
$nik=$_SESSION['nik'];
$bidang=$_POST['bidang'];
$riwayat=$_POST['riwayat'];
$sertifikat=$_POST['sertifikat'];
$project=$_POST['project'];
mysqli_query($kon, "INSERT INTO portofolio VALUES ('$nik', '$bidang', '$riwayat', '$sertifikat', '$project')") or die(mysqli_error($kon));
echo '<script type="text/javascript">'; 
			echo 'alert("Portofolio berhasil di tambahkan!!");'; 
			echo 'window.location.href = "porotolio.php";';
			echo '</script>'; 
}elseif (isset($_POST['save'])) {
$nik=$_SESSION['nik'];
$bidang=$_POST['bidang'];
$riwayat=$_POST['riwayat'];
$sertifikat=$_POST['sertifikat'];
$project=$_POST['project'];
mysqli_query($kon, "update portofolio set bidang_keahlian='$bidang', riwayat_pelatihan='$riwayat', sertifikasi_pelatihan='$sertifikat', riwayat_project='$project' where nik='$nik'") or die(mysqli_error($kon));
echo '<script type="text/javascript">'; 
			echo 'alert("Portofolio berhasil di perbarui!!");'; 
			echo 'window.location.href = "porotolio.php";';
			echo '</script>';
}

else{
			echo '<script type="text/javascript">'; 
			echo 'alert("Portofolio tidak berhasil di tambahkan!!");'; 
			echo 'window.location.href = "porotolio.php";';
			echo '</script>'; 

}