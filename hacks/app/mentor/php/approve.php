<?php 
include("../../../include/connection.php");
$eventid = $_GET['id'];
$approved=$_GET['app'];
$query = "UPDATE event_faculty set approved_by ='$approved' where id = '$eventid'";
$result = mysqli_query($connect,$query);
if($result){

	$_SESSION['error']='Event Approved.';
   	header("Location: ../hodapprove.php");
}

?>
