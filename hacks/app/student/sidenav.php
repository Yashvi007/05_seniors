<!DOCTYPE html>
<html>
<head>
    <title></title>


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

<!-- Sidebar  -->
<div class="side" style="background-color: #0F4C81 !important;">
    <nav id="sidebar" style="height: 1800px !important;">
        <div class="sidebar-header">
            <a class="navbar-brand ml-4" href="#"><img class="hopeimg" src="../../include/img/vesit.jpeg" style=";width:50px;margin:15px 30px; height: 50px;"></a>
        </div>

        <ul class="menu" style="list-style-type: none;">


            <li><a href="myprofile.php">
                    <span class="icon"><i class="fas fa-user" style="color:#0F4C81;"></i></span>
                    <span class="text" style="color:#0F4C81;">My Profile</span>
                </a></li>
                <?php 
                $user=$_SESSION['student'];
                $q1="SELECT status from student where uid='$user'";
                $r21=mysqli_query($connect,$q1);
                $re1=mysqli_fetch_array($r21);
                $status=$re1['status'];

                include("../../include/connection.php");
                $query1 = "SELECT * from student_bodies where general_secretary = '$user' or senior_deputy='$user' or junior_deputy='$user'";
            $result1 = mysqli_query($connect,$query1);
            $row1 = mysqli_fetch_array($result1);
            if($row1){
                $sid = $row1['id'];
                echo '<li><a href="sbodies.php?id='.$sid.'">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Add Student Body Event</span>
            </a></li>';
        }
            $quer1 = "SELECT * from societies where mid='$user'";
            $resut1 = mysqli_query($connect,$quer1);
            $rw1 = mysqli_fetch_array($resut1);
            if($rw1){
                $sid = $rw1['id'];
                echo '<li><a href="societies.php?id='.$sid.'">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Add Society Events</span>
            </a></li>';
                
            }
            if($status==0 && !$rw1 && !$row1){
                echo '<li><a href="select.php?id='.$user.'">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Be a Selected Member?</span>
            </a></li>';
            }
            ?>
            
            


        </ul>


    </nav>
</div>


</body>
</html>