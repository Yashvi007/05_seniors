<?php
include("../../include/connection.php");
session_start();

if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $branch=$_POST['branch'];
    $regyear=date("Y");
    $id='@ves.ac.in';
    $email=$regyear.'.'.$fname.'.'.$lname.$id;
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];
    $q1="SELECT count(*) as count FROM student";
    $res1=mysqli_query($connect,$q1);
    $row1=mysqli_fetch_array($res1);
    $n=$row1["count"];

    $uid=$branch.'.'.$regyear.'.'.$fname.'.'.($n+1);
    if (empty($fname)) {
        $_SESSION['error'] = 'First Name Empty';

        header("Location: ../registerstudent.php");
        exit();

    } else if (empty($mname)) {
        $_SESSION['error'] = 'Middle Name Empty';
        header("Location: ../registerstudent.php");
        exit();
    }else if (empty($lname)) {
        $_SESSION['error'] = 'Last Name Empty';
        header("Location: ../registerstudent.php");
        exit();
    }else if (empty($gender)) {
        $_SESSION['error'] = 'Select Gender';
        header("Location: ../registerstudent.php");
        exit();
    } else if (empty($branch)) {
        $_SESSION['error'] = 'Select Branch';
        header("Location: ../registerstudent.php");
        exit();
    } else if (empty($phone)) {
        $_SESSION['error'] = 'Phone Empty';
        header("Location: ../registerstudent.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['error'] = 'Password Empty';
        header("Location: ../registerstudent.php");
        exit();
    } else if ($confirm_password != $password) {
        $_SESSION['error'] = 'Invalid Password Entered';
        header("Location: ../registerstudent.php");
        exit();
    } else if (strlen($password) < 6) {
        $_SESSION['error'] = 'Password Length Cannot be less than 6';
        header("Location: ../registerstudent.php");
        exit();

    } 
    if (count($error) == 0) {

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $simple_string = $email;
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "W@rmachineRox@h0pe";
        $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

        $simple = $phone;
        $ciphering1 = "AES-128-CTR";
        $iv_length1 = openssl_cipher_iv_length($ciphering1);
        $option = 0;
        $encryption_iv1 = '1234567891011121';
        $encryption_key1 = "W@rmachineRox@h0pe";
        $encryption1 = openssl_encrypt($simple, $ciphering1, $encryption_key1, $option, $encryption_iv1);


        

        $sql = "INSERT INTO student(uid,fname,mname,lname,gender,email,phone,branch,regyear,password) VALUES(?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ssssssssss",$uid, $fname, $mname, $lname,$gender,$encryption, $encryption1,$branch,$regyear, $hash);
            mysqli_stmt_execute($stmt);
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = 'Registered Successfully.';
            header("Location: ../registerstudent.php");
            exit();

        }


    }
}


?>

