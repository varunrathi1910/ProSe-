<?php
session_start();
// $_SESSION['choice']=$_GET['choice'];
// echo $_SESSION['id'];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$data = array(); // create a variable to hold the information
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
$choice = mysqli_real_escape_string($conn,$_SESSION['choice']);
$username = mysqli_real_escape_string($conn,$_SESSION['username']);
$fillerstring=str_repeat('s', 1);
$_SESSION['CountProjects']=0;
$GLOBALS['$iter']=$_POST['javascriptiter'];
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

$sql = "SELECT * FROM project WHERE pdomain='$choice' and pstatus=1 and powner!='$username' and pid NOT IN(select pid from is_interested WHERE uname='$username')";
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $_SESSION['CountProjects']++;
  $data[] = $row;
} 
$returnstring= $data[$GLOBALS['$iter']]['pname'].','.$data[$GLOBALS['$iter']]['powner'].','. $data[$GLOBALS['$iter']]['pdescription'].','. $data[$GLOBALS['$iter']]['peoplerequired'].','. $data[$GLOBALS['$iter']]['peopleinterested'];
$pid=$data[$GLOBALS['$iter']]['pid'];
$queryusername=$data[$GLOBALS['$iter']]['powner'];
$sql = "SELECT LinkedIn FROM user WHERE uname='$queryusername'";
$idquery = mysqli_query($conn,$sql );
if(! $idquery) {
  die('Could not get data: ' . mysqli_error());
}
$a;
while($row = mysqli_fetch_array($idquery, MYSQLI_ASSOC)) {
  
  $a= $row['LinkedIn'];
}
$returnstring=$returnstring.','.$a.','.$pid;
echo $returnstring;
?>