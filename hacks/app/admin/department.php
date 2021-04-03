<?php
session_start();
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {

    header("Location: ../adminlogin.php");


}
?>

<html>
<head>
    <title>Admin Dashboard</title>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
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
        <h4 class="my-2 mx-4">Departments</h4>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-4">
                        <li class="breadcrumb-item active" aria-current="page">Admin/Departments</li>
                    </ol>
                </nav>
            </div>

        </div>
        <style type="text/css">
            .table-responsive {
                max-height: 250px;

            }
        </style>
        <?php
        $query = "SELECT * from department";
        $res = mysqli_query($connect, $query);


        echo "<div class='scroll'>
        <table class='table table-striped table-responsive table-bordered my-3'>
            <thead >
            <tr >
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>ID</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Department Name</th>
                <th style='width:300px;'  class='coll text-center head' scope='col' id='myc'>View</th>
                
                          
            </tr>
            </thead>
            <tbody>";
        if (mysqli_num_rows($res) < 1) {
            echo "
<tr><td colspan=3>No Department Yet</td></tr>
        ";
        }

        while ($row = mysqli_fetch_array($res)) {
            $did = $row['did'];
            $dname = $row['dname'];

            


            echo "<tr>
        <td >$did</td>
        <td>$dname</td>
        <td><a href='viewdep.php?id=" . $row['did'] . "&name=" . $row['dname'] . "'>
<button class='btn btn-info' style='size:100px;'>View</button></td>

        </tr>";
        }
        echo "</tbody></table></div>";
        ?>


        <h2 class="text-center"> Add New Department</h2>



        <form method="POST" enctype="multipart/form-data" action="php/addep.php">
            <div class="form-group">
                <label>Enter Department Name</label>
                <input type="text" name="dname" class="form-control">
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