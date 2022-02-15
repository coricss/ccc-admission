<?php 

include_once("../../connect.php");
$con=connect();

extract($_POST);

$emailAdmin =  mysqli_real_escape_string($con, $email);
$sql = "SELECT * FROM `admin_info` WHERE `admin_email`='$emailAdmin'";
$admin=$con->query($sql) or die ($con->error);
$adminEmail=$admin->fetch_array();

if($emailAdmin!=""){
    if($emailAdmin==isset($adminEmail["admin_email"])){
        echo
        " <small>Email already exists</small>";
    
    }else{
        echo
        "";
    }
}

?>