<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../../connect.php");
$con=connect();
date_default_timezone_set('Asia/Manila');
$year=date("Y");

$output='';
if(isset( $_POST['searchkey'])){
$searchkey=$_POST['searchkey'];
    $search=$con->query("SELECT * FROM `exam_results` INNER JOIN `student_info` ON exam_results.application_no=student_info.application_no WHERE exam_results.application_no LIKE '%$year%' AND (exam_results.application_no LIKE '%$searchkey%' OR exam_results.student_name LIKE '%$searchkey%' OR exam_results.raw_score LIKE '%$searchkey%' OR exam_results.scaled_score LIKE '%$searchkey%' OR exam_results.percentile_rank LIKE '%$searchkey%' OR exam_results.stanine LIKE '%$searchkey%' OR exam_results.verbal_interpretation LIKE '%$searchkey%')");
}else{
    $search=$con->prepare("SELECT * FROM `exam_results`");
}
if($search->num_rows!=0){
$output="
    <thead class='table-ccc'>
        <tr>
            <th style='border: 1px solid gray' width=10% >Application #</th>
            <th style='border: 1px solid gray' width=5% >Photo</th>
            <th style='border: 1px solid gray' width=10% >Name</th>
            <th style='border: 1px solid gray' width=5% >Raw Score</th>
            <th style='border: 1px solid gray' width=5% >Scaled Score</th>
            <th style='border: 1px solid gray' width=5% >Percentile Rank</th>
            <th style='border: 1px solid gray' width=5% >Stanine</th>
            <th style='border: 1px solid gray' width=10% >Verbal Interpretation</th>
            <th style='border: 1px solid gray' width=5% >Print</th>
        </tr>
    </thead>
    <tbody>
";
while($row = $search->fetch_array()){
    if($row['verbal_interpretation']=='Below Average'){$color='#dc3545';}else if($row['verbal_interpretation']=='Average'){$color='orange';}else{$color='#28a745';}
    $output .= "
    
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
            <a href='../test results/files/".$row['application_no'].".pdf' target='_blank' style='text-decoration: none;'>
             <button class='btn btn-primary mb-2' onclick='' data-id=".$row['application_no']." id='print' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Print'><i class='bx bx-printer mt-1' style='font-size: 20px'></i></button>
            </a>
        </td>
    </tr> 
    ";
    $output.="</tbody>";
    }
}else{
    $output .= "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Result not found!',
            text: 'Try to search other term instead of $searchkey.',
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
    </script>
    ";
}
echo $output;
echo "
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=tooltip]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
    </script>
    ";
?>