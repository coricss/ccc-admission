<?php 

if(!isset($_SESSION)){
    session_start();
}
include_once("../../connect.php");
$con=connect();
extract($_POST);

$senders=mysqli_real_escape_string($con, $sender);

$appID=$_SESSION['appID'];
$email= $_SESSION['studemail'];
$pic= $_SESSION['pic'];
date_default_timezone_set('Asia/Manila');
$date=date("Y-m-d h:i:s A");

$msg = mysqli_real_escape_string($con, $message);

if($sender=="Anonymous"){
  $sql=$con->query("INSERT INTO `feedbacks`(`application_no`, `photo`, `sender`, `email`, `message`,`date_sent`) VALUES ('$appID','default_photo.png','$senders', '', '$msg','$date')");
  echo "
  <script>
    Swal.fire({
      title: 'Message Sent Successfully!',
      text: 'Thank you for sending us your feedbacks and suggestions.',
      icon: 'success',
      width: '600',
      confirmButtonColor: '#043e9f',
      confirmButtonText: 'Ok',
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
      }).then((result)=>{
        $('#feedback-txt').val('');
        $('#limit-chars').text('0/280');
    })
  </script>
  ";
}else{
  $sql=$con->query("INSERT INTO `feedbacks`(`application_no`, `photo`, `sender`, `email`, `message`,`date_sent`) VALUES ('$appID','$pic','$senders', '$email', '$msg','$date')");
  echo "
  <script>
    Swal.fire({
      title: 'Message Sent Successfully!',
      text: 'Thank you for sending us your feedbacks and suggestions.',
      icon: 'success',
      width: '600',
      confirmButtonColor: '#043e9f',
      confirmButtonText: 'Ok',
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
      }).then((result)=>{
        $('#feedback-txt').val('');
        $('#limit-chars').text('0/280');
    })
  </script>
  ";
}
// window.location.href='index.php';
?>