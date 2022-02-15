<?php 

include_once("../../connect.php");
$con=connect();

extract($_POST);

$sql = "SELECT * FROM `admin_info` WHERE `admin_firstname`='$fname' AND `admin_lastname`='$lname'";
$admin=$con->query($sql) or die ($con->error);
$adminName=$admin->fetch_array();

if($fname!=""&&$lname!=""){
    if($fname==isset($adminName["admin_firstname"])&&$lname==isset($adminName["admin_lastname"])){
        echo
        " <small>Admin name already exists</small>";
    
    }else{
        echo
        "";
    }
}

?>