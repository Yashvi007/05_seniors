<?php
session_start();
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {

    header("Location: ../adminlogin.php");


}
include("../../include/connection.php");
$id = $_GET['id'];
$did = $_GET['did'];



?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .table {
            margin-top: 20px;
            border: 1px solid black;
            text-align: center;
        }

        th, td {
            border: 1px solid black;
        }

        .head {
            background-color: #bbdfff;
        }

        .scroll {
            overflow: scroll;
            height: 350px;
            margin-top: 20px;

        }
    </style>
</head>
<body>

<div class="wrapper">
    <?php
    include("sidenav.php");
    ?>

    <div id="content" style="padding: 0px 10px !important;">
        <?php
        include("../../include/headeram.php");
        $q1="SELECT * from faculty where eid='$id'";
        $res=mysqli_query($connect,$q1);
        $row=mysqli_fetch_array($res);
        ?>

 
<h2 class="text-center">Modify Details of <?php echo $row['fname']. " ". $row['lname']; ?></h2>



        <form method="POST" enctype="multipart/form-data" action="php/modifymem.php">
            <div class="form-group">
                <label>Enter Member First Name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>">
                <br>
            </div>
            <div class="form-group">
                <label>Enter Member Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>">
                <br>
            </div>
            
            <div class="form-group" disabled>
                              <select name="gender">
                                <option>Gender: <?php echo $row['gender']; ?></option>
                              </select>
            </div>
            <div class="form-group">
                <label>Enter Designation</label>
                <input type="text" name="designation" class="form-control" value="<?php echo $row['designation']; ?>">
                <br>

            </div>
            <?php 
            $phone = $row['phone'];
            $ciphering = "AES-128-CTR";
            $options = 0;
            $decryption_iv = '1234567891011121';
            $decryption_key = "W@rmachineRox@h0pe";
            $decryption = openssl_decrypt($phone, $ciphering, $decryption_key, $options, $decryption_iv);
            
            ?>
            <input type="hidden" name="eid" value="<?php echo $id; ?>">
            <input type="hidden" name="depid" value="<?php echo $did; ?>">
            <div class="form-group">
                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" autocomplete="off"
                                       pattern="[0-9]{10}" placeholder="999-999-9999" value="<?php echo $decryption; ?>">
            </div>

            

            <button type="submit" name="upload" id="upload" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#myModal">Modify
            </button>

        </form>


    </div>
</div>
<?php


if (isset($_SESSION['error'])) {



        $var = $_SESSION['error'];
        echo "<script type='text/javascript'>
$(document).ready(function(){
$('#myModal').modal('show');
});

</script>";

        echo '
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body text-center">
          <p>' . $var . '</p>
         <button type="button" class="btn btn-default text-white" data-dismiss="modal" style="background-color: #0f4c81; justify:center; width: auto !important;
margin-left: 0px !important;">Close</button>
        </div>
        
      </div>
      
    </div>
  </div> ';


        unset($_SESSION['error']);

    }



?>
</body>
</html>
</body>
</html>