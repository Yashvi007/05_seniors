<?php
session_start();
include("../../../include/connection.php");

if (isset($_POST['change_uname'])) {
    $uname = $_POST['uname'];
    $u=$uname;
    $men=$_POST['men'];
    $q1 = "SELECT * FROM mentor where m_uname='$uname'";
    $re = mysqli_query($connect, $q1);
    $rr = mysqli_fetch_array($re);
    if (empty($uname)) {
        $_SESSION['error'] = "Enter your Username";
        header("Location:../myprofile.php");
    } else if ($rr) {
        $_SESSION['error'] = "Username Taken";
        header("Location:../myprofile.php");

    }
    else {
       $uname=mysqli_real_escape_string($connect,$uname);

        if($u != $uname){
            
            $_SESSION['error'] = "Please put a valid username";
            header("Location:../myprofile.php");
            exit();
        }
        else{


        $sql = "UPDATE mentor SET m_uname=? WHERE m_uname=?";

        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $uname, $men);
            mysqli_stmt_execute($stmt);
            $_SESSION['mentor']=$u;
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = "Username Updated";
            header("Location:../myprofile.php");
            exit();

        }
        
        }
    }
}

?>