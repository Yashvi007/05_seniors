<?php
include("../../../include/connection.php");
session_start();

if (isset($_POST['change_pass'])) {
    $old = $_POST['old_pass'];
    $new = $_POST['new_pass'];
    $con = $_POST['con_pass'];
    $spec = $_POST['spec'];
    $n = $new;
    $c = $con;

    $ol = "SELECT * FROM student WHERE username='$spec'";
    $ols = mysqli_query($connect, $ol);
    $row = mysqli_fetch_array($ols);
    $hashed = $row['password'];

    if (password_verify($old, $hashed)) {

        if (empty($new)) {
            $_SESSION['error'] = "Enter New Password";
            header("Location:../myprofile.php");

        } else if (strlen($new) < 6) {
            $_SESSION['error'] = "Password Length Cannot be less than 6";
            header("Location:../myprofile.php");
        } else if ($con != $new) {
            $_SESSION['error'] = "Passwords don't match";
            header("Location:../myprofile.php");
        } else {
            $new = mysqli_real_escape_string($connect,$new);
            $con = mysqli_real_escape_string($connect,$con);
        
        if($n != $new){
            
            $_SESSION['error'] = "Please put a valid password";
            header("Location:../myprofile.php");
            exit();
        }else if($c != $con){
            
            $_SESSION['error'] = "Please put a valid password";
            header("Location:../myprofile.php");
            exit();
        }
        else{
            
            $nhash = password_hash($n, PASSWORD_DEFAULT);
            $query = "UPDATE student SET password=? WHERE username=?";
            
            $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "Sql Statement failed";
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $nhash, $spec);
            mysqli_stmt_execute($stmt);
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = "Password Updated";
            header("Location:../myprofile.php");
            exit();

        }
        }   
        }    

    } else {
        $_SESSION['error'] = "Incorrect old password";
        header("Location:../myprofile.php");
    }
}

?>