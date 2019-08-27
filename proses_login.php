<?php
include 'assets/config.php';
if (isset($_POST['login'])) {
	$nik=$_POST['nik'];
	$password=$_POST['password'];
	$query=mysqli_query($kon, "SELECT * FROM login WHERE nik='$nik'");
	$cek=mysqli_num_rows($query);
	if ($cek>0) {
		$login=mysqli_fetch_array($query);
		$pass_hash=$login['password'];
		$nik=$login['nik'];
		if (password_verify($password,$pass_hash)) {
			$data_anggota=mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM pengguna WHERE nik='$nik'"));
			if ($data_anggota['status']=="Unapproved") {
			echo '<script type="text/javascript">'; 
			echo 'alert("Anda tidak di Approved oleh pengurus");'; 
			echo 'window.location.href = "index.html";';
			echo '</script>'; 
			}else{
				$posisi=mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM mapping_pengguna WHERE nik='$nik'"));
				if ($posisi['id_posisi']==1) {
					session_start();
					$_SESSION['nik']=$nik;
			echo '<script type="text/javascript">'; 
			echo 'alert("Selamat Datang !!");'; 
			echo 'window.location.href = "anggota/menu.php";';
			echo '</script>'; 
				}else{
					echo '<script type="text/javascript">'; 
			echo 'alert("Login Gagal");'; 
			echo 'window.location.href = "index.html";';
			echo '</script>'; 
				}
			}
		}else{
		echo '<script type="text/javascript">'; 
			echo 'alert("Login Gagal");'; 
			echo 'window.location.href = "index.html";';
			echo '</script>'; 
		}
	}else{
		echo '<script type="text/javascript">'; 
			echo 'alert("Login Gagal");'; 
			echo 'window.location.href = "index.html";';
			echo '</script>'; 
	}
}else{
	echo '<script type="text/javascript">'; 
			echo 'alert("Login Gagal");'; 
			echo 'window.location.href = "index.html";';
			echo '</script>'; 
}