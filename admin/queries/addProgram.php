<?php 


if(!isset($_SESSION)){
    session_start();
}

include_once("../connect.php");
$con=connect();
if(isset($_POST["btn-addProgram"])){
  $adminID=$_SESSION['ID'];
  $name=$_SESSION['name'];

  date_default_timezone_set('Asia/Manila');
  $dateNotif=date("Y-m-d h:i:s A");
  $phdate=date('m/d/Y');
  $phtime=date('g:i A');

  $program_name=mysqli_real_escape_string($con, $_POST["programName"]);
  $abbreviation=mysqli_real_escape_string($con, $_POST["abbr"]);
  $max_no=mysqli_real_escape_string($con, $_POST["max_no"]);

  $sql ="INSERT INTO `programs`(`program_name`, `abbreviation`, `max_no`) VALUES ('$program_name','$abbreviation','$max_no')";
  $con->query($sql) or die ($con->error);

  $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Added a New Program','$phdate','$phtime')";
  $con->query($sql) or die ($con->error);

  $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','inserted a new program','$dateNotif')");

  $_SESSION["message"]="<script>
    Swal.fire({
        title: 'A Program Registered Successfully',
        text: 'You added another program',
        icon: 'success',
        timer: 2000,
        showConfirmButton: false,
        allowOutsideClick: () => {
          const popup = Swal.getPopup()
          popup.classList.remove('swal2-show')
          setTimeout(() => {
            popup.classList.add('animate__animated', 'animate__headShake')
          })
          setTimeout(() => {
            popup.classList.remove('animate__animated', 'animate__headShake')
          }, 500)
          return false
        }
    })
    window.history.replaceState( null, null, window.location.href );
    </script>";
}
?>