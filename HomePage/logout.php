<?php
session_start();
session_destroy();
// echo "Testing 123";
header('Location:Login/login.php');
?>