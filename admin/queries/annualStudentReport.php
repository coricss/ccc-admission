<?php 
    include_once("../../connect.php");
    $con=connect();
    date_default_timezone_set('Asia/Manila');
    $SchoolYear=date("Y");
    $NextYear=date("Y")+1;
    $remaining_time=strtotime("March 1, $NextYear")-time();
    // $remaining_time=strtotime("DATE TODAY HOUR TODAY:$NextYear PM or AM")-time();
    // $days_remaining = floor($remaining_time / 86400);
    // $hours_remaining = floor(($remaining_time % 86400) / 3600);
    $sql = $con->query("SELECT * FROM `student_info` WHERE `application_no` LIKE '%$SchoolYear%'");
    $totalStudents=$sql->num_rows;

    $SY='SY '.$SchoolYear.'-'.$SchoolYear+1;
    if($remaining_time==1){
       $sql=$con->query("INSERT INTO `annual_reg_stud`(`total_reg_students`, `school_year`) VALUES ($totalStudents,'$SY')");
    }
?>