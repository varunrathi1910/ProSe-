<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$id=$_POST['id'];
$pid=$_POST['pid'];
$username=$_SESSION['username'];
echo $interestvar,$pid,$username;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
if($id=='Close Project')
{
	$sql = "UPDATE project SET pstatus=0 WHERE pid='$pid'";
}
else
{
	$sql = "UPDATE project SET pstatus=1 WHERE pid='$pid'";
}
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}

?>