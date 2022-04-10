<?php 

if(!isset($_SESSION)){
    session_start();    
}

include_once("../connect.php");
$con=connect();
if(isset($_SESSION['ID'])&&($_SESSION['email'])){
date_default_timezone_set('Asia/Manila');
$year=date("Y");

$sql = "SELECT COUNT(student_id) AS 'Registered' FROM `student_info` WHERE `application_no` LIKE '%$year%'";
$all = $con->query($sql) or die ($con->error);
$studs = $all->fetch_array();
$registered=$studs['Registered'];

$sql = "SELECT COUNT(verification) AS 'Verified' FROM `student_info` WHERE `verification`='Verified' AND `application_no` LIKE '%$year%'";
$ver = $con->query($sql) or die ($con->error);
$verify = $ver->fetch_array();
$verified=$verify['Verified'];

$sql = "SELECT COUNT(admit_type) AS 'Freshmen' FROM `student_info` WHERE `admit_type`='Freshman' AND `verification`='Verified' AND `application_no` LIKE '%$year%'";
$fresh = $con->query($sql) or die ($con->error);
$newstud = $fresh->fetch_array();
$freshmen=$newstud['Freshmen'];

$sql = "SELECT COUNT(admit_type) AS 'Transferee' FROM `student_info` WHERE `admit_type`='Transferee' AND `verification`='Verified' AND `application_no` LIKE '%$year%'";
$trans = $con->query($sql) or die ($con->error);
$transfer = $trans->fetch_array();
$transferee=$transfer['Transferee'];

if($verified==0){
    $freshmenpercent=0;
    $transfereepercent=0;
}
if($verified!=0){
    $freshmenpercent=$freshmen/$verified*100;
    $transfereepercent=$transferee/$verified*100;
}

$sql = "SELECT * FROM `student_info` WHERE `verification`='Pending' AND `application_no` LIKE '%$year%' ORDER BY `student_id` DESC";
$stud = $con->query($sql) or die ($con->error);

$sql="SELECT COUNT(`student_id`) AS 'pending' FROM `student_info` WHERE `verification`='Pending' AND `application_no` LIKE '%$year%'";
$pen = $con->query($sql) or die ($con->error);
$penc=$pen->fetch_array();
$pencount=$penc['pending'];

$sql="SELECT * FROM `admission_status`";
$status = $con->query($sql) or die ($con->error);
$rowStatus=$status->fetch_array();

$id=$_SESSION['ID'];
$sql1=$con->query("SELECT * FROM `admin_info` WHERE `adminID`=$id");
$row=$sql1->fetch_array();
}
else{
    echo header("Location: index.php");  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Management | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">

    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
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
                <a href="dashboard.php" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Dashboard'>
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
                <a href="analytics.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Analytics'>
                    <i class='bx bx-line-chart'></i>
                    <span class="link-name">Analytics</span>
                </a>
            </li>
            <li>
                <a href="feedbacks.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Feedbacks'>
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
        <div id="line">
            
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
            <h1 class="pagetitle">Home Dashboard</h1>
            <p>Admission Management System | City College of Calamba</p>
        </div>
        
        <section class="dashboard" id="widgetData">
            <div class="row">
                <div class="col-lg-3 col-sm-12 contents mb-3">
          
                    <div class=widget-content-left>
                        <div class=widget-content-title>
                            Registered Students
                        </div>
                        <div class=widget-content-data>
                            <?php echo $registered?>
                        </div>
                    </div>
                    <div class=widget-content-right>
                        <div class=widget-content-title>
                        <i class='bx bxs-user-plus'style="font-size: 50px"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 verified mb-3">
                    <div class=widget-content-left>
                        <div class=widget-content-title>
                            Verified Students
                        </div>
                        <div class=widget-content-data >
                            <?php echo $verified?>
                        </div>
                    </div>
                    <div class=widget-content-right>
                        <div class=widget-content-title>
                            <i class='bx bxs-user-check' style="font-size: 50px"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 freshman mb-3">
                    <div class=widget-content-left>
                        <div class=widget-content-title>
                            Freshmen
                        </div>
                        <div class=widget-content-data>
                            <?php echo round($freshmenpercent)?>%
                        </div>
                    </div>
                    <div class=widget-content-right>
                        <div class=widget-content-title>
                            <i class='bx bxs-group' style="font-size: 50px"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 transfer mb-3">
                    <div class=widget-content-left>
                        <div class=widget-content-title>
                            Transferees
                        </div>
                        <div class=widget-content-data>
                            <?php echo round($transfereepercent)?>%
                        </div>
                    </div>
                    <div class=widget-content-right>
                        <div class=widget-content-title>
                            <i class='bx bx-transfer-alt' style="font-size: 50px"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="row mt-3 mb-5">
            <section class="verification">
                <div class="col-lg-12 col-md-12">
                    <div class="main-card mb-3 card">
                    <div class="head ">
                        <div class="dropdown mb-3" style="display: flex; flex: 1">
                        <i class='bx bx-dots-vertical-rounded ' id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> 
                        <h5 class="card-title">Student Verification  </h5>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" id="toggle-admission">
                                        <?php 
                                            if ($rowStatus['status']=='0'){
                                                echo '<i id="toggle-dots" class="bx bxs-toggle-right" style="font-size: 15px"></i> Ongoing';
                                            }else{
                                                echo '<i id="toggle-dots" class="bx bxs-toggle-left" style="font-size: 15px"></i> Suspended';
                                            }
                                        ?>      
                                    </a>
                                </li>
                                <li><a class="dropdown-item" id="refresh"><i class='bx bx-refresh' style="font-size: 15px"></i> Refresh</a></li>
                            </ul>
                        </div>
                        <div class="searchbox">
                            <div id="searchform"> 
                                <button class="toggle-admission" id="toggle-admission"></button>
                                <button class=refresh id="refresh" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"><i class='bx bx-refresh' style="font-size: 30px"></i></button>
                                <select class="form-select sort" id="sort" class="sort">
                                    <option value="" disabled selected>Sort By</option>
                                    <option class="others" value="application_no">Application Number</option>
                                    <option class="others" value="first_name">Name</option>
                                    <option class="others" value="contactno">Contact No</option>
                                    <option class="others" value="stud_email">Email</option>
                                    <option class="others" value="pre_house">Address</option>
                                    <option class="others" value="student_id">Newly Registered</option>
                                </select>
                                <input class="search-inputhome form-control" id=search_ver name="searchstud" type="search" placeholder="Search student details..">
                                <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button> 
                            </div>
                        </div>
                    </div>
                        <div class="card-body" id="refreshData">
                            <?php if($pencount==0) {?>
                                <div class="pendingnores text-center">
                                    <h4>No registered students</h4>
                                </div>
                            <?php } else {?>
                            <table class="mb-0 table table-responsive table-bordered table-hover text-center" id="studVerify">
                                <thead class='table-ccc'>
                                    <tr>
                                        <th width=8%>Application #</th>
                                        <th width=5%>Photo</th>
                                        <th width=8%>Name</th>
                                        <th wodth=8%>Contact No.</th>
                                        <th width=10%>Email</th>
                                        <th width=15%>Address</th>
                                        <th width=5%>Admit Type</th>
                                        <th width=8%>Application Form</th>
                                        <th width=20%>Requirements</th>
                                        <th width=5%>Status</th>
                                        <th width=10%>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="studDataa">
                                </tbody>
                            </table>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </section>
        <div>
    </div>
</body>
</html>