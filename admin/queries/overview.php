<?php 
 include_once("../../connect.php");
 $con=connect();
 date_default_timezone_set('Asia/Manila');
 $year=date("Y");

$stud=$con->query("SELECT * FROM `student_info` WHERE `application_no` LIKE '%$year%' ORDER BY `first_name` ASC");
while($row = $stud->fetch_array()){ 
    if($row['verification']=='Pending'){$x="#ffc107";}else if($row['verification']=='Verified'){$x="#28a745";}else{$x="#dc3545";}

    echo "
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
        <td style='border: 1px solid gray'><a href='../PDFCopies/".$row['application_no'].".pdf' target='_blank' style='text-decoration: none;'>
                <button class='btn btn-primary mb-1'><i class='bx bxs-show mt-1 p-0' style='font-size: 20px'></i></button>
            </a>
            <button class='btn btn-success mb-1' id='editstudent' data-id='".$row['student_id']."'><i class='bx bxs-pencil mt-1 p-0' style='font-size: 20px' ></i></button>
        </td>
    </tr>";  
}
?>