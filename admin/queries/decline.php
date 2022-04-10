<?php 

if(!isset($_SESSION)){
    session_start();    
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\EXCEPTION;

require_once('../../PHPMailer/src/PHPMailer.php');
require_once('../../PHPMailer/src/SMTP.php');
require_once('../../PHPMailer/src/Exception.php');


include_once("../../connect.php");
$con=connect();

extract($_POST);

$sql = $con->query("UPDATE `student_info` SET `verification` = 'Declined' WHERE `student_id` = $id");
if($sql)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}

$id=$_SESSION['ID'];
$name=$_SESSION['name'];
$stud_name=$fname.' '.$lname;

date_default_timezone_set('Asia/Manila');
$date=date("Y-m-d h:i:s A");
$phdate=date('m/d/Y');
$phtime=date('g:i A');
$sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'You Declined a Student','$phdate', '$phtime')");

$sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$id','$name','declined the application of $stud_name','$date')");

$mail = new PHPMailer(true);

try {
	//Server settings
	// $mail->SMTPDebug = 3;                      //Enable verbose debug output
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'cccadmissionProject2021@gmail.com';                     //SMTP username
	$mail->Password   = 'ccc_admission2021-2022!';                               //SMTP password
	$mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	

	$mail->setFrom('ccc.gtdc@gmail.com', 'CCC Guidance, Counseling, Testing and Career Development Office'); //Sender
	$mail->addAddress($email, $fname.' '.$lname);     //Add a recipient

	//Attachments

	// $mail->addStringAttachment(file_get_contents($url), 'filename');
	// $mail->addAttachment('./PDFCopies/'.$pdfname, $pdfname); 
	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject =  "Verification of Application";
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
												<h3>Hello $fname,</h3>
												
												<p style='text-align:justify;'>
											We are sincerely sorry for declining you on your admission here in City College of Calamba. Perhaps you passed incomplete requirements during the appoinment or your requirements does not match our standards. For more questions, please contact us here <a href='https://www.facebook.com/CCCGTCDC' style='color: blue' target='_blank'>CCC Guidance, Counseling, Testing and Career Dev't Office</a></p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td>
							<br><br><br><br><br><br><br><br><br><br>
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
	// $_SESSION['message'] = "<script>
	// $(function() {
	// 	$.notify({
	// 		title: 'Email has been sent',
	// 		message: 'Please download a copy of your pre-registration form <a href=PDFCopies/>here</a> form for your copy. or check your email',
	// 		url: 'PDFCopies/'
	// 	},{
	// 	animate: {
	// 		enter: 'animate__animated animate__fadeInDown',
	// 		exit: 'animate__animated animate__fadeOutRight'
	// 	},
	
	// 	placement: {
	// 		from: 'top',
	// 		align: 'right'
	// 	},
	// 	type: 'pastel-success',
	// delay: 10000
	// 	});
	// });
	// </script>";
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

echo json_encode($res);
?>