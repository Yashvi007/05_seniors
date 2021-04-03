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
        <h4 class="my-2 mx-4">Student Bodies</h4>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-4">
                        <li class="breadcrumb-item active" aria-current="page">Admin/Student Bodies</li>
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
        $query = "SELECT * from student_bodies";
        $res = mysqli_query($connect, $query);


        echo "<div class='scroll'>
        <table class='table table-striped table-responsive table-bordered my-3'>
            <thead >
            <tr >
                <th class='coll text-center head' scope='col' id='myc'>ID</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Name</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Faculty Head</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>General Secretary</th>
                 <th style='width:300px;'  class='coll text-center head' scope='col' id='myc'>Junior Deputy</th>
                <th style='width:300px;'  class='coll text-center head' scope='col' id='myc'>Senior Deputy</th>
                
                          
            </tr>
            </thead>
            <tbody>";
        if (mysqli_num_rows($res) < 1) {
            echo "
<tr><td colspan=6>No Student Body Yet</td></tr>
        ";
        }

        while ($row = mysqli_fetch_array($res)) {
            $id = $row['id'];
            $name=$row['name'];
            $f_h=$row['faculty_head'];
            $q2="SELECT fname,lname from faculty where eid='$f_h'";
            $r2=mysqli_query($connect,$q2);
            $r2ww=mysqli_fetch_array($r2);
            $fhead=$r2ww['fname']." ".$r2ww['lname'];
            $gs = $row['general_secretary'];
            $jd = $row['junior_deputy'];
            $sd = $row['senior_deputy'];

            


            echo "<tr>
        <td >$id</td>
        <td>$name</td>
        <td>$fhead</td>
        <td>$gs</td>
        <td>$jd</td>
        <td>$sd</td>

        </tr>";
        }
        echo "</tbody></table></div>";
        ?>


        <h2 class="text-center"> Add New Student Body</h2>



        <form method="POST" enctype="multipart/form-data" action="php/addsb.php">
            <div class="form-group">
                <div class="form-group">
                <label>Enter Student Body Name</label>
                <input type="text" name="sbname" class="form-control">
                <br>
            </div>

                <label>Enter Faculty ID</label>
                <input type="text" name="fid" class="form-control">
                <br>
            </div>
          
            

            <button type="submit" name="upload" id="upload" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#myModal">Create
            </button>

        </form>
          <h2 class="text-center">Edit Faculty Head</h2>



        <form method="POST" enctype="multipart/form-data" action="php/addsb.php">
            <div class="form-group">
                <div class="form-group">
                <label>Enter Student Body Name to Edit</label>
                <input type="text" name="sbname" class="form-control">
                <br>
            </div>

                <label>Enter Faculty ID to Edit</label>
                <input type="text" name="fid" class="form-control">
                <br>
            </div>
          
            

            <button type="submit" name="change" id="change" class="btn btn-info btn-lg" data-toggle="modal"
                    data-target="#myModal">Change
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