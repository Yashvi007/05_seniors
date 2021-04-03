<?php
session_start();

?>
<html>
<head>
<title>Registration Form</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/css/styleregister.css">
</head>


<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 offset=md-1">
            <div class="row">
                <div class="col-md-4 lefft">

                </div>

                <div class="col-md-6 rightt">

                    <h2>Register Here</h2>

                    <form method="post" action="php/sreigster.php">


                        <div class="register-form">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" autocomplete="off"
                                       placeholder="Enter Firstname">
                            </div>
                            <div class="form-group">
                                <input type="text" name="mname" class="form-control" autocomplete="off"
                                       placeholder="Enter Middlename">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" class="form-control" autocomplete="off"
                                       placeholder="Enter Lastname">
                            </div>
                            
                            <div class="form-group">
                              <select name="gender">
                                <option>Select your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>


                

                            <div class="form-group">

                                <input type="text" name="phone" class="form-control" autocomplete="off"
                                       pattern="[0-9]{10}" placeholder="999-999-9999">
                            </div>

                            <div class="form-group">
                              <select name="branch">
                                <option>Select your Branch</option>
                                <option value="CMPN">CMPN</option>
                                <option value="ETRX">ETRX</option>
                                <option value="EXTC">EXTC</option>
                                <option value="IT">IT</option>
                                <option value="INST">INST</option>
                                <option value="MCA">MCA</option>
                              </select>
                            </div>
                            
                            

                            <div class="form-group">

                                <input type="password" name="pass" minlength="6" class="form-control" autocomplete="off"
                                       placeholder="Enter Password of minimum 6 characters">
                            </div>
                            <div class="form-group">

                                <input type="password" name="con_pass" class="form-control" autocomplete="off"
                                       placeholder="Confirm Password">
                            </div>

                            <button type="submit" name="register" id="register" class="btn btn-info btn-lg" >Register
                            </button>
                            <p>I already have an account <a href="studentlogin.php" class="register-link">Click Here</a>
                            </p>

                        </div>
                    </form>


                    <div class="col-md-3"></div>
                </div>
            </div>
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

}
?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body text-center">
          <p style = "color:black !important;"><?php echo $l; ?></p>
          <button type="button" class="btn btn-default text-white" data-dismiss="modal" style="background-color: #0f4c81; justify:center; width: auto !important;
margin-left: 0px !important;">Close</button>
        </div>
        
      </div>
      
    </div>
  </div> 
<?php
           

            unset($_SESSION['error']);
        


/*if (isset($_SESSION['error'])) {



        $var = $_SESSION['error'];

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
        
        <div class="modal-body text-center text-danger">
          <p style="color: black !important;">'.$var.'</p>
         <button type="button" class="btn btn-default text-white" data-dismiss="modal" style="background-color: #0f4c81; justify:center; width: auto !important;
margin-left: 0px !important;">Close</button>
        </div>
        
      </div>
      
    </div>
  </div> ';


        unset($_SESSION['error']);

    }


*/
?>


</body>
</html>