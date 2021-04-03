<?php
session_start();
$error = array();
if (isset($_POST['upload'])) {
    $dname = $_POST['dname'];
    $cname=$_POST['cname'];
    $chead=$_POST['chead'];
    
    if (empty($dname)) {
        $_SESSION['error']='Enter the department name';
        header("Location: ../committee.php");
        exit();

    }else if (empty($cname)) {
        $_SESSION['error']='Enter the department wise committee name';
        header("Location: ../committee.php");
        exit();

    }else if (empty($chead)) {
        $_SESSION['error']='Enter the committee head name';
        header("Location: ../committee.php");
        exit();

    }else {
include("../../../include/connection.php");
        
        $query = "INSERT into committee_department(name,did,committee_head) values ('$cname','$dname','$chead')";
        $res = mysqli_query($connect, $query);
        if ($res) {
           
            $_SESSION['error']='Department wise committee Created.';
            header("Location: ../committee.php");
            exit();

        }
    }
}

?>