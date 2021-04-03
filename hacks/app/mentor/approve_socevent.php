<?php
session_start();
if (!isset($_SESSION['mentor']) && empty($_SESSION['mentor'])) {

    header("Location: ../mentorlogin.php");


}
$u = $_SESSION['mentor'];

$m=$u;

include("../../include/connection.php");
$q11="SELECT depid from faculty where eid='$u'";
$re1=mysqli_query($connect,$q11);
$ro1=mysqli_fetch_array($re1);
$dep=$ro1['depid'];

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
                        <li class="breadcrumb-item active" aria-current="page">Approve Society Event</li>
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
        
        
       
        $query = "SELECT * from events_society where  approved_by is NULL";
        $res = mysqli_query($connect, $query);


        echo "<div class='scroll'>
        <table class='table table-striped table-responsive table-bordered my-3'>
            <thead >
            <tr >
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Id</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Event Name</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Arranged By</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Date</th>
                <th style='width:300px;'  class='coll text-center head' scope='col' id='myc'>Action</th>
                
                          
            </tr>
            </thead>
            <tbody>";
        if (mysqli_num_rows($res) < 1) {
            echo "
<tr><td colspan=5>No Events to be Approved Yet</td></tr>
        ";
        }

        while ($row = mysqli_fetch_array($res)) {
            $id = $row['id'];
            $ename = $row['ename'];
            $arr=$row['arranged_by'];
            $date=$row['edate'];
            $qw="SELECT fname,lname from student where uid='$arr'";
            $rw=mysqli_query($connect,$qw);
            $req=mysqli_fetch_array($rw);
            $name=$req['fname']." ".$req['lname'];
            


            echo "<tr>
        <td >$id</td>
        <td>$ename</td>
        <td>$name</td>
        <td>$date</td>

        <td><a href='php/approves.php?id=" . $id . "&app=" . $m ."'>
<button class='btn btn-info' style='size:100px;'>Approve</button></td>

        </tr>";
        }
        echo "</tbody></table></div>";
        ?>


        <!--<form method="POST" enctype="multipart/form-data" action="php/eventdetails.php">
            <div class="form-group">
                <label>Enter Event Name</label>
                <input type="text" name="ename" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label>Enter Event Level</label>
                <select name="event">
                    <option value="event_faculty">Department</option>
                    <option value="event_sbodies">Student Body</option>

                </select>
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

-->
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