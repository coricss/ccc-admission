<?php 

include_once("../../connect.php");
$con=connect();

extract($_POST);

$sql = $con->query("UPDATE `exam_tbl` SET `exam_title`='$title', `exam_desc`='$desc'  WHERE `exam_id` = $id");
if($sql)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}

echo json_encode($res);
?>