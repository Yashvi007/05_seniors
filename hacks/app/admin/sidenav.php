<?php

include("../../include/connection.php");
$spec = $_SESSION['admin'];


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin_panel-master/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../admin_panel-master/assets/css/color.css">

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

<nav id="sidebar" style="max-width: 250px !important;">
    <div class="sidebar-header">
        <a class="navbar-brand ml-4" href="#"><img class="hopeimg" src="../../include/img/vesit.jpeg"
                                                   style="width:50px;margin:15px 30px; height: 50px;"></a>
    </div>

    <ul class="menu" style="list-style-type: none;">
        <li><a href="department.php" class="active">
                <span class="icon"><i class="fas fa-user"></i></span>
                <span class="text">Department</span>
            </a></li>

        <li><a href="committee.php">
                <span class="icon"><i class="fas fa-book"></i></span>
                <span class="text">Committee</span>
            </a></li>
            <li><a href="society.php">
                <span class="icon"><i class="fas fa-book"></i></span>
                <span class="text">Society</span>
            </a></li>
        <li><a href="student_bodies.php">
                <span class="icon"><i class="fas fa-graduation-cap"></i></span>
                <span class="text">Student Bodies</span>
            </a></li>
        <li><a href="event.php" class="active">
                <span class="icon"><i class="fas fa-user"></i></span>
                <span class="text">Event</span>
            </a></li>
        <li><a href="student.php">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <span class="text">Student</span>
            </a></li>
        
        

    </ul>

</nav>


</body>
</html>