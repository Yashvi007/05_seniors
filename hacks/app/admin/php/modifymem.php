<?php
include("../../../include/connection.php");
session_start();

if (isset($_POST['upload'])) {
    $depid=$_POST['depid'];
    $eid=$_POST['eid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $designation=$_POST['designation'];
    $phone = $_POST['phone'];
    
    
    $id='@ves.ac.in';
    $email=$fname.'.'.$lname.$id;
    if (empty($fname)) {
        $_SESSION['error'] = 'First Name Empty';
header("Location: ../viewmem.php?id=" . $eid. "&did=" . $depid);

        exit();
        
        

    } else if (empty($lname)) {
        $_SESSION['error'] = 'Last Name Empty';
        header("Location: ../viewmem.php?id=" . $eid. "&did=" . $depid);

        exit();
        
    } else if (empty($designation)) {
        $_SESSION['error'] = 'Enter designation';
        header("Location: ../viewmem.php?id=" . $eid. "&did=" . $depid);

        exit();
        
    } else if (empty($phone)) {
        $_SESSION['error'] = 'Phone Empty';
        header("Location: ../viewmem.php?id=" . $eid. "&did=" . $depid);

        exit();
        
    } 
    if (!isset($_SESSION['error'])) {

        
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


        

        $sql = "UPDATE faculty SET fname=?, lname=?, email=?, designation=?, phone=? WHERE eid=?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ssssss",$fname,$lname,$encryption,$designation,$encryption1,$eid);
            mysqli_stmt_execute($stmt);
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = 'Faculty Details Modified Successfully.';
            header("Location: ../viewmem.php?id=" . $eid. "&did=" . $depid);

        exit();
            

        }


    }
}


?>

