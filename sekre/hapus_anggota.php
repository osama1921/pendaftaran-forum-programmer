<?php
include '../assets/config.php';
mysqli_query($kon, "DELETE FROM pengguna WHERE nik='".$_GET['nik']."'");
mysqli_query($kon, "DELETE FROM login WHERE nik='".$_GET['nik']."'");
mysqli_query($kon, "DELETE FROM mapping_pengguna WHERE nik='".$_GET['nik']."'");
mysqli_query($kon, "DELETE FROM portofolio WHERE nik='".$_GET['nik']."'");
echo "<script>";
echo "alert('Data Anggota Berhasil Di hapus');";
echo "window.location.href='anggota.php';";
echo "</script>";