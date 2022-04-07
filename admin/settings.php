<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../connect.php");
$con=connect();
if(isset($_SESSION['ID'])&&($_SESSION['email'])){
    include_once("queries/addAdmin.php");
    // $str="admin123";
	// $hash = password_hash('$str', PASSWORD_DEFAULT);
	
	// $_SESSION['message'] = "<script>
    // Swal.fire({
    //     title: '$hash'
    // })</script>";

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
    <title>Settings | City College of Calamba</title>
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
<body id="setbody">

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
                <a href="archives.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Archives'>
                    <i class='bx bx-archive'></i>
                    <span class="link-name">Archives</span>
                </a>
            </li>
            <li>
                <a href="programs.php" id="" class="sidelinks" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Manage Courses'>
                    <i class='bx bxs-graduation'></i>
                    <span class="link-name">Manage Courses</span>
                </a>
            </li>
            <li>
                <a href="settings.php" id="" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Admin Settings'>
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
        <h1 class="pagetitle">Admin Settings</h1>
        <p>Admission Management System | City College of Calamba</p>
    </div>
    <div class="row mt-5 mb-5">
        <section class="administrator">
            <div class="col-lg-12 col-md-12">
                <div class="main-card mb-3 card admincard" >
                    <div class="head" id="add-admin">
                        <div class="dropdown mb-3" style="display: flex; flex: 1">
                            <i class='bx bx-dots-vertical-rounded' id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> 
                            <h5 class="card-title">Administrators</h5>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item btn-add-admin"><i class='bx bx-plus' style="font-size: 15px"></i> New Admin
                                    </a>
                                </li>
                                <li>
                                    <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                        <button class="dropdown-item" name="export-admin" type="submit">
                                            <i class='bx bxs-download' style="font-size: 15px"></i> Export
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="" name="print-admin" onclick="printJS('tblAdmin', 'html')" id="print-admin">
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
                                    <button class="add btn-add-admin" id="btn-add-admin" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="New admin"><i class='bx bx-plus' style="font-size: 30px"></i></button>
                                    <form action="queries/export-tables.php" method="post" style="display: flex; margin: 0">
                                    <button type="submit" name="export-admin" class=export id="export" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export"><i class='bx bxs-download' style="font-size: 25px"></i></button>
                                    </form>
                                    <!-- <form action="queries/print-tables.php" method="post" style="display: flex; margin: 0"> -->
                                    <button type="" name="print-admin" onclick="printJS('tblAdmin', 'html')" class=refresh id="print-admin" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Print"><i class='bx bxs-printer' style="font-size: 25px"></i></button>
                                    <!-- </form> -->
                                    <button class=refresh id="refresh" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"><i class='bx bx-refresh' style="font-size: 30px"></i></button>
                                    <select class="form-select sort" id="sortAdmin" class="sort">
                                        <option value="" disabled selected>Sort By</option>
                                        <option class="others" value="admin_firstname">Name</option>
                                        <option class="others" value="admin_email">Email</option>
                                        <option class="others" value="admin_contactno">Contact No</option>
                                        <option class="others" value="admin_address">Address</option>
                                    </select>
                                    <input class="search-inputhome form-control" id=search_admin name="search-admin" type="search" placeholder="Search admin details..">
                                    <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button> 
                                </div>
                            </div>
                    </div>
                    <div class="container-fluid">
                         <div class="row mb-3" id="admin-table">
                             <table style="border-collapse: collapse" class="mb-0 table table-responsive table-bordered table-hover text-center" id="tblAdmin">
                                 <thead class='table-ccc'>
                                     <th style="border: 1px solid gray" width="10%">Photo</th>
                                     <th style="border: 1px solid gray" width="20%">Name</th>
                                     <th style="border: 1px solid gray" width="20%">Email</th>
                                     <th style="border: 1px solid gray" width="20%">Contact No</th>
                                     <th style="border: 1px solid gray" width="20%">Address</th>
                                 </thead>
                                 <tbody id="tbladmin-body">
                                    
                                 </tbody>
                             </table>
                         </div>
                    </div>
                </div>
                <div class="main-card mb-3 card add-admincard" style="display: none">
                    <div class='parent' style='display: flex'>
                        <div class="btn-back">
                            <button class='back' id="goback-admin" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go back"><i class='bx bx-arrow-back' style="font-size: 25px;"></i></button>
                        </div>
                        <div class='formTitle mt-1' style='flex: 1;'>
                            <h5 class="appform mb-4">Add an Administrator</h5>
                        </div>
                    </div>
                    <div class="container" id="container-admin">
                        <form method="POST" id="adminForm" class="form control" enctype="multipart/form-data" autocomplete="on">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group img-profile text-center col-12" style="position: relative;">
                                        <span class="img-div">
                                            <div class="text-center img-placeholderAdmin" onClick="triggerClickAdmin()">
                                                <h4>Click to upload your photo</h4>
                                            </div>
                                            <img src="../assets/imgs/admin_photos/default_photo.png" width="2in" alt="" onClick="triggerClickAdmin()" id="profileDisplayAdmin">
                                            <input type="file" name="profileImageAdmin" onChange="displayImageAdmin(this)" id="profileImageAdmin" class="form-control" style="display: none; border: 0px" accept="image/*">
                                        </span>
                                    </div>
                                </div> <br><br>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="fnameAdmin" class="required">First Name:<i class="req">*</i></label>
                                        <input type="text" name="fnameAdmin" id=fnameAdmin placeholder="Given name" class="form-control" required>
                                        <div class="text-danger" id="adminNameFeedback">
                                            <!-- <small>Admin name already exists</small> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="lnameAdmin" class="required">Last Name:<i class="req">*</i></label>
                                        <input type="text" name="lnameAdmin" id=lnameAdmin placeholder="Last name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="emailAdmin" class="required">Email Address<i class="req">*</i></label>
                                        <input type="email" name="emailAdmin" id=emailAdmin placeholder="example@domain.com" class="form-control" required>
                                        <div class="text-danger" id="adminEmailFeedback">
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="adminNo" class="required">Contact Number:<i class="req">*</i></label>
                                        <input type="text" name="adminNo" id=adminNo pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="adminAdd" class="required">Address:<i class="req">*</i></label>
                                        <input type="text" name="adminAdd" id=adminAdd placeholder="Present address" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="newpwd" class="required">Password:<i class="req">*</i></label>
                                        <input type="password" name="newpwd" id=newpwd placeholder="Password" minlength="8" data-bs-toggle="popover" class="form-control" autocomplete="new-password" required>
                                        <div class="mt-1" style="float: left;">
                                           <small id="passres" class=""></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="confirmpwd" class="required">Confirm Password:<i class="req">*</i></label>
                                        <input type="password" name="confirmpwd" onpaste="return false" id=confirmpwd placeholder="Confirm password" minlength="8" class="form-control" required>
                                        <div class="mt-1" style="float: right">
                                            <input type="checkbox" id="showPass" class="form-check-input mt-1 float-right">&nbsp;<small>Show passwords</small></input>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row mb-3">
                                    <div class="text-center">
                                        <button type='button' id="btn-addAdmin" name="btn-addAdmin" class='btn btn-primary mt-2'>Add Admin</button>
                                        <button type='reset'class='btn btn-danger mt-2' id="admin-reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                    <div class="container" style="width: 50%; float: right">
                       <div>
                           
                       </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
<script src="assets/js/PassRequirements.js"></script>
<script>
    function onlyNumberKey(evt) { 
              
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false; 
        return true;
    }
</script>
</html>