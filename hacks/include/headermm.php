<!DOCTYPE html>
<html>
<head>
    <?php

    $user = $_SESSION['mentor']; ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="../../resources/css/styleadmmen.css">


    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/function.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

    </script>
</head>


<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>View Sidebar</span>
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">

                <li class="nav-item active">

                    <a class="nav-link" href="myprofile.php" style="color:white;"><i class="fa fa-user fa-lg"
                                                                                     style="color:white;"></i><br><strong><?php echo $user; ?></strong></a>
                </li>


                <li class="nav-item active">
                    <a href="logout.php" style="padding:10px;color:white;"><i class="fas fa-sign-out-alt"
                                                                              style="margin-top:20px;"></i> <strong>Logout</strong></a>

                </li>
            </ul>
        </div>
    </div>
</nav>


</body>
</html>