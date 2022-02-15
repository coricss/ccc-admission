<?php 

if(!isset($_SESSION)){
    session_start();
}

include_once("../../connect.php");
$con=connect();

$sql=$con->query("SELECT * FROM `admission_status`");
$row=$sql->fetch_array();
date_default_timezone_set('Asia/Manila');
$dateNotif=date("Y-m-d h:i:s A");
$phdate=date('m/d/Y');
$phtime=date('g:i A');
$adminID=$_SESSION['ID'];
$name=$_SESSION['name'];

if($row['status']=='0'){
    $sql=$con->query("UPDATE `admission_status` SET `status`='1'");
    $sql1=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Suspended the Admission Process','$phdate','$phtime')");

    $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','has suspended the admission process','$dateNotif')");

}else{
    $sql=$con->query("UPDATE `admission_status` SET `status`='0'");

    $sql1=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Enabled the Admission Process','$phdate','$phtime')");

    $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','enabled admission process.','$dateNotif')");

}
?>