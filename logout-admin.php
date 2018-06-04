<?php 
session_start();
unset($_SESSION['ad_session']);
header("Location: login-ad.php")
 ?>