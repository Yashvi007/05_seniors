<?php
session_start();
$error = array();
include("../../../include/connection.php");
if (isset($_POST['upload'])) {
    $fid = $_POST['fid'];
    $sbname=$_POST['sbname'];
    
    
    if (empty($sbname)) {
        $_SESSION['error']='Enter the Student Body Name';
        header("Location: ../student_bodies.php");
        exit();

    }else if (empty($fid)) {
        $_SESSION['error']='Enter the faculty ID';
        header("Location: ../student_bodies.php");
        exit();

    }else {

        
        $query = "INSERT into student_bodies(name,faculty_head) values ('$sbname','$fid')";
        $res = mysqli_query($connect, $query);
        if ($res) {
           
            $_SESSION['error']='Student Body Committee Created.';
            header("Location: ../student_bodies.php");
            exit();

        }
    }
}
 if(isset($_POST['change']))
        {
            $sbname = $_POST['sbname'];
            $fid = $_POST['fid'];
            if (empty($sbname)) {
        $_SESSION['error']='Enter the Student Body Name';
        header("Location: ../student_bodies.php");
        exit();

    }else if (empty($fid)) {
        $_SESSION['error']='Enter the faculty ID';
        header("Location: ../student_bodies.php");
        exit();

    }else{
            $query = "UPDATE student_bodies SET faculty_head = '$fid' WHERE name='$sbname'";
            $result = mysqli_query($connect,$query);
        header("Location: ../student_bodies.php");
        $_SESSION['error']='Success';}

        }

?>