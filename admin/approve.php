<?php
include '../assets/config.php';
mysqli_query($kon, "UPDATE pengguna SET status='Approved' WHERE nik=".$_GET['nik']."");
// mysqli_query($kon, "INSERT INTO mapping_pengguna VALUES(".$_GET['nik'].", '1' )");
echo "<script>";
echo "alert('Approved Succes!!');";
echo "window.location.href='pendaftar.php';";
echo "</script>";