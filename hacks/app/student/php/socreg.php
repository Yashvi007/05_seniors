<?php
session_start(); 
$id = $_GET['id'];
$soc_id = $_GET['soc_id'];
$user = $_SESSION["student"];
include('../../../include/connection.php');
$query = "INSERT INTO reg_society(event_id,stud_id,society_id) VALUES('$id','$user','$soc_id')";
$result = mysqli_query($connect,$query);
if($result)
{
	header('Location:../glossary.php');
}


?>