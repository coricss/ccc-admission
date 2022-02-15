<?php 
if(!isset($_SESSION)){
    session_start();    
}
date_default_timezone_set('Asia/Manila');
$year=date('Y');

include_once("../../connect.php");
$con=connect();

$sql = $con->query("DELETE FROM `exam_results` WHERE `application_no` NOT LIKE '%$year%'");
?>