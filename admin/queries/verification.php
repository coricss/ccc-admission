<?php
    include_once("../../connect.php");
    $con=connect();
    date_default_timezone_set('Asia/Manila');
    $year=date("Y");

    $stud=$con->query("SELECT * FROM `student_info` INNER JOIN `requirements` ON student_info.student_id=requirements.student_id INNER JOIN `educ_bg` ON student_info.student_id=educ_bg.student_id WHERE student_info.verification='Pending'  AND student_info.application_no LIKE '%$year%' ORDER BY student_info.student_id DESC");
    
    while($row = $stud->fetch_array()){
        if($row['admit_type']=="Freshman"){
            $card1="Grade 11 Card";
            $card2="Grade 12 Card";
            $path1="Grade11Cards";
            $path2="Grade12Cards";
            $g1=$row['g11card'];
            $g2=$row['g12card'];
        }else{
            $card1="ToR 1";
            $card2="ToR 2";
            $path1="TOR_Page1";
            $path2="TOR_Page2";
            $g1=$row['torpg1'];
            $g2=$row['torpg2'];
        }
        $output= "
            <tr>
                <th scope=row>".$row['application_no']."</th>
                <td>
                    <center>
                        <img style='border: 1px solid gray' src=../assets/imgs/student2x2/".$row['picture']." class='pic'>
                    </center>
                </td>
                <td>".$row['first_name'].' '.$row['last_name']."</td>
                <td>".$row['contactno']."</td>
                <td><a href='mailto:".$row['stud_email']."' style='text-decoration: none; color: black'>".$row['stud_email']."</a></td>
                <td>".$row['pre_house'].' '.$row['pre_brgy'].' '.$row['pre_city']."</td>
                <td>".$row['admit_type']."</td>
                <td><a href='../PDFCopies/".$row['application_no'].".pdf' target='_blank' style='text-decoration: none;'>
                <button class='btn btn-primary'><i class='bx bxs-show mt-1 p-0' style='font-size: 20px'></i></button>
                </a></td>
                <td style='text-align: center'>
                    <div style='text-align: left; margin-left: 10px; margin-right: 10px'>
                        <ul style='list-style: none; padding: 0; '>
                            <li>
                            
                                <a class='link-req' href='../requirements/$path1/$g1' target='_blank'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>$card1</small>
                                </a>
                            </li>
                            <li>
                                <a class='link-req' href='../requirements/$path2/$g2' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>$card2</small>
                                </a>
                            </li>";
                if($row['als_name']!=""){
                    $output.=
                            "<li>
                                <a class='link-req' href='../requirements/AlsCertificates/".$row['als_cert']."' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>ALS Certification</small>
                                </a>
                            </li>";
                }
                    $output.=
                            "<li>
                                <a class='link-req' href='../requirements/Good Morals/".$row['goodmoral']."' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Good Moral</small>
                                </a>
                            </li>
                            <li>
                                <a class='link-req' href='../requirements/BirthCertificates/".$row['birthcert']."' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Birth Certificate</small>
                                </a>
                            </li>
                            <li>
                                <a class='link-req' href='../requirements/Indigency/".$row['indigency']."' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Brgy Indigency</small>
                                </a>
                            </li>
                            <li>
                                <a class='link-req' href='../requirements/Voter_Certificates/".$row['voters']."' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Voter's ID</small>
                                </a>
                            </li>";
                if($row['vaxcard']!=""){
                    $output.=
                            "<li>
                                <a class='link-req' href='../requirements/VaccinationCards/".$row['vaxcard']."' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Vaccination Card</small>
                                </a>
                            </li>";
                }
                if($row['proof_of_group']!=""){
                    $output.=
                            "<li>
                                <a class='link-req' href='../requirements/Proof_of_Groups/".$row['proof_of_group']."' target='_blank' style='text-decoration: none;'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>".$row['groups']."</small>
                                </a>
                            </li>";
                }
                    $output.=
                      "</ul>
                    </div>
                </td>
                <td class='text-warning'>
                    <div class='badge' style='background-color: #ffc107;'>
                        ".$row['verification']."
                    </div>
                </td>
                <td> 
                    <div class='table-buttons'> 
                        <button class='btn btn-success verify mb-1' name='verify' data-fname='".$row['first_name']."' data-lname='".$row['last_name']."' data-email='".$row['stud_email']."' data-id='".$row['student_id']."' id='verify'>
                            <i class='bx bx-check mt-1' style='font-size: 20px'></i>
                        </button>
                        <button class='btn btn-danger decline mb-1' name='decline' data-fname='".$row['first_name']."' data-lname='".$row['last_name']."' data-email='".$row['stud_email']."' data-id='".$row['student_id']."' id='decline'>
                            <i class='bx bx-x mt-1' style='font-size: 20px'></i>
                        </button>
                    </div>
                </td>
            </tr>"; 
            echo $output;
    }
    
?>