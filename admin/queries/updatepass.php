<?php 
if(!isset($_SESSION)){
    session_start();    
}

include_once("../../connect.php");
$con=connect();

extract($_POST);
    $email=$_SESSION['email'];
    
    $currentpass=mysqli_real_escape_string($con, $_POST['currentpass']);
    $defpass=mysqli_real_escape_string($con, $_POST['newpass']);
    $confirmpass=mysqli_real_escape_string($con, $_POST['confirmpass']);
    $newpass=password_hash($confirmpass, PASSWORD_DEFAULT);

     // $row['admin_pwd']=="$pwd"
    // password_verify("$pwd", $row["admin_pwd"])

    $sql = "SELECT * FROM `admin_info` WHERE `admin_email` = '$email'";
	$admin = $con->query($sql) or die ($con->error);
	$row = $admin->fetch_assoc();
        if(!password_verify("$currentpass", $row["admin_pwd"])){
            echo "<small style='color: #dc3545'>Invalid current password</small>";
        }else{
            if($defpass!=$confirmpass){
                echo "<small style='color: #dc3545'>Those passwords didn't match. Try again</small>";
            }else{
                $sql=$con->query("UPDATE `admin_info` SET `admin_pwd`='$newpass' WHERE `admin_email`='$email'");
                date_default_timezone_set('Asia/Manila');
                $id=$_SESSION['ID'];
                $phdate=date('m/d/Y');
                $phtime=date('g:i A');
                $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'Your Password was Updated','$phdate', '$phtime')");
                echo"
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Password Updated!',
                        text: 'Your password has been updated successfully',
                        showConfirmButton: false,
                        timer: 2000,
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
                window.setTimeout(function(){location.reload()},2000)
                </script>
                ";
            }
        }
    

?>