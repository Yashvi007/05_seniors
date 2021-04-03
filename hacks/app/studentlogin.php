<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/css/stylelogin.css">
</head>
<body>
<div class="container">
    <div class="row px-3">
        <div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">

            <div class="card-body">
                <h4 class="title text-center mt-4">
                    Student Login
                </h4>

                <form class="form-box px-3" method="post" action="php/slogin.php">
                    <div class="form-input">
                        <span><i class="fa fa-envelope-o"></i></span>
                        <input type="text" name="email" placeholder="Enter Your Email Id" tabindex="10">

                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-key"></i></span>
                        <input type="password" name="pass" placeholder="Enter Password">
                    </div>

                    <div class="mb-3">


                        <button type="submit" name="login" id="login" class="btn btn-info btn-lg" >Login
                        </button>

                    </div>
                    <hr class="my-2" style="width:100% !important;background-color:#0f4c81;">
                    <div class="text-center mb-2">
                        <strong>Haven't Registered yet?</strong>
                        <a href="registerstudent.php" class="register-link">
                            Register here
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
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
$_SESSION['error']="";
}
?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body text-center">
          <p><?php echo $l; ?> </p>
          <button type="button" class="btn btn-default text-white" data-dismiss="modal" style="background-color: #0f4c81; justify:center; width: auto !important;
margin-left: 0px !important;">Close</button>
        </div>
        
      </div>
      
    </div>
  </div> 
<?php
           

            unset($_SESSION['error']);
        




?>
</body>
</html>