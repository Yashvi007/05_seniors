<?php
session_start();
unset($_SESSION['error']);
include("../../../include/connection.php");
if (isset($_POST['upload'])) {


    $name = $_POST['ename'];
   
    $summ = $_POST['summ'];
    $e_date = $_POST['edate'];
    

    if (empty($name)) {
        $_SESSION['error'] = 'Enter Event Name';
        header("Location: ../hostevent.php");
        exit();

    } else if (empty($summ)) {
        $_SESSION['error'] = 'Entry Summary';

        header("Location: ../hostevent.php");
        exit();
    }else if (empty($e_date)) {
        $_SESSION['error'] = 'Please enter date';

        header("Location: ../hostevent.php");
        exit();
    }   else {

        $user = $_SESSION['mentor'];

        
        $query = " SELECT * from faculty where eid = '$user'";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_array($result);
        $dept = $row['depid'];
        $des=$row['designation'];
        if($des=='HoD'){
            $emaiil = $row['email'];

                        $mail = $emaiil;

                        $ciphering = "AES-128-CTR";

                        $options = 0;

                        $decryption_iv = '1234567891011121';
                        $decryption_key = "W@rmachineRox@h0pe";

                        $decryption = openssl_decrypt($mail, $ciphering, $decryption_key, $options, $decryption_iv);
                        $de='2018.yashvi.hiranandani@ves.ac.in'; 
                        require_once('../../../PHPMailer/PHPMailerAutoload.php');
                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = 'tls';
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = '587';
                        $mail->isHTML();
                        $mail->Username = 'ashk28034@gmail.com';
                        $mail->Password = 'AshPik23';
                        $mail->SetFrom('peakyblinders307.com');
                        $mail->Subject = 'Request for organizing event.';
                        $mail->Body = 'The event I want to arrange is ' . $name . ' on ' . $e_date . '. The details are as follows ' . $summ;
                        $mail->AddAddress($de);
                        $mail->Send();

                    
        }
        $sql = "INSERT INTO event_faculty(ename,arranged_by,department,summary,edate) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Sql Statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "sssss",$name, $user, $dept,$summ,$e_date);
            mysqli_stmt_execute($stmt);
            $resulft = mysqli_stmt_get_result($stmt);
            $_SESSION['error'] = 'Event added successfully.';
            header("Location:../hostevent.php");

        exit();


    }

}
}

?>
