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
        <h4 class="my-2 mx-4">Events</h4>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-4">
                        <li class="breadcrumb-item active" aria-current="page">Admin/Events</li>
                    </ol>
                </nav>
            </div>

        </div>
        <style type="text/css">
            .table-responsive {
                max-height: 250px;

            }
        </style>
        <h4>Society Events</h4>
        <?php
        $query = "SELECT * from events_society where edate>=NOW() and approved_by is not NULL";
        $res = mysqli_query($connect, $query);


        echo "<div class='scroll'>
        <table class='table table-striped table-responsive table-bordered my-3'>
            <thead >
            <tr >
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>ID</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Event Name</th>
                <th style='width:300px;'  class='coll text-center head' scope='col' id='myc'>Arranged By</th>
                
                          
            </tr>
            </thead>
            <tbody>";
        if (mysqli_num_rows($res) < 1) {
            echo "
<tr><td colspan=3>No Events Yet</td></tr>
        ";
        }

        while ($row = mysqli_fetch_array($res)) {
            $id = $row['id'];
            $ename = $row['ename'];
            $arr=$row['arranged_by'];
            $qq="SELECT fname,lname from student where uid='$arr'";
            $re=mysqli_query($connect,$qq);
            $reo=mysqli_fetch_array($re);
            $name=$reo['fname'].' '.$reo['lname'];
            


            echo "<tr>
        <td >$id</td>
        <td>$ename</td>
        <td>$name</td>
        

        </tr>";
        }
        echo "</tbody></table></div>";
        ?>

<h4>Student Body Events</h4>
        <?php
        $queryy = "SELECT * from event_sbodies where edate>=NOW() and faculty_approved is not NULL";
        $ress = mysqli_query($connect, $queryy);


        echo "<div class='scroll'>
        <table class='table table-striped table-responsive table-bordered my-3'>
            <thead >
            <tr >
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>ID</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Event Name</th>
                <th style='width:300px;'  class='coll text-center head' scope='col' id='myc'>Arranged By</th>
                
                          
            </tr>
            </thead>
            <tbody>";
        if (mysqli_num_rows($ress) < 1) {
            echo "
<tr><td colspan=3>No Events Yet</td></tr>
        ";
        }

        while ($row = mysqli_fetch_array($ress)) {
            $id = $row['id'];
            $ename = $row['ename'];
            $arr=$row['arranged_by'];
            $qq1="SELECT fname,lname from student where uid='$arr'";
            $re1=mysqli_query($connect,$qq1);
            $reo1=mysqli_fetch_array($re1);
            $name=$reo1['fname'].' '.$reo1['lname'];
            


            echo "<tr>
        <td >$id</td>
        <td>$ename</td>
        <td>$name</td>
        

        </tr>";
        }
        echo "</tbody></table></div>";
        ?>

<h4>Faculty Events</h4>
        <?php
        $query = "SELECT * from event_faculty where edate>=NOW() and approved_by is not NULL";
        $res = mysqli_query($connect, $query);


        echo "<div class='scroll'>
        <table class='table table-striped table-responsive table-bordered my-3'>
            <thead >
            <tr >
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>ID</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Event Name</th>
                <th style='width:400px;'  class='coll text-center head' scope='col' id='myc'>Department Name</th>
                <th style='width:300px;'  class='coll text-center head' scope='col' id='myc'>Arranged By</th>
                
                          
            </tr>
            </thead>
            <tbody>";
        if (mysqli_num_rows($res) < 1) {
            echo "
<tr><td colspan=4>No Events Yet</td></tr>
        ";
        }

        while ($row = mysqli_fetch_array($res)) {
            $id = $row['id'];
            $ename = $row['ename'];
            $arr=$row['arranged_by'];
            $dep=$row['department'];
            $q2="SELECT * from department where did='$dep'";
            $re2=mysqli_query($connect,$q2);
            $re3=mysqli_fetch_array($re2);
            $de=$re3['dname'];
            $qq="SELECT fname,lname from faculty where eid='$arr'";
            $re=mysqli_query($connect,$qq);
            $reo=mysqli_fetch_array($re);
            $name=$reo['fname'].' '.$reo['lname'];
            


            echo "<tr>
        <td >$id</td>
        <td>$ename</td>
        <td>$de</td>
        <td>$name</td>
        

        </tr>";
        }
        echo "</tbody></table></div>";
        ?>


        



   
</body>
</html>