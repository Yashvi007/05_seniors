<?php
session_start();
unset($_SESSION['error']);
include("../../../include/connection.php");
if (isset($_POST['upload'])) {
    $sid = $_POST['sid'];
    $mid = $_POST['mid'];
    

    if (empty($mid)) {
        $_SESSION['error'] = 'Enter Chair Person ID';
        header("Location:../smembers.php?sid=".$sid);
        exit();

    }else {

        $user = $_SESSION['mentor'];
        echo $user;
        

        $sql = "UPDATE societies set mid = ? where id = ? ";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ss",$mid,$sid);
            mysqli_stmt_execute($stmt);
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = 'Member Added Successfully.';
            header("Location:../smembers.php?sid=".$sid);

        exit();


    }

}
}

?>
