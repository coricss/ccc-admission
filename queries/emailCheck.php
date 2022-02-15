<?php 
 
    include_once("../connect.php");
    $con=connect();

    extract($_POST);

        $email = mysqli_real_escape_string($con, $_POST["email"]);

        $sqlEmail = "SELECT * FROM `student_info` WHERE `stud_email`='$email'";
        $stuDemail=$con->query($sqlEmail) or die ($con->error);
        $studEmail=$stuDemail->fetch_array();

       
        if($email!=""){
            if($email==isset($studEmail["stud_email"])){
                echo
                " <small>Email already exists.</small>";
             
            }else{
                echo
                "";
            }
        }
       
?>