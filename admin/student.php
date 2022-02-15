<?php
if(!isset($_SESSION)){
    session_start();    
}

include_once("../connect.php");
$con=connect();

if(isset($_SESSION['ID'])&&($_SESSION['email'])){
    include_once("queries/addStudent.php");
    include_once("queries/updateStudent.php");
    date_default_timezone_set('Asia/Manila');
    $year=date("Y");
    $stud=$con->query("SELECT * FROM `student_info` WHERE `application_no` LIKE '%$year%' ORDER BY `first_name` ASC");
    $count=$stud->num_rows;

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
    <title>Students | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="assets/css/print.min.css">
    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="assets/js/print.min.js"></script>
    <script src="../assets/js/aos.js" defer></script>
    <script src="assets/js/placeholders.js"></script>
    
</head>
<body>

    <div class="sidebar">
        <ul class="nav-list"  style="margin-top: 80px">
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
                <a href="student.php" id="" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Students Information'>
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
            <h1 class="pagetitle">Student Information</h1>
            <p>Admission Management System | City College of Calamba</p>
        </div>
    <div class="row mt-5 mb-5">
        <section class="verification">
            <div class="col-lg-12 col-md-12">
                <div class="main-card mb-3 card" id='main-card'>
                    <div class="head">
                        <div class="dropdown mb-3" style="display: flex; flex: 1">
                            <i class='bx bx-dots-vertical-rounded' id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> 
                            <h5 class="card-title">Student Overview</h5>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item addStudent"><i class='bx bx-plus' style="font-size: 15px"></i> New Student
                                    </a>
                                </li>
                                <li>
                                    <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                        <button class="dropdown-item" name="export-overview" type="submit">
                                            <i class='bx bxs-download' style="font-size: 15px"></i> Export
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="" name="print-students" onclick="printJS('studData', 'html')" id="print-students">
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
                                <button class="add addStudent"><i class='bx bx-plus' style="font-size: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="New student"></i></button>
                                <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                <button type="submit" name="export-overview" class=export id="export" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export"><i class='bx bxs-download' style="font-size: 25px"></i></button>
                                </form>
                                <button type="" name="print-students" onclick="printJS('studData', 'html')" class=refresh id="print-students" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Print"><i class='bx bxs-printer' style="font-size: 25px"></i></button>
                                <button class=refresh id="refresh"><i class='bx bx-refresh' style="font-size: 30px" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"></i></button>
                                <select class="form-select sort" id="sortoverview" class="sort">
                                    <option value="" disabled selected>Sort By</option>
                                    <option class="others" value="student_id">Newly Registered</option>
                                    <option class="others" value="application_no">Application Number</option>
                                    <option class="others" value="first_name">Name</option>
                                    <option class="others" value="contactno">Contact No</option>
                                    <option class="others" value="stud_email">Email</option>
                                    <option class="others" value="pre_house">Address</option>
                                </select>
                                <input class="search-inputhome form-control" id=search_reg name="query" type="search" placeholder="Search student details..">
                                <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body2" id="refreshData">
                        <?php if($count==0) {?>
                            <div class="pendingnores text-center">
                                <h4>No data found.</h4>
                            </div>
                        <?php } else {?>
                        <table style="border-collapse: collapse" class="mb-0 table table-responsive table-bordered table-hover text-center" id="studData">
                            <thead class="table-ccc ">
                                <tr>
                                    <th style='border: 1px solid gray' width=10%>Application #</th>
                                    <th style='border: 1px solid gray' width=5%>Photo</th>
                                    <th style='border: 1px solid gray' width=10%>Name</th>
                                    <th style='border: 1px solid gray' width=10%>Contact No.</th>
                                    <th style='border: 1px solid gray' width=15%>Email</th>
                                    <th style='border: 1px solid gray' width=20%>Address</th>
                                    <th style='border: 1px solid gray' width=10%>Admit Type</th>
                                    <th style='border: 1px solid gray' width=10%>Status</th>
                                    <th style='border: 1px solid gray' width=10%>Action</th>
                                </tr>
                            </thead>
                            <tbody id=dataa>
                            </tbody>
                        </table>
                        <?php }?>
                    </div>
                </div>

                <div class='addStud' id='addStud' style='display:none; '>

                    <div class='parent' style='display: flex'>
                        <div class="btn-back">
                            <button class='back' id="goback" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go back"><i class='bx bx-arrow-back' style="font-size: 25px;"></i></button>
                        </div>
                        <div class='formTitle mt-1' style='flex: 1;'>
                            <h5 class="appform mb-4">Student Application Form</h5>
                        </div>
                    </div>
                    <form method="POST" id="addStudentForm" class="form control " enctype="multipart/form-data">
                        <h4 class='mb-3'>Personal Information</h4>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group img-profile text-center col-12" style="position: relative;">
                                <span class="img-div">
                                    <div class="text-center img-placeholder" onClick="triggerClick()">
                                        <h4>Click to upload your photo</h4>
                                    </div>
                                    <img src="../assets/imgs/attach.png" width="2in" alt="" onClick="triggerClick()" id="profileDisplay">
                                </span>
                                    <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" accept="image/*">
                                    <small>(Photo in White Background)</small>
                                </div> <br><br>
                                <div class="row mb-3">
                                    <div class="col-md-3 col-sm-6">
                                        <label for="fname" class="required">First Name:<i class="req">*</i></label>
                                        <input type="text" name="fname" id=fname placeholder="Given name" class="form-control" required>
                                        <div class="text-danger" id="feedbackName">
                           
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label for="mname">Middle Name:<i class="req">*</i></label>
                                        <input type="text" name="mname" id=mname placeholder="Middle name" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label for="lname">Last Name:<i class="req">*</i></label>
                                        <input type="text" name="lname" id=lname placeholder="Surname" class="form-control" required>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <label for="suffixx">Suffix:</label>
                                        <select class="form-select" name="suffixx" id="suffixx">
                                            <option value="">(e.g. Jr.)</option>
                                            <option value="Sr." class="others">Sr.</option>
                                            <option value="Jr." class="others">Jr.</option>
                                            <option value="I" class="others">I</option>
                                            <option value="II" class="others">II</option>
                                            <option value="III" class="others">III</option>
                                            <option value="IV" class="others">IV</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-3">
                                        <label for="age">Age:<i class="req">*</i></label>
                                        <select class="form-select" name="age" id="age"  required>
                                            <option value="" class=plchold>16</option>
                                            <option value="16" class="others">16</option>
                                            <option value="17" class="others">17</option>
                                            <option value="18" class="others">18</option>
                                            <option value="19" class="others">19</option>
                                            <option value="20" class="others">20</option>
                                            <option value="21" class="others">21</option>
                                            <option value="22" class="others">22</option>
                                            <option value="23" class="others">23</option>
                                            <option value="24" class="others">24</option>
                                            <option value="25" class="others">25</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 col-sm-6">
                                        <label for="birthplace">Place of Birth:<i class="req">*</i></label>
                                        <input type="text" name="birthplace" id=birthplace placeholder="Birthplace" class="form-control" required>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label for="bday">Date of Birth:<i class="req">*</i></label>
                                        <input type="date" name="bday" id=bday class="form-control"  required>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label for="religion">Religion:<i class="req">*</i></label>
                                        <input type="text" name="religion" id=religion placeholder="Religion" class="form-control" required>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <label for="gender">Gender:<i class="req">*</i></label>
                                        <select class="form-select" name="gender" id="gender"  required>
                                            <option value="" disabled selected>Gender</option>
                                            <option value="Male" class="others">Male</option>
                                            <option value="Female" class="others">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <label for="status">Status:<i class="req">*</i></label>
                                        <select class="form-select" name="status" id="status"   required>
                                            <option value="" disabled selected>Civil Status</option>
                                            <option value="Single" class="others">Single</option>
                                            <option value="Married" class="others">Married</option>
                                            <option value="Widowed" class="others">Widowed</option>
                                            <option value="Seperated" class="others">Seperated</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label for="admit">Classification:<i class="req">*</i></label>
                                        <select class="form-select" name="admit" id="admit" onchange="classify();"  required >
                                            <option value="" disabled selected>Admit Type</option>
                                            <option value="Freshman" class="others">New Student</option>
                                            <option value="Transferee" class="others">Transferee</option>
                                        </select>  
                                    </div>
                                </div>
                                <div id=married style="display: none">
                                    <div class="row mb-3">
                                        <div class="col-md-3 col-sm-6">
                                            <label for="spouse">Spouse:<i class="req">*</i></label>
                                            <input type="text" name="spouse_name" id=spouse_name placeholder="Full Name" class="form-control">
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <label for="spouse">Address:<i class="req">*</i></label>
                                            <input type="text" name="spouse_add" id=spouse_add placeholder="Address" class="form-control">
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="spouse">Contact No:<i class="req">*</i></label>
                                            <input type="tel" name="spouse_contact" id="spouse_phone" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="spouse">Occupation:<i class="req">*</i></label>
                                            <input type="text" name="spouse_work" id=spouse_work placeholder="Occupation" class="form-control">
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="spouse">Employer's Name:<i class="req">*</i></label>
                                            <input type="text" name="spouse_emp" id=spouse_emp placeholder="Employer" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 col-sm-6">
                                        <label for="email">Email Address:<i class="req">*</i></label>
                                        <input type="email" name="email" id=email placeholder="example@domain.com" class="form-control" required>
                                        <div class="text-danger" id="feedbackEmail">
                           
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label for="stud_phone">Mobile No:<i class="req">*</i></label>
                                        <input type="tel" name="phone" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id="stud_phone" placeholder="09XXxxxxxxx" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label for="1stprio">1st Priority Course:<i class="req">*</i></label>
                                        <select class="form-select" name="1stprio" id="1stprio"  required>
                                            <option value="" disabled selected>(e.g. BSIT)</option>
                                            <option value="BSCS" class="others">Bachelor of Science in Computer Science</option>
                                            <option value="BSIT" class="others">Bachelor of Science in Information Technology</option>
                                            <option value="BSA" class="others">Bachelor of Science in Accountancy</option>
                                            <option value="BSAIS" class="others">Bachelor of Science in Accounting Information System</option>
                                            <option value="BEED" class="others">Bachelor of Elementary Education</option>
                                            <option value="BSEE" class="others">Bachelor of Secondary Education Major in English Language Education</option>
                                            <option value="BSEM" class="others">Bachelor of Secondary Education Major in Mathematics Education</option>
                                            <option value="BSES" class="others">Bachelor of Secondary Education Major in Science Education</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label for="2ndprio">2nd Priority Course:<i class="req">*</i></label> <br>
                                        <select class="form-select" name="2ndprio" id="2ndprio"  required>
                                            <option value="" disabled selected>(e.g. BSIT)</option>
                                            <option value="BSCS" class="others">Bachelor of Science in Computer Science</option>
                                            <option value="BSIT" class="others">Bachelor of Science in Information Technology</option>
                                            <option value="BSA" class="others">Bachelor of Science in Accountancy</option>
                                            <option value="BSAIS" class="others">Bachelor of Science in Accounting Information System</option>
                                            <option value="BEED" class="others">Bachelor of Elementary Education</option>
                                            <option value="BSEE" class="others">Bachelor of Secondary Education Major in English Language Education</option>
                                            <option value="BSEM" class="others">Bachelor of Secondary Education Major in Mathematics Education</option>
                                            <option value="BSES" class="others">Bachelor of Secondary Education Major in Science Education</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 col-sm-6">
                                        <label>Calamba Resident:<i class="req">*</i></label><br>
                                        <select class="form-select" name="calambares" id="calambares" required onchange="yesnoCheck();">
                                            <option value="" disabled selected>Resident of Calamba?</option>
                                            <option value="Yes" class="others">Yes</option>
                                            <option value="No" class="others">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-6">
                                        <label for="yrs_calamba" id="yrs_calamba1">Years:</label>
                                        <input type="hidden" name="yrs_calamba" value="0">
                                        <input type="number" name="yrs_calamba" min=0 max=40 value="1" class="form-control yrs_calamba" value="" placeholder="Years" id="yrs_calamba" disabled>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label for="pre_houseno">Present Address:<i class="req">*</i></label>
                                        <input type="text" name="pre_houseno" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village" id="pre_houseno" required>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label for="pre_brgy">Barangay:<i class="req">*</i></label>
                                        <input type="text" name="pre_brgy" style="display:block" class="form-control" placeholder="Barangay" id="pre_brgy" required>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label for="pre_city">City:<i class="req">*</i></label>
                                        <input type="text" name="pre_city" class="form-control" placeholder="City" id="pre_city" required>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label for="pre_zip">Zip Code:<i class="req">*</i></label>
                                        <input type="text" name="pre_zip" onpaste="return false;" onkeypress="return onlyNumberKey(event)" pattern="\d*" maxlength="4" minlength="4" class="form-control" placeholder="Postal Code" id="pre_zip" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="filladdress">Permanent Address:<i class="req">*</i></label>&nbsp;
                                        <input type="checkbox" class="form-check-input" onclick="javascript:Fill()" name="filladdress" value="Yes" id="filladdress">&nbsp;<small><em>Check if same as current address</em></small></input>
                                        <input type="text" name="per_houseno" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village" id="per_houseno" required>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <label>Barangay:<i class="req">*</i></label>
                                        <input type="text" name="per_brgy" class="form-control" placeholder="Barangay" id="per_brgy" required>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <label>City:<i class="req">*</i></label>
                                        <input type="text" name="per_city" class="form-control" placeholder="City" id="per_city" required>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <label>Zip Code:<i class="req">*</i></label>
                                        <input type="text" name="per_zip" onpaste="return false;" onkeypress="return onlyNumberKey(event)" pattern="\d*" maxlength="4" minlength="4" class="form-control" placeholder="Postal Code" id="per_zip" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                        <label for="">Please select the group you belong to:</label><br><br>
                                        <div class="col-md-6">
                                            <input type="hidden" name="group" value="N/A">
                                            <input type="checkbox" class="non form-check-input" name="group[]" value="N/A" id="none" onclick="wala()" checked>
                                            <small>None</small><br>
                                            <input type="checkbox" class="form-check-input" name="group[]" value="Recipient of Student Financial Assistance" onclick="uncheck()" id="stuFap">
                                            <small>Recipient of Student Financial Assistance</small><br>
                                            <input type="checkbox" class="form-check-input" name="group[]" value="Person from Disadvantaged Group" onclick="uncheck()" id="disadvantagedGroup">
                                            <small>Person from Disadvantaged Group</small><br>
                                            <input type="checkbox" class="form-check-input" name="group[]" value="Person from Depressed or Conflicted-Areas" onclick="uncheck()" id="depressed">
                                            <small>Person from Depressed or Conflicted Areas</small><br>
                                            </div>
                                            <div class="col-md-6">
                                            <input type="checkbox" class="form-check-input" name="group[]" value="Member of Indigenous People" onclick="uncheck()" id="indigenous">
                                            <small>Member of Indigenous People</small><br>
                                            <input type="checkbox" class="form-check-input" name="group[]" value="Person with Disability" onclick="uncheck()" id="pwd">
                                            <small>Person with Disability (PWD)</small><br>
                                            <input type="checkbox" class="form-check-input" name="group[]" value="Recipient of 4Ps" onclick="uncheck()" id="4ps">
                                            <small>Recipient of 4Ps</small><br>
                                            <input type="checkbox" class="form-check-input" name="group[]" value="Working Student" onclick="uncheck()" id="workingstud">
                                            <small>Working Student</small><br> 
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 p-3">
                                    <p style="text-indent: 50px">Student have a stable internet connection and the resources to attend online classes (in case of blended learning) for 1st Semester of F.Y. 2021-2022:</p>
                                        <input type="hidden" name="stablenet" value="N/A">
                                        <select class="form-select" name="stablenet" id="stablenet" req>
                                            <option value="" selected>Do you have stable Internet?</option>
                                            <option value="Yes" class="others">Yes</option>
                                            <option value="No" class="others">No</option>
                                        </select>
                                </div>
                            </div>
                        </div><hr>
                          <h4 class='mt-3 mb-3'>Educational Background</h4>
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-12">
                                    <label for="elem_name"><b>Elementary School:<i class="req">*</i></b></label>
                                    <input type="text" name="elem_name" id=elem_name placeholder="School Name" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="elem_address">Address:<i class="req">*</i></label>
                                    <input type="text" name="elem_address" id=elem_address placeholder="School Address" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="dgrad">Date Graduated:<i class="req">*</i></label>
                                    <input type="date" name="dgrad_elem" id=dgrad_elem class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="elem_honor">Honors/Awards:</label>
                                    <input type="text" name="elem_honors" id=elem_honor placeholder="Honors/Awards" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-12">
                                    <label for="jhs_name"><b>Junior High School:<i class="req">*</i></b></label>
                                    <input type="text" name="jhs_name" id=jhs_name placeholder="School Name" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="jhs_address">Address:<i class="req">*</i></label>
                                    <input type="text" name="jhs_address" id=jhs_address placeholder="School Address" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label>Date of Completion:<i class="req">*</i></label>
                                    <input type="date" name="jhs_dgrad" id=jhs_dgrad class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="jhs_honors">Honors/Awards:</label>
                                    <input type="text" name="jhs_honors" id=jhs_honors placeholder="Honors/Awards" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div id="shs">
                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-12">
                                    <label for="shs_name"><b>Senior High School:<i class="req">*</i></b></label>
                                    <input type="text" name="shs_name" id=shs_name placeholder="School Name" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="shs_address">Address:<i class="req">*</i></label>
                                    <input type="text" name="shs_address" id=shs_address placeholder="Address" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label>SHS Tracks:<i class="req">*</i></label>
                                    <select class="form-select" name="shs_tracks" id="shs_tracks" onchange="strand()">
                                        <option value="">Tracks</option>
                                        <option value="Academics" class="others" id="acad">Academics</option>
                                        <option value="Technical-Vocational-Livelihood" id="tvl" class="others" >Technical-Vocational-Livelihood</option>
                                        <option value="Sports" class="others" id=sports>Sports</option>
                                        <option value="Arts and Design" class="others" id=arts>Arts and Design</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="shs_strands">Strands:</label>
                                    <input type="hidden" name="shs_strands" value="N/A">
                                    <select class="form-select" name="shs_strands" id="shs_strands" disabled>
                                        <option value="" disabled selected>Strands</option>
                                        <optgroup id=acads label="Academics Strands:">
                                            <option value="HUMMS" class="others">HUMMS</option>
                                            <option value="GAS" class="others">GAS</option>
                                            <option value="STEM" class="others">STEM</option>
                                            <option value="ABM" class="others">ABM</option>
                                        </optgroup>
                                        <optgroup id=techvoc label="TVL Strands:">
                                            <option value="Agri-Fishery Arts" class="others">Agri-Fishery Arts</option>
                                            <option value="Home Economics" class="others">Home Economics</option>
                                            <option value="Industrial Arts" class="others">Industrial Arts</option>
                                            <option value="ICT" class="others">ICT</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label>Date Graduated:<i class="req">*</i></label>
                                    <input type="date" name="shs_dgrad" id=shs_dgrad class="form-control" req>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="shs_honors">Honors/Awards:</label>
                                    <input type="text" name="shs_honors" id=shs_honors placeholder="Honors/Awards" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="g11_gwa">Grade 11 GWA:<i class="req">*</i></label>
                                    <input type="number" name="g11_gwa" id=g11_gwa max="100" min="80" maxlength="5" step=".01" placeholder="Grade 11 GWA" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="g12_gwa">Grade 12 GWA:<i class="req">*</i></label>
                                    <input type="number" name="g12_gwa" id=g12_gwa max="100" min="80" step=".01" placeholder="Grade 12 GWA" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div id="college">
                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-12">
                                    <label for="college_name"><b>College/University:<i class="req">*</i></b></label>
                                    <input type="text" name="college_name" id=college_name placeholder="School Name" class="form-control" >
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="college_address">Address:<i class="req">*</i></label>
                                    <input type="text" name="college_address" id=college_address placeholder="School Address" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="college_course">Course:<i class="req">*</i></label>
                                    <input type="text" name="college_course" id=college_course placeholder="Course Taken" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <label for="college_gwa">Average:<i class="req">*</i></label>
                                    <input type="number" name="college_gwa" max="100" min="80" step=".01" id=college_gwa placeholder="GWA" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-12">
                                <label for="tvc_name"><b>Technical/Vocational Course:</b></label>
                                <input type="text" name="tvc_name" id=tvc_name placeholder="School Name" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="tvc_address">Address</label>
                                <input type="text" name="tvc_address" id=tvc_address placeholder="Address" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label>Date of Completion:</label>
                                <input type="date" name="tvc_dgrad" id=tvc_dgrad class="form-control" req>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="tvc_course">Course:</label>
                                <input type="text" name="tvc_course" id=tvc_course placeholder="Course Taken" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12">
                                <label for="als_name"><b>Alternative Learning System (ALS):</b></label>
                                <input type="text" name="als_name" id=als_name placeholder="School Name" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="als_address">Address</label>
                                <input type="text" name="als_address" id=als_address placeholder="Address" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="als_cert">ALS Certification:</label>
                                <input type="file" name="als_cert" id=als_cert placeholder="" class="form-control">
                                <small class="text-danger" id="alscerterror"></small>
                            </div>
                        </div>
                        <hr>
                    
                        <h4 class='mt-3 mb-3'>Family Background</h4>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-8">
                                    <label for="father_name"><b>Father:<i class="req">*</i></b></label>
                                    <input type="text" name="father_name" id=father_name placeholder="Full name" class="form-control" required>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <label for="father_citizen">Citizenship:<i class="req">*</i></label>
                                    <input type="text" name="father_citizen" id=father_citizen placeholder="Citizenship" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="father_add">Present Address:<i class="req">*</i></label>
                                    <input type="text" name="father_add" id=father_add placeholder="Present Address" class="form-control" required>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <label for="father_contact">Contact No:<i class="req">*</i></label>
                                    <input type="tel" name="father_contact" id=father_contact pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11"  placeholder="09XXxxxxxxx" class="form-control" required>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <label for="father_email">Email:<i class="req">*</i></label>
                                    <input type="email" name="father_email" min=0 id=father_email placeholder="Email" class="form-control"required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6">
                            <label for="father_work">Occupation:<i class="req">*</i></label>
                                <select class="form-select" name="father_work" id="father_work" required>
                                    <option value="">Occupation</option>
                                    <option value="Government Employee" class="others">Government Employee</option>
                                    <option value="Private Employee" class="others">Private Employee</option>
                                    <option value="Self-Employed" class="others">Self-Employed</option>
                                    <option value="Unemployed" class="others">Unemployed</option>
                                    <option value="Deceased" class="others">Deceased</option>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <label for="father_emp">Employer's Name:</label>
                                <input type="text" name="father_emp" id=father_emp placeholder="Name of Employer" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="father_emp_add">Employer's Address:</label>
                                <input type="text" name="father_emp_add"  id=father_emp_add placeholder="Employer's Address" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <label for="father_emp_no">Employer's Phone:</label>
                                <input type="tel" name="father_emp_no" id=father_emp_no pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" placeholder="09XXxxxxxxx" maxlength="11" minlength="11" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6">
                            <label for="father_educ">Education:<i class="req">*</i></label>
                                <select class="form-select" name="father_educ" id="father_educ" required>
                                    <option value="">Highest Educational Attainment</option>
                                    <option value="Elementary Undergraduate" class="others">Elementary Undergraduate</option>
                                    <option value="Elementary Graduate" class="others">Elementary Graduate</option>
                                    <option value="High School Undergraduate" class="others">High School Undergraduate</option>
                                    <option value="High School Graduate" class="others">High School Graduate</option>
                                    <option value="College Undergraduate" class="others">College Undergraduate</option>
                                    <option value="College Graduate" class="others">College Graduate</option>
                                    <option value="Masteral" class="others">Masteral</option>
                                    <option value="Post Graduate Studies" class="others">Post Graduate Studies</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-3 col-sm-8">
                                    <label for="mother_name"><b>Mother:<i class="req">*</i></b></label>
                                    <input type="text" name="mother_name" id=mother_name placeholder="Full name" class="form-control" required>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <label for="mother_citizen">Citizenship:<i class="req">*</i></label>
                                    <input type="text" name="mother_citizen" id=mother_citizen placeholder="Citizenship" class="form-control" required>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <label for="mother_add">Present Address:<i class="req">*</i></label>
                                    <input type="text" name="mother_add" id=mother_add placeholder="Present Address" class="form-control" required>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <label for="mother_contact">Contact No:<i class="req">*</i></label>
                                    <input type="tel" name="mother_contact" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=mother_contact placeholder="09XXxxxxxxx" class="form-control" required>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <label for="mother_email">Email:<i class="req">*</i></label>
                                    <input type="email" name="mother_email" min=0 id=mother_email placeholder="Email" class="form-control" required>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6">
                                <label for="mother_work">Occupation:<i class="req">*</i></label>
                                <select class="form-select" name="mother_work" id="mother_work" required>
                                    <option value="">Occupation</option>
                                    <option value="Government Employee" class="others">Government Employee</option>
                                    <option value="Private Employee" class="others">Private Employee</option>
                                    <option value="Self-Employed" class="others">Self-Employed</option>
                                    <option value="Unemployed" class="others">Unemployed</option>
                                    <option value="Deceased" class="others">Deceased</option>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <label for="mother_emp">Employer's Name:</label>
                                <input type="text" name="mother_emp" id=mother_emp placeholder="Name of Employer" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="mother_emp_add">Employer's Address:</label>
                                <input type="text" name="mother_emp_add" id=mother_emp_add placeholder="Employer's Address" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <label for="mother_emp_no">Employer's Phone:</label>
                                <input type="tel" name="mother_emp_no" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" id=mother_emp_no maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <label for="mother_educ">Education:<i class="req">*</i></label>
                                <select class="form-select" name="mother_educ" id="mother_educ" required>
                                    <option value="">Highest Educational Attainment</option>
                                    <option value="Elementary Undergraduate" class="others">Elementary Undergraduate</option>
                                    <option value="Elementary Graduate" class="others">Elementary Graduate</option>
                                    <option value="High School Undergraduate" class="others">High School Undergraduate</option>
                                    <option value="High School Graduate" class="others">High School Graduate</option>
                                    <option value="College Undergraduate" class="others">College Undergraduate</option>
                                    <option value="College Graduate" class="others">College Graduate</option>
                                    <option value="Masteral" class="others">Masteral</option>
                                    <option value="Post Graduate Studies" class="others">Post Graduate Studies</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6">
                                <label for="guardian_name"><b>Guardian:</b></label>
                                <input type="text" name="guardian_name" id=guardian_name placeholder="Full name" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <label for="guardian_relation">Relationship:</label>
                                <input type="text" name="guardian_relation" id=guardian_relation placeholder="Relationship" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-8">
                                <label for="guardian_add">Address:</label>
                                <input type="text" name="guardian_add" id=guardian_add placeholder="Present Address" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <label for="guardian_contact">Contact No:</label>
                                <input type="tel" name="guardian_contact" id=guardian_contact pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <label for="guardian_email">Email:</label>
                                <input type="email" name="guardian_email" min=0 id=guardian_email placeholder="Email" class="form-control">
                            </div>
                    
                            <div class="col-md-2 col-sm-6">
                                <label>Date of Birth</label>
                                <input type="hidden" name="guardian_bday" value="">
                                <input type="date" name="guardian_bday" id="guardian_bday" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <label for="guardian_work">Occupation:</label>
                                <select class="form-select" name="guardian_work" id="guardian_work" req>
                                    <option value="">Occupation</option>
                                    <option value="Government Employee" class="others">Government Employee</option>
                                    <option value="Private Employee" class="others">Private Employee</option>
                                    <option value="Self-Employed" class="others">Self-Employed</option>
                                    <option value="Unemployed" class="others">Unemployed</option>
                                    <option value="Deceased" class="others">Deceased</option>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <label for="guardian_emp">Employer's Name:</label>
                                <input type="text" name="guardian_emp" id=guardian_emp placeholder="Name of Employer" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-8">
                                <label for="guardian_emp_add">Employer's Address:</label>
                                <input type="text" name="guardian_emp_add" id=guardian_emp_add placeholder="Employer's Address" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <label for="guardian_emp_no">Employer's No:</label>
                                <input type="tel" name="guardian_emp_no" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onkeypress="return onlyNumberKey(event)" id=guardian_emp_no placeholder="09XXxxxxxxx"  maxlength="11" minlength="11" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6">
                                <label for="sibling1">Siblings:</label>
                                <input type="text" name="sibling1" id=sibling1 placeholder="Full name" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="sibling_age1">Age:</label>
                                <input type="number" name="sibling_age1" max=40 min="0" id=sibling_age1 placeholder="Age" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling_status1">Status:</label>
                                <select class="form-select" name="sibling_status1" id="sibling_status1" req>
                                <option value="" >Civil Status</option>
                                <option value="Single" class="others">Single</option>
                                <option value="Married" class="others">Married</option>
                                <option value="Widowed" class="others">Widowed</option>
                                <option value="Seperated" class="others">Seperated</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="sibling_contact1">Contact No:</label>
                                <input type="tel" name="sibling_contact1" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact1 placeholder="09XXxxxxxxx" class="form-control">
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling2">Siblings:</label>
                                <input type="text" name="sibling2" id=sibling2 placeholder="Full name" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling_age2">Age:</label>
                                <input type="number" name="sibling_age2" max=40 min="0" id=sibling_age2 placeholder="Age" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling_status2">Status:</label>
                                <select class="form-select" name="sibling_status2" id="sibling_status2" req>
                                    <option value="">Civil Status</option>
                                    <option value="Single" class="others">Single</option>
                                    <option value="Married" class="others">Married</option>
                                    <option value="Widowed" class="others">Widowed</option>
                                    <option value="Seperated" class="others">Seperated</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling_contact2">Contact No:</label>
                                <input type="tel" name="sibling_contact2" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact2 placeholder="09XXxxxxxxx" class="form-control">
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling3">Siblings:</label>
                                <input type="text" name="sibling3" id=sibling3 placeholder="Full name" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling_age3">Age:</label>
                                <input type="number" name="sibling_age3" max=40 min="0" id=sibling_age3 placeholder="Age" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling_status3">Status:</label>
                                <select class="form-select" name="sibling_status3" id="sibling_status3" req>
                                    <option value="">Civil Status</option>
                                    <option value="Single" class="others">Single</option>
                                    <option value="Married" class="others">Married</option>
                                    <option value="Widowed" class="others">Widowed</option>
                                    <option value="Seperated" class="others">Seperated</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6">
                            <label for="sibling_contact3">Contact No:</label>
                                <input type="tel" name="sibling_contact3" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact3  placeholder="09XXxxxxxxx" class="form-control">
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <center>
                            <label for="income">Socio Economic Status of Family:<i class="req">*</i></label>
                                <select class="form-select" name="income" id="income" style="max-width: 50%;" required>
                                    <option value="">Monthly Income of Family</option>
                                    <option value="Below P10, 481" class="others">Below P10, 481</option>
                                    <option value="P10, 481.00-P20, 962.00" class="others">P10, 481.00-P20, 962.00</option>
                                    <option value="P41, 924.00-P73, 367.00" class="others">P41, 924.00-P73, 367.00</option>
                                    <option value="P73, 367.00-P125, 772.00" class="others">P73, 367.00-P125, 772.00</option>
                                    <option value="P125,772.00-P209,620.00" class="others">P125, 772.00-P209, 620.00</option>
                                    <option value="P209, 620.00 and above" class="others">P209, 620.00 and above</option>
                                </select>
                            </center>
                        </div>
                        <hr>
                          
                        <h4 class='mt-3 mb-3'>Organizational Involvement</h4>
                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6">
                                <label for="org_name1"><b>Organization 1:</b></label>
                                <input type="text" name="org_name1" id=org_name1 placeholder="Name of Organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="position1">Position:</label>
                                <input type="text" name="position1" id=position1 placeholder="Position in organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="nature1">Nature:</label>
                                <input type="text" name="nature1" id=nature1 placeholder="Nature of organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="yrs_org1">Years:</label>
                                <input type="number" name="yrs_org1" max=20 min=0 id=yrs_org1 placeholder="Years in joining the organization" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6">
                                <label for="org_name2"><b>Organization 2:</b></label>
                                <input type="text" name="org_name2" id=org_name2 placeholder="Name of Organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="position2">Position:</label>
                                <input type="text" name="position2" id=position2 placeholder="Position in organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="nature2">Nature:</label>
                                <input type="text" name="nature2" id=nature2 placeholder="Nature of organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="yrs_org2">Years:</label>
                                <input type="number" name="yrs_org2" max=20 min=0 id=yrs_org2 placeholder="Years in joining the organization" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6">
                                <label for="org_name3"><b>Organization 3:</b></label>
                                <input type="text" name="org_name3" id=org_name3 placeholder="Name of Organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="position3">Position:</label>
                                <input type="text" name="position3" id=position3 placeholder="Position in organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="nature3">Nature:</label>
                                <input type="text" name="nature3" id=nature3 placeholder="Nature of organization" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label for="yrs_org3">Years:</label>
                                <input type="number" name="yrs_org3" max=20 min=0 id=yrs_org3 placeholder="Years in joining the organization" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <h4 class='mt-3 mb-3'>Personal Admiration</h4>
                        <div class="row mb-3">
                            <div class="col-md-12 col-sm-12">
                                <label for="hobbies"><b>Hobbies and Interests:<i class="req">*</i></b></label> <br>
                                <textarea name="hobbies" id="hobbies" placeholder="List down your hobbies & interests?" class="form-control forms" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <hr>
                            <div class="col-md-12 col-sm-12">
                                <label for="reason4enroll"><b>Reasons for enrolling:<i class="req">*</i></b></label> <br>
                                <textarea name="reason4enroll" id="reason4enroll" placeholder="What are your reasons for enrolling City College of Calamba?" class="form-control forms" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <hr>
                            <div class="col-md-12 col-sm-12">
                                <label for="characteristics"><b>Describe yourself:<i class="req">*</i></b></label> <br>
                                <textarea name="characteristics" id="characteristics" placeholder="Physical & Inner Characteristics" class="form-control forms" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <hr>
                            <div class="col-md-12 col-sm-12">
                                <label for="dream"><b>Envision yourself 10 years from now:<i class="req">*</i></b></label> <br>
                                <textarea name="dream" id="dream" placeholder="What are your dreams and goals" class="form-control forms" required></textarea>
                            </div>
                        </div> 
                        <hr>
                        <h4 class='mt-3 mb-3'>Requirements</h4>
                        <div id="reportcard">
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="g11cardfile"><b>Grade 11 Report Card:</b><i class="req">*</i></label>
                                    <input type="file" name="g11card" id="g11cardfile" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                    <small class="text-danger" id="g11error"></small>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="g12cardfile"><b>Grade 12 Report Card:</b><i class="req">*</i></label>
                                    <input type="file" name="g12card" id="g12cardfile" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                    <small class="text-danger" id="g12error"></small>
                                </div>   
                            </div> 
                        </div> 
                        <div id="tor">
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="torpg1"><b>Transcript of Records (Page 1):</b><i class="req">*</i></label>
                                    <input type="file" name="torpg1" id="torpg1" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                    <small class="text-danger" id="torpg1error"></small>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="torpg2"><b>Transcript of Records (Page 2):</b><i class="req">*</i></label>
                                    <input type="file" name="torpg2" id="torpg2" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                    <small class="text-danger" id="torpg2error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12 mb-3">
                                <label for="goodmoral"><b>Good Moral Certification:</b><i class="req">*</i></label><br>
                                <input type="file" name="goodmoral" id="goodmoral" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                <small class="text-danger" id="goodmoralerror"></small>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="birthcert"><b>Birth Certificate:</b><i class="req">*</i></label><br>
                                <input type="file" name="birthcert" id="birthcert" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                <small class="text-danger" id="birthcerterror"></small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12 mb-3">
                                <label for="indigency"><b>Certificate of Residency:</b><i class="req">*</i></label><br>
                                <input type="file" name="indigency" id="indigency" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                <small class="text-danger" id="indigencyerror"></small>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-3">
                                <label for="votecert"><b>Voter's Certification of Parent/Guardian:</b><i class="req">*</i></label><br>
                                <input type="file" name="votercert" id="votecert" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                                <small class="text-danger" id="votecerterror"></small>
                            </div>
                        </div>
                        <div class="text-center row mb-3">
                            <div class=" col-md-12 col-sm-12 mb-3">
                                <label for="vaxcard"><b>Copy of Vaccination Card:</b></label><br>
                                <input type="file" name="vaxcard" id="vaxcard" class="inputfile form-control" accept=".pdf, .png, .jpg">
                                <small class="text-danger" id="vaxcarderror"></small>
                            </div>
                        </div>
                        <center>
                            <button type='button' id="btn-addStud" name="btn-addStud" class='btn btn-primary mt-5'>Add Student</button>
                        </center>
                    </form>
                </div>
                <div id="editStud" style="display: none">
                    <div class="row mb-5">
                        <section class="verification">
                            <div class="col-lg-12 col-md-12">
                                <div class="main-card mb-3 card" >
                                    <div class='parent' style='display: flex'>
                                        <div class="btn-back">
                                            <button class='back' id="goback2"><i class='bx bx-arrow-back' style="font-size: 25px;"></i></button>
                                        </div>
                                        <div class='formTitle mt-1' style='flex: 1;'>
                                            <h5 class="appform mb-4">Edit Student Details</h5>
                                        </div>
                                    </div>
                                    <div class="mb-5" id="displayEditForm">
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</body>
<script src="assets/js/addStudent.js"></script>
</html>