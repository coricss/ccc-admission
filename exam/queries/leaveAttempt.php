<?php 
if(!isset($_SESSION)){
    session_start();
}
include_once("../../connect.php");
$con=connect();
extract($_POST);
$sql = $con->query("SELECT * FROM `student_exam_log` WHERE `application_no` = '$appID'");
$row=$sql->fetch_array();
$update=$con->query("UPDATE `student_exam_log` SET `leaveAttempt`= `leaveAttempt`+1 WHERE `application_no` = '$appID'");
$rem_attmpt=2-$row['leaveAttempt'];
$name=$_SESSION['f_name'];

if($row['leaveAttempt']==3){
    echo "<script>
        $(window).unbind('beforeunload');
        $(window).unbind('focus');
        $('#autoSubmit').val('leave');
        $('#testForm').submit();
    </script>";
}else{
    echo "<script>
    Swal.fire({
      title: 'Please do not leave the Admission Test',
      html: ' You have $rem_attmpt attempt(s) left',
      icon: 'warning',
      confirmButtonColor: '#043e9f',
      confirmButtonText: 'Continue',
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
    </script>";
}

    
?>