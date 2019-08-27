<?php
session_start();
if (empty($_SESSION['nik'])) {
echo "<script>";
echo "alert('Silahkan login terlebih dahulu!!');";
echo "window.alert.href='index.php;";
echo "</script>";
}