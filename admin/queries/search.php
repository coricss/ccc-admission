<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../../connect.php");
$con=connect();
date_default_timezone_set('Asia/Manila');
$year=date("Y");

$output='';
if(isset($_POST['query'])){
    $search=$_POST['query'];
    $stud=$con->query("SELECT * FROM `student_info` WHERE `application_no` LIKE '%$year%' AND (`first_name` LIKE '%$search%' OR `last_name` LIKE '%$search%' OR `contactno` LIKE '%$search%' OR `stud_email` LIKE '%$search%' OR `pre_house` LIKE '%$search%' OR `pre_city` LIKE '%$search%' OR `pre_brgy` LIKE '%$search%' OR `application_no` LIKE '%$search%' OR `admit_type` LIKE '%$search%' OR `verification` LIKE '%$search%') ORDER BY `first_name` ASC");
    // $stud->bind_param("ss",$search,$search);
}else{
    $stud=$con->prepare("SELECT * FROM `student_info` ORDER BY `first_name` ASC");
}
if($stud->num_rows>0){
            $output="
            <thead class='table-ccc'>
                <tr>
                    <th style='border: 1px solid gray' width=10%>Application #</th>
                    <th style='border: 1px solid gray' width=5%>Photo</th>
                    <th style='border: 1px solid gray' width=10%>Name</th>
                    <th style='border: 1px solid gray' wodth=5%>Contact No.</th>
                    <th style='border: 1px solid gray' width=15%>Email</th>
                    <th style='border: 1px solid gray' width=20%>Address</th>
                    <th style='border: 1px solid gray' width=10%>Admit Type</th>
                    <th style='border: 1px solid gray' width=10%>Status</th>
                    <th id='actions' style='border: 1px solid gray' width=10%>Action</th>
                    
                </tr>
            </thead>
            <tbody>";
            while($row = $stud->fetch_array()){ 
                if($row['verification']=='Pending'){$x="#ffc107";}else if($row['verification']=='Verified'){$x="#28a745";}else{$x="#dc3545";}

                $output .= "
                <tr style='text-align: center'>
                    <th style='border: 1px solid gray' scope=row>".$row['application_no']."</th>
                    <td style='border: 1px solid gray'>
                        <center>
                            <img style='border: 1px solid gray; border-radius: 50%; width: 60px; height: 60px;' src=../assets/imgs/student2x2/".$row['picture']." >
                        </center>
                    </td>
                    <td style='border: 1px solid gray'>".$row['first_name'].' '.$row['last_name']."</td>
                    <td style='border: 1px solid gray'>".$row['contactno']."</td>
                    <td style='border: 1px solid gray'><a href='mailto:".$row['stud_email']."' style='text-decoration: none; color: black'>".$row['stud_email']."</a></td>
                    <td style='border: 1px solid gray'>".$row['pre_house'].' '.$row['pre_brgy'].' '.$row['pre_city']."</td>
                    <td style='border: 1px solid gray'>".$row['admit_type']."</td>
                    <td style='border: 1px solid gray' class='text-warning'>
                        <div class='badge' style='background-color: ".$x.";'>
                            ".$row['verification']."
                        </div>
                    </td>
                    <td style='border: 1px solid gray' class='actions'>
                    <button class='btn btn-primary' id='btn-view' data-bs-toggle='modal' data-bs-target='#form-".$row['student_id']."' data-id='".$row['student_id']."'><i class='bx bxs-show mt-1 p-0' style='font-size: 20px'></i></button>
    
                    <button class='btn btn-success mb-1' id='editstudent' data-id='".$row['student_id']."' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Edit details'><i class='bx bxs-pencil mt-1 p-0' style='font-size: 20px'></i></button>
                    </td>
                    <td id='modal-overview-".$row['student_id']."' style='display: none'>
                        <div class='modal fade' id='form-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered modal-xl'>
                                <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s Application Form</h5>
                                    <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body text-center'>
                                    <iframe src='../PDFCopies/".$row['application_no'].".pdf' class='file-view'></iframe>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>";  
            }
            $output .="</tbody>";
            echo $output;
            echo "
            <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=tooltip]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                })
            </script>
            ";
} else{
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Student not found!',
                text: 'Try to search other term instead of $search.',
                confirmButtonText: `Ok`,
                confirmButtonColor: '#0d6efd'
        }).then((result) => {
            if(result.isConfirmed){
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                    location.reload();
                }
            }else{
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                    location.reload();
                }
            }
            });
        </script>";     
}


?>