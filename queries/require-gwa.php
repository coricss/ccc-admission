<?php 
include_once("../connect.php");
$con=connect();
extract($_POST);
$sql=$con->query("SELECT * FROM `programs` WHERE `abbreviation`='$abbr'");
$row=$sql->fetch_array();

echo "<script>
  $('#g12_gwa').prop('min', $row[required_gwa]);
</script>"
?>