<?php

	if(!isset($_SESSION)){
		session_start();
	}
	include_once("../../connect.php");
	$con=connect();
    extract($_POST);
  
	$email=mysqli_real_escape_string($con, $_POST['email']);
	$pwd=mysqli_real_escape_string($con, $_POST['pwd']);
	$sql = "SELECT * FROM `admin_info` WHERE `admin_email` = '$email'";
	$admin = $con->query($sql) or die ($con->error);
	$row = $admin->fetch_assoc();
	$total = $admin->num_rows;
  
    date_default_timezone_set('Asia/Manila');
    $phdate=date('m/d/Y');
    $phtime=date('g:i A');
    $time=time()-180;
    $ip_addr=getHostByName(getHostName());

    // $count_log=$con->query("SELECT COUNT(*)  AS 'total_count' FROM `admin_logs` WHERE `time`>$time AND `ip_address`='$ip_addr'");
    // $count=$count_log->fetch_array();
    // $total_log=$count['total_count'];

    // $row['admin_pwd']=="$pwd"
    // password_verify("$pwd", $row["admin_pwd"])
      if(($total>0)&&($row['admin_email']=="$email"&&(password_verify("$pwd", $row["admin_pwd"])))){
        $_SESSION['ID']=$row['adminID'];
        $_SESSION['img']=$row['admin_photo'];
        $_SESSION['name']=$row['admin_firstname']." ".$row['admin_lastname'];
        $_SESSION['email'] = $row['admin_email'];
        $_SESSION['contact_no']= $row['admin_contactno'];
        $_SESSION['address']=$row['admin_address'];
        $_SESSION['last_active']=time();
        $id=$_SESSION['ID'];
        $sql=$con->query("UPDATE `admin_info` SET `login_attempt`=0 WHERE `admin_email`='$email'");
        $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'Your Account was Logged In','$phdate', '$phtime')");
       echo 
        "<script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Successfully Logged In',
            text: 'Welcome $_SESSION[name]!',
            showConfirmButton: false,
            timer: 2000
          })
          setTimeout(function () {
            location.href='dashboard.php';
            }, 2000);
          
        </script>";
        }else if(($total>0)&&($row['admin_email']=="$email"&&!password_verify("$pwd", $row["admin_pwd"]))){
          if($row['login_attempt']==2){
            $id=$row['adminID'];
            $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'Your Login Attempts was Exceeded','$phdate', '$phtime')");
            //300000 dapat
            echo
            "<script>
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Login Attempts Exceeded',
                text: 'Please try again later',
                showConfirmButton: false,
                timer: 300000,
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
                var id = $id;
                $.ajax({
                  url: 'queries/attemptreset.php',
                  type: 'post',
                  data: {id:id}
                })
                location.reload();
              })
            </script>";
          }else{
            $sql1 = "SELECT * FROM `admin_info` WHERE `admin_email` = '$email'";
            $admin1 = $con->query($sql1) or die ($con->error);
            $row1 = $admin1->fetch_assoc();
            
            $rem_attm=2-$row['login_attempt'];
            $sql=$con->query("UPDATE `admin_info` SET `login_attempt`= `login_attempt`+1 WHERE `admin_email`='$email'");
            $id=$row1['adminID'];
            $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'You Entered Invalid Password','$phdate', '$phtime')");

            //120000 dapat
           echo 
            "<script>
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Invalid Password',
                text: 'You have $rem_attm attempt(s) remaining',
                confirmButtonColor: '#0d6efd'
              }).then((result)=>{
                resetattempt();
                function resetattempt(){
                  attempt=setInterval(function(){
                    var id = $id;
                    $.ajax({
                      url: 'queries/attemptreset.php',
                      type: 'post',
                      data: {id:id},
                      success:function(data){
                          clearInterval(attempt);
                      }
                    })
                  }, 120000);
                }
              })
              
            </script>";
          }
          
        }else{
              echo 
              "<script>
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Invalid Email and Password',
                  text: 'Please enter valid email and password',
                  confirmButtonColor: '#0d6efd'
                })
              </script>";
        }

?>