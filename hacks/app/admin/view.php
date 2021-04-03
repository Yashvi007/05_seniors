<?php
session_start();
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {

    header("Location: ../adminlogin.php");


}
include("../../include/connection.php");
$id = $_GET['id'];
$name = $_GET['name'];

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .table {
            margin-top: 20px;
            border: 1px solid black;
            text-align: center;
        }

        th, td {
            border: 1px solid black;
        }

        .head {
            background-color: #bbdfff;
        }

        .scroll {
            overflow: scroll;
            height: 350px;
            margin-top: 20px;

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
        include("../../include/headeram.php");
        ?>
        <h5 class="text-center my-3"><?php echo $name; ?></h5>
        <?php

        $output = "";
        $output .= "<div class='scroll'>
						<table id='pat' class='table table-striped table-bordered'>
							<tr>
					 			<th class='head' scope='col'>Courses Registered</td>
								<th class='head' scope='col'>Videos Completed</th>
								<th class='head' scope='col'>Total Videos</th>
								</tr>
						";
		$query = "SELECT * from record as r inner join course_list as c on c.course_id=r.cr_id WHERE r.st_id='$id'";
$res = mysqli_query($connect, $query);
        if (mysqli_num_rows($res) < 1) {

            $output .= "

<tr>
<td class='text-center' colspan='3'>No Courses Registered</td>
</tr>

";
        }


        while ($row = mysqli_fetch_array($res)) {
            $c = $row['cr_id'];
            $qq = "SELECT count(video_id) from video where cc_id='$c'";
            $rr = mysqli_query($connect, $qq);
            $ro = mysqli_fetch_array($rr);
            $output .= "



<tr>
<td>" . $row['course_name'] . "</td>
<td>" . $row['vcomp'] . "</td>
<td>" . $ro['count(video_id)'] . "</td>






";

        }
        $output .= "
</tr>
</table>
</div>
";


        echo $output;

        ?>

    </div>
</div>
</div>

</div>
</body>
</html>
</body>
</html>