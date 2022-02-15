<?php 
 include_once("../../connect.php");
 $con=connect();
 date_default_timezone_set('Asia/Manila');
 $year=date("Y");
 
 $output='';
 extract($_POST);
// $stud=$con->query("SELECT * FROM `student_info` WHERE `application_no` NOT LIKE '%$year%' ORDER BY `student_id` ASC");
$stud=$con->query("SELECT * FROM `student_info` WHERE `application_no` NOT LIKE '%$year%' AND (`first_name` LIKE '%$searchver%' OR `last_name` LIKE '%$searchver%' OR `contactno` LIKE '%$searchver%' OR `stud_email` LIKE '%$searchver%' OR `pre_house` LIKE '%$searchver%' OR `pre_city` LIKE '%$searchver%' OR `pre_brgy` LIKE '%$searchver%' OR `application_no` LIKE '%$searchver%') ORDER BY `student_id` ASC");

if($stud->num_rows!=0){
    $output="
        <thead class='table-ccc'>
            <th style='border: 1px solid gray' width=15%>Application #</th>
            <th style='border: 1px solid gray' width=5%>Photo</th>
            <th style='border: 1px solid gray' width=10%>Name</th>
            <th style='border: 1px solid gray' width=10%>Contact No.</th>
            <th style='border: 1px solid gray' width=15%>Email</th>
            <th style='border: 1px solid gray' width=20%>Address</th>
            <th style='border: 1px solid gray' width=10%>Admit Type</th>
            <th style='border: 1px solid gray' width=10%>Status</th>
            <th style='border: 1px solid gray' width=5%>Action</th>
        </thead>
        <tbody>";
        while($row = $stud->fetch_array()){ 
            if($row['verification']=='Pending'){$x="#ffc107";}else if($row['verification']=='Verified'){$x="#28a745";}else{$x="#dc3545";}
        
            $output .= "
            <tr style='text-align: center'>
                <th style='border: 1px solid gray' scope=row>".$row['application_no']."</th>
                <td style='border: 1px solid gray'>
                    <center>
                        <img style='border: 1px solid gray; border-radius: 50%; width: 60px; height: 60px;' src=../assets/imgs/student2x2/".$row['picture'].">
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
                <td style='border: 1px solid gray'>
                    <button class='btn btn-danger mb-1 stud-del' id='stud-del' data-id='".$row['student_id']."'><i class='bx bxs-trash mt-1 p-0' style='font-size: 20px'></i></button>
                </td>
            </tr>";
            $output .='</tbody>';
        }
        echo $output;  
}else{
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Student not found!',
            text: 'Try to search other term instead of $searchver.',
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