<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$username=$_SESSION['username'];
$viewadd=$_POST['choice'];
$data = array();
$returnstring='';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
if($viewadd=="viewProject")
{
	$sql = "SELECT pname FROM project WHERE pid in (SELECT pid from is_interested WHERE uname='$username')";
}
else
{
	$sql = "SELECT pname FROM project WHERE powner='$username'";
}
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $_SESSION['CountProjects']++;
  $returnstring=$returnstring.','.$row['pname'];
  $data[] = $row;
}
print_r($returnstring);

?>