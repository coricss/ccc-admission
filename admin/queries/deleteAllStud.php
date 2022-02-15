<?php 
    if(!isset($_SESSION)){
        session_start();    
    }
    date_default_timezone_set('Asia/Manila');
    $year=date('Y');
    
    include_once("../../connect.php");
    $con=connect();
    
    $sql = $con->query("DELETE `student_info`, `educ_bg`, `fam_bg`, `org_involvement`, `personal_admiration`, `requirements` FROM (((((`student_info` INNER JOIN `educ_bg` ON student_info.student_id=educ_bg.student_id) INNER JOIN `fam_bg` ON student_info.student_id=fam_bg.student_id) INNER JOIN `org_involvement` ON student_info.student_id=org_involvement.student_id) INNER JOIN `personal_admiration` ON student_info.student_id=personal_admiration.student_id) INNER JOIN `requirements` ON student_info.student_id=requirements.student_id) WHERE student_info.application_no NOT LIKE '%$year%'");

    
?>