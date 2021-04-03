<?php
session_start();
include("../../../include/connection.php");
$error = array();
if (isset($_POST['change_uname'])) {
    $spec = $_POST['spec'];
    $uname = $_POST['uname'];
    $u = $uname;
    $q1 = "SELECT * FROM student where username='$uname'";
    $re = mysqli_query($connect, $q1);
    $rr = mysqli_fetch_array($re);
    if (empty($uname)) {
        $_SESSION['error'] = "Enter your Username";
        header("Location:../myprofile.php");

    } else if ($rr) {
        $_SESSION['error'] = "Username Taken";
        header("Location:../myprofile.php");

    }else {
        
        //$uname = mysqli_real_escape_string($uname);
        
        $uname=mysqli_real_escape_string($connect,$uname);
    
        if($u != $uname){
            
            $_SESSION['error'] = "Please put a valid username";
            header("Location:../myprofile.php");
            exit();
        }
        else{


        $sql = "UPDATE student SET username=? WHERE username=?";

        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $uname, $spec);
            mysqli_stmt_execute($stmt);
            $_SESSION['student']=$u;

            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = "Username Updated";
            header("Location:../myprofile.php");
            exit();

        }
        
        }
    }
}

?>
    
    
    
    
    
   