<?php 
 include_once("../../connect.php");
 $con=connect();
 date_default_timezone_set('Asia/Manila');
 $year=date("Y");

$output='';
$column_name=$_POST['column_name'];
if($column_name=='student_id'){
    $sql="SELECT * FROM `student_info` WHERE `application_no` LIKE '%$year%' ORDER BY `$column_name` DESC";
    $result=$con->query($sql) or die ($con->error);
}else if($column_name=='application_no'){
    $sql="SELECT * FROM `student_info` WHERE `application_no` LIKE '%$year%' ORDER BY `student_id` ASC";
    $result=$con->query($sql) or die ($con->error);
}else{
$sql="SELECT * FROM `student_info` WHERE `application_no` LIKE '%$year%' ORDER BY `$column_name` ASC";
$result=$con->query($sql) or die ($con->error);
}
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
                        <th style='border: 1px solid gray' width=10%>Action</th>
                    </tr>
                </thead>
            <tbody>";
            while($row= $result->fetch_array()){
                if($row['verification']=='Pending'){$x="#ffc107";}else if($row['verification']=='Verified'){$x="#28a745";}else{$x="#dc3545";}

                $output.="<tr style='text-align: center'>
                <th style='border: 1px solid gray' scope=row>".$row['application_no']."</th>
                <td style='border: 1px solid gray'>
                    <center>
                        <img style='border: 1px solid gray; border-radius: 50%; width: 60px; height: 60px;' src=../assets/imgs/student2x2/".$row['picture']." class='pic'>
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
                <button class='btn btn-primary mb-1' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='View form'><i class='bx bxs-show mt-1 p-0' style='font-size: 20px'></i></button>
                </a>
                <button class='btn btn-success mb-1' id='editstudent' data-id='".$row['student_id']."' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Edit details'><i class='bx bxs-pencil mt-1 p-0' style='font-size: 20px'></i></button>
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
?>