<?php

include_once("../../connect.php");
$con=connect();

extract($_POST);

//update test status
$update = $con->query("UPDATE `student_exam_log` SET `test_status`='Taken' WHERE `application_no` = '$appID'");
if($update)
{
	$res = array("res" => "success");
}else{
	$res = array("res" => "failed");
}

echo json_encode($res);
?>