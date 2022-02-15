<?php    
if(!isset($_SESSION)){
    session_start();    
}

include_once("../../connect.php");
$con=connect();
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $sql=$con->query("UPDATE `admin_info` SET `code_expiry`='Expired' WHERE `admin_email`='$email'");
}
?>