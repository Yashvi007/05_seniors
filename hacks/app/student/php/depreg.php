<?php
session_start(); 
include('../../../include/connection.php');
$id = $_GET['id'];
$user = $_SESSION["student"];
$q = "SELECT * FROM student WHERE uid='$user'";
$r = mysqli_query($connect,$q);
$row = mysqli_fetch_array($r);
$dep_branch = $row['branch'];
$q1 = "SELECT * FROM department WHERE dname='$dep_branch'";
$r1= mysqli_query($connect,$q1);
$row1 = mysqli_fetch_array($r1);
$dept_id = $row1['did'];
$query = "INSERT INTO reg_dept(event_id,stud_id,dept_id) VALUES('$id','$user','$dept_id')";
$result = mysqli_query($connect,$query);
if($result)
{
	header('Location:../glossary.php');
}


?>