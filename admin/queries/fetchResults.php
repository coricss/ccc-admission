<?php 
 include_once("../../connect.php");
 $con=connect();
 date_default_timezone_set('Asia/Manila');
 $year=date("Y");

$resultsql=$con->query("SELECT * FROM `exam_results` INNER JOIN `student_info` ON exam_results.application_no=student_info.application_no WHERE exam_results.application_no LIKE '%$year%'");

while($row = $resultsql->fetch_array()){
    if($row['verbal_interpretation']=='Below Average'){$color='#dc3545';}else if($row['verbal_interpretation']=='Average'){$color='orange';}else{$color='#28a745';}

    echo"
    
    <tr style='height: 80px; text-align: center'>
        <th style='border: 1px solid gray'>".$row['application_no']."</th>
        <td style='border: 1px solid gray'>
            <center>
                <img style='border: 1px solid gray; border-radius: 50%; width: 60px; height: 60px;' src=../assets/imgs/student2x2/".$row['picture'].">
            </center>
        </td>
        <td style='border: 1px solid gray'>".$row['student_name']."</td>
        <td style='border: 1px solid gray'>".$row['raw_score']."</td>
        <td style='border: 1px solid gray'>".$row['scaled_score']."</td>
        <td style='border: 1px solid gray'>".$row['percentile_rank']."</td>
        <td style='border: 1px solid gray'>".$row['stanine']."</td>
        <td style='border: 1px solid gray'>
            <div class='badge' style='background-color: ".$color.";'>
                ".$row['verbal_interpretation']."
            </div>
        </td>
        
        <td style='border: 1px solid gray' class='actions'>
            <button class='btn btn-primary' id='btn-view-results' data-bs-toggle='modal' data-bs-target='#results-".$row['student_id']."' data-id='".$row['student_id']."' ><i class='bx bx-printer mt-1' style='font-size: 20px'></i></button>

            <div id='modal-results-".$row['student_id']."' style='display: none'>
                <div class='modal fade' id='results-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s Test Results</h5>
                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body text-center'>
                                <iframe src='../test results/files/".$row['application_no'].".pdf' class='file-view'></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr> 
    ";
}

?>