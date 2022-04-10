<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../connect.php");
$con=connect();
if(isset($_SESSION['ID'])&&($_SESSION['email'])){
    date_default_timezone_set('Asia/Manila');
    $year=date("Y");
    $resultsql=$con->query("SELECT * FROM `exam_results` INNER JOIN `student_info` ON exam_results.application_no=student_info.application_no WHERE exam_results.application_no LIKE '%$year%'");
    $count=$resultsql->num_rows;
    $id=$_SESSION['ID'];
    $sql1=$con->query("SELECT * FROM `admin_info` WHERE `adminID`=$id");
    $row=$sql1->fetch_array();
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
    <title>Examination Results | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/print.min.css">
    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/print.js"></script>
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
                <a href="dashboard.php" class="sidelinks " data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Dashboard'>
                    <i class='bx bx-grid-alt'></i>
                    <span class="link-name">Dashboard</span>
                </a>     
            </li>
            <li>
                <a href="student.php" id="" class="sidelinks " data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Students Information'>
                    <i class='bx bx-user' ></i>
                    <span class="link-name">Students Information</span>
                </a>
            </li>
            <li>
                <a href="result.php" id="" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Examination Results'>
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
                        <img src="../assets/imgs/admin_photos/<?php echo $row['admin_photo'] ?>" alt="" border="0">
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
        <h1 class="pagetitle">Entrance Examination</h1>
        <p>Admission Management System | City College of Calamba</p>
    </div>
    <div class="row mt-5 setExam">
        <section class="test">
            <div class="col-lg-12 col-md-12">
                <div class="main-card examcard">
                    <div class="head">
                        <div class="dropdown mb-3" style="display: flex; flex: 1">
                            <i class='bx bx-dots-vertical-rounded' id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> 
                            <h5 class="card-title">Test Results</h5>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                        <button class="dropdown-item" name="export-results" type="submit">
                                            <i class='bx bxs-download' style="font-size: 15px"></i> Export
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="" name="print-results" id="print-results">
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
                            <div id="searchform">
                                <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                <button type="submit" name="export-results" class=export id="export" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export"><i class='bx bxs-download' style="font-size: 25px"></i></button>
                                </form>
                                <button type="" name="print-results" class=refresh id="print-results" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Print"><i class='bx bxs-printer' style="font-size: 25px"></i></button>
                                <button class=refresh id="refresh" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"><i class='bx bx-refresh' style="font-size: 30px"></i></button>
                                <select class="form-select sort" id="sortresult" class="sort">
                                    <option value="" disabled selected>Sort By</option>
                                    <option class="others" value="student_name">Name</option>
                                    <option class="others" value="1stprio">1st Priority</option>
                                    <option class="others" value="2ndprio">2nd Priority</option>
                                    <option class="others" value="final_program">Final Program</option>
                                    <option class="others" value="raw_score">Raw Score</option>
                                    <option class="others" value="scaled_score">Scaled Score</option>
                                    <option class="others" value="percentile_rank">Percentile Rank</option>
                                    <option class="others" value="stanine">Stanine</option>
                                    <option class="others" value="verbal_interpretation">Verbal Interpretation</option>
                                </select>
                                <input class="search-inputhome form-control" id=search_result name="searchresult" type="search" placeholder="Search result details..">
                                <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button> 
                            </div>
                        </div>
                    </div>
                    <div class="exambody" id="refreshData">
                        <?php if($count==0) {?>
                            <div class="pendingnores text-center">
                                <h4>No results found.</h4>
                            </div>
                        <?php } else {?>
                        <table style="border-collapse: collapse" class="mb-0 table table-responsive table-bordered table-hover text-center" id='results'>
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
                                <th id="actions" style="border: 1px solid gray" width=5% >Print</th>
                            </tr>
                        </thead>
                        <tbody id='result'>
                        </tbody>
                        </table>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>