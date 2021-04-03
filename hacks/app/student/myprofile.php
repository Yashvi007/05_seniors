<?php
session_start();
if (!isset($_SESSION['student']) && empty($_SESSION['student'])) {

    header("Location: ../studentlogin.php");
    exit();

}
?>
<html>
<head>
    <title>Student Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../resources/css/stylestudd.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active')
            });
        });
    </script>
    <style>
        @media (max-width: 420px) {
            input[type="file"] {
                color: transparent;
            }
        }

        form {
            padding: 5% 5% 0% 5%;
        }


        .table {
            margin-top: 20px;
            border: 1px solid black;
            text-align: center;


        }


        th, tr {
            border: 1px solid black;

        }

        th {
            background-color: #e1e1e1;
            color: black;


        }

    </style>

    <script>
        $(function () {
            $('input[type="file"]').change(function () {
                if ($(this).val() != "") {
                    $(this).css('color', '#333');
                } else {
                    $(this).css('color', 'transparent');
                }
            });
        })
    </script>
</head>
<body>

<div class="wrapper">


    <?php
    include("sidenav.php");
    ?>


    <div id="content" style="padding: 0px 10px !important;">
        <?php
        include("../../include/headerstud.php");
        include("../../include/connection.php");
        global $show;
        $spec = $_SESSION['student'];
        $query = "SELECT * FROM student WHERE username='$spec'";
        $res = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($res);

        ?>
        <div>
            <?php echo $show;

            ?>
        </div>


        <form method="post" enctype="multipart/form-data" action="php/photo.php">
            <?php

            echo "<img  src='img/" . $row['profile'] . "' style='height:30%;width: 30%;' class='rounded-circle imggg mb-3'><br>";


            ?>
            <input type="file" name="img" class="smy-1" style="width: 250px;"><br><br>
            <input type="hidden" name="spec" value=<?php echo $spec; ?>>

            <button type="submit" name="upload" id="upload" class="btn btn-info btn-lg" >Upload Photo
            </button>
        </form>

        
        <table class="table table-striped table-bordered">
            <tr>
                <th colspan="2" class="text-center">Details</th>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $row['name']; ?></td>
            </tr>


            <tr>
                <td>Username</td>
                <td><?php echo $row['username']; ?></td>
            </tr>

            <tr>
                <td>Class</td>
                <td><?php echo $row['class']; ?></td>
            </tr>
            <tr>
                <td>Email</td>

                <td><?php
                    $mail = $row['email'];
                    $ciphering = "AES-128-CTR";
                    $options = 0;
                    $decryption_iv = '1234567891011121';
                    $decryption_key = "W@rmachineRox@h0pe";
                    $decryption = openssl_decrypt($mail, $ciphering, $decryption_key, $options, $decryption_iv);
                    echo $decryption;


                    ?></td>
            </tr>


        </table>


        <br>

        <h5 class="text-center my-2">Change Username</h5>


        <form method="post" enctype="multipart/form-data" action="php/username.php">
            <label>Change Username</label>
            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
            <br>
            <input type="hidden" name="spec" value=<?php echo $spec; ?>>
            <input type="submit" name="change_uname" class="btn btn-info" value="Change Username" >
        </form>
        <br><br>

        <h5 class="text-center my-2">Change Password</h5>


        <form method="post" enctype="multipart/form-data" action="php/password.php">
            <div class="form-group">
                <label>Old password</label>
                <input type="password" name="old_pass" class="form-control" autocomplete="off"
                       placeholder="Enter old password">
            </div>

            <div class="form-group">
                <label>New password</label>
                <input type="password" name="new_pass" class="form-control" autocomplete="off"
                       placeholder="Enter new password">
            </div>
            <input type="hidden" name="spec" value=<?php echo $spec; ?>>
            <div class="form-group">
                <label>Confirm password</label>
                <input type="password" name="con_pass" class="form-control" autocomplete="off"
                       placeholder="Confirm password">
            </div>

            <input type="submit" name="change_pass" class="btn btn-info" value="Change Password" >

        </form>
        <br><br>


    </div>


</div>
<?php

        if (isset($_SESSION['error'])) {

            $l = $_SESSION['error'];
           echo "<script type='text/javascript'>
$(document).ready(function(){
$('#myModal').modal('show');
});

</script>"; 
$_SESSION['error']="";
}
?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body text-center">
          <p><?php echo $l; ?> </p>
          <button type="button" class="btn btn-default text-white" data-dismiss="modal" style="background-color: #0f4c81; justify:center; ">Close</button>
        </div>
        
      </div>
      
    </div>
  </div> 
<?php
           

            unset($_SESSION['error']);
        
        ?>



</body>
</html>