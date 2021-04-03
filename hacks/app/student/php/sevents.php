<?php
session_start();
unset($_SESSION['error']);
include("../../../include/connection.php");
if (isset($_POST['upload'])) {

    
    $name = $_POST['ename'];
    
    $summ = $_POST['summ'];
    $e_date = $_POST['edate'];
    $sbid=$_POST['sbid'];
    echo $sbid;
    if (empty($name)) {
        $_SESSION['error'] = 'Enter Event Name';
        header("Location: ../societies.php?id=".$sbid."");
        exit();

    } else if (empty($summ)) {
        $_SESSION['error'] = 'Entry Summary';

        header("Location: ../societies.php?id=".$sbid."");
        exit();
    }else if (empty($e_date)) {
        $_SESSION['error'] = 'Please enter date';

        header("Location: ../societies.php?id=".$sbid."");
        exit();
    }   else {

        $user = $_SESSION['student'];
        #echo $user;
        #$query = " SELECT * from student where uid = '$user'";
        #$result = mysqli_query($connect,$query);
        #$row = mysqli_fetch_array($result);
        #$dept = $row['depid'];

        $sql = "INSERT INTO events_society(sid,ename,arranged_by,summary,edate) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "sssss",$sbid,$name,$user,$summ,$e_date);
            mysqli_stmt_execute($stmt);
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = 'Event added successfully.';
            header("Location:../societies.php?id=".$sbid."");

        exit();


    }

}
}

?>
