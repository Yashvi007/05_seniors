<?php
session_start();
unset($_SESSION['error']);
include("../../include/connection.php");
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if (empty($email)) {
        $_SESSION['error'] = 'Email Id Empty';
        header("Location: ../mentorlogin.php");
        exit();

    } else if (empty($pass)) {
        $_SESSION['error'] = 'Password Empty';

        header("Location: ../mentorlogin.php");
        exit();
    } else {

                    $simple_string = $email;
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "W@rmachineRox@h0pe";
        $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);
                    


                
        $sql = "SELECT * FROM faculty WHERE email=?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $encryption);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $hashed = $row['password'];
            $eid=$row['eid'];
            
            if (mysqli_num_rows($result) == 1) {

                if (password_verify($pass, $hashed)) {
                        
                        $_SESSION['mentor'] =$eid;
                        header("Location: ../mentor/index.php");
                        exit();
                    
                } else {
                    $_SESSION['error'] = 'Incorrect Password';
                    header("Location: ../mentorlogin.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = 'User not found';
                header("Location: ../mentorlogin.php");
                exit();
            }
        }


    }

}

?>
