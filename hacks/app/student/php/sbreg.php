<?php
session_start(); 
$id = $_GET['id'];
$sb_id = $_GET['sb_id'];
$user = $_SESSION["student"];
include('../../../include/connection.php');
$query = "INSERT INTO reg_sbody(event_id,stud_id,sbody_id) VALUES('$id','$user','$sb_id')";
$result = mysqli_query($connect,$query);
if($result)
{
	header('Location:../glossary.php');
}


?>