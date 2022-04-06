<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../connect.php");
$con=connect();
if(isset($_SESSION['ID'])&&($_SESSION['email'])){
    $sql = $con->query("SELECT * FROM `annual_reg_stud`");
    $sql2 = $con->query("SELECT * FROM `annual_reg_stud`");
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
    <title>Analytics | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
 
    <script src="assets/js/admin.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/print.js"></script>
    <!-- <script src="https://www.gstatic.com/charts/loader.js"></script> -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/placeholders.js"></script>
    <script src="../assets/js/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.esm.js" integrity="sha512-sDIo/n5fJbs7V+4hOX86nUfT5TGsR2aROCrFwOGmk8AscP/n1z2roW5JV4Lz+aILf3wBZYW/7W2g2NRD00gpOQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="sidebar">
        <ul class="nav-list" style="margin-top: 80px">
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
                <a href="analytics.php" id="" class="sidelinks active" data-bs-toggle='tooltip' data-bs-placement='right' data-bs-original-title='Analytics'>
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
        <h1 class="pagetitle">Data Analytics</h1>
        <p>Admission Management System | City College of Calamba</p>
    </div>
    <div class="row mt-5" style="display: flex">
        <div class="col-lg-8 col-md-8 mb-3 graphs">
            <div class="head">
                <h5 class="graph-title" style="margin: 0px">Annual Report of Pre-registered Students</h5>
                <div class="searchbox">
                     <div id="" style="float: right">
                         <!-- <button class=refresh id="refresh"><i class='bx bx-refresh' style="font-size: 30px"></i></button> -->
                         <!-- <select class="form-select view-by" id="sort">
                             <option class="others" value="">Registered Students</option>
                             <option class="others" value="first_name">Verified Students</option>
                             <option class="others" value="contactno">Declined Students</option>
                             <option class="others" value="stud_email">Passed Students</option>
                             <option class="others" value="pre_house">Failed Students</option>
                        </select> -->
                         <!-- <input class="search-inputhome form-control" id=search_ver name="searchstud" type="searchplaceholder="Search student details..">
                         <button class="search-btn" disabled><i class='bx bx-search-alt-2 mt-2' ></i></button>  -->
                     </div>
                </div>
            </div>
            <div class="chart-container mt-3" id="divGraph" style="position: relative">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 mb-3 ranks">
            <div id="rank-header" style="display: flex; align-items: center">
                <div style="margin-left: 10px">
                    <h5 class="rank-title" style="margin: 0px">Score Ranks</h5>
                </div>
            </div>
            <hr>
            <div class="rank-body">
                <div class="rank-list">
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>

<script>
    //     google.charts.load ('current', {
    //         'packages': ['corechart'],
    //         'mapsApikey': // her eyou can put you google map key
    //     });
    //   google.charts.setOnLoadCallback(drawChart);

    // function drawChart() {

    //     var data = google.visualization.arrayToDataTable ([
    //         ['Total Students', 'School Year'],
    //          //$ȘchartQuery = "SELECT * FROM `annual_reg_stud`";
    //          $chartQueryRecords = $con->query($chartQuery);
    //             while ($row = $chartQueryRecords->fetch_array()){
    //             echo "['".$row['total_reg_students']."',".$row['school_year']."1,";
    //             }
    //         
    //     1);

    //   var options = {
        // chart: {
        //   title: 'Box Office Earnings in First Two Weeks of Opening',
        //   subtitle: 'in millions of dollars (USD)'
        // },
        // width: 900,
        // height: 500
    //   };

    //     var chart new google.visualization.LineChart(document.getElementById ('myChart'));
    //     chart.draw (data, options);
    // }
// $(document).ready(function(){
//     $.ajax({
//         url: "queries/fetchGraph.php",
//         type: "post",
//         data: {
//             department: "IT Department"
//         },
//         success: function(bar_graph){
//             $("#divGraph").html(bar_graph);
//             $("#myChart").chart = new Chart($("#myChart"), $("#myChart").attr("data-settings"));
//         })
// })

// var ctx =document.getElementById('myChart').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: [
//             <?php while ($row = $sql->fetch_array()) { ?>
//                 '<?php echo $row["school_year"];?>',
//             <?php }?>
//         ],
//         datasets: [
//         {
//             label: 'No. of Registered Students',
//             data: [
//                 <?php while ($row2 = $sql2->fetch_array()) { ?>
//                     <?php echo $row2["total_reg_students"];?>,
//                 <?php }?>
                
//             ],
//             backgroundColor: [
//                 'rgba(24, 93, 213, .8)',
                
//             ],
//             borderColor: [
//                 'rgba(2, 37, 99, 1)',
               
//             ],
//             borderWidth: 3
//         }
//         ]
//     },
//     options: {
//         responsive: true,
//         plugins: {
//             legend: {
//                 position: 'top',
//             },
//         },
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });

var ctx =document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
        
                'SY 2021-2022', 'SY 2022-2023', 'SY 2023-2024', 'SY 2024-2025', 'SY 2025-2026', 'SY 2026-2027',
         
        ],
        datasets: [
        {
            label: 'No. of Registered Students',
            data: [
                1000, 1300, 1450, 1350, 1500, 1800
                
            ],
            backgroundColor: [
                'rgba(24, 93, 213, .8)',
                
            ],
            borderColor: [
                'rgba(2, 37, 99, 1)',
               
            ],
            borderWidth: 3
        }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


</script>
</html>