<?php 
 include_once("../../connect.php");
 $con=connect();
date_default_timezone_set('Asia/Manila');
$year=date('Y');
$sql=$con->query("SELECT * FROM `exam_results` INNER JOIN `student_info` ON exam_results.application_no=student_info.application_no WHERE exam_results.application_no LIKE '%$year%' ORDER BY `scaled_score` DESC");

if($sql->num_rows!=0){
    while($row = $sql->fetch_array()){
        if($row['percentile_rank']>=77){
            $color='#28a745';
            $res='bx bx-chevron-up';
            $verbal='Above average';
        }else if($row['percentile_rank']>=23){
            $color='orange';
            $res='bx bx-minus';
            $verbal='Average';
        }else{
            $res='bx bx-chevron-down';
            $color='#dc3545';
            $verbal='Below average';
        }
        echo '
        <div class="rank-content mt-1" >
            <i class="'.$res.'" style="color: '.$color.'" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="'.$verbal.'"></i>
            <img class="profile-image-rank mx-1" id="" style="border-radius: 50px; border: 2px solid '.$color.'" src="../assets/imgs/student2x2/'.$row['picture'].'" alt="">
            <div >
                <h6 class="mx-1 student-name-rank" style="font-weight: 600">'.$row['student_name'].'</h6>
            </div>
            <div class="text-end" style="float: right; flex: 1">
                <h6 style="color: '.$color.'">'.$row['percentile_rank'].'%</h6>
            </div>
        </div>
        ';
    }
    echo "
            <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=tooltip]'))
                    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl)
                    })
            </script>
            ";
}else{
    echo '<h5 class="text-center">No results.</h5>';
}
?>

<!-- <i class="bx bxs-medal bx-tada" style="color: green"></i> -->