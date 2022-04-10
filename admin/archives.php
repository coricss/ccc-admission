<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../connect.php");
$con=connect();
if(isset($_SESSION['ID'])&&($_SESSION['email'])){

    $id=$_SESSION['ID'];
    $sql1=$con->query("SELECT * FROM `admin_info` WHERE `adminID`=$id");
    $row=$sql1->fetch_array();

    date_default_timezone_set('Asia/Manila');
    $year=date("Y");

    $stud=$con->query("SELECT * FROM `student_info` WHERE `application_no` NOT LIKE '%$year%'");
    // $stud=$con->query("SELECT * FROM `student_info` ORDER BY `first_name` ASC");
    $count=$stud->num_rows;

    // $res=$con->query("SELECT * FROM `exam_results` WHERE `application_no` NOT LIKE '%$year%' ORDER BY `first_name` ASC");

    $result=$con->query("SELECT * FROM `exam_results` WHERE `application_no` NOT LIKE '%$year%'");
    $count2=$result->num_rows;
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
    <title>Archives | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/print.min.css">
    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="assets/js/print.min.js"></script>
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
                <a href="feedbacks.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Feedbacks'>
                    <i class='bx bx-chat' ></i>
                    <span class="link-name">Feedbacks</span>
                </a>
            </li>
            <li>
                <a href="archives.php" id="" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Archives'>
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
            <h1 class="pagetitle">Archives</h1>
            <p>Admission Management System | City College of Calamba</p>
        </div>
        <div class="row mt-5 mb-5">
            <section class="administrator">
                <div class="col-lg-12 col-md-12">
                    <div class="main-card mb-3" >
                        <div class="" style="background: #fff; height: 100%;">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Student's Data</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Test Results</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="head">
                                        <div class="dropdown mb-3" style="display: flex; flex: 1">
                                            <i class='bx bx-dots-vertical-rounded' id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> 
                                            <h5 class="card-title text-capitalize">Student Archive</h5>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item delStud2"><i class='bx bxs-trash' style="font-size: 15px"></i> Delete All
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                                        <button class="dropdown-item" name="export-studArchive" type="submit">
                                                            <i class='bx bxs-download' style="font-size: 15px"></i> Export
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" type="" name="print-studentsArchive" id="print-studentsArchive">
                                                        <i class='bx bxs-printer' style="font-size: 15px"></i> Print
                                                    </button>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" id="refresh">
                                                        <i class='bx bx-refresh' style="font-size: 15px"></i> Refresh
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="searchbox">
                                            <div id=searchform>
                                                <button class="delStud"><i class='bx bxs-trash' style="font-size: 25px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete All"></i></button>
                                                <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                                <button type="submit" name="export-studArchive" class=export id="export" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export"><i class='bx bxs-download' style="font-size: 25px"></i></button>
                                                </form>
                                                <button type="" name="print-studentsArchive" class=refresh id="print-studentsArchive" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Print"><i class='bx bxs-printer' style="font-size: 25px"></i></button>
                                                <button class=refresh id="refresh"><i class='bx bx-refresh' style="font-size: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"></i></button>
                                               
                                                <input class="search-inputhome form-control" id=search_studArchive name="query" type="search" placeholder="Search student details..">
                                                <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body2" id="studArchive">
                                        <?php if($count==0) { $trys=0?>
                                            <div class="pendingnores text-center" id="nodata-stud" data-id=<?php echo $trys ?>>
                                                <h4>No data found.</h4>
                                            </div>
                                        <?php } else {?>
                                        <table style="border-collapse: collapse" class="mb-0 table table-responsive table-bordered table-hover text-center" id="tbl-stud-archive">
                                            <thead class="table-ccc">
                                                <th style='border: 1px solid gray' width=15%>Application #</th>
                                                <th style='border: 1px solid gray' width=5%>Photo</th>
                                                <th style='border: 1px solid gray' width=10%>Name</th>
                                                <th style='border: 1px solid gray' width=10%>Contact No.</th>
                                                <th style='border: 1px solid gray' width=15%>Email</th>
                                                <th style='border: 1px solid gray' width=20%>Address</th>
                                                <th style='border: 1px solid gray' width=10%>Admit Type</th>
                                                <th style='border: 1px solid gray' width=10%>Status</th>
                                                <th id='actions' style='border: 1px solid gray' width=5%>Action</th>
                                            </thead>
                                            <tbody id="stud-archives">
                                                
                                            </tbody>
                                        </table>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="head">
                                        <div class="dropdown mb-3" style="display: flex; flex: 1">
                                            <i class='bx bx-dots-vertical-rounded' id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> 
                                            <h5 class="card-title text-capitalize">Results Archive</h5>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item delRes2"><i class='bx bxs-trash' style="font-size: 15px"></i> Delete All
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                                        <button class="dropdown-item" name="export-resultArchive" type="submit">
                                                            <i class='bx bxs-download' style="font-size: 15px"></i> Export
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" type="" name="print-resultsArchive" id="print-resultsArchive">
                                                        <i class='bx bxs-printer' style="font-size: 15px"></i> Print
                                                    </button>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" id="refresh">
                                                        <i class='bx bx-refresh' style="font-size: 15px"></i> Refresh
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="searchbox">
                                            <div id=searchform>
                                                <button class="delRes"><i class='bx bxs-trash' style="font-size: 25px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete All"></i></button>
                                                <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                                <button type="submit" name="export-resultArchive" class=export id="export" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export"><i class='bx bxs-download' style="font-size: 25px"></i></button>
                                                </form>
                                                <button type="" name="print-resultsArchive" class=refresh id="print-resultsArchive" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Print"><i class='bx bxs-printer' style="font-size: 25px"></i></button>
                                                <button class=refresh id="refresh"><i class='bx bx-refresh' style="font-size: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"></i></button>
                                               
                                                <input class="search-inputhome form-control" id=search_resultArchive name="query" type="search" placeholder="Search result details..">
                                                <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body2" id="studArchive">
                                        <?php if($count2==0) { $trys2=0?>
                                            <div class="pendingnores text-center" id="nodata-res" data-id=<?php echo $trys2 ?>>
                                                <h4>No data found.</h4>
                                            </div>
                                        <?php } else {?>
                                        <table style="border-collapse: collapse" class="mb-0 table table-responsive table-bordered table-hover text-center" id='tbl-results-archive'>
                                            <thead class='table-ccc'>
                                                <tr>
                                                    <th style="border: 1px solid gray" width=10% >Application #</th>
                                                    <th style="border: 1px solid gray" width=5% >Photo</th>
                                                    <th style="border: 1px solid gray" width=10% >Name</th>
                                                    <th style="border: 1px solid gray" width=5% >1st Priority</th>
                                                    <th style="border: 1px solid gray" width=5% >2nd Priority</th>
                                                    <th style="border: 1px solid gray" width=5% >Final Program</th>
                                                    <th style="border: 1px solid gray" width=5% >Raw Score</th>
                                                    <th style="border: 1px solid gray" width=5% >Scaled Score</th>
                                                    <th style="border: 1px solid gray" width=5% >Percentile Rank</th>
                                                    <th style="border: 1px solid gray" width=5% >Stanine</th>
                                                    <th style="border: 1px solid gray" width=10% >Verbal Interpretation</th>
                                                    <th id='actions-results' style="border: 1px solid gray" width=5% >Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id='result-archive'>
                                            </tbody>
                                        </table>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>  
            </section>
        </div>   
    </div>
</body>
</html>