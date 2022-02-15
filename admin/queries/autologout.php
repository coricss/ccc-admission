<?php 
  
if(!isset($_SESSION)){
    session_start();    
}

include_once("../../connect.php");
$con=connect();
extract($_POST);
$sql = "SELECT * FROM `admin_info` WHERE `adminID`='$id'";
$data = $con->query($sql) or die ($con->error);
$rows = $data->fetch_assoc();
$total = $data->num_rows;

if(isset($_SESSION['ID'])&&($_SESSION['email'])){
    if(isset($_SESSION['last_active'])){
        if(($total>0)&&($rows['adminID']==$_SESSION['ID'])){
            date_default_timezone_set('Asia/Manila');
            $id=$_SESSION['ID'];
            $phdate=date('m/d/Y');
            $phtime=date('g:i A');
            $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'You were Logged Out Due to Inactivity','$phdate', '$phtime')");
            $sql3=$con->query("UPDATE `admin_info` SET `login_attempt`=0 WHERE `adminID`='$id'");
            // unset($_SESSION['ID']);
            unset($_SESSION['img']);
            unset($_SESSION['email']);
            unset($_SESSION['name']);
            unset($_SESSION['address']);
            unset($_SESSION['contact_no']);
            unset($_SESSION['last_active']);
        }
    }

}else{ 
    echo header("Location: ../index.php");  
}
?>