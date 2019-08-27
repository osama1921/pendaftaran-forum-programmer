<?php
include '../assets/config.php';
if (isset($_POST['tambah'])) {
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
echo 'alert("Success");'; 
echo 'window.location.href = "anggota.php";';
echo '</script>';	
	}else if(isset($_POST['edit'])){
	$nik=$_POST['nik'];
	$nama=$_POST['nama'];
	$ttl=$_POST['ttl'];
	$alamat=$_POST['alamat'];
	$provinsi=$_POST['provinsi'];
	$email=$_POST['email'];
	$status=$_POST['status'];
	$akses=$_POST['akses'];
	if ($_POST['password'] == "") {
		mysqli_query($kon, "UPDATE `pengguna` SET `name`='$nama',`ttl`='$ttl',`alamat`='$alamat',`provinsi`='$provinsi',`email`='$email',`status`='$status' WHERE `nik`='$nik'")or die(mysqli_error($kon));
		mysqli_query($kon, "UPDATE mapping_pengguna SET id_posisi='$akses' WHERE nik='$nik'");
		echo '<script type="text/javascript">'; 
echo 'alert("Berhasil");'; 
echo 'window.location.href = "anggota.php";';
echo '</script>';
	}else{
	$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
		mysqli_query($kon, "UPDATE pengguna SET name='$nama', ttl='$ttl', alamat='$alamat', $provinsi='$provinsi', email='$email', status='$status' WHERE nik='$nik'") or die(mysqli_error($kon));
		mysqli_query($kon, "UPDATE login SET password='$password' WHERE nik='$nik'");
		echo '<script type="text/javascript">'; 
echo 'alert("Berhasil");'; 
echo 'window.location.href = "anggota.php";';
echo '</script>';
	}
	}else if(isset($_GET['nik'])){
		mysqli_query($kon, "DELETE FROM pengguna WHERE nik='".$_GET['nik']."'");
		mysqli_query($kon, "DELETE FROM login WHERE nik='".$_GET['nik']."'");
		mysqli_query($kon, "DELETE FROM portofolio WHERE nik='".$_GET['nik']."'");
		mysqli_query($kon, "DELETE FROM mapping_anggota WHERE nik='".$_GET['nik']."'");
				echo '<script type="text/javascript">'; 
echo 'alert("Berhasil");'; 
echo 'window.location.href = "anggota.php";';
echo '</script>';
	}else{
		echo '<script type="text/javascript">'; 
echo 'alert("Gagal");'; 
echo 'window.location.href = "tambah_anggota.html?nik='.$nik.'";';
echo '</script>';	
}