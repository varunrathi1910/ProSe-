<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$username=$_SESSION['username'];
$choice=$_POST['choice'];
$data = array();
$returnstring='';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
$sql = "SELECT i.uname FROM is_interested as i  WHERE pid in (SELECT pid from project WHERE powner='$username' and pname='$choice')";
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $_SESSION['CountProjects']++;
  if ($returnstring=="") {
  	$returnstring=$returnstring.$row['uname'];
  }
  else
  {
  	$returnstring=$returnstring.','.$row['uname']; 	
  }
  $data[] = $row;
}

$sql2 = "SELECT LinkedIn FROM user  WHERE uname in (SELECT uname from is_interested where pid in (SELECT pid from project WHERE powner='$username' and pname='$choice'))";
$retval = mysqli_query($conn,$sql2 );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $_SESSION['CountProjects']++;

  $returnstring=$returnstring.','.$row['LinkedIn'];
  $data[] = $row;
}
print_r($returnstring);

?>