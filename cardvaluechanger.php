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
$GLOBALS['$iter']=$_POST['javascriptiter'];
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

$sql = "SELECT * FROM project WHERE pdomain='$choice' and pstatus=1 and powner!='$username'";
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $data[] = $row;
}
$returnstring= $data[$GLOBALS['$iter']]['pname'].','.$data[$GLOBALS['$iter']]['powner'].','. $data[$GLOBALS['$iter']]['pdescription'].','. $data[$GLOBALS['$iter']]['peoplerequired'].','. $data[$GLOBALS['$iter']]['peopleinterested'];
// $queryusername=$data[$GLOBALS['$iter']]['powner'];
// $sql = "SELECT LinkedIn FROM user WHERE uname='$queryusername'";
// $idquery = mysqli_query($conn,$sql );
// if(! $idquery) {
//   die('Could not get data: ' . mysqli_error());
// }
// $idval = mysqli_fetch_assoc($idquery);
// $returnstring=$returnstring.','.$idval;
echo $returnstring;
// print_r($data[$GLOBALS['$iter']]);
?>