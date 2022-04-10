<?php
 include_once("../../connect.php");
 $con=connect();
 date_default_timezone_set('Asia/Manila');
$year=date("Y");
$verify='';

if(isset($_POST['studer'])){
    $searchver=$_POST['studer'];
    $studver=$con->query("SELECT * FROM `student_info`  INNER JOIN `requirements` ON student_info.student_id=requirements.student_id INNER JOIN `educ_bg` ON student_info.student_id=educ_bg.student_id WHERE student_info.verification='Pending' AND student_info.application_no LIKE '%$year%' AND ( student_info.first_name LIKE '%$searchver%' OR student_info.last_name LIKE '%$searchver%' OR student_info.contactno LIKE '%$searchver%' OR student_info.stud_email LIKE '%$searchver%' OR student_info.pre_house LIKE '%$searchver%' OR student_info.pre_city LIKE '%$searchver%' OR student_info.pre_brgy LIKE '%$searchver%' OR student_info.admit_type LIKE '%$searchver%' OR student_info.application_no LIKE '%$searchver%') ORDER BY student_info.student_id DESC");
    // $query=$con->query("SELECT * FROM `student_info` WHERE `verification`='Pending'");
    // $studver->bind_param("ss",$searchver,$searchver);
}else{
    $studver=$con->prepare("SELECT * FROM `student_info` WHERE `verification`='Pending'");
}
if($studver->num_rows>0){
            $verify="
                <thead class='table-ccc'>
                    <tr>
                        <th width=8%>Application #</th>
                        <th width=5%>Photo</th>
                        <th width=8%>Name</th>
                        <th wodth=8%>Contact No.</th>
                        <th width=10%>Email</th>
                        <th width=15%>Address</th>
                        <th width=5%>Admit Type</th>
                        <th width=8%>Application Form</th>
                        <th width=20%>Requirements</th>
                        <th width=5%>Status</th>
                        <th width=10%>Action</th>
                    </tr>
                </thead>
            <tbody>";
            while($row = $studver->fetch_array()){ 
                if($row['admit_type']=="Freshman"){
                    $card1="Grade 11 Card";
                    $card2="Grade 12 Card";
                    $path1="Grade11Cards";
                    $path2="Grade12Cards";
                    $g1=$row['g11card'];
                    $g2=$row['g12card'];

                    $c1="g11";
                    $c2="g12";
                }else{
                    $card1="Transcript of Record Page 1";
                    $card2="Transcript of Record Page 2";
                    $path1="TOR_Page1";
                    $path2="TOR_Page2";
                    $g1=$row['torpg1'];
                    $g2=$row['torpg2'];

                    $c1="torpg1";
                    $c2="torpg2";
                }
               $verify .= "
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
                    <td><button class='btn btn-primary' id='btn-req' data-bs-toggle='modal' data-bs-target='#form-".$row['student_id']."' data-id='".$row['application_no']."'><i class='bx bxs-show mt-1 p-0' style='font-size: 20px'></i></button>
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
                    </div></td>
                    <td style='text-align: center'>
                        <div style='text-align: left; margin-left: 10px; margin-right: 10px'>
                            <ul style='list-style: none; padding: 0; '>
                                <li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='$c1-".$row['student_id']."' value='$card1' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#card1-".$row['student_id']."' data-id='".$row['application_no']."'>
                                        <small>$card1</small>
                                        <i class='bx bx-link-external' style='font-size: 15px'></i> 
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
                                <li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='$c2-".$row['student_id']."' value='$card2' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#card2-".$row['student_id']."' data-id='".$row['application_no']."'>
                                        <small>$card2</small>
                                        <i class='bx bx-link-external' style='font-size: 15px'></i> 
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
                        $verify.=
                                "<li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='als-".$row['student_id']."' value='ALS Certification' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#als-cert-".$row['student_id']."' data-id='".$row['application_no']."'>
                                        <small>ALS Certification</small>
                                        <i class='bx bx-link-external' style='font-size: 15px'></i> 
                                    </a>
                                    <div class='modal fade' id='als-cert-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                        $verify.=
                                "<li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='goodmoral-".$row['student_id']."' value='Good Moral' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#goodmoralfile-".$row['student_id']."' data-id='".$row['application_no']."'>
                                        <small>Good Moral</small>
                                        <i class='bx bx-link-external' style='font-size: 15px'></i> 
                                    </a>
                                    <div class='modal fade' id='goodmoralfile-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                                <li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='birthcert-".$row['student_id']."' value='Birth Certificate' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#birthcertfile-".$row['student_id']."' data-id='".$row['application_no']."'>
                                        <small>Birth Certificate</small>
                                        <i class='bx bx-link-external' style='font-size: 15px'></i> 
                                    </a>
                                    <div class='modal fade' id='birthcertfile-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                                <li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='cor-".$row['student_id']."' value='Certificate of Residency' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#indigency-".$row['student_id']."' data-id='".$row['application_no']."'>
                                        <small>Certificate of Residency</small>
                                        <i class='bx bx-link-external' style='font-size: 15px'></i> 
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
                                <li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='voters-".$row['student_id']."' value='Voters Certificate Identification' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#voters-cert-".$row['student_id']."' data-id='".$row['application_no']."'>
                                        <small>Voter's Certificate/Identification</small>
                                        <i class='bx bx-link-external' style='font-size: 15px'></i> 
                                    </a>
                                    <div class='modal fade' id='voters-cert-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                        $verify.=
                            "<li class='d-flex align-items-center'>
                                <input type='checkbox' name='provided-files' id='vax-".$row['student_id']."' value='Vaccination Card' data-id='".$row['student_id']."' class='provided-files'>
                                &nbsp;
                                <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#vaxcard-".$row['student_id']."' data-id='".$row['application_no']."'>
                                    <small>Vaccination Card</small>
                                    <i class='bx bx-link-external' style='font-size: 15px'></i> 
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
                        $verify.=
                                "<li class='d-flex align-items-center'>
                                    <input type='checkbox' name='provided-files' id='group-".$row['student_id']."' value='".$row['groups']."' data-id='".$row['student_id']."' class='provided-files'>
                                    &nbsp;
                                    <a class='link-req' id='btn-req' data-bs-toggle='modal' data-bs-target='#groupfile-".$row['student_id']."' data-id='".$row['application_no']."'>
                                            <small>".$row['groups']."</small>
                                            <i class='bx bx-link-external' style='font-size: 15px'></i> 
                                    </a>
                                    <div class='modal fade' id='groupfile-".$row['student_id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                        $verify.=
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
                            <button class='btn btn-success verify mb-1' name='verify' data-fname='".$row['first_name']."' data-lname='".$row['last_name']."' data-email='".$row['stud_email']."' data-id='".$row['student_id']."' id='verify' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Verify'>
                                <i class='bx bx-check mt-1' style='font-size: 20px'></i>
                            </button>
                            <button class='btn btn-danger decline mb-1' name='decline' data-fname='".$row['first_name']."' data-lname='".$row['last_name']."' data-email='".$row['stud_email']."' data-id='".$row['student_id']."' id='decline' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Decline'>
                                <i class='bx bx-x mt-1' style='font-size: 20px'></i>
                            </button>
                        </div>
                    </td>
                </tr>";
            $verify .='</tbody>';
            }
            echo $verify;
            echo "
            <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=tooltip]'))
                    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl)
                    })
                </script>
            ";
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
<script>
    $('#line').load('queries/check-files.php');
    $(".provided-files").click(function(){
        
        if($(this).is(':checked')==true){
            var file = $(this).val();
            var id = $(this).attr("data-id");
            $.ajax({
                url: "queries/providedFiles.php",
                method: "post",
                data: {file:file, id:id},
                success:function(data){
                }
            })
        }else{
            var file = $(this).val();
            var id = $(this).attr("data-id");

            $.ajax({
                url: "queries/removeprovidedFiles.php",
                method: "post",
                data: {file:file, id:id},
                success:function(data){
                }
            })
        }
        
    })
</script>