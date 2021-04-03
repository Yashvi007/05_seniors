<?php
session_start();
include("../../../include/connection.php");
if (isset($_POST['upload'])) {
    $img = $_FILES['img']['name'];
    $error = array();
    $spec = $_POST['spec'];
    $allowed = array('png', 'jpg');
    $ext = pathinfo($img, PATHINFO_EXTENSION);
    if (empty($img)) {
        $_SESSION['error'] = "Select Picture";
        header("Location:../myprofile.php");

    } else if (!in_array($ext, $allowed)) {

        $_SESSION['error'] = "Check File Type";
            header("Location:../myprofile.php");
    }
     
 else {
    

    
    if (($_FILES["img"]["size"] > 200000)) {

        $_SESSION['error'] = "Size should be less than 200kb";
        header("Location:../myprofile.php");
    
        
    }else{


        $query = "UPDATE student SET profile='$img' WHERE username='$spec'";
        $res = mysqli_query($connect, $query);


        if ($res) {
            move_uploaded_file($_FILES['img']['tmp_name'], "../img/$img");
            $_SESSION['error'] = "Picture Uploaded";
            header("Location:../myprofile.php");

        }
    }
    }
}

?>