<?php
session_start();
if (!isset($_SESSION['student']) && empty($_SESSION['student'])) {

    header("Location: ../studentlogin.php");


}
include("../../include/connection.php");
$user = $_SESSION['student'];
$q = "SELECT * from student where uid='$user'";
$r = mysqli_query($connect,$q);
$r1 = mysqli_fetch_array($r);
$branch = $r1['branch'];
$q1 = "SELECT * from department where dname='$branch'";
$rr = mysqli_query($connect,$q1);
$res = mysqli_fetch_array($rr);
$depid = $res['did'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>COURSE </title>
    <link rel="stylesheet" href="../../resources/css/stylestudd.css">

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active')
            });
        });
    </script>
    <style type="text/css">
        @media (max-width: 420px) {
            th {
                width: 350px;
            }

            .side {
                height: 4200px !important;
                background-color: #bbdfff !important;
            }

            .
        }


    </style>
</head>

<body>

<div class="wrapper">


    <?php
    include("sidenav.php");
    ?>


    <div id="content" style="padding: 0px 10px !important;">
        <?php
        include("../../include/headerstud.php");
        ?>


        <h1 class="text-center">Ongoing Events</h1>
        <br>
        <div class="row">

            <div class="col-md-4">
                <select id="sbody" class="custom-select">
                    <option value=''>Student Body Events</option>
                    <?php 
             $query = "SELECT * FROM student_bodies";
             $result = mysqli_query($connect,$query);
             while($row = mysqli_fetch_array($result))
             {
                $id = $row['id'];
                $name = $row['name'];
                echo "<option value=".$id.">".$name."</option>";
             }


                    ?>
                </select>

            </div>
            <div class="col-md-4">
                  <select id="society" class="custom-select" onChange="getSttate(this.value);">
                    <option value=''>Society Events</option>
                    <?php 
             $query1 = "SELECT * FROM societies";
             $result1 = mysqli_query($connect,$query1);
             while($row1= mysqli_fetch_array($result1))
             {
                $id1 = $row1['id'];
                $name1 = $row1['name'];
                echo "<option value=".$id1.">".$name1."</option>";
             }
             ?>
         </select>
            </div>
            <div class="col-md-4">
                <select id="dep" class="custom-select" onChange="getStttate(this.value);">
                    <option value=''>Departmental Events</option>
                    <?php 
             $query2 = "SELECT * FROM event_faculty where department = '$depid'";
             $result2 = mysqli_query($connect,$query2);
             while($row2 = mysqli_fetch_array($result2))
             {
                $id2 = $row2['id'];
                $name2 = $row2['ename'];
                echo "<option value=".$id2.">".$name2."</option>";
             }


                    ?>
                </select>

            </div>


        </div>
        <br>


        <div class="card-group" id="cardd">

        </div>


    </div>
</div>


<script>


    $(document).ready(function () {
        $("#society").change(function () {
            $.ajax({
                type: 'POST',
                url: 'ajax_table.php',
                data: {keyname: $('#society option:selected').val()},
                success: function (data) {
                    $("#cardd").html(data);
                }
            });
        });
    });

    $(document).ready(function () {
        $("#sbody").change(function () {
            $.ajax({
                type: 'POST',
                url: 'ajax_table1.php',
                data: {keyname: $('#sbody option:selected').val()},
                success: function (data) {
                    $("#cardd").html(data);
                }
            });
        });
    });
    $(document).ready(function () {
        $("#dep").change(function () {
            $.ajax({
                type: 'POST',
                url: 'ajax_table2.php',
                data: {keyname: $('#dep option:selected').val()},
                success: function (data) {
                    $("#cardd").html(data);
                }
            });
        });
    });


</script>
</body>
</html>
