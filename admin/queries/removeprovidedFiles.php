<?php 
include_once("../../connect.php");
$con=connect();

extract($_POST);

$sql = $con->query("UPDATE `requirements` SET `provided_files`= REPLACE(`provided_files`, '$file\n', '') WHERE `student_id` = $id");

?>