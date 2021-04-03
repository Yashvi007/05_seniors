<?php
session_start();
$error = array();
if (isset($_POST['upload'])) {
    $stud = $_POST['stud'];
    $cname=$_POST['cname'];
    $staff=$_POST['staff'];
    
    if (empty($cname)) {
        $_SESSION['error']='Enter the society name';
        header("Location: ../society.php");
        exit();

    }else if (empty($stud)) {
        $_SESSION['error']='Enter the chairperson';
        header("Location: ../committee.php");
        exit();

    }else if (empty($staff)) {
        $_SESSION['error']='Enter the staff incharge';
        header("Location: ../society.php");
        exit();

    }else {
include("../../../include/connection.php");
        
        $query = "INSERT into societies(name,mid,staff_incharge) values ('$cname','$stud','$staff')";
        $res = mysqli_query($connect, $query);
        if ($res) {
           
            $_SESSION['error']='Institute wise committee Created.';
            header("Location: ../society.php");
            exit();

        }
    }
}

?>