<?php 
include_once("../../connect.php");
$con=connect();
date_default_timezone_set('Asia/Manila');
$year=date("Y");

// $resultsql=$con->query("SELECT * FROM `exam_results` INNER JOIN `student_info` ON exam_results.application_no=student_info.application_no");

$resultsql=$con->query("SELECT * FROM `exam_results` INNER JOIN `student_info` ON exam_results.application_no=student_info.application_no WHERE exam_results.application_no NOT LIKE '%$year%'");

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
        
        <td style='border: 1px solid gray'>
            <button class='btn btn-danger mb-1 result-del' id='result-del' data-id='".$row['result_id']."'><i class='bx bxs-trash mt-1 p-0' style='font-size: 20px'></i></button>
        </td>
    </tr> 
    ";
}

?>