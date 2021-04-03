<?php
session_start();
include("../../include/connection.php");
if(isset($_POST['login'])) {
   $email=$_POST['email'];
   $password=$_POST['pass'];

   $error=array();
   if(empty($email)){
       $_SESSION['error']='Email Empty';

       header("Location: ../adminlogin.php");
       exit();
     }else if(empty($password)){
       $_SESSION['error']='Password Empty';

       header("Location: ../adminlogin.php");
       exit();
      
     }
     if(count($error)==0){
      $simple_string = $email;
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "W@rmachineRox@h0pe";
        $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);
        echo $encryption;
      $query="SELECT * FROM super_admin WHERE email='$encryption'";

      $result = mysqli_query($connect,$query);

      $row=mysqli_fetch_array($result);
      $hashed=$row['password'];
        if(password_verify($password, $hashed)){
        $_SESSION['admin']= $row['uname'];

            header("Location:../admin/index.php");
            exit();

            
      }else{
            $_SESSION['error']='User not found';
            header("Location: ../adminlogin.php");
            exit();
      }

     }
   }
   ?>

