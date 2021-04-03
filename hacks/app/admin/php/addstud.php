<?php
session_start();
$error = array();
if (isset($_POST['upload'])) {
    $studid = $_POST['studid'];
    
    
    if (empty($studid)) {
        $_SESSION['error']='Enter the student id to be selected';
       header("Location: ../student.php");
        exit();

    }else {
include("../../../include/connection.php");
        
        $query = "UPDATE student set status=1 where uid='$studid'";

        
        $res = mysqli_query($connect, $query);
        if ($res) {
           
            $_SESSION['error']='Student selected.';
             header("Location: ../student.php");
            exit();

        }
    }
}

?>