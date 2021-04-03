<?php 
include("../../../include/connection.php");
$st_id = $_GET['id'];

$query = "UPDATE student set status = 0 where uid = '$st_id'";
$result = mysqli_query($connect,$query);
if($result){

	$_SESSION['error']='Student unselected.';
   	header("Location: ../student.php");
}

?>
