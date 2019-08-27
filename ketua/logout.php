<?php
session_start();
session_destroy();
echo "<script>";
echo "alert('Logout Berhasil!!');";
echo "window.location.href='index.php';";
echo "</script>";