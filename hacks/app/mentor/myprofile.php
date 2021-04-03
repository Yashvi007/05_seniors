<?php
session_start();
if (!isset($_SESSION['mentor']) && empty($_SESSION['mentor'])) {

    header("Location: ../mentorlogin.php");


}
?>
<html>
<head>
    <title>Mentor Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        form {
            padding: 5% 5% 0% 5%;
        }


        .table {
            margin-top: 20px;
            border: 1px solid black;
            text-align: center;
            padding: 0% 5% 0% 5% !important;


        }

        th, tr {
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
        global $show;
        include("../../include/headermm.php");

        $men = $_SESSION['mentor'];
        $query = "SELECT * FROM mentor as m inner join classes as c on m.m_subid=c.sub_id and m.m_uname='$men'";
        $res = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($res);
        ?>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-4">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>

                    </ol>
                </nav>
            </div>
        </div>


        <table class="table table-bordered table-striped">
            <tr>
                <th colspan="2" class="text-center head" scope='col'>Details</th>
            </tr>
            <tr>
                <td style="font-weight: bold;">Name</td>
                <td><?php echo $row['m_name']; ?></td>
            </tr>


            <tr>
                <td style="font-weight: bold;">Username</td>
                <td><?php echo $row['m_uname']; ?></td>
            </tr>

            <tr>
                <td style="font-weight: bold;">Subject ID</td>
                <td><?php echo $row['m_subid']; ?></td>
            </tr>


            <tr>
                <td style="font-weight: bold;">Subject</td>
                <td><?php echo $row['sub_name']; ?></td>
            </tr>

        </table>


        <h5 class="text-center my-2" style="font-weight: bold;">Change Username</h5>



        <form method="post" enctype="multipart/form-data" action="php/username.php">
            <label>Change Username</label>
            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
            <input type="hidden" name="men" value=<?php echo $men; ?>>
            <br>
            <input type="submit" name="change_uname" class="btn btn-info" value="Change Username">
        </form>


        <h5 class="text-center my-2" style="font-weight: bold;">Change Password</h5>

        <form method="post" enctype="multipart/form-data" action="php/password.php">
            <div class="form-group">
                <label>Old password</label>
                <input type="password" name="old_pass" class="form-control" autocomplete="off"
                       placeholder="Enter old password">
            </div>
            <input type="hidden" name="men" value=<?php echo $men; ?>>
            <div class="form-group">
                <label>New password</label>
                <input type="password" name="new_pass" class="form-control" autocomplete="off"
                       placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label>Confirm password</label>
                <input type="password" name="con_pass" class="form-control" autocomplete="off"
                       placeholder="Confirm password">
            </div>

            <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">

        </form>


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
    echo '
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body text-center">
          <p>' . $l . '</p>
          <button type="button" class="btn btn-default text-white" data-dismiss="modal" style="background-color: #0f4c81; justify:center; ">Close</button>
        </div>
        
      </div>
      
    </div>
  </div> ';

    unset($_SESSION['error']);
}
?>

</body>
</html>