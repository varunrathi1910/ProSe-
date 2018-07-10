<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$data = array(); // create a variable to hold the information
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
$choice = mysqli_real_escape_string($conn,$_SESSION['choice']);
$username = mysqli_real_escape_string($conn,$_SESSION['username']);
$fillerstring=str_repeat('s', 1);
$ajaxcallschoice=$_POST['ajaxcallschoice'];
$returnstring='';

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

if($ajaxcallschoice==1)//AJAX called to change the card's value
{
	$GLOBALS['$iter']=$_POST['javascriptiter'];
	$sql = "SELECT * FROM project WHERE pdomain='$choice' and pstatus=1 and powner!='$username' and pid NOT IN(select pid from is_interested WHERE uname='$username')";
	$retval = mysqli_query($conn,$sql );
	if(! $retval) {
	  die('Could not get data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
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
}
if($ajaxcallschoice==2)// AJAX calls for interested/uninterested functionality.
{
	$interestvar=$_POST['interestvar'];
	$pid=$_POST['pid'];

	if($interestvar==0)
	{
		$sql = "INSERT INTO `is_interested`(`pid`, `uname`) VALUES ('$pid','$username')";
		$sql2="UPDATE project SET peopleinterested=peopleinterested+1 WHERE pid='$pid'";
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
}

if($ajaxcallschoice==3)// AJAX calls for open project/closeproject functionality.
{
	$id=$_POST['id'];
	$pid=$_POST['pid'];
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
}
if($ajaxcallschoice==4)//AJAX calls for viewing interested people functionality
{
	$choice=$_POST['choice'];

	$sql = "SELECT uname,LinkedIn FROM user  WHERE uname in (SELECT uname from is_interested where pid in (SELECT pid from project WHERE powner='$username' and pname='$choice'))";
	$retval = mysqli_query($conn,$sql );
	if(! $retval) {
	  die('Could not get data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	  if ($returnstring=="") {
	  	$returnstring=$returnstring.$row['uname'];
	    $returnstring=$returnstring.','.$row['LinkedIn'];

	  }
	  else
	  {
	  	$returnstring=$returnstring.','.$row['uname'];
	    $returnstring=$returnstring.','.$row['LinkedIn']; 	
	  }
	  $data[] = $row;
	}
	print_r($returnstring);
}
if ($ajaxcallschoice==5)//Ajax calls for interested projects 
{
	# code...
	$interestvar=$_POST['interestvar'];
	$pid=$_POST['pid'];

	if($interestvar==1)
	{
		$sql = "INSERT INTO `is_interested`(`pid`, `uname`) VALUES ('$pid','$username')";
		$sql2="UPDATE project SET peopleinterested=peopleinterested+1 WHERE pid='$pid'";
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
}
?>