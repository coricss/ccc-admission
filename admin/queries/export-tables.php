<?php 
     include_once("../../connect.php");
     $con=connect();
     date_default_timezone_set('Asia/Manila');
     $SchoolYear=date("m-d-Y");
     $year=date("Y");
     
     $overview=$con->query("SELECT * FROM `student_info` WHERE `application_no` LIKE '%$year%' ORDER BY `student_id` ASC");
     $results=$con->query("SELECT * FROM `exam_results` WHERE `application_no` LIKE '%$year%' ORDER BY `student_name` ASC");
     $admin=$con->query("SELECT * FROM `admin_info` ORDER BY `admin_firstname` ASC");
     $studArchive=$con->query("SELECT * FROM `student_info` WHERE `application_no` NOT LIKE '%$year%' ORDER BY `student_id` ASC");
     $resArchive=$con->query("SELECT * FROM `exam_results` WHERE `application_no` NOT LIKE '%$year%' ORDER BY `result_id` ASC");
    //  $studArchive=$con->query("SELECT * FROM `student_info` ORDER BY `student_id` ASC");
     
    if(isset($_POST['export-overview'])){
        if($overview->num_rows!=0){
            $output= "
            <style>
                table, td {
                    border:1px solid black
                } 
                table{
                    border-collapse:collapse
                } 
                .table-header{
                   color: white; background-color: #242424
                }</style>
            <table>
                <tr>
                    <th class='table-header'>Application #</th>
                    <th class='table-header'>First name</th>
                    <th class='table-header'>Middle name</th>
                    <th class='table-header'>Last name</th>
                    <th class='table-header'>Suffix</th>
                    <th class='table-header'>Age</th>
                    <th class='table-header'>Gender</th>
                    <th class='table-header'>Birthplace</th>
                    <th class='table-header'>Birthday</th>
                    <th class='table-header'>Religion</th>
                    <th class='table-header'>Civil Status</th>
                    <th class='table-header'>Spouse name</th>
                    <th class='table-header'>Spouse address</th>
                    <th class='table-header'>Spouse contact #</th>
                    <th class='table-header'>Spouse occupation</th>
                    <th class='table-header'>Spouse employer's name</th>
                    <th class='table-header'>Admit Type</th>
                    <th class='table-header'>Email</th>
                    <th class='table-header'>Contact No</th>
                    <th class='table-header'>1st course priority</th>
                    <th class='table-header'>2nd course priority</th>
                    <th class='table-header'>Resident of calamba?</th>
                    <th class='table-header'>If yes, how many yrs in calamba?</th>
                    <th class='table-header'>Present address</th>
                    <th class='table-header'>Permanent address</th>
                    <th class='table-header'>Groups involve</th>
                    <th class='table-header'>Has stable internet?</th>
                    <th class='table-header'>Verification Status</th>
                </tr>
            ";
            while($row = $overview->fetch_array()){ 
                if($row['verification']=='Verified'){
                    $color='#c6efce';
                }else if($row['verification']=='Declined'){
                    $color='#ffc7ce';
                }else if($row['verification']=='Pending'){
                    $color='#ffeb9c';
                }
                $output.="
                <tr>
                    <td style='background-color: $color'>".$row['application_no']."</td>
                    <td style='background-color: $color'>".$row['first_name']."</td>
                    <td style='background-color: $color'>".$row['middle_name']."</td>
                    <td style='background-color: $color'>".$row['last_name']."</td>
                    <td style='background-color: $color'>".$row['suffix']."</td>
                    <td style='background-color: $color'>".$row['stud_age']."</td>
                    <td style='background-color: $color'>".$row['gender']."</td>
                    <td style='background-color: $color'>".$row['birthplace']."</td>
                    <td style='background-color: $color'>".$row['stud_bday']."</td>
                    <td style='background-color: $color'>".$row['religion']."</td>
                    <td style='background-color: $color'>".$row['civil_status']."</td>
                    <td style='background-color: $color'>".$row['spouse_name']."</td>
                    <td style='background-color: $color'>".$row['spouse_add']."</td>
                    <td style='background-color: $color'>".$row['spouse_no']."</td>
                    <td style='background-color: $color'>".$row['spouse_work']."</td>
                    <td style='background-color: $color'>".$row['spouse_emp']."</td>
                    <td style='background-color: $color'>".$row['admit_type']."</td>
                    <td style='background-color: $color'>".$row['stud_email']."</td>
                    <td style='background-color: $color'>".$row['contactno']."</td>
                    <td style='background-color: $color'>".$row['1stprio']."</td>
                    <td style='background-color: $color'>".$row['2ndprio']."</td>
                    <td style='background-color: $color'>".$row['resident_of_calamba']."</td>
                    <td style='background-color: $color'>".$row['yrs_in_calamba']."</td>
                    <td style='background-color: $color'>".$row['pre_house'].' '.$row['pre_brgy'].' '.$row['pre_city'].' '.$row['pre_zipcode']."</td>
                    <td style='background-color: $color'>".$row['per_house'].' '.$row['per_brgy'].' '.$row['per_city'].' '.$row['per_zipcode']."</td>
                    <td style='background-color: $color'>".$row['groups']."</td>
                    <td style='background-color: $color'>".$row['stable_internet']."</td>
                    <td style='background-color: $color'>".$row['verification']."</td>
                </tr>"; 
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header ("Content-Disposition: attachment; filename=students_information-$SchoolYear.xls");
            echo $output;
        }else{
            echo "
            <script>
                location.href='../student.php';
            </script>
            ";
        }
    }
    if(isset($_POST['export-results'])){
        if($results->num_rows!=0){
           $output= "
               <style>
                   table, td {
                       border:1px solid black
                   } 
                   table{
                       border-collapse:collapse
                   } 
                   .table-header{
                      color: white; background-color: black
                   }</style>
               <table>
                   <tr>
                       <th class='table-header'>Application #</th>
                       <th class='table-header'>Name</th>
                       <th class='table-header'>Raw Score</th>
                       <th class='table-header'>Scaled Score</th>
                       <th class='table-header'>Percentile</th>
                       <th class='table-header'>Statine</th>
                       <th class='table-header'>Verbal Interpretation</th>
                   </tr>
           ";
           while($row = $results->fetch_array()){
                if($row['verbal_interpretation']=='Above Average'){
                    $color='#c6efce';
                }else if($row['verbal_interpretation']=='Below Average'){
                    $color='#ffc7ce';
                }else if($row['verbal_interpretation']=='Average'){
                    $color='#ffeb9c';
                }
               $output.="
               <tr>
                   <td style='background-color: $color'>".$row['application_no']."</td>
                   <td style='background-color: $color'>".$row['student_name']."</td>
                   <td style='background-color: $color'>".$row['raw_score']."</td>
                   <td style='background-color: $color'>".$row['scaled_score']."</td>
                   <td style='background-color: $color'>".$row['percentile_rank']."</td>
                   <td style='background-color: $color'>".$row['stanine']."</td>
                   <td style='background-color: $color'>".$row['verbal_interpretation']."</td>
               </tr>"; 
           }
           $output.='</table>';
           header("Content-Type: application/xls");
           header ("Content-Disposition: attachment; filename=admission_test_results-$SchoolYear.xls");
           echo $output;
        }else{
            echo "
            <script>
                location.href='../result.php';
            </script>
            ";
        }
    }
       if(isset($_POST['export-admin'])){
        if($admin->num_rows!=0){
            $output= "
                <style>
                    table, td {
                        border:1px solid black
                    } 
                    table{
                        border-collapse:collapse
                    } 
                    .table-header{
                    color: white; background-color: black
                    }</style>
                <table>
                    <tr>
                        <th class='table-header'>First name</th>
                        <th class='table-header'>Last name</th>
                        <th class='table-header'>Email</th>
                        <th class='table-header'>Contact Number</th>
                        <th class='table-header'>Address</th>
                    </tr>
            ";
            while($row = $admin->fetch_array()){
                $output.="
                <tr>
                    <td>".$row['admin_firstname']."</td>
                    <td>".$row['admin_lastname']."</td>
                    <td>".$row['admin_email']."</td>
                    <td>".$row['admin_contactno']."</td>
                    <td>".$row['admin_address']."</td>
                </tr>"; 
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header ("Content-Disposition: attachment; filename=list_of_admins-$SchoolYear.xls");
            echo $output;
        }else{
            echo "
            <script>
                location.href='../settings.php';
            </script>
            ";
        }
       }
    if(isset($_POST['export-studArchive'])){
        if($studArchive->num_rows!=0){
            $output= "
            <style>
                table, td {
                    border:1px solid black
                } 
                table{
                    border-collapse:collapse
                } 
                .table-header{
                   color: white; background-color: #242424
                }</style>
            <table>
                <tr>
                    <th class='table-header'>Application #</th>
                    <th class='table-header'>First name</th>
                    <th class='table-header'>Middle name</th>
                    <th class='table-header'>Last name</th>
                    <th class='table-header'>Suffix</th>
                    <th class='table-header'>Age</th>
                    <th class='table-header'>Gender</th>
                    <th class='table-header'>Birthplace</th>
                    <th class='table-header'>Birthday</th>
                    <th class='table-header'>Religion</th>
                    <th class='table-header'>Civil Status</th>
                    <th class='table-header'>Spouse name</th>
                    <th class='table-header'>Spouse address</th>
                    <th class='table-header'>Spouse contact #</th>
                    <th class='table-header'>Spouse occupation</th>
                    <th class='table-header'>Spouse employer's name</th>
                    <th class='table-header'>Admit Type</th>
                    <th class='table-header'>Email</th>
                    <th class='table-header'>Contact No</th>
                    <th class='table-header'>1st course priority</th>
                    <th class='table-header'>2nd course priority</th>
                    <th class='table-header'>Resident of calamba?</th>
                    <th class='table-header'>If yes, how many yrs in calamba?</th>
                    <th class='table-header'>Present address</th>
                    <th class='table-header'>Permanent address</th>
                    <th class='table-header'>Groups involve</th>
                    <th class='table-header'>Has stable internet?</th>
                    <th class='table-header'>Verification Status</th>
                </tr>
            ";
            while($row = $studArchive->fetch_array()){ 
                if($row['verification']=='Verified'){
                    $color='#c6efce';
                }else if($row['verification']=='Declined'){
                    $color='#ffc7ce';
                }else if($row['verification']=='Pending'){
                    $color='#ffeb9c';
                }
                $output.="
                <tr>
                    <td style='background-color: $color'>".$row['application_no']."</td>
                    <td style='background-color: $color'>".$row['first_name']."</td>
                    <td style='background-color: $color'>".$row['middle_name']."</td>
                    <td style='background-color: $color'>".$row['last_name']."</td>
                    <td style='background-color: $color'>".$row['suffix']."</td>
                    <td style='background-color: $color'>".$row['stud_age']."</td>
                    <td style='background-color: $color'>".$row['gender']."</td>
                    <td style='background-color: $color'>".$row['birthplace']."</td>
                    <td style='background-color: $color'>".$row['stud_bday']."</td>
                    <td style='background-color: $color'>".$row['religion']."</td>
                    <td style='background-color: $color'>".$row['civil_status']."</td>
                    <td style='background-color: $color'>".$row['spouse_name']."</td>
                    <td style='background-color: $color'>".$row['spouse_add']."</td>
                    <td style='background-color: $color'>".$row['spouse_no']."</td>
                    <td style='background-color: $color'>".$row['spouse_work']."</td>
                    <td style='background-color: $color'>".$row['spouse_emp']."</td>
                    <td style='background-color: $color'>".$row['admit_type']."</td>
                    <td style='background-color: $color'>".$row['stud_email']."</td>
                    <td style='background-color: $color'>".$row['contactno']."</td>
                    <td style='background-color: $color'>".$row['1stprio']."</td>
                    <td style='background-color: $color'>".$row['2ndprio']."</td>
                    <td style='background-color: $color'>".$row['resident_of_calamba']."</td>
                    <td style='background-color: $color'>".$row['yrs_in_calamba']."</td>
                    <td style='background-color: $color'>".$row['pre_house'].' '.$row['pre_brgy'].' '.$row['pre_city'].' '.$row['pre_zipcode']."</td>
                    <td style='background-color: $color'>".$row['per_house'].' '.$row['per_brgy'].' '.$row['per_city'].' '.$row['per_zipcode']."</td>
                    <td style='background-color: $color'>".$row['groups']."</td>
                    <td style='background-color: $color'>".$row['stable_internet']."</td>
                    <td style='background-color: $color'>".$row['verification']."</td>
                </tr>"; 
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header ("Content-Disposition: attachment; filename=students_archive-$SchoolYear.xls");
            echo $output;
        }else{
            echo "
            <script>
                location.href='../archives.php';
            </script>
            ";
        }
    }

        if(isset($_POST['export-resultArchive'])){
            if($resArchive->num_rows!=0){
            $output= "
                <style>
                    table, td {
                        border:1px solid black
                    } 
                    table{
                        border-collapse:collapse
                    } 
                    .table-header{
                        color: white; background-color: black
                    }</style>
                <table>
                    <tr>
                        <th class='table-header'>Application #</th>
                        <th class='table-header'>Name</th>
                        <th class='table-header'>Raw Score</th>
                        <th class='table-header'>Scaled Score</th>
                        <th class='table-header'>Percentile</th>
                        <th class='table-header'>Statine</th>
                        <th class='table-header'>Verbal Interpretation</th>
                    </tr>
            ";
            while($row = $resArchive->fetch_array()){
                    if($row['verbal_interpretation']=='Above Average'){
                        $color='#c6efce';
                    }else if($row['verbal_interpretation']=='Below Average'){
                        $color='#ffc7ce';
                    }else if($row['verbal_interpretation']=='Average'){
                        $color='#ffeb9c';
                    }
                $output.="
                <tr>
                    <td style='background-color: $color'>".$row['application_no']."</td>
                    <td style='background-color: $color'>".$row['student_name']."</td>
                    <td style='background-color: $color'>".$row['raw_score']."</td>
                    <td style='background-color: $color'>".$row['scaled_score']."</td>
                    <td style='background-color: $color'>".$row['percentile_rank']."</td>
                    <td style='background-color: $color'>".$row['stanine']."</td>
                    <td style='background-color: $color'>".$row['verbal_interpretation']."</td>
                </tr>"; 
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header ("Content-Disposition: attachment; filename=results_archives-$SchoolYear.xls");
            echo $output;
            }else{
                echo "
                <script>
                    location.href='../archives.php';
                </script>
                ";
            }
        }
?>