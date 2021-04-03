<?php
session_start();
unset($_SESSION['error']);
include("../../../include/connection.php");
if (isset($_POST['upload'])) {
    $sbid = $_POST['sbid'];
    $gsid = $_POST['gsid'];
    $sdid = $_POST['sdid'];
    $jdid = $_POST['jdid'];

    if (empty($gsid)) {
        $_SESSION['error'] = 'Enter GS id';
        header("Location: ../hostevent.php");
        exit();

    } else if (empty($sdid)) {
        $_SESSION['error'] = 'Enter SD id';

        header("Location: ../hostevent.php");
        exit();
    }else if (empty($jdid)) {
        $_SESSION['error'] = 'Enter JD id';

        header("Location: ../hostevent.php");
        exit();
    }else {

        $user = $_SESSION['mentor'];
        echo $user;
        $query = " SELECT * from faculty where eid = '$user'";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_array($result);
        $dept = $row['depid'];

        $sql = "UPDATE student_bodies set general_secretary = ?,senior_deputy = ?,
        junior_deputy = ? where id = ?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ssss",$gsid,$sdid,$jdid,$sbid);
            mysqli_stmt_execute($stmt);
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = 'Members Added Successfully.';
            header("Location:../sbmembers.php");

        exit();


    }

}
}

?>
