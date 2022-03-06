<?php 
 
    include_once("../connect.php");
    $con=connect();

    extract($_POST);

        $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
        // $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
        $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    
        $sql = "SELECT * FROM `student_info` WHERE `first_name`='$firstname' AND `last_name`='$lastname'";
        $stuD=$con->query($sql) or die ($con->error);
        $studs=$stuD->fetch_array();

 
        if($firstname!=""&&$lastname!=""){
            if($firstname==isset($studs["first_name"])&&$lastname==isset($studs["last_name"])){
                echo
                " <small>Student name already exists.</small>";
            
            }else{
                echo
                "";
            }
        }
       
?>