<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$interestvar=$_POST['interestvar'];
$pid=$_POST['pid'];
$username=$_SESSION['username'];
echo $interestvar,$pid,$username;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
if($interestvar==0)
{
	$sql = "INSERT INTO `is_interested`(`pid`, `uname`) VALUES ('$pid','$username')";
}
else
{
	$sql = "DELETE FROM `is_interested` WHERE pid='$pid' AND uname='$username'";
}
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}

?>