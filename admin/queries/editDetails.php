<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../../connect.php");
$con=connect();
$id=$_SESSION['ID'];
$sql=$con->query("SELECT * FROM `admin_info` WHERE `adminID`=$id");
$row=$sql->fetch_array();
$pwd = mysqli_real_escape_string($con, $_POST['pwd']);

date_default_timezone_set('Asia/Manila');
$phdate=date('m/d/Y');
$phtime=date('g:i A');

if(password_verify("$pwd", $row["admin_pwd"])){
    $admin_fname=mysqli_real_escape_string($con, $_POST['admin_fname']);
    $admin_lname=mysqli_real_escape_string($con, $_POST['admin_lname']);
    $admin_email=mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_contact=mysqli_real_escape_string($con, $_POST['admin_contact']);
    $admin_address=mysqli_real_escape_string($con, $_POST['admin_address']);
    
    $sql=$con->query("UPDATE `admin_info` SET `admin_firstname`='$admin_fname',`admin_lastname`='$admin_lname',`admin_email`='$admin_email',`admin_contactno`='$admin_contact',`admin_address`='$admin_address' WHERE `adminID`=$id");
        
    $sql=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'Your Information was Updated','$phdate', '$phtime')");
     echo "<script>location.reload()</script>";

    $sql=$con->query("UPDATE `admin_info` SET `login_attempt`=0 WHERE `adminID`=$id");
}else{

    $sql1 = "SELECT * FROM `admin_info` WHERE `adminID`=$id";
    $admin1 = $con->query($sql1) or die ($con->error);
    $row1 = $admin1->fetch_assoc();
            
    $rem_attm=2-$row['login_attempt'];
    $sql=$con->query("UPDATE `admin_info` SET `login_attempt`= `login_attempt`+1 WHERE `adminID`=$id");
    $adminID=$row1['adminID'];
    $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Entered Invalid Password','$phdate', '$phtime')");

    if($row['login_attempt']==2){
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Attempts Exceeded',
                    text: 'Please reset your password if you forgot it',
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
                }).then((result)=>{
                    var id = $adminID;
                        $.ajax({
                        url: 'queries/autologout.php',
                        type: 'post',
                        data: {id:id}
                    })
                    location.reload();
                })
            </script>";
    }else{
        echo "<script>
        Swal.fire({
            title: 'Invalid Password',
            icon: 'error',
            text: 'You have $rem_attm attempt(s) remaining', 
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK',
        })
        </script>";
    }
    
}

?>