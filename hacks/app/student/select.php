<?php
session_start();
if (!isset($_SESSION['student']) && empty($_SESSION['student'])) {

    header("Location: ../studentlogin.php");


}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../resources/css/stylestudd.css">
    <style type="text/css">
        form {
            padding: 0% 15% 0% 15% !important;
        }

        .card-body {
            margin-left: 20% !important;
            margin-right: 20% !important;
            background-color: #ff6f61;
            color: #0f4c81;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<?php

include("../../include/connection.php");
$id=$_GET['id'];
?>
<div class="wrapper">
    <?php
    include("sidenav.php");
    ?>

    <div id="content" style="padding: 0px 10px !important;">
        <?php
        include("../../include/headerstud.php");
        ?>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Get Selected?</li>
                    </ol>
                </nav>
            </div>
        </div>

        <?php
        $id = $_SESSION['student'];

        $sel = mysqli_query($connect, " SELECT * FROM student WHERE uid='$id'");
        $row = mysqli_fetch_array($sel);
        $name=$row['fname']." ".$row['lname'];

        $branch=$row['branch'];


        if (isset($_POST['meet'])) {
            
            //$name = $_POST['name'];
            //$branch = $_POST['branch'];
            $ename = $_POST['ename'];
            $sum = $_POST['sum'];
            $time = $_POST['time'];
           
                
                

                    


                    
                        $emaiil = $row['email'];

                        $mail = $emaiil;

                        $ciphering = "AES-128-CTR";

                        $options = 0;

                        $decryption_iv = '1234567891011121';
                        $decryption_key = "W@rmachineRox@h0pe";

                        $decryption = openssl_decrypt($mail, $ciphering, $decryption_key, $options, $decryption_iv);
                        $de='2018.yashvi.hiranandani@ves.ac.in';
                        require_once('../../PHPMailer/PHPMailerAutoload.php');
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
                        $mail->Subject = 'I want to be a selected member';
                        $mail->Body = 'The event I want to arrange is ' . $ename . ' on ' . $time . '. The details are as follows ' . $sum . ' for branch ' . $branch;
                        $mail->AddAddress($de);
                        $mail->Send();

                    }


                
            


        
        ?>

        <div class="card-body">
            <h5 class="text-center my-3 title">Request Form</h5>
            <form method="post" class="form-box px-3">


                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Branch</label>
                    <input type="text" name="branch" class="form-control" value="<?php echo $branch; ?>" disabled>
                </div>

                
                <br>
                 <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" name="ename" class="form-control" required>
                </div>
                <br>
                <div class="form-input">
                    <label>Event Summary</label>
                    <input type="text" name="sum" class="form-control" required>
                </div>
                <br>
                <div class="form-input">
                    <label for="meeting-time">Choose date and time for the event:</label>
                    <input type="datetime-local" class="form-control" id="meeting-time" name="time" min=NOW() required>
                </div>

                <div class="form-input" align="center">
                    <button type="submit" name="meet" class="btn btn-info" style="margin-top: 8px;">Submit Form
                    </button>
                </div>
            </form>


        </div>


    </div>
</div>


<script>
    function getState(val) {
        $.ajax({
            type: "POST",
            url: "ajax_session.php",
            data: 'class=' + val,
            success: function (data) {
                $("#print").html(data);
            }

        });
    }
</script>
</body>
</html>
