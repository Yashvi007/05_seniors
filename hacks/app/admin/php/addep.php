<?php
session_start();
$error = array();
if (isset($_POST['upload'])) {
    $dname = $_POST['dname'];
    
    if (empty($dname)) {
        $_SESSION['error']='Enter the department name';
        header("Location: ../department.php");
        exit();

    }else {
include("../../../include/connection.php");
        $query = "INSERT into department(dname) values ('$dname')";
        $res = mysqli_query($connect, $query);
        if ($res) {
           
            $_SESSION['error']='Department Created.';
            header("Location: ../department.php");
            exit();

        }
    }
}

?>