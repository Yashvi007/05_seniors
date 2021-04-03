<?php
session_start();
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {

    header("Location: ../adminlogin.php");


}
include("../../include/connection.php");
$id = $_GET['id'];
$name = $_GET['name'];



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
        ?>
        <h5 class="text-center my-3"><?php echo $name; ?></h5>
        <?php
       
        $output = "";
        $output .= "<div class='scroll'>
						<table id='pat' class='table table-striped table-bordered'>
							<tr>
								<th class='head' scope='col' style='width:5%;'>Id</th>
					 			<th class='head' scope='col'>First Name</th>
                                
                                <th class='head' scope='col'>Last Name</th>
                                <th class='head' scope='col'>Email</th>
                                <th class='head' scope='col'>Designation</th>
                                <th class='head' scope='col'>Phone</th>
								<th class='head' scope='col' style='width:10%;'>Action</th>
								</tr>
						";
        $query = "SELECT * from faculty WHERE depid='$id'";
        $res = mysqli_query($connect, $query);
        if (mysqli_num_rows($res)<1) {

            $output .= "

<tr>
<td class='text-center' colspan='7'>No Faculty Members yet</td>
</tr>

";
        }


        while ($row = mysqli_fetch_array($res)) {
            $mm=$row['email'];
            $ciphering = "AES-128-CTR";
            $options = 0;

            $decryption_iv = '1234567891011121';
            $decryption_key = "W@rmachineRox@h0pe";

            $decryption=openssl_decrypt($mm,$ciphering,$decryption_key, $options, $decryption_iv);

            $mn=$row['phone'];
            

            $decryption1=openssl_decrypt($mn,$ciphering,$decryption_key, $options, $decryption_iv);
            $output .= "




<tr>
<td>" . $row['eid'] . "</td>
<td>" . $row['fname'] . "</td>
<td>" . $row['lname'] . "</td>
<td>" . $decryption . "</td>
<td>" . $row['designation'] . "</td>
<td>" . $decryption1 . "</td>

<td>
<a href='viewmem.php?id=".$row['eid']."&did=".$id."'>
<button class='btn btn-info' style='size:100px;'>Modify</button>


</a>
</td>






";

        }
        $output .= "
</tr>
</table>
</div>
";


        echo $output;

        ?>

   
<h2 class="text-center"> Add New Faculty Member</h2>



        <form method="POST" enctype="multipart/form-data" action="php/addmem.php">
            <div class="form-group">
                <label>Enter Member First Name</label>
                <input type="text" name="fname" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Enter Member Last Name</label>
                <input type="text" name="lname" class="form-control">
                <br>
            </div>
            
            <div class="form-group">
                              <select name="gender">
                                <option>Select your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
            </div>
            <div class="form-group">
                <label>Enter Designation</label>
                <input type="text" name="designation" class="form-control">
                <br>
            </div>
            <input type="hidden" name="depid" value="<?php echo $id; ?>">
            <input type="hidden" name="depname" value="<?php echo $name; ?>">
            <div class="form-group">

                                <input type="text" name="phone" class="form-control" autocomplete="off"
                                       pattern="[0-9]{10}" placeholder="999-999-9999">
            </div>
            <div class="form-group">

                                <input type="password" name="pass" minlength="6" class="form-control" autocomplete="off"
                                       placeholder="Enter Password of minimum 6 characters">
                            </div>
                            <div class="form-group">

                                <input type="password" name="con_pass" class="form-control" autocomplete="off"
                                       placeholder="Confirm Password">
                            </div>

            <button type="submit" name="upload" id="upload" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#myModal">Add Member
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