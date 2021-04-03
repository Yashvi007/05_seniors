<?php 
include("../../../include/connection.php");
$eventid = $_GET['id'];
$approved=$_GET['app'];
$sbid = $_GET['sbid'];
$query = "UPDATE event_sbodies set faculty_approved ='$approved' where id = '$eventid'";
$result = mysqli_query($connect,$query);
if($result){

	$_SESSION['error']='Event Approved.';
   	header("Location: ../approve_event.php?sbid=".$sbid);
}

?>
