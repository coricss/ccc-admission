<?php 
          
if(!isset($_SESSION)){
    session_start();    
}

include_once("../../connect.php");
$con=connect();

if(isset($_POST['code'], $_POST['email'])){
    $code=$_POST['code'];
    $email=$_POST['email'];
    $sql= $con->query("SELECT * FROM `admin_info` WHERE `admin_email`='$email'");
    $row=$sql->fetch_array();
    $total=$sql->num_rows;
    
    if($total>=0&&$row['code']=="$code"&&$row['code_expiry']=="New"){
        echo "<script>
            $('#recoverycode').hide();
            $('#changepass').show();
        </script>";
    }else if($total>=0&&$row['code']=="$code"&&$row['code_expiry']=="Expired"){
        echo "<script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Recovery Code has Expired',
            text: 'Please resend your code, check your email and try again',
            confirmButtonColor: '#0d6efd'
        })
        </script>";
    }
    else{
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Invalid Recovery Code',
                text: 'Please check the code in your email to recover your account and try again',
                confirmButtonColor: '#0d6efd'
            })
            </script>";
    }
}
?>