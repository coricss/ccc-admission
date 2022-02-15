<?php 
 
    include_once("../../connect.php");
    $con=connect();

    extract($_POST);

        $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
        $middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
        $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    
        $sql = "SELECT * FROM `student_info` WHERE `first_name`='$firstname' AND `middle_name` = '$middlename' AND `last_name`='$lastname'";
        $stuD=$con->query($sql) or die ($con->error);
        $studs=$stuD->fetch_array();

 
        if($firstname!=""&&$middlename!=""&&$lastname!=""){
            if($firstname==isset($studs["first_name"])&&$middlename==isset($studs["middle_name"])&&$lastname==isset($studs["last_name"])){
                echo
                " <small>Student name already exists</small>";
            
            }else{
                echo
                "";
            }
        }
       
?>