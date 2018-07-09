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
if($interestvar==1)
{
	$sql = "INSERT INTO `is_interested`(`pid`, `uname`) VALUES ('$pid','$username')";
	$sql2="UPDATE project SET peopleinterested=peopleinterested+1 WHERE pid='$pid'";
	
	// The below commented query is an important functionality but not working.Seek help
	// -- $sql2 = "UPDATE 'project' SET 'peopleinterested'=1 WHERE pid='$pid";
}
else
{
	$sql = "DELETE FROM `is_interested` WHERE pid='$pid' AND uname='$username'";
	$sql2="UPDATE project SET peopleinterested=peopleinterested-1 WHERE pid='$pid'";
}
$retval = mysqli_query($conn,$sql );
$retval2=mysqli_query($conn,$sql2 );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
if(! $retval2) {
  die('Could not get data: ' . mysqli_error());
}
?>