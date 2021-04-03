<?php
session_start();
if (!isset($_SESSION['mentor']) && empty($_SESSION['mentor'])) {

    header("Location: ../mentorlogin.php");


}
$u = $_SESSION['mentor'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>ADD CONTENT </title>
    <style type="text/css">
        .table {
            margin-top: 20px;
            border: 1px solid black;
            text-align: center;
            padding: 0% 5% 0% 5% !important;
        }

        th, td {
            border: 1px solid black;
        }

        .head {
            background-color: #bbdfff;


        }

        .scroll {


            overflow: scroll;
            height: 450px;

        }
    </style>

</head>

<body>
<?php

include("../../include/connection.php");
?>
<div class="wrapper">
    <?php
    include("sidenav.php");
    ?>

    <div id="content" style="padding: 0px 10px !important;">
        <?php
        include("../../include/headermm.php");
        ?>

        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Host Event</li>
                    </ol>
                </nav>
            </div>
        </div>

    

        <form method="POST" enctype="multipart/form-data" action="php/eventdetails.php">
            <div class="form-group">
                <label>Enter Event Name</label>
                <input type="text" name="ename" class="form-control">
                <br>
            </div>

            

            <div class="form-group">
                <label>Enter Event Summary</label>
                <input type="text" name="summ" class="form-control">
                <br>
            </div>


            <div class="form-group">
                <label>Enter Date</label>
                <input type="date" name="edate" class="form-control">
                <br>
            </div>
            
            <button type="submit" name="upload" id="upload" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#myModal">Create
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