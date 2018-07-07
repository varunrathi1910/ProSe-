<?php
session_start();
$_SESSION['id']=$_POST['a'];
echo $_SESSION['id'];
header('location:proxyindex.php');
?>