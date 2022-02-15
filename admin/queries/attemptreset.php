<?php    
if(!isset($_SESSION)){
    session_start();    
}

include_once("../../connect.php");
$con=connect();
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $sql2=$con->query("UPDATE `admin_info` SET `login_attempt`=0 WHERE `adminID`='$id'");
}
?>