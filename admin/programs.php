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
  include_once("queries/addProgram.php");
  include_once("queries/updateProgram.php");
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
  <title>Programs | City College of Calamba</title>
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
                <a href="programs.php" id="" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Manage Programs'>
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
        <h1 class="pagetitle">Manage Programs</h1>
        <p>Admission Management System | City College of Calamba</p>
    </div>
    <div class="row mt-5 mb-5">
        <section class="administrator">
            <div class="col-lg-12 col-md-12">
                <div class="main-card mb-3 card programcard" >
                    <div class="head" id="add-program">
                        <div class="dropdown mb-3" style="display: flex; flex: 1">
                            <i class='bx bx-dots-vertical-rounded' id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> 
                            <h5 class="card-title">Programs</h5>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item btn-add-program"><i class='bx bx-plus' style="font-size: 15px"></i> New Program
                                    </a>
                                </li>
                                <li>
                                    <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                        <button class="dropdown-item" name="export-program" type="submit">
                                            <i class='bx bxs-download' style="font-size: 15px"></i> Export
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="" name="print-program" onclick="printJS('tblProgram', 'html')" id="print-program">
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
                                <button class="add btn-add-program" id="btn-add-program" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="New program"><i class='bx bx-plus' style="font-size: 30px"></i></button>
                                <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                <button type="submit" name="export-program" class=export id="export" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export"><i class='bx bxs-download' style="font-size: 25px"></i></button>
                                </form>
                                <!-- <form action="queries/print-tables.php" method="post" style="display: flex; margin: 0"> -->
                                <button type="" name="print-program" onclick="printJS('tblProgram', 'html')" class=refresh id="print-program" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Print"><i class='bx bxs-printer' style="font-size: 25px"></i></button>
                                <!-- </form> -->
                                <button class=refresh id="refresh" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"><i class='bx bx-refresh' style="font-size: 30px"></i></button>
                                <select class="form-select sort" id="sortProgram" class="sort">
                                    <option value="" disabled selected>Sort By</option>
                                    <option class="others" value="program_id">Program #</option>
                                    <option class="others" value="program_name">Program Name</option>
                                    <option class="others" value="abbreviation">Abbreviation</option>
                                    <option class="others" value="max_no">Max # of Students</option>
                                </select>
                                <input class="search-inputhome form-control" id=search_program name="search-program" type="search" placeholder="Search program details..">
                                <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                         <div class="row mb-3" id="program-table">
                             <table style="border-collapse: collapse" class="mb-0 table table-responsive table-bordered table-hover text-center" id="tblProgram">
                                 <thead class='table-ccc'>
                                     <th style="border: 1px solid gray" width="10%">Program #</th>
                                     <th style="border: 1px solid gray" width="20%">Program Name</th>
                                     <th style="border: 1px solid gray" width="10%">Abbreviation</th>
                                     <th style="border: 1px solid gray" width="10%">Required GWA</th>
                                     <th style="border: 1px solid gray" width="10%">Maximum number of students</th>
                                     <th id="actions" style="border: 1px solid gray" width="10%">Action</th>
                                 </thead>
                                 <tbody id="tblprogram-body">
                                    
                                 </tbody>
                             </table>
                         </div>
                    </div>
                </div>
                <div class="main-card mb-3 card add-programcard" style="display: none">
                    <div class='parent' style='display: flex'>
                        <div class="btn-back">
                            <button class='back' id="goback-program" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go back"><i class='bx bx-arrow-back' style="font-size: 25px;"></i></button>
                        </div>
                        <div class='formTitle mt-1' style='flex: 1;'>
                            <h5 class="appform mb-4">Add a program</h5>
                        </div>
                    </div>
                    <div class="container" id="container-program">
                        <form method="POST" id="programForm" class="form control" enctype="multipart/form-data" autocomplete="on">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="row mt-5">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="programName" class="required">Program Name:<i class="req">*</i></label>
                                            <input type="text" name="programName" id=programName placeholder="Program name" class="form-control" required>
                                            <div class="text-danger" id="programNameFeedback">
                                                <!-- <small>Admin name already exists</small> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="abbr" class="required">Abbreviation:<i class="req">*</i></label>
                                            <input type="text" name="abbr" id=abbr placeholder="Abbreviation" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="required_gwa" class="required">Required GWA:<i class="req">*</i></label>
                                            <input type="number" name="required_gwa" id=required_gwa placeholder="Required Average" class="form-control" max="100" min="1" required>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="max_no" class="required">Maximum Number of Students:<i class="req">*</i></label>
                                            <input type="number" name="max_no" id=max_no placeholder="Max no. of Students" class="form-control" min="1" required>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="text-center">
                                            <button type='button' id="btn-addProgram" name="btn-addProgram" class='btn btn-primary mt-2'>Add Program</button>
                                            <button type='reset'class='btn btn-danger mt-2'>Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="main-card mb-3 card edit-programcard" style="display: none">
                    <div class='parent' style='display: flex'>
                        <div class="btn-back">
                            <button class='back' id="edit-goback-program" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go back"><i class='bx bx-arrow-back' style="font-size: 25px;"></i></button>
                        </div>
                        <div class='formTitle mt-1' style='flex: 1;'>
                            <h5 class="appform mb-4">Edit program</h5>
                        </div>
                    </div>
                    <div class="container" id="edit-container-program">

                    </div>
                </div>
            </div>
        </section>
    </div>
  </div>
</body>
</html>