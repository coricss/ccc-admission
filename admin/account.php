<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../connect.php");
$con=connect();
if(isset($_SESSION['ID'])&&($_SESSION['email'])){
    $id=$_SESSION['ID'];
    $sql=$con->query("SELECT * FROM `admin_info` WHERE `adminID`=$id");
    $row=$sql->fetch_array();

    // if(isset($_POST['savedetails'])){
    //     $admin_fname=mysqli_real_escape_string($con, $_POST['admin_fname']);
    //     $admin_lname=mysqli_real_escape_string($con, $_POST['admin_lname']);
    //     $admin_email=mysqli_real_escape_string($con, $_POST['admin_email']);
    //     $admin_contact=mysqli_real_escape_string($con, $_POST['admin_contact']);
    //     $admin_address=mysqli_real_escape_string($con, $_POST['admin_address']);
        
    //     $sql=$con->query("UPDATE `admin_info` SET `admin_firstname`='$admin_fname',`admin_lastname`='$admin_lname',`admin_email`='$admin_email',`admin_contactno`='$admin_contact',`admin_address`='$admin_address' WHERE `adminID`=$id");
        
    //     date_default_timezone_set('Asia/Manila');
    //     $phdate=date('m/d/Y');
    //     $phtime=date('g:i A');
    //     $sql=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'Your Information was Updated','$phdate', '$phtime')");
    //     echo header("Refresh: 0");
    // }
    if(isset($_POST['upload'])){
        $time=time();
        $imgName= $time.'_'.$_FILES["profileImg"]["name"];
        $old_img=$row['admin_photo'];
        $imgDestination = "../assets/imgs/admin_photos/".$imgName;
        $allowed_ext=array('png', 'jpg', 'jpeg');
        date_default_timezone_set('Asia/Manila');
        $phdate=date('m/d/Y');
        $phtime=date('g:i A');
        $file_ext=pathinfo($imgName, PATHINFO_EXTENSION);
        if(!in_array($file_ext, $allowed_ext)){
        $_SESSION["message"]=
        "<script>
            Swal.fire({
                title: 'Please upload a valid photo!',
                icon: 'error',
                text: 'Accepts only JPG and PNG file format.',
                showConfirmButton: false,
                timer: 2000
            })
        </script>";
        }else{
            $sql= "UPDATE admin_info SET `admin_photo`='$imgName' WHERE `adminID`='$id'";
            $con->query($sql) or die ($con->error);
            $sql2=$con->query("INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($id,'Your Photo was Updated','$phdate', '$phtime')");
            if($imgName!='') {
                move_uploaded_file($_FILES["profileImg"]["tmp_name"], "../assets/imgs/admin_photos/".$imgName);
                if($_SESSION['img']!="default_photo.png") {
                    unlink("../assets/imgs/admin_photos/".$old_img);
                    $_SESSION['img']=$imgName;
                }
                else {
                    $_SESSION['img']=$imgName;
                   
                }
                echo header("Refresh:0;");
            }
           
        }     
    }

}else{
    echo header("Location: index.php");  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['admin_firstname']." ".$row['admin_lastname']?> | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
 
    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/print.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
    <script src="../assets/js/bootstrap.min.js" defer></script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/placeholders.js"></script>
    <script src="../assets/js/aos.js" defer></script>
</head>
<body>
<div class="sidebar">
        <ul class="nav-list" style="margin-top: 80px">
            <!-- <li>
                <a href="#">
                    <i class='bx bx-search-alt' ></i>
                    <input type="text" class="link-name " placeholder="Search...">
                </a>
            </li> -->
            <li>
                <a href="dashboard.php" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Dashboard'>
                    <i class='bx bx-grid-alt'></i>
                    <span class="link-name">Dashboard</span>
                </a>     
            </li>
            <li>
                <a href="student.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Students Information'>
                    <i class='bx bx-user' ></i>
                    <span class="link-name">Students Information</span>
                </a>
            </li>
            <li>
                <a href="result.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Examination Results'>
                    <i class='bx bxs-file-blank' ></i>
                    <span class="link-name">Examination Results</span>
                </a>
            </li>
            <li>
                <a href="analytics.php" id="" class="sidelinks " data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Analytics'>
                    <i class='bx bx-line-chart'></i>
                    <span class="link-name">Analytics</span>
                </a>
            </li>
            <li>
                <a href="feedbacks.php" id="" class="sidelinks " data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Feedbacks'>
                    <i class='bx bx-chat' ></i>
                    <span class="link-name">Feedbacks</span>
                </a>
            </li>
            <li>
                <a href="archives.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Archives'>
                    <i class='bx bx-archive'></i>
                    <span class="link-name">Archives</span>
                </a>
            </li>
            <li>
                <a href="programs.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Manage Programs'>
                    <i class='bx bxs-graduation'></i>
                    <span class="link-name">Manage Programs</span>
                </a>
            </li>
            <li>
                <a href="settings.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Admin Settings'>
                    <i class='bx bx-cog' ></i>
                    <span class="link-name">Admin Settings</span>
                </a>
            </li>
        </ul>
        <div class="profile-content">
            <div class="profile">
                <div class="profile-details">
                    <a href="account.php">
                        <img src="../assets/imgs/admin_photos/<?php echo $row['admin_photo']?>" style="border: 2px solid orange; " alt="" border="0">
                    </a>
                    <div class="name-job">
                        <a href="account.php" style="text-decoration: none; color: orange">
                            <div class="name"><?php echo $row['admin_firstname']." ".$row['admin_lastname']?></div>
                        </a>
                            <div class="job" style='color: orange'>Administrator</div>
                    </div> 
                 
                    <a href="#" name="logout" data-id="<?php echo $_SESSION['ID']?>" class="logout"><i class="bx bx-log-out" id="logout" style="cursor: pointer" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Logout'></i></a>
                </div> 
            </div>
        </div>
</div>
    <?php include('includes/navbar.php')?>
    <div class="main mt-5" id=main>
        <?php if(isset($_SESSION['message'])){?>
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        <?php }?>
        <div id="details"></div>
        <div class="title">
            <a href="dashboard.php"><img class="logo" src="../assets/imgs/logo/ccc.png"></a>
        </div>
        <div class=subheading>
            <h1 class="pagetitle">Manage Profile</h1>
            <p>Admission Management System | City College of Calamba</p>
        </div>
        <div class='main-profile mt-5'>
            <div class="adminrow row">
                <div class="admin-profile col-md-3 col-sm-3">
                    <center>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="profile-pic">
                            <input type="file" name="profileImg" id="profileImg" style="display: none" accept="image/*">
                            <input type="submit" value="" id="upload" name="upload"style="display: none">
                             <img src="../assets/imgs/admin_photos/<?php echo $row['admin_photo'] ?>" alt="default" border="1" class="adminpic" onclick="adminPic()">
                        </div>
                        <div class="pb-0">
                           
                        </div>
                        <div class="admin-info mt-2">
                            <h4 class="text-uppercase"><?php echo $row['admin_firstname']." ".$row['admin_lastname']?></h4>
                            <small>Administrator</small>
                        </div>
                    </form>
                    </center>
                    <hr>
                    <div class="info p-2">
                        <div class="row mt-2">
                            <div class="col-lg-4 p-0">
                                <b>Email:</b> 
                            </div>
                            <div class="col-lg-8 p-0">
                                <p><?php echo $row['admin_email'] ?></p>  
                            </div>
                        </div> 
                        <div class="row mt-2">
                            <div class="col-lg-4 p-0">
                                <b>Contact #:</b> 
                            </div>
                            <div class="col-lg-8 p-0">
                                <p><?php echo $row['admin_contactno'] ?></p>  
                            </div>
                        </div> 
                        <div class="row mt-2">
                            <div class="col-lg-4 p-0">
                                <b>Address:</b> 
                            </div>
                            <div class="col-lg-8 p-0">
                                <p><?php echo $row['admin_address']?></p>  
                            </div>
                        </div> 
                    </div>
                    <hr>
                        <h5 class="editdetails">MY ACTIVITY LOG</h5>
                        <div class="row activity-log" >
                            <table class="table table-bordered table-hover table-responsive text-center">
                                <thead class="table-ccc">
                                    <th>Activity</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </thead>
                                <tbody id='activity'>
                                    
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="about-profile">
                    <h5 class="editdetails">Edit Details</h5>
                    <form id='edit-admin' >
                        <div class='row mt-4'>
                            <div class='col-md-6 col-sm-12 mb-2'>
                                <label for='admin_fname'>First Name:</label>
                                <input type='text' class='form-control' id='admin_fname' name='admin_fname' value="<?php echo $row['admin_firstname'] ?>" required>
                            </div>
                            <div class='col-md-6 col-sm-12 mb-2'>
                                <label for='admin_lname'>Last Name:</label>
                                <input type='text' class='form-control' id='admin_lname' name='admin_lname' value="<?php echo $row['admin_lastname'] ?>" required>
                            </div>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-md-6 col-sm-12 mb-2'>
                                <label for='admin_email'>Email Address:</label>
                                <input type='email' class='form-control' id='admin_email' name='admin_email' value="<?php echo $row['admin_email'] ?>" required>
                            </div>
                            <div class='col-md-6 col-sm-12 mb-2'>
                                <label for='admin_contact'>Contact Number:</label>
                                <input type='text' class='form-control' pattern="((\+[0-9]{2})|0)[.\- ]?9[0-9]{2}[.\- ]?[0-9]{3}[.\- ]?[0-9]{4}" maxlength='11' minlength='11' id='admin_contact' name='admin_contact' value="<?php echo $row['admin_contactno'] ?>" required>
                            </div>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-md-12 mb-2'>
                                <label for='admin_address'>Address:</label>
                                <input type='text' class='form-control' id='admin_address' name='admin_address' value="<?php echo $row['admin_address'] ?>" required>
                            </div>
                        </div>
                        <div class='mt-2 text-center'>
                            <button type='button' class='btn btn-primary' id='savedetails' name='savedetails'>Save Details</button>
                        </div>
                    </form>
                    <hr>
                    <form id="updatepwd">
                        <h5 class="editdetails mt-4">Update Password</h5>
                        <div class="row mt-4">
                            <div class="col-md-12 ">
                                <label for="currentpass">Current Password:</label>
                                <input type="password" class="form-control" minlength="8" id="currentpass" name="currentpass" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 ">
                                <label for="newpass">New Password:</label>
                                <input type="password" class="form-control" minlength="8" id="newpass" name="newpass" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 ">
                                <label for="confirmpass">Confirm Password:</label>
                                <input type="password" class="form-control" minlength="8" id="confirmpass" name="confirmpass" required>
                            </div>
                        </div>
                        <div id="chpass" class="mb-1">
                           
                        </div>
                        <div class="mt-2">
                            <input style="margin-left: 5px" class="form-check-input" type="checkbox" id="showpass2"><small style="margin-left: 5px">Show passwords</small>
                        </div>
                        <div class="mt-2 text-center">
                            <button type="button" class="btn btn-primary" id="updatepass" name="updatepass">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
<script src="assets/js/PassRequirements.js"></script>
</html>