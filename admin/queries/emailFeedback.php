<?php
if(!isset($_SESSION)){
    session_start();    
}
include_once("../../connect.php");
$con=connect();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\EXCEPTION;

require_once('../../PHPMailer/src/PHPMailer.php');
require_once('../../PHPMailer/src/SMTP.php');
require_once('../../PHPMailer/src/Exception.php');

extract($_POST);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host         = 'smtp.gmail.com'; 
    $mail->SMTPAuth     = true; 
    $mail->Username     = 'cccadmissionProject2021@gmail.com'; 
    $mail->Password     = 'ccc_admission2021-2022'; 
    $mail->SMTPSecure   = 'tls';
    $mail->Port         = 587;  
    $mail->setFrom('ccc.gtdc@gmail.com', 'CCC Guidance, Counseling, Testing and Career Development Office');
    $mail->addAddress($email, $student); 
    $mail->isHTML(true);   
    $mail->Subject =  "Feedback Reply";
    $mail->Body    =  $message;
    $mail->send();
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Message Sent!',
            html: 'Your message has been sent successfully',
            showConfirmButton: false,
            timer: 2000
        }).then((result)=>{
            $('#txt-reply').val('');
            window.history.replaceState( null, null, window.location.href );
            location.reload();
          })
        
    </script>";
}catch(Exception $e){

}




?>