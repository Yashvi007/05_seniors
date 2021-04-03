<!DOCTYPE html>
<html>
<head>
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin_panel-master/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/styleam.css">

    <link rel="stylesheet" href="../admin_panel-master/assets/fonts/css/all.min.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <style type="text/css">

        .hopeimg:hover {
            transform: scale(1.3);

        }

        .hopeimg {
            transition: transform 1.5s ease;
        }

    </style>
</head>
<body>

<nav id="sidebar">
    <div class="sidebar-header">
        <a class="navbar-brand ml-4" href="#"><img class="hopeimg" src="../../include/img/vesit.jpeg"
                                                   style="width:50px;margin:15px 30px; height: 50px;"></a>
    </div>

    <ul class="menu" style="list-style-type: none;">
        <li><a href="index.php" class="active">
                <span class="icon"><i class="fas fa-user"></i></span>
                <span class="text">Dashboard</span>
            </a></li>
        <li><a href="myprofile.php">
                <span class="icon"><i class="fas fa-user"></i></span>
                <span class="text">My Profile</span>
            </a></li>
        <li><a href="hostevent.php">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Host Event</span>
            </a></li>
        

        <?php
            include("../../include/connection.php");
            $user = $_SESSION['mentor'];

            $query = "SELECT * from student_bodies where faculty_head = '$user'";
            $result = mysqli_query($connect,$query);
            $row = mysqli_fetch_array($result);
            if($row){
                $sbid = $row['id'];
                echo '<li><a href="sbmembers.php?sbid='.$sbid.'">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Edit Student Body members</span>
            </a></li>';
                echo '<li><a href="approve_event.php?sbid='.$sbid.'">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Approve Student Body Events</span>
            </a></li>';
            }
            

            $query1 = "SELECT * from societies where staff_incharge = '$user'";
            $result1 = mysqli_query($connect,$query1);
            $row1 = mysqli_fetch_array($result1);
            if($row1){
                $sid = $row1['id'];
                echo '<li><a href="smembers.php?sid='.$sid.'">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Add Society Student members</span>
            </a></li>';
                
            }

            $u='HoD';

            $query11= "SELECT * from faculty where designation = '$u' and eid = '$user'";
            $result11 = mysqli_query($connect,$query11);
            $row11 = mysqli_fetch_array($result11);
            if($row11){
                #$sbid = $row['id'];
                echo '<li><a href="approve_socevent.php">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Approve Society Events</span>
            </a></li>';

                echo '<li><a href="hodapprove.php">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Approve Faculty Events</span>
            </a></li>';
                
            }

            

            



        ?>
        
        

    </ul>

</nav>


</body>
</html>