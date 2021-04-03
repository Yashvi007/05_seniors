<?php
session_start();
if(isset($_SESSION['mentor'])){
unset($_SESSION['mentor']);
header("Location:../../index.php");
}
?>