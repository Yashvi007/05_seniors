<?php
session_start();
include("../../include/connection.php");
include("../../include/tags.php");

$sb_id = $_POST['keyname'];
$query = "SELECT * from event_sbodies WHERE sbid='$sb_id'";
$res = mysqli_query($connect, $query);
$stud_id = $_SESSION['student'];

while (($row = mysqli_fetch_array($res))) {


    $e_id = $row['id'];
    $ename = $row['ename'];
    $qq = "SELECT * from reg_sbody where event_id ='$e_id' AND stud_id='$stud_id'";
    $res2 = mysqli_query($connect, $qq);
    if (mysqli_num_rows($res2) == 1) {
        echo "

<div class='col-md-4' style='margin-top:20px;'>
<div class='card' style='height:200px; >
<div class='col-md-12'>
      <div class='row'>
      <div class='col-md-3'></div>

      <div class='col-md-6' style='margin-top:20px;'>
  <i class='fa fa-book card-img-top center' style='color:#0f4c81;'></i>
 
      </div>
      <div class='col-md-3'></div>
<div class='card-body'>
<h6 class='card-title'>$ename</h6>


<a href='#?id=$e_id' class='btn btn-primary'>Registered</a>
</div>

</div>
</div>
</div>
</div>



";
    } else {
        echo "

<div class='col-md-4'  style='margin-top:20px;'>
<div class='card' style='height:200px; >
<div class='col-md-12'>
      <div class='row'>
      <div class='col-md-3'></div>

      <div class='col-md-6' style='margin-top:20px;'>
  <i class='fa fa-book card-img-top center' style='color:#0f4c81;'></i>
 
      </div>
      <div class='col-md-3'></div>
<div class='card-body'>
<h6 class='card-title'>$ename</h6>


<a href='php/sbreg.php?id=$e_id&sb_id=$sb_id' class='btn btn-primary'>Participate</a>
</div>

</div>
</div>
</div>
</div>


";

    }


}


?>
  
