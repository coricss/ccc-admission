<?php 


if(!isset($_SESSION)){
  session_start();
}
include_once("../connect.php");
$con=connect();

if(isset($_POST['btn-updateProgram'])){
  $adminID=$_SESSION['ID'];
  $name=$_SESSION['name'];

  date_default_timezone_set('Asia/Manila');
  $dateNotif=date("Y-m-d h:i:s A");
  $phdate=date('m/d/Y');
  $phtime=date('g:i A');

  $program_id=mysqli_real_escape_string($con, $_POST["program_id"]);
  $program_name=mysqli_real_escape_string($con, $_POST["programName"]);
  $abbreviation=mysqli_real_escape_string($con, $_POST["abbr"]);
  $max_no=mysqli_real_escape_string($con, $_POST["max_no"]);

  $sql=$con->query("UPDATE `programs` SET `program_name`='$program_name', `abbreviation`='$abbreviation', `max_no`='$max_no' WHERE `program_id`='$program_id'");

  $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','changed the details of program: $abbreviation','$dateNotif')");

  $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Updated Program Details','$phdate','$phtime')";
  $con->query($sql) or die ($con->error);

  $_SESSION["message"] = "<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Successfully Saved',
    text: 'You updated program details',
    showConfirmButton: false,
    timer: 2000
  })
  window.history.replaceState( null, null, window.location.href );
  </script>";

}
?>