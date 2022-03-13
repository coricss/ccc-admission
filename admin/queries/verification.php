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
            $card1="Transcript of Record Page 1";
            $card2="Transcript of Record Page 2";
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
                <td>
                <button class='btn btn-primary' id='btn-req' data-bs-toggle='modal' data-bs-target='#form-".$row['student_id']."' data-id='".$row['application_no']."'><i class='bx bxs-show mt-1 p-0' style='font-size: 20px'></i></button>
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
                <td style='text-align: center'>
                    <div style='text-align: left; margin-left: 10px; margin-right: 10px'>
                        <ul style='list-style: none; padding: 0; '>
                            <li>    
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#card1-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>$card1</small>
                                </a>
                                
                            <div class='modal fade' id='card1-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered modal-xl'>
                                    <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s $card1</h5>
                                        <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body text-center'>
                                        <iframe src='../requirements/$path1/$g1' class='file-view'></iframe>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                            </li>
                            
                            <li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#card2-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>$card2</small>
                                </a>
                                
                                <div class='modal fade' id='card2-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s $card2</h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/$path2/$g2' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>";
                if($row['als_name']!=""){
                    $output.=
                            "<li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#als-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>ALS Certification</small>
                                </a>
                                <div class='modal fade' id='als-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s ALS Certification</h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/AlsCertificates/".$row['als_cert']."' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>";
                }
                    $output.=
                            "<li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#goodmoral-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Good Moral</small>
                                </a>
                                <div class='modal fade' id='goodmoral-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s Good Moral</h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/Good Morals/".$row['goodmoral']."' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#birthcert-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Birth Certificate</small>
                                </a>
                                <div class='modal fade' id='birthcert-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s Birth Certificate</h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/BirthCertificates/".$row['birthcert']."' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#indigency-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Certificate of Residency</small>
                                </a>
                                <div class='modal fade' id='indigency-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s Certificate of Residency</h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/Indigency/".$row['indigency']."' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#voters-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Voter's Certificate/Identification</small>
                                </a>
                                <div class='modal fade' id='voters-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s Voter's Certificate/Identification</h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/Voter_Certificates/".$row['voters']."' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>";
                if($row['vaxcard']!=""){
                    $output.=
                            "<li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#vaxcard-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>Vaccination Card</small>
                                </a>
                                <div class='modal fade' id='vaxcard-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s Vaccination Card</h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/VaccinationCards/".$row['vaxcard']."' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>";
                }
                if($row['proof_of_group']!=""){
                    $output.=
                            "<li>
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#group-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <i class='bx bxs-file' style='font-size: 10px'></i> <small>".$row['groups']."</small>
                                </a>
                                <div class='modal fade' id='group-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-xl'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row['application_no'].": ".$row['first_name'].' '.$row['last_name']."'s ".$row['groups']." </h5>
                                                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body text-center'>
                                                <iframe src='../requirements/Proof_of_Groups/".$row['proof_of_group']."' class='file-view'></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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