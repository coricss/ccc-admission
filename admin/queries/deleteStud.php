<?php 
    if(!isset($_SESSION)){
        session_start();    
    }
    date_default_timezone_set('Asia/Manila');
    $year=date('Y');

    include_once("../../connect.php");
    $con=connect();

    extract($_POST);

    $sql = $con->query("DELETE FROM `student_info` WHERE student_id='$id'");
    $sql = $con->query("DELETE FROM `educ_bg` WHERE student_id='$id'");
    $sql = $con->query("DELETE FROM `fam_bg` WHERE student_id='$id'");
    $sql = $con->query("DELETE FROM `org_involvement` WHERE student_id='$id'");
    $sql = $con->query("DELETE FROM `personal_admiration` WHERE student_id='$id'");
    $sql = $con->query("DELETE FROM `requirements` WHERE student_id='$id'");
?>