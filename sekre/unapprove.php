<?php
include '../assets/config.php';
mysqli_query($kon, "UPDATE pengguna SET status='Unpproved' WHERE nik=".$_GET['nik']."");
echo "<script>";
echo "alert('Approved Succes!!');";
echo "window.location.href='pendaftar.php';";
echo "</script>";