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
        <h4 class="my-2 mx-4">Committee</h4>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-4">
                        <li class="breadcrumb-item active" aria-current="page">Admin/Institute Wise Committee</li>
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
        $query = "SELECT * from societies";
        $res = mysqli_query($connect, $query);


        echo "<div class='scroll'>
        <table class='table table-striped table-responsive table-bordered my-3'>
            <thead >
            <tr >
                <th class='coll text-center head' scope='col' id='myc'>ID</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Society Name</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Chairperson</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Staff InCharge</th>
                
             
                
                          
            </tr>
            </thead>
            <tbody>";
        if (mysqli_num_rows($res) < 1) {
            echo "
<tr><td colspan=4>No Societies Yet</td></tr>
        ";
        }

        while ($row = mysqli_fetch_array($res)) {
            $mid=$row['mid'];
            $id=$row['id'];
            $name=$row['name'];
            $staff=$row['staff_incharge'];

            $q22="SELECT fname,lname from student where uid='$mid'";
            $r22=mysqli_query($connect,$q22);
            $r22ww=mysqli_fetch_array($r22);
            $stu=$r22ww['fname']." ".$r22ww['lname'];

            $q2="SELECT fname,lname from faculty where eid='$staff'";
            $r2=mysqli_query($connect,$q2);
            $r2ww=mysqli_fetch_array($r2);
            
            $chead=$r2ww['fname']." ".$r2ww['lname'];

            


            echo "<tr>
        <td >$id</td>
        <td>$name</td>
        <td>$stu</td>
        <td>$chead</td>
       

        </tr>";
        }
        echo "</tbody></table></div>";
        ?>


        <h2 class="text-center"> Add New Society</h2>



        <form method="POST" enctype="multipart/form-data" action="php/addsoc.php">
            <div class="form-group">
                <label>Enter Institute Wise Committee Name</label>
                <input type="text" name="cname" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Enter Chairperson ID</label>
                <input type="text" name="stud" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Enter Staff InCharge</label>
                <input type="text" name="staff" class="form-control">
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