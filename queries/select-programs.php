<?php 
include_once("../connect.php");
$con=connect();
$sql=$con->query("SELECT * FROM `programs`");

$output="<option value='' disabled selected>(e.g. BSIT)</option>";
if($sql->num_rows!=0){
  while($row=$sql->fetch_array()){
    $output.="
    <option class='others' value=$row[abbreviation]>$row[program_name]</option>
    ";
  }
}else{
  $output.="<option value='' disabled>No program available</option>";
}
echo $output;
?>