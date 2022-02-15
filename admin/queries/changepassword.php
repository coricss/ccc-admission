<?php 
    
if(!isset($_SESSION)){
    session_start();    
}

include_once("../../connect.php");
$con=connect();
if(isset($_POST['pwd1'], $_POST['pwd2'])){
	$pwd1=mysqli_real_escape_string($con, $_POST['pwd1']);
	$pwd2=mysqli_real_escape_string($con, $_POST['pwd2']);
    $newpass=password_hash($pwd2, PASSWORD_DEFAULT);
    $email=$_SESSION['email'];
}
	$output="";
        
            $sql=$con->query("UPDATE `admin_info` SET `admin_pwd`='$newpass' WHERE `admin_email`='$email'");
            $sql1=$con->query("SELECT * FROM `admin_info` WHERE `admin_email`='$email'");
            $row=$sql1->fetch_array();
            $id=$row['adminID'];
            date_default_timezone_set('Asia/Manila');
            $phdate=date('m/d/Y');
            $phtime=date('g:i A');
            $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'Your Password was Reset','$phdate', '$phtime')");
            unset($_SESSION['email']);
            echo "
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Password Updated!',
                    text: 'Your password has been changed successfully',
                    confirmButtonColor: '#0d6efd',
                    confirmButtonText: 'Return to login',
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
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            </script>
            ";
        
	
	
	

?>