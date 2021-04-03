<?php
session_start();
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {

    header("Location: ../adminlogin.php");


}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Total Student</title>
    <style type="text/css">
        .table {
            margin-top: 20px;
            border: 1px solid black;
            text-align: center;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
        }

        .head {
            background-color: #bbdfff;


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
        include("../../include/headeram.php");
        ?>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Student</li>
                    </ol>
                </nav>
            </div>

        </div>
        <h5 class="text-center my-3">Total Selected Students</h5>


        <style type="text/css">
            .scroll {


                overflow: scroll;
                height: 250px;

            }
        </style>
        <?php
        $query = " SELECT * FROM student where status != 0";
        $res = mysqli_query($connect, $query);
        $output = "";
        $output .= "
						<div class='scroll'>
						<table id='pat' class='table  table-bordered table-striped'>
							<tr>
					 			<th class='head' scope='col'>ID</td>
								<th style='width:275px;' class='head' scope='col'>Name</th>
								 
								 <th class='head' scope='col'>Department</th>
								    <th class='head' scope='col'>Registration Year</th>
								   <th class='head' scope='col'>Action</th>
					
								</tr>
						";
        if (mysqli_num_rows($res) < 1) {

            $output .= "

<tr>
<td class='text-center' colspan='5'>No Students Registered</td>
</tr>

";
        }


        while ($row = mysqli_fetch_array($res)) {
            $name=$row['fname']." ".$row['lname'];
            $output .= "



<tr>
<td>" . $row['uid'] . "</td>
<td>".$name."</td>
<td>" . $row['branch'] . "</td>
<td>" . $row['regyear'] . "</td>

<td>
<a href='php/editstud.php?id=" . $row['uid']."'>
<button class='btn btn-info' style='size:100px;'>Unselect</button>


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

   

    
<h2 class="text-center"> Add Selected Students</h2>



        <form method="POST" enctype="multipart/form-data" action="php/addstud.php">
            <div class="form-group">
                <label>Enter Student ID</label>
                <input type="text" name="studid" class="form-control">
                <br>
            </div>
            
            <button type="submit" name="upload" id="upload" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#myModal">Add
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