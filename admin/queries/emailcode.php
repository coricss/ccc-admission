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

if(isset($_POST['email'])){
	$email=$emailAdmin =  mysqli_real_escape_string($con, $_POST['email']);
	$sql = $con->query("SELECT * FROM `admin_info` WHERE `admin_email`='$email'");
    $row=$sql->fetch_array();
    $total=$sql->num_rows;
    
    if($total>0&&$row['admin_email']=="$email"){
        $_SESSION['email']=$row['admin_email'];
        echo "<script>
            $('#forgotpass').hide();
            $('#recoverycode').show();
            begin();
            function begin() {
                var myTimer, timing = 30;
                $('#codetimer').html(timing);
                myTimer = setInterval(function() {
                  --timing;
                  $('#codetimer').html(timing);
                  if (timing === 0) {
                    $('#resendcode').show();
                    $('#timer').hide();
                    var email =$('#cpEmail').val();
                    $.ajax({
                        url: 'queries/expirecode.php',
                        method: 'post',
                        data: {email:email},
                      });
                    clearInterval(myTimer);
                  }
                }, 1000);
             }
            </script>";

        $mail = new PHPMailer(true);
        $code = random_int(100000, 999999);
        $sql=$con->query("UPDATE `admin_info` SET `code`='$code', `code_expiry`='New' WHERE `admin_email`='$email'");
        $admin_name=$row['admin_firstname']." ".$row['admin_lastname'];
        try {
            //Server settings
            // $mail->SMTPDebug = 3;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'cccadmissionProject2021@gmail.com';                     //SMTP username
            $mail->Password   = 'ccc_admission2021-2022';                               //SMTP password
            $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
        
            $mail->setFrom('ccc.gtdc@gmail.com', 'CCC Guidance, Counseling, Testing and Career Development Office'); //Sender
            $mail->addAddress($email, $admin_name);     //Add a recipient
        
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject =  "$code is your account recovery code";
            $mail->Body    =  
           "
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
            <html>
            
            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
                <meta name='viewport' content='width=device-width, initial-scale=1.0' />
                <title>City College of Calamba</title>
                <style>
                    /* A simple css reset */
                    body,table,thead,tbody,tr,td,img {
                        padding: 0;
                        margin: 0;
                        border: none;
                        border-spacing: 0px;
                        border-collapse: collapse;
                        vertical-align: top;
                    }
                    
            
                    /* Add some padding for small screens */
                    .wrapper {
                        padding-left: 10px;
                        padding-right: 10px;
                    }
            
                    h1,h2,h3,h4,h5,h6,p {
                        margin: 0;
                        padding: 0;
                        padding-bottom: 20px;
                        line-height: 1.6;
                        font-family: 'Helvetica', 'Arial', sans-serif;
                    }
            
                    p,a,li {
                        font-family: 'Helvetica', 'Arial', sans-serif;
                    }
            
                    img {
                        width: 100%;
                        display: block;
                    }
            
                    @media only screen and (max-width: 620px) {
            
                        .wrapper .section {
                            width: 100%;
                        }
            
                        .wrapper .column {
                            width: 100%;
                            display: block;
                        }
                    }
                </style>
            </head>
            
            <body>
                <table width=100%>
                    <tbody>
                        <tr>
                            <td class='wrapper' width='600' align='center'>
                                <!-- Header image -->
                                <table class='section header' cellpadding='0' cellspacing='0' width='800'>
                                    <tr>
                                        <td class='column'>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td align='left'>
                                                        <img src='https://i.ibb.co/3yZ0r3G/cccheader.png' alt='cccheader' border='0'>
                                                        <center>
                                                        <a href='https://ccc.edu.ph'><img src='https://i.ibb.co/ym2jbKn/ccc.png' alt='ccc' border='0' style='width: 100px'></a>
                                                        </center>
                                                        <br><br><br>
                                                            <h3>Hi $admin_name,</h3>
                                                            
                                                        <p style='text-align:justify;'>
                                                        We received a request to reset your password through your email address, $email. Enter the following code below:</p> <br><br>
                                                        <center>
                                                            <div style='padding: 10px; margin: auto; width: 20%; border: 2px solid blue; border-radius: 10px'>
                                                               <p style='font-weight: 800; font-size: 30px; padding: 0'>$code</p> 
                                                            </div>
                                                        </center>
                                                        <br><br><br>
                                                       <p>If you did not request this code, it is possible that someone else is trying to access your account $email. <b>Do not forward or give this code to anyone.</b></p> 
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <br><br><br><br><br>
                                        <img src='https://i.ibb.co/gSjXRwr/cccfooter2.png' alt='cccfooter2' border='0'>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Two columns -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            </html>
            ";
            $mail->send();
        } catch (Exception $e) {
            // $_SESSION['message'] = "<script>
            // 			$(function() {
            // 				$.notify({
            // 					title: 'Email could not be sent',
            // 					message: 'Please download a copy of your pre-registration form <a href=PDFCopies/>here</a> form for your copy. or check your email',
            // 					url: 'PDFCopies/'
            // 				},{
            // 				animate: {
            // 					enter: 'animate__animated animate__fadeInDown',
            // 					exit: 'animate__animated animate__fadeOutRight'
            // 				},
                        
            // 				placement: {
            // 					from: 'top',
            // 					align: 'right'
            // 				},
            // 				type: 'pastel-danger',
            // 			delay: 10000
            // 				});
            // 			});
            // 			</script>";
        }

    }else if($email==""){
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Enter an email',
                confirmButtonColor: '#0d6efd'
            })
            </script>";
    }
    else{
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '$email is not registered',
                text: 'Please enter valid email!',
                confirmButtonColor: '#0d6efd'
            })
            </script>";
    }
}

?>