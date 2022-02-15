<?php 


if(!isset($_SESSION)){
    session_start();
}

include_once("../connect.php");
$con=connect();

if(isset($_POST["btn-addAdmin"])){

    $adminID=$_SESSION['ID'];
    $name=$_SESSION['name'];

    date_default_timezone_set('Asia/Manila');
    $dateNotif=date("Y-m-d h:i:s A");
    $phdate=date('m/d/Y');
    $phtime=date('g:i A');
    $photo=$_FILES["profileImageAdmin"]["name"];
    $target_file = "../assets/imgs/admin_photos/".$photo;
    $fname=mysqli_real_escape_string($con, $_POST["fnameAdmin"]);
    $lname=mysqli_real_escape_string($con, $_POST["lnameAdmin"]);
    $admin_name=$fname.' '.$lname;
    $email=mysqli_real_escape_string($con, $_POST["emailAdmin"]);
    $phone=mysqli_real_escape_string($con, $_POST["adminNo"]);
    $address=mysqli_real_escape_string($con, $_POST["adminAdd"]);
    $defaultpass=mysqli_real_escape_string($con, $_POST["newpwd"]);
    $pass=password_hash($defaultpass, PASSWORD_DEFAULT);
    $confirm=mysqli_real_escape_string($con, $_POST["confirmpwd"]);

    if($photo!=""){
        if(move_uploaded_file($_FILES["profileImageAdmin"]["tmp_name"], $target_file)) {
            $sql ="INSERT INTO `admin_info`(`admin_photo`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_pwd`, `admin_contactno`, `admin_address`, `code`, `code_expiry`, `login_attempt`) VALUES ('$photo','$fname','$lname', '$email', '$pass','$phone','$address','','','0')";
            $con->query($sql) or die ($con->error);

            $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Added a New Admin','$phdate','$phtime')";
            $con->query($sql) or die ($con->error);

            $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','added $admin_name as an administrator','$dateNotif')");


            $_SESSION["message"]="<script>
            Swal.fire({
                title: 'Administrator Registered Successfully',
                text: 'You added another admin',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false,
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
            window.history.replaceState( null, null, window.location.href );
            </script>";
        }


    }else{

        $sql ="INSERT INTO `admin_info`(`admin_photo`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_pwd`, `admin_contactno`, `admin_address`, `code`, `code_expiry`, `login_attempt`) VALUES ('default_photo.png','$fname','$lname', '$email', '$pass','$phone','$address','','','0')";
            $con->query($sql) or die ($con->error);

        $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Added a New Admin','$phdate','$phtime')";
        $con->query($sql) or die ($con->error);

        $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','added $admin_name as an administrator','$dateNotif')");

        $_SESSION["message"]="<script>
        Swal.fire({
            title: 'Administrator Registered Successfully',
            text: 'You added another admin',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
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
        window.history.replaceState( null, null, window.location.href );
        </script>";

    }
    
   
}

?>