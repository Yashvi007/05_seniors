<?php
session_start();
$error = array();
if (isset($_POST['upload'])) {
    $mem_id = $_POST['mem_id'];
    $desg_name=$_POST['desg_name'];
    $cid=$_POST['cid'];
    
    if (empty($mem_id)) {
        $_SESSION['error']='Enter the member id';
       header("Location: ../members.php?id=".$cid);
        exit();

    }else if (empty($desg_name)) {
        $_SESSION['error']='Enter the designation of the member';
        header("Location: ../members.php?id=".$cid);
        exit();

    }else {
include("../../../include/connection.php");
        
        $query = "INSERT into member(cid,fid,position) values ('$cid','$mem_id','$desg_name')";
        $res = mysqli_query($connect, $query);
        if ($res) {
           
            $_SESSION['error']='Member Added.';
             header("Location: ../members.php?id=".$cid);
            exit();

        }
    }
}

?>