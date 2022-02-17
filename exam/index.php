<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../connect.php");
$con=connect();
$year=date('Y');
// $sql = "SELECT * FROM `exam_tbl`";
// $exam = $con->query($sql) or die ($con->error);
if(isset($_POST['login'])){
    $appNo=mysqli_real_escape_string($con, $_POST['application']);
    $email=mysqli_real_escape_string($con, $_POST['email']);

    $sql = "SELECT * FROM `student_info` WHERE `stud_email`='$email' AND `application_no`='$appNo'";
	$stud = $con->query($sql) or die ($con->error);
	$row = $stud->fetch_assoc();
	$total = $stud->num_rows;
  
        if(($total>0)&&($row['verification']=="Verified")){
            $_SESSION['appID']=$row['application_no'];
            $_SESSION['f_name']=$row['first_name'];
            $_SESSION['l_name']=$row['last_name'];
            $_SESSION['studemail']=$row['stud_email'];
            $_SESSION['verify']=$row['verification'];
            $_SESSION['pic']=$row['picture'];
            $appID=$_SESSION['appID'];
            $name=$_SESSION['f_name'].' '.$_SESSION['l_name'];
            $studname=mysqli_real_escape_string($con, $name);
            date_default_timezone_set('Asia/Manila');
            $time=date("h:i A");
            
            $sql="SELECT * FROM `student_exam_log` WHERE `application_no`='$appID'";
            $attempt = $con->query($sql) or die ($con->error);
            $status=$attempt->fetch_array();
            
            if(empty($status['test_status'])){
                // while($row = $exam->fetch_assoc()){
                    // $examid=$row['exam_id'];
                    $take=$con->query("INSERT INTO `student_exam_log`(`application_no`, `student_name`, `time_started`, `time_ended`, `test_status`, `leaveAttempt`) VALUES ('$appID','$studname','$time','','Yet to Take', 0)");
                // }
                $_SESSION['message'] =
                "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    width: '690',
                    footer: '<b>Do your best! Good luck!</b>',
                    title: '<b id=read>READ THE INSTRUCTIONS:</b>',
                    html: '<center><div id=instructions><ol><li><b>Avoid refreshing the page.</b> Once you do, it will automatically exit.</li><br><li>Also avoid to use <b>alt+tab</b> keys or leave the Admission Test.</li><br><li>The system will <b>auto submit</b> your answers when the timer is up.</li></ol></div></center>',
                    confirmButtonText: 'Start Now',
                    confirmButtonColor: '#043e9f',
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
                    if(result.isConfirmed){
                        window.location.href = 'examination.php';
                    }
                })
                </script>";
            } else if(!empty($status['test_status'])){
                $_SESSION['message'] =
                "<script>
                Swal.fire({
                position: 'center',
                icon: 'error',
                width: '35rem',
                title: 'You&#39;ve already taken the Entrance Examination',
                confirmButtonColor: '#043e9f'
                })
                </script>";
                unsetSession();
            }

        } 
         else if(($total>0)&&($row['verification']=="Pending")){
            $_SESSION['message'] ="
            <script>
            Swal.fire({
            position: 'center',
            icon: 'info',
            width: '35rem',
            title: 'Your application is pending',
            text: 'Only verified students are allowed to take the admission test.',
            confirmButtonColor: '#043e9f'
            })
            </script>";
        }else if(($total>0)&&($row['verification']=="Declined")){
            $_SESSION['message'] =
            "<script>
            Swal.fire({
            position: 'center',
            icon: 'error',
            width: '35rem',
            title: 'Your application was declined',
            text: 'Only verified students are allowed to take the admission test.',
            confirmButtonColor: '#043e9f'
            })
            </script>";
        }else{
            $_SESSION['message'] =
            "<script>
            Swal.fire({
            position: 'center',
            icon: 'error',
            width: '35rem',
            title: 'Invalid Log In Details',
            text: 'Please enter valid details!',
            focusConfirmColor: '#043e9f',
            confirmButtonColor: '#043e9f',
            })
            </script>";
        }

        

}
if(isset($_SESSION['previous'])){
    header('refresh: 0');
    if(basename($_SERVER['PHP_SELF']!=$_SESSION['previous'])){
        unsetSession();
    }
}
function unsetSession(){
    unset($_SESSION['appID']);
    unset($_SESSION['f_name']);
    unset($_SESSION['l_name']);
    unset($_SESSION['studemail']);
    unset($_SESSION['verify']);
    unset($_SESSION['pic']);
    unset($_SESSION['previous']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Test | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/fontawesome/css/all.css" />
    <link rel="stylesheet" href="assets/css/exam.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">

    <script src="assets/js/exam.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
    <script src="../assets/js/bootstrap.min.js" defer></script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/placeholders.js"></script>
    <script src="../assets/js/aos.js" defer></script>
</head>
<body style="background-color: #042b70;">
    <div class="main container">
    <?php if(isset($_SESSION['message'])){?>
        <?php 
               echo $_SESSION['message'];
               unset($_SESSION['message']);
        ?>
    <?php }?>
        <div class="row">
            <div class="col-md-5">
                <center>
                    <img src="../assets/imgs/logo/ccc.png" class="logo" alt="">
                </center>
                
            </div>
            <div class="col-md-7">
                <center>
                    <div class="title">
                        <h1 class="admissiontest">Entrance Examination</h1>
                        <h4 class="schoolname">City College of Calamba</h4>
                    </div>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="test-paper">
                <img src="assets/imgs/onlineexam.png" class="img-fluid stud" alt="">
            </div>
            <div class="col-md-7">
                <div class="row"> 
                    <div class="col-md-6 mx-auto allcard">
                        <span class="anchor" id="formLogin"></span>
                        <div class="card form-pad">
                            <div class="card-header text-center">
                                <h3 class="mb-0 text-uppercase">LOG IN ADMISSION TEST</h3>
                            </div>
                            <div class="card-body p-5">
                                <form class="form" role="form" autocomplete="on" method="post" action="" name="loginForm">
                                    <div class="form-group">
                                        <label for="email"><b>Email:</b></label>
                                        <input type="email" name="email" placeholder="example@domain.com" id="email" class="form-control form-control rounded-5" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="application"><b>Application Number:</b></label>
                                        <input type="password" name="application" placeholder=<?php echo $year ?>-A-XXXX id="application" class="form-control form-control rounded-5" style="text-transform:uppercase" required="">
                                    </div>
                                    <div class="btn-start mt-4">
                                        <button type="submit" class="btn btn-lg btn-primary start" id="start" value="START" name="login"><h3>TAKE TEST</h3></button> 
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/aos.js"></script>
<script>
    AOS.init();
</script>
</html>