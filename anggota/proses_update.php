<?php
session_start();
include '../assets/config.php';
if (isset($_POST['update'])) {
	$nik=$_SESSION['nik'];
	$nama=$_POST['nama'];
	$ttl=$_POST['ttl'];
	$alamat=$_POST['alamat'];
	$provinsi=$_POST['provinsi'];
	$email=$_POST['email'];
		mysqli_query($kon, "UPDATE `pengguna` SET `name`='$nama',`ttl`='$ttl',`alamat`='$alamat',`provinsi`='$provinsi',`email`='$email' WHERE `nik`='$nik'")or die(mysqli_error($kon));
	echo '<script type="text/javascript">'; 
echo 'alert("Profile Berhasil Diupdate");'; 
echo 'window.location.href = "profile.php";';
echo '</script>'; 
}else{
		echo '<script type="text/javascript">'; 
echo 'alert("Registrasi Gagal");'; 
echo 'window.location.href = "profile.php?update=1";';
echo '</script>'; 
}