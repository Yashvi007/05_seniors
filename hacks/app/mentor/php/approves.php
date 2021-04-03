<?php 
include("../../../include/connection.php");
$eventid = $_GET['id'];
$approved=$_GET['app'];
$query = "UPDATE events_society set approved_by ='$approved' where id = '$eventid'";
$result = mysqli_query($connect,$query);
if($result){

	$_SESSION['error']='Event Approved.';
   	header("Location: ../approve_socevent.php");
}

?>
