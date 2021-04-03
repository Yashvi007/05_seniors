<?php
session_start();
if (!isset($_SESSION['mentor']) && empty($_SESSION['mentor'])) {

    header("Location: ../mentorlogin.php");


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>COURSE </title>
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
        include("../../include/headermm.php");
        ?>
        <h4 class="my-2 mx-4">Mentor Dashboard</h4>
        <div class="col-md-7 col-sm-6">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-4">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</body>
</html>
