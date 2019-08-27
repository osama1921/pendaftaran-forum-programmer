<?php
include 'assets/config.php';
if (isset($_POST['regis'])) {
	$nik=$_POST['nik'];
	$nama=$_POST['nama'];
	$ttl=$_POST['ttl'];
	$alamat=$_POST['alamat'];
	$provinsi=$_POST['provinsi'];
	$email=$_POST['email'];
	$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
	mysqli_query($kon, "INSERT INTO pengguna (`nik`, `name`, `ttl`, `alamat`, `provinsi`, `email`, `status`) VALUES ('$nik','$nama','$ttl','$alamat','$provinsi','$email', 'Baru')")or die(mysqli_error($kon));
	mysqli_query($kon,"INSERT INTO login VALUES ('$nik','$password')");
	mysqli_query($kon,"INSERT INTO mapping_pengguna VALUES ('$nik','1')");
	echo '<script type="text/javascript">'; 
echo 'alert("Registrasi Berhasil");'; 
echo 'window.location.href = "index.html";';
echo '</script>'; 
}else{
		echo '<script type="text/javascript">'; 
echo 'alert("Registrasi Gagal");'; 
echo 'window.location.href = "regis.html";';
echo '</script>'; 
}