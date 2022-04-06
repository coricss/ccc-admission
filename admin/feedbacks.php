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
    <title>Feedbacks | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
 
    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <!-- <script src="assets/js/print.js"></script> -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
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
                <a href="feedbacks.php" id="" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Feedbacks'>
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
                        <img src="../assets/imgs/admin_photos/<?php echo $row['admin_photo']?>" alt="" border="0">
                    </a>
                    <div class="name-job">
                        <a href="account.php" style="text-decoration: none; color: white">
                            <div class="name"><?php echo $row['admin_firstname']." ".$row['admin_lastname']?></div>
                        </a>
                            <div class="job">Administrator</div>
                    </div> 
                 
                    <a href="#" name="logout" data-id="<?php echo $_SESSION['ID']?>" class="logout"><i class="bx bx-log-out" id="logout" style="cursor: pointer" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Logout'></i></a>
                </div> 
            </div>
        </div>
    </div>
<?php include('includes/navbar.php')?>
<div class="main mt-5" id=main>
    <div id="emailNotif">
        
    </div>
    <?php if(isset($_SESSION['message'])){?>
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
    <?php }?>
    <div class="title">
        <a href="dashboard.php"><img class="logo" src="../assets/imgs/logo/ccc.png"></a>
    </div>
    <div class=subheading>
        <h1 class="pagetitle">Feedbacks</h1>
        <p>Admission Management System | City College of Calamba</p>
    </div>
    <div class="row mt-5" style="display: flex">
        <div class="col-md-8 col-sm-7 mb-3 reply">
            <div id="studfeedback">
                <div id="student-header" style="display: flex; align-items: center">
                    <img class="profile-image" src="../assets/imgs/student2x2/default_photo.png" alt="">
                    <div style="margin-left: 10px">
                        <h5 class="feedback-title" style="margin: 0px">Student Name</h5>
                        <small class="text-muted">example@domain.com</small>
                    </div>
                </div>
                <hr>
                <div class="chat-body text-center" id="chat-body" style="width: 60%; margin: auto;">
                    <h5>No selected student.</h5>
                </div>
            </div>
            
            <div class="reply-box mt-3" >
                <form action="" method="post" style="display: flex; flex :1">
                    <input type="text" name="txt-reply" class="form-control txt-reply" id="txt-reply" disabled placeholder="Aa" required>
                    <button type="button" id="btn-sendEmail" class="" disabled><i class='bx bxs-send' ></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 mb-3 feedbacks">
            <div class="" style='display: flex; align-items: center'>
                <h5  style='flex: 1; margin: 0' class="feedback-title">Student's Feedbacks</h5>
                <button class="refresh mt-1" id="refresh-FB" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Refresh'>
                    <i class='bx bx-refresh' style="font-size: 30px"></i>
                </button>
            </div>
            <hr>
            <div id="feedback-drawer"> 
                
            </div>
            
        </div>
    </div>
</div>
</body>
</html>