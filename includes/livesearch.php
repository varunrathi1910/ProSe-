<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$username=$_SESSION['username'];
$searchquery=$_GET['q'];
$data = array();
$returnstring='';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
$sql = "SELECT pname FROM project WHERE pname like '$searchquery%'";
$retval = mysqli_query($conn,$sql );
  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    if ($returnstring=="") {
      $returnstring=$returnstring.$row['pname'];

    }
    else
    {
      $returnstring=$returnstring.','.$row['pname'];
    }
    $data[] = $row;
  }
  if($returnstring=="")
  {
    echo "No such Project";
  }
  else
  {
    print_r($returnstring);
  }
  
?>