<?php 
    
if(!isset($_SESSION)){
    session_start();
}

include_once("../../connect.php");
$con=connect();
extract($_POST);

$sql = "SELECT * FROM `student_info` WHERE `student_id`=$id";
$stud=$con->query($sql) or die ($con->error);
$studInfo=$stud->fetch_array();

$sql = "SELECT * FROM `educ_bg` WHERE `student_id`=$id";
$educ=$con->query($sql) or die ($con->error);
$educBG=$educ->fetch_array();

$sql = "SELECT * FROM `fam_bg` WHERE `student_id`=$id";
$fam=$con->query($sql) or die ($con->error);
$famBG=$fam->fetch_array();

$sql = "SELECT * FROM `org_involvement` WHERE `student_id`=$id";
$org=$con->query($sql) or die ($con->error);
$org_involve=$org->fetch_array();

$sql = "SELECT * FROM `personal_admiration` WHERE `student_id`=$id";
$person=$con->query($sql) or die ($con->error);
$personalAdmire=$person->fetch_array();

$sql = "SELECT * FROM `requirements` WHERE `student_id`=$id";
$requirements=$con->query($sql) or die ($con->error);
$req=$requirements->fetch_array();
date_default_timezone_set('Asia/Manila');

$gr=$studInfo["groups"];

$a="Recipient of Student Financial Assistance";
$b="Person from Disadvantaged Group";
$c="Person from Depressed or Conflicted-Areas";
$d="Member of Indigenous People";
$e="Person with Disability";
$f="Recipient of 4Ps";
$g="Working Student";
$h="N/A";
if(preg_match("/{$a}/", $gr)){
    echo "<script>$('#stuFap1').prop('checked', true);</script>";
}
if(preg_match("/{$b}/", $gr)){
    echo "<script>$('#disadvantagedGroup1').prop('checked', true);</script>";
}
if(preg_match("/{$c}/", $gr)){
    echo "<script>$('#depressed1').prop('checked', true);</script>";
}
if(preg_match("/{$d}/", $gr)){
    echo "<script>$('#indigenous1').prop('checked', true);</script>";
}
if(preg_match("/{$e}/", $gr)){
    echo "<script>$('#pwd1').prop('checked', true);</script>";
}
if(preg_match("/{$f}/", $gr)){
    echo "<script>$('#4ps1').prop('checked', true);</script>";
}
if(preg_match("/{$g}/", $gr)){
    echo "<script>$('#workingstud1').prop('checked', true);</script>";
}
if($gr=="N/A"){
    echo "<script>
    $('#none1').prop('checked', true);
    $('#stuFap1').prop('disabled', true);
    $('#disadvantagedGroup1').prop('disabled', true);
    $('#depressed1').prop('disabled', true);
    $('#indigenous1').prop('disabled', true);
    $('#pwd1').prop('disabled', true);
    $('#4ps1').prop('disabled', true);
    $('#workingstud1').prop('disabled', true);
    
    </script>";
}

if($educBG['als_cert']!=""){
    $display="inline-block";
}else{
    $display="none";
}
if($req['vaxcard']!=""){
    $display2="inline-block";
}else{
    $display2="none";
}
if(($req['g11card']!="")&&($req['g12card']!="")){
    $g11Dis="inline-block";
    $g12Dis="inline-block";
}else{
    $g11Dis="none";
    $g12Dis="none";
}

if(($req['torpg1']!="")&&($req['torpg2']!="")){
    $torpg1Dis="inline-block";
    $torpg2Dis="inline-block";
}else {
    $torpg1Dis="none";
    $torpg2Dis="none";

}

echo '

<form method="POST" action="" id="editStudentForm" class="form control" enctype="multipart/form-data">
    <h4 class="mb-3">Personal Information</h4>
    <div class="form-group">
        <div class="form-row">
            <div class="form-group img-profile text-center col-12" style="position: relative;">
                <span class="img-div">
                    <div class="text-center img-placeholder" onClick="triggerClick2()">
                        <h4>Click to upload your photo</h4>
                    </div>
                    <img src="../assets/imgs/student2x2/'.$studInfo["picture"].'" width="2in" alt="" onClick="triggerClick2()" id="profileDisplay2">
                </span>
                <input type="file" name="profileImage2" onChange="displayImage2(this)" id="profileImage2" class="form-control" style="display: none;" accept="image/*">
                <small>(Photo in White Background)</small>
            </div>
            <br><br>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <input type="hidden" name="applicationNo" id=applicationNo value="'.$studInfo["application_no"].'">
                        <input type="hidden" name="studID" id="studID" value="'.$studInfo["student_id"].'">
                        <label for="fname2" class="required">First Name:<i class="req">*</i></label>
                        <input type="text" name="fname2" id=fname2 placeholder="Given name" class="form-control" value="'.$studInfo["first_name"].'" required>
                        <div class="text-danger" id="feedbackName">

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="mname2">Middle Name:<i class="req">*</i></label>
                        <input type="text" name="mname2" id=mname2 placeholder="Middle name" class="form-control" value="'.$studInfo["middle_name"].'" required>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="lname2">Last Name:<i class="req">*</i></label>
                        <input type="text" name="lname2" id=lname2 placeholder="Surname" class="form-control" value="'.$studInfo["last_name"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <label for="suffixx2">Suffix:</label>
                        <select class="form-select" name="suffixx2" id="suffixx2">
                            <option value="'.$studInfo["suffix"].'">'.$studInfo["suffix"].'</option>
                            <option value="Sr." class="others">Sr.</option>
                            <option value="Jr." class="others">Jr.</option>
                            <option value="I" class="others">I</option>
                            <option value="II" class="others">II</option>
                            <option value="III" class="others">III</option>
                            <option value="IV" class="others">IV</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-3">
                        <label for="age2">Age:<i class="req">*</i></label>
                        <select class="form-select" name="age2" id="age2"  required>
                            <option value="'.$studInfo["stud_age"].'">'.$studInfo["stud_age"].'</option>
                            <option value="16" class="others">16</option>
                            <option value="17" class="others">17</option>
                            <option value="18" class="others">18</option>
                            <option value="19" class="others">19</option>
                            <option value="20" class="others">20</option>
                            <option value="21" class="others">21</option>
                            <option value="22" class="others">22</option>
                            <option value="23" class="others">23</option>
                            <option value="24" class="others">24</option>
                            <option value="25" class="others">25</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                        <label for="birthplace2">Place of Birth:<i class="req">*</i></label>
                        <input type="text" name="birthplace2" id=birthplace2 placeholder="Birthplace" class="form-control" value="'.$studInfo["birthplace"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="bday2">Date of Birth:<i class="req">*</i></label>
                        <input type="date" name="bday2" value="'.$studInfo["stud_bday"].'" id=bday2 class="form-control"  required>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label for="religion2">Religion:<i class="req">*</i></label>
                        <input type="text" name="religion2" value="'.$studInfo["religion"].'" id=religion2 placeholder="Religion" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <label for="gender2">Gender:<i class="req">*</i></label>
                        <select class="form-select" name="gender2" id="gender2" required>
                            <option value="'.$studInfo["gender"].'">'.$studInfo["gender"].'</option>
                            <option value="Male" class="others">Male</option>
                            <option value="Female" class="others">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <label for="status2">Status:<i class="req">*</i></label>
                        <select class="form-select" name="status2" id="status2" required>
                            <option value="'.$studInfo["civil_status"].'">'.$studInfo["civil_status"].'</option>
                            <option value="Single" class="others">Single</option>
                            <option value="Married" class="others">Married</option>
                            <option value="Widowed" class="others">Widowed</option>
                            <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="admit2">Classification:<i class="req">*</i></label>
                        <select class="form-select" name="admit2" id="admit2" required >
                            <option value="'.$studInfo["admit_type"].'">'.$studInfo["admit_type"].'</option>
                            <option value="Freshman" class="others">New Student</option>
                            <option value="Transferee" class="others">Transferee</option>
                        </select>  
                    </div>
                </div>
                <div id=married2 style="display: none">
                    <div class="row mb-3">
                        <div class="col-md-3 col-sm-6">
                            <label for="spouse_name2">Spouse:<i class="req">*</i></label>
                            <input type="text" name="spouse_name2" id=spouse_name2 value="'.$studInfo["spouse_name"].'" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="spouse_add2">Address:<i class="req">*</i></label>
                            <input type="text" name="spouse_add2" id=spouse_add2 value="'.$studInfo["spouse_add"].'" placeholder="Address" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="spouse_contact2">Contact No:<i class="req">*</i></label>
                            <input type="tel" name="spouse_contact2" id="spouse_phone2" value="'.$studInfo["spouse_no"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="spouse_work2">Occupation:<i class="req">*</i></label>
                            <input type="text" name="spouse_work2" value="'.$studInfo["spouse_work"].'" id=spouse_work2 placeholder="Occupation" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="spouse_emp2">Employers Name:<i class="req">*</i></label>
                            <input type="text" name="spouse_emp2" id=spouse_emp2 value="'.$studInfo["spouse_emp"].'" placeholder="Employer" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="email2">Email Address:<i class="req">*</i></label>
                        <input type="email" name="email2" id=email2 value="'.$studInfo["stud_email"].'" placeholder="example@domain.com" class="form-control" required>
                        <div class="text-danger" id="feedbackEmail">
        
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="stud_phone2">Mobile No:<i class="req">*</i></label>
                        <input type="tel" name="phone2" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id="stud_phone2" value="'.$studInfo["contactno"].'" placeholder="09XXxxxxxxx" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="1stprio2">1st Priority Course:<i class="req">*</i></label>
                        <select class="form-select" name="1stprio2" id="1stprio2"  required>
                            <option value="'.$studInfo["1stprio"].'">'.$studInfo["1stprio"].'</option>
                            <option value="BSCS" class="others">Bachelor of Science in Computer Science</option>
                            <option value="BSIT" class="others">Bachelor of Science in Information Technology</option>
                            <option value="BSA" class="others">Bachelor of Science in Accountancy</option>
                            <option value="BSAIS" class="others">Bachelor of Science in Accounting Information System</option>
                            <option value="BEED" class="others">Bachelor of Elementary Education</option>
                            <option value="BSEE" class="others">Bachelor of Secondary Education Major in English Language Education</option>
                            <option value="BSEM" class="others">Bachelor of Secondary Education Major in Mathematics Education</option>
                            <option value="BSES" class="others">Bachelor of Secondary Education Major in Science Education</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="2ndprio2">2nd Priority Course:<i class="req">*</i></label> <br>
                        <select class="form-select" name="2ndprio2" id="2ndprio2"  required>
                            <option value="'.$studInfo["2ndprio"].'">'.$studInfo["2ndprio"].'</option>
                            <option value="BSCS" class="others">Bachelor of Science in Computer Science</option>
                            <option value="BSIT" class="others">Bachelor of Science in Information Technology</option>
                            <option value="BSA" class="others">Bachelor of Science in Accountancy</option>
                            <option value="BSAIS" class="others">Bachelor of Science in Accounting Information System</option>
                            <option value="BEED" class="others">Bachelor of Elementary Education</option>
                            <option value="BSEE" class="others">Bachelor of Secondary Education Major in English Language Education</option>
                            <option value="BSEM" class="others">Bachelor of Secondary Education Major in Mathematics Education</option>
                            <option value="BSES" class="others">Bachelor of Secondary Education Major in Science Education</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                        <label for="calambares2">Calamba Resident:<i class="req">*</i></label><br>
                        <select class="form-select" name="calambares2" id="calambares2" required>
                            <option value="'.$studInfo["resident_of_calamba"].'">'.$studInfo["resident_of_calamba"].'</option>
                            <option value="Yes" class="others">Yes</option>
                            <option value="No" class="others">No</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-6">
                        <label for="yrs_calamba2" id="yrs_calamba1">Years:</label>
                        <input type="hidden" name="yrs_calamba2" value="0">
                        <input type="number" name="yrs_calamba2" min=0 max=40 value="'.$studInfo["yrs_in_calamba"].'" class="form-control yrs_calamba2" value="" placeholder="Years" id="yrs_calamba2" disabled>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="pre_houseno2">Present Address:<i class="req">*</i></label>
                        <input type="text" name="pre_houseno2" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village" id="pre_houseno2" value="'.$studInfo["pre_house"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="pre_brgy2">Barangay:<i class="req">*</i></label>
                        <input type="text" name="pre_brgy2" style="display:block" class="form-control" placeholder="Barangay" id="pre_brgy2" value="'.$studInfo["pre_brgy"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="pre_city2">City:<i class="req">*</i></label>
                        <input type="text" name="pre_city2" class="form-control" placeholder="City" id="pre_city2" value="'.$studInfo["pre_city"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="pre_zip2">Zip Code:<i class="req">*</i></label>
                        <input type="text" name="pre_zip2" onpaste="return false;" onkeypress="return onlyNumberKey(event)" pattern="\d*" maxlength="4" minlength="4" class="form-control" placeholder="Postal Code" id="pre_zip2" value="'.$studInfo["pre_zipcode"].'" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <label for="per_houseno2">Permanent Address:<i class="req">*</i></label>&nbsp;
                        <input type="text" name="per_houseno2" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village" id="per_houseno2" value="'.$studInfo["per_house"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="per_brgy2">Barangay:<i class="req">*</i></label>
                        <input type="text" name="per_brgy2" class="form-control" placeholder="Barangay" id="per_brgy2" value="'.$studInfo["per_brgy"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="per_city2">City:<i class="req">*</i></label>
                        <input type="text" name="per_city2" class="form-control" placeholder="City" id="per_city2" value="'.$studInfo["per_city"].'" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="per_zip2">Zip Code:<i class="req">*</i></label>
                        <input type="text" name="per_zip2" onpaste="return false;" onkeypress="return onlyNumberKey(event)" pattern="\d*" maxlength="4" minlength="4" class="form-control" placeholder="Postal Code" id="per_zip2" value="'.$studInfo["per_zipcode"].'" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <label for="">Please select the group you belong to:</label><br><br>
                            <div class="col-md-6">
                                <input type="hidden" name="group2" value="N/A">
                                <input type="checkbox" class="non form-check-input" name="group2[]" value="N/A" id="none1" onclick="none()">
                                <small>None</small><br>
                                <input type="checkbox" class="form-check-input" name="group2[]" value="Recipient of Student Financial Assistance" onclick="uncheck()" id="stuFap1">
                                <small>Recipient of Student Financial Assistance</small><br>
                                <input type="checkbox" class="form-check-input" name="group2[]" value="Person from Disadvantaged Group" onclick="uncheck()" id="disadvantagedGroup1">
                                <small>Person from Disadvantaged Group</small><br>
                                <input type="checkbox" class="form-check-input" name="group2[]" value="Person from Depressed or Conflicted-Areas" onclick="uncheck()" id="depressed1">
                                <small>Person from Depressed or Conflicted Areas</small><br>
                                </div>
                                <div class="col-md-6">
                                <input type="checkbox" class="form-check-input" name="group2[]" value="Member of Indigenous People" onclick="uncheck()" id="indigenous1">
                                <small>Member of Indigenous People</small><br>
                                <input type="checkbox" class="form-check-input" name="group2[]" value="Person with Disability" onclick="uncheck()" id="pwd1">
                                <small>Person with Disability (PWD)</small><br>
                                <input type="checkbox" class="form-check-input" name="group2[]" value="Recipient of 4Ps" onclick="uncheck()" id="4ps1">
                                <small>Recipient of 4Ps</small><br>
                                <input type="checkbox" class="form-check-input" name="group2[]" value="Working Student" onclick="uncheck()" id="workingstud1">
                                <small>Working Student</small><br> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 p-3">
                        <p style="text-indent: 50px">Student have a stable internet connection and the resources to attend online classes (in case of blended learning) for 1st Semester of F.Y. 2021-2022:</p>
                            <input type="hidden" name="stablenet2" value="N/A">
                            <select class="form-select" name="stablenet2" id="stablenet2" req>
                                <option value="'.$studInfo["stable_internet"].'" selected>'.$studInfo["stable_internet"].'</option>
                                <option value="Yes" class="others">Yes</option>
                                <option value="No" class="others">No</option>
                            </select>
                    </div>
                </div>
                <hr>
                <h4 class="mt-3 mb-3">Educational Background</h4>
                <div class="form-group">
                    <div class="row mb-3">
                        <div class="col-md-3 col-sm-12">
                            <label for="elem_name2"><b>Elementary School:<i class="req">*</i></b></label>
                            <input type="text" name="elem_name2" id=elem_name2 value="'.$educBG["elem_name"].'" placeholder="School Name" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="elem_address2">Address:<i class="req">*</i></label>
                            <input type="text" name="elem_address2" id=elem_address2 value="'.$educBG["elem_address"].'" placeholder="School Address" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="dgrad_elem2">Date Graduated:<i class="req">*</i></label>
                            <input type="date" name="dgrad_elem2" id=dgrad_elem2 value="'.$educBG["elem_grad"].'" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="elem_honor2">Honors/Awards:</label>
                            <input type="text" name="elem_honors2" id=elem_honor2 value="'.$educBG["elem_honors"].'" placeholder="Honors/Awards" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 col-sm-12">
                            <label for="jhs_name2"><b>Junior High School:<i class="req">*</i></b></label>
                            <input type="text" name="jhs_name2" id=jhs_name2 value="'.$educBG["jhs_name"].'" placeholder="School Name" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="jhs_address2">Address:<i class="req">*</i></label>
                            <input type="text" name="jhs_address2" id=jhs_address2 value="'.$educBG["jhs_address"].'" placeholder="School Address" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for=jhs_dgrad2>Date of Completion:<i class="req">*</i></label>
                            <input type="date" name="jhs_dgrad2" id=jhs_dgrad2 value="'.$educBG["jhs_grad"].'" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="jhs_honors2">Honors/Awards:</label>
                            <input type="text" name="jhs_honors2" id=jhs_honors2 value="'.$educBG["jhs_honors"].'" placeholder="Honors/Awards" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="shs2">
                    <div class="row mb-3">
                        <div class="col-md-3 col-sm-12">
                            <label for="shs_name2"><b>Senior High School:<i class="req">*</i></b></label>
                            <input type="text" name="shs_name2" id=shs_name2 value="'.$educBG["shs_name"].'" placeholder="School Name" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="shs_address2">Address:<i class="req">*</i></label>
                            <input type="text" name="shs_address2" id=shs_address2 value="'.$educBG["shs_address"].'" placeholder="Address" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>SHS Tracks:<i class="req">*</i></label>
                          
                            <select class="form-select" name="shs_tracks2" id="shs_tracks2">
                                <option value="'.$educBG["shs_tracks"].'">'.$educBG["shs_tracks"].'</option>
                                <option value="Academics" class="others" id="acad">Academics</option>
                                <option value="Technical-Vocational-Livelihood" id="tvl" class="others" >Technical-Vocational-Livelihood</option>
                                <option value="Sports" class="others" id=sports>Sports</option>
                                <option value="Arts and Design" class="others" id=arts>Arts and Design</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="shs_strands2">Strands:</label>
                            <input type="hidden" name="shs_strands2" value="N/A">
                            <select class="form-select" name="shs_strands2" id="shs_strands2" disabled>
                                <option id="shs_selected" value="'.$educBG["shs_strands"].'" >'.$educBG["shs_strands"].'</option>
                                <optgroup id=acads2 label="Academics Strands:">
                                    <option value="HUMMS" class="others">HUMMS</option>
                                    <option value="GAS" class="others">GAS</option>
                                    <option value="STEM" class="others">STEM</option>
                                    <option value="ABM" class="others">ABM</option>
                                </optgroup>
                                <optgroup id=techvoc2 label="TVL Strands:">
                                    <option value="Agri-Fishery Arts" class="others">Agri-Fishery Arts</option>
                                    <option value="Home Economics" class="others">Home Economics</option>
                                    <option value="Industrial Arts" class="others">Industrial Arts</option>
                                    <option value="ICT" class="others">ICT</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for=shs_dgrad2>Date Graduated:<i class="req">*</i></label>
                            <input type="date" name="shs_dgrad2" id=shs_dgrad2 value="'.$educBG["shs_grad"].'" class="form-control" req>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="shs_honors2">Honors/Awards:</label>
                            <input type="text" name="shs_honors2" id=shs_honors2 value="'.$educBG["shs_honors"].'" placeholder="Honors/Awards" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="g11_gwa2">Grade 11 GWA:<i class="req">*</i></label>
                            <input type="number" name="g11_gwa2" id=g11_gwa2 value="'.$educBG["g11gwa"].'" max="100" min="80" maxlength="5" step=".01" placeholder="Grade 11 GWA" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="g12_gwa2">Grade 12 GWA:<i class="req">*</i></label>
                            <input type="number" name="g12_gwa2" id=g12_gwa2 value="'.$educBG["g12gwa"].'" max="100" min="80" step=".01" placeholder="Grade 12 GWA" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="college2">
                    <div class="row mb-3">
                        <div class="col-md-3 col-sm-12">
                            <label for="college_name2"><b>College/University:<i class="req">*</i></b></label>
                            <input type="text" name="college_name2" id=college_name2 value="'.$educBG["college_name"].'" placeholder="School Name" class="form-control" >
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="college_address2">Address:<i class="req">*</i></label>
                            <input type="text" name="college_address2" id=college_address2 value="'.$educBG["college_address"].'" placeholder="School Address" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="college_course2">Course:<i class="req">*</i></label>
                            <input type="text" name="college_course2" id=college_course2 value="'.$educBG["college_course"].'" placeholder="Course Taken" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="college_gwa2">Average:<i class="req">*</i></label>
                            <input type="number" name="college_gwa2" max="100" min="80" step=".01" value="'.$educBG["college_gwa"].'" id=college_gwa2 placeholder="GWA" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <label for="tvc_name2"><b>Technical/Vocational Course:</b></label>
                        <input type="text" name="tvc_name2" id=tvc_name2 value="'.$educBG["tvc_name"].'" placeholder="School Name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="tvc_address2">Address</label>
                        <input type="text" name="tvc_address2" id=tvc_address2 value="'.$educBG["tvc_address"].'" placeholder="Address" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for=tvc_dgrad2>Date of Completion:</label>
                        <input type="date" name="tvc_dgrad2" id=tvc_dgrad2 value="'.$educBG["tvc_grad"].'" class="form-control" req>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="tvc_course2">Course:</label>
                        <input type="text" name="tvc_course2" id=tvc_course2 value="'.$educBG["tvc_course"].'" placeholder="Course Taken" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <label for="als_name2"><b>Alternative Learning System (ALS):</b></label>
                        <input type="text" name="als_name2" id=als_name2 value="'.$educBG["als_name"].'" placeholder="School Name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="als_address2">Address</label>
                        <input type="text" name="als_address2" id=als_address2 value="'.$educBG["als_address"].'" placeholder="Address" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="als_cert">ALS Certification: 
                            <a href="../requirements/AlsCertificates/'.$educBG["als_cert"].'" target="_blank">
                                <small style="display: '.$display.'"><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current ALS Certification
                                </small>
                            </a>  
                        </label>
                        <input type="file" value="'.$educBG["als_cert"].'" name="als_cert2" id="als_cert2" placeholder="" class="form-control">
                        <small class="text-danger" id="alscerterror2"></small>
                    </div>
                </div>
                <hr>
                <h4 class="mt-3 mb-3">Family Background</h4>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-8">
                            <label for="father_name2"><b>Father:<i class="req">*</i></b></label>
                            <input type="text" name="father_name2" id=father_name2 value="'.$famBG["father_name"].'" placeholder="Full name" class="form-control" required>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="father_citizen2">Citizenship:<i class="req">*</i></label>
                            <input type="text" name="father_citizen2" id=father_citizen2 value="'.$famBG["father_citizenship"].'" placeholder="Citizenship" class="form-control" required>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="father_add2">Present Address:<i class="req">*</i></label>
                            <input type="text" name="father_add2" id=father_add2 value="'.$famBG["father_address"].'" placeholder="Present Address" class="form-control" required>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <label for="father_contact2">Contact No:<i class="req">*</i></label>
                            <input type="tel" name="father_contact2" id=father_contact2 value="'.$famBG["father_contactno"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11"  placeholder="09XXxxxxxxx" class="form-control" required>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <label for="father_email2">Email:<i class="req">*</i></label>
                            <input type="email" name="father_email2" min=0 id=father_email2 value="'.$famBG["father_email"].'" placeholder="Email" class="form-control"required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                    <label for="father_work2">Occupation:<i class="req">*</i></label>
                        <select class="form-select" name="father_work2" id="father_work2" required>
                            <option value="'.$famBG["father_work"].'">'.$famBG["father_work"].'</option>
                            <option value="Government Employee" class="others">Government Employee</option>
                            <option value="Private Employee" class="others">Private Employee</option>
                            <option value="Self-Employed" class="others">Self-Employed</option>
                            <option value="Unemployed" class="others">Unemployed</option>
                            <option value="Deceased" class="others">Deceased</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <label for="father_emp2">Employers Name:</label>
                        <input type="text" name="father_emp2" id=father_emp2 value="'.$famBG["father_emp"].'" placeholder="Name of Employer" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="father_emp_add2">Employers Address:</label>
                        <input type="text" name="father_emp_add2"  id=father_emp_add2 value="'.$famBG["father_emp_add"].'" placeholder="Employers Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="father_emp_no2">Employers Phone:</label>
                        <input type="tel" name="father_emp_no2" id=father_emp_no2 value="'.$famBG["father_no"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" placeholder="09XXxxxxxxx" maxlength="11" minlength="11" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                    <label for="father_educ2">Education:<i class="req">*</i></label>
                        <select class="form-select" name="father_educ2" id="father_educ2" required>
                            <option value="'.$famBG["father_educ"].'">'.$famBG["father_educ"].'</option>
                            <option value="Elementary Undergraduate" class="others">Elementary Undergraduate</option>
                            <option value="Elementary Graduate" class="others">Elementary Graduate</option>
                            <option value="High School Undergraduate" class="others">High School Undergraduate</option>
                            <option value="High School Graduate" class="others">High School Graduate</option>
                            <option value="College Undergraduate" class="others">College Undergraduate</option>
                            <option value="College Graduate" class="others">College Graduate</option>
                            <option value="Masteral" class="others">Masteral</option>
                            <option value="Post Graduate Studies" class="others">Post Graduate Studies</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-8">
                        <label for="mother_name2"><b>Mother:<i class="req">*</i></b></label>
                        <input type="text" name="mother_name2" id=mother_name2 value="'.$famBG["mother_name"].'" placeholder="Full name" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="mother_citizen2">Citizenship:<i class="req">*</i></label>
                        <input type="text" name="mother_citizen2" id=mother_citizen2 value="'.$famBG["mother_citizenship"].'" placeholder="Citizenship" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="mother_add2">Present Address:<i class="req">*</i></label>
                        <input type="text" name="mother_add2" id=mother_add2 value="'.$famBG["mother_address"].'" placeholder="Present Address" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_contact2">Contact No:<i class="req">*</i></label>
                        <input type="tel" name="mother_contact2" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=mother_contact2 value="'.$famBG["mother_contactno"].'" placeholder="09XXxxxxxxx" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_email2">Email:<i class="req">*</i></label>
                        <input type="email" name="mother_email2" min=0 id=mother_email2 value="'.$famBG["mother_email"].'" placeholder="Email" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_work2">Occupation:<i class="req">*</i></label>
                        <select class="form-select" name="mother_work2" id="mother_work2" required>
                            <option value="'.$famBG["mother_work"].'">'.$famBG["mother_work"].'</option>
                            <option value="Government Employee" class="others">Government Employee</option>
                            <option value="Private Employee" class="others">Private Employee</option>
                            <option value="Self-Employed" class="others">Self-Employed</option>
                            <option value="Unemployed" class="others">Unemployed</option>
                            <option value="Deceased" class="others">Deceased</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <label for="mother_emp2">Employers Name:</label>
                        <input type="text" name="mother_emp2" id=mother_emp2 value="'.$famBG["mother_emp"].'" placeholder="Name of Employer" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="mother_emp_add2">Employers Address:</label>
                        <input type="text" name="mother_emp_add2" id=mother_emp_add2 value="'.$famBG["mother_emp_add"].'" placeholder="Employers Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_emp_no2">Employers Phone:</label>
                        <input type="tel" name="mother_emp_no2" value="'.$famBG["mother_emp_no"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" id=mother_emp_no2 maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_educ2">Education:<i class="req">*</i></label>
                        <select class="form-select" name="mother_educ2" id="mother_educ2" required>
                            <option value="'.$famBG["mother_educ"].'">'.$famBG["mother_educ"].'</option>
                            <option value="Elementary Undergraduate" class="others">Elementary Undergraduate</option>
                            <option value="Elementary Graduate" class="others">Elementary Graduate</option>
                            <option value="High School Undergraduate" class="others">High School Undergraduate</option>
                            <option value="High School Graduate" class="others">High School Graduate</option>
                            <option value="College Undergraduate" class="others">College Undergraduate</option>
                            <option value="College Graduate" class="others">College Graduate</option>
                            <option value="Masteral" class="others">Masteral</option>
                            <option value="Post Graduate Studies" class="others">Post Graduate Studies</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="guardian_name2"><b>Guardian:</b></label>
                        <input type="text" name="guardian_name2" id=guardian_name2 value="'.$famBG["guardian_name"].'" placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_relation2">Relationship:</label>
                        <input type="text" name="guardian_relation2" id=guardian_relation2 value="'.$famBG["guardian_relationship"].'" placeholder="Relationship" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-8">
                        <label for="guardian_add2">Address:</label>
                        <input type="text" name="guardian_add2" id=guardian_add2 value="'.$famBG["guardian_address"].'" placeholder="Present Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="guardian_contact2">Contact No:</label>
                        <input type="tel" name="guardian_contact2" id=guardian_contact2 value="'.$famBG["guardian_contactno"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_email2">Email:</label>
                        <input type="email" name="guardian_email2" min=0 id=guardian_email2 value="'.$famBG["guardian_email"].'" placeholder="Email" class="form-control">
                    </div>
            
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_bday2">Date of Birth</label>
                        <input type="hidden" name="guardian_bday2" value="">
                        <input type="date" name="guardian_bday2" id="guardian_bday2" value="'.$famBG["guardian_bday"].'" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_work2">Occupation:</label>
                        <select class="form-select" name="guardian_work2" id="guardian_work2" req>
                            <option value="'.$famBG["guardian_work"].'">'.$famBG["guardian_work"].'</option>
                            <option value="Government Employee" class="others">Government Employee</option>
                            <option value="Private Employee" class="others">Private Employee</option>
                            <option value="Self-Employed" class="others">Self-Employed</option>
                            <option value="Unemployed" class="others">Unemployed</option>
                            <option value="Deceased" class="others">Deceased</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <label for="guardian_emp2">Employers Name:</label>
                        <input type="text" name="guardian_emp2" id=guardian_emp2 value="'.$famBG["guardian_emp"].'" placeholder="Name of Employer" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-8">
                        <label for="guardian_emp_add2">Employers Address:</label>
                        <input type="text" name="guardian_emp_add2" id=guardian_emp_add2 value="'.$famBG["guardian_emp_address"].'" placeholder="Employers Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="guardian_emp_no2">Employers No:</label>
                        <input type="tel" name="guardian_emp_no2" value="'.$famBG["guardian_emp_no"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onkeypress="return onlyNumberKey(event)" id=guardian_emp_no2 placeholder="09XXxxxxxxx"  maxlength="11" minlength="11" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="sibling12">Siblings:</label>
                        <input type="text" name="sibling12" id=sibling12 value="'.$famBG["sibling_name1"].'" placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="sibling_age12">Age:</label>
                        <input type="number" name="sibling_age12" value="'.$famBG["sibling_age1"].'" max=40 min="0" id=sibling_age12 placeholder="Age" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_status12">Status:</label>
                        <select class="form-select" name="sibling_status12" id="sibling_status12" req>
                        <option value="'.$famBG["sibling_status1"].'" >'.$famBG["sibling_status1"].'</option>
                        <option value="Single" class="others">Single</option>
                        <option value="Married" class="others">Married</option>
                        <option value="Widowed" class="others">Widowed</option>
                        <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="sibling_contact12">Contact No:</label>
                        <input type="tel" name="sibling_contact12" value="'.$famBG["sibling_contact1"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact12 placeholder="09XXxxxxxxx" class="form-control">
                    </div> 
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling22">Siblings:</label>
                        <input type="text" name="sibling22" id=sibling22 value="'.$famBG["sibling_name2"].'" placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_age22">Age:</label>
                        <input type="number" name="sibling_age22" max=40 min="0" id=sibling_age22 value="'.$famBG["sibling_age2"].'" placeholder="Age" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_status22">Status:</label>
                        <select class="form-select" name="sibling_status22" id="sibling_status22" req>
                            <option value="'.$famBG["sibling_status2"].'">'.$famBG["sibling_status2"].'</option>
                            <option value="Single" class="others">Single</option>
                            <option value="Married" class="others">Married</option>
                            <option value="Widowed" class="others">Widowed</option>
                            <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_contact22">Contact No:</label>
                        <input type="tel" name="sibling_contact22" value="'.$famBG["sibling_contact2"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact22 placeholder="09XXxxxxxxx" class="form-control">
                    </div> 
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling32">Siblings:</label>
                        <input type="text" name="sibling32" id=sibling32 value="'.$famBG["sibling_name3"].'" placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_age32">Age:</label>
                        <input type="number" name="sibling_age32" max=40 min="0" id=sibling_age32 value="'.$famBG["sibling_age3"].'" placeholder="Age" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_status32">Status:</label>
                        <select class="form-select" name="sibling_status32" id="sibling_status32" req>
                            <option value="'.$famBG["sibling_status3"].'">'.$famBG["sibling_status3"].'</option>
                            <option value="Single" class="others">Single</option>
                            <option value="Married" class="others">Married</option>
                            <option value="Widowed" class="others">Widowed</option>
                            <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_contact32">Contact No:</label>
                        <input type="tel" name="sibling_contact32" value="'.$famBG["sibling_contact3"].'" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact32  placeholder="09XXxxxxxxx" class="form-control">
                    </div> 
                </div>
                <div class="col-md-12">
                    <center>
                    <label for="income2">Socio Economic Status of Family:<i class="req">*</i></label>
                        <select class="form-select" name="income2" id="income2" style="max-width: 50%;" required>
                            <option value="'.$famBG["income_fam"].'">'.$famBG["income_fam"].'</option>
                            <option value="Below P10, 481" class="others">Below P10, 481</option>
                            <option value="P10, 481.00-P20, 962.00" class="others">P10, 481.00-P20, 962.00</option>
                            <option value="P41, 924.00-P73, 367.00" class="others">P41, 924.00-P73, 367.00</option>
                            <option value="P73, 367.00-P125, 772.00" class="others">P73, 367.00-P125, 772.00</option>
                            <option value="P125,772.00-P209,620.00" class="others">P125, 772.00-P209, 620.00</option>
                            <option value="P209, 620.00 and above" class="others">P209, 620.00 and above</option>
                        </select>
                    </center>
                </div>
                <hr>
                <h4 class="mt-3 mb-3">Organizational Involvement</h4>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="org_name12"><b>Organization 1:</b></label>
                        <input type="text" name="org_name12" id=org_name12 value="'.$org_involve["org1"].'" placeholder="Name of Organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="position12">Position:</label>
                        <input type="text" name="position12" id=position12 value="'.$org_involve["pos1"].'"  placeholder="Position in organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="nature12">Nature:</label>
                        <input type="text" name="nature12" id=nature12 value="'.$org_involve["nature1"].'" placeholder="Nature of organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="yrs_org12">Years:</label>
                        <input type="number" name="yrs_org12" value="'.$org_involve["yrs1"].'" max=20 min=0 id=yrs_org12 placeholder="Years in joining the organization" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="org_name22"><b>Organization 2:</b></label>
                        <input type="text" name="org_name22" id=org_name22 value="'.$org_involve["org2"].'" placeholder="Name of Organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="position22">Position:</label>
                        <input type="text" name="position22" id=position22 value="'.$org_involve["pos2"].'" placeholder="Position in organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="nature22">Nature:</label>
                        <input type="text" name="nature22" id=nature22 value="'.$org_involve["nature2"].'" placeholder="Nature of organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="yrs_org22">Years:</label>
                        <input type="number" name="yrs_org22" value="'.$org_involve["yrs2"].'" max=20 min=0 id=yrs_org22 placeholder="Years in joining the organization" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="org_name32"><b>Organization 3:</b></label>
                        <input type="text" name="org_name32" id=org_name32 value="'.$org_involve["org3"].'" placeholder="Name of Organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="position32">Position:</label>
                        <input type="text" name="position32" id=position32 value="'.$org_involve["pos3"].'" placeholder="Position in organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="nature32">Nature:</label>
                        <input type="text" name="nature32" id=nature32 value="'.$org_involve["nature3"].'" placeholder="Nature of organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="yrs_org32">Years:</label>
                        <input type="number" name="yrs_org32" value="'.$org_involve["yrs3"].'" max=20 min=0 id=yrs_org32 placeholder="Years in joining the organization" class="form-control">
                    </div>
                </div>
                <hr>
                <h4 class="mt-3 mb-3">Personal Admiration</h4>
                <div class="row mb-3">
                    <div class="col-md-12 col-sm-12">
                        <label for="hobbies2"><b>Hobbies and Interests:<i class="req">*</i></b></label> <br>
                        <textarea name="hobbies2" id="hobbies2" value="'.$personalAdmire["hobbies"].'" placeholder="List down your hobbies & interests?" class="form-control forms" required>'.$personalAdmire["hobbies"].'</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="reason4enroll2"><b>Reasons for enrolling:<i class="req">*</i></b></label> <br>
                        <textarea name="reason4enroll2" id="reason4enroll2" value="'.$personalAdmire["reason_enroll"].'" placeholder="What are your reasons for enrolling City College of Calamba?" class="form-control forms" required>'.$personalAdmire["reason_enroll"].'</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="characteristics2"><b>Describe yourself:<i class="req">*</i></b></label> <br>
                        <textarea name="characteristics2" id="characteristics2" value="'.$personalAdmire["characteristics"].'" placeholder="Physical & Inner Characteristics" class="form-control forms" required>'.$personalAdmire["characteristics"].'</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="dream2"><b>Envision yourself 10 years from now:<i class="req">*</i></b></label> <br>
                        <textarea name="dream2" id="dream2" value="'.$personalAdmire["goals"].'" placeholder="What are your dreams and goals" class="form-control forms" required>'.$personalAdmire["goals"].'</textarea>
                    </div>
                </div> 
                <hr>
                <h4 class="mt-3 mb-3">Requirements</h4>
                <div id="reportcard2">
                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="g11cardfile2"><b>Grade 11 Report Card:</b><i class="req">*</i>
                                <a href="../requirements/Grade11Cards/'.$req["g12card"].'" target="_blank">
                                    <small style="display: '.$g11Dis.'"><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current G11 Report Card
                                    </small>
                                </a>  
                            </label>
                            <input type="file" name="g11card2" id="g11cardfile2" class="inputfile form-control" accept=".pdf, .png, .jpg">
                            <small class="text-danger" id="g11error2"></small>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="g12cardfile2"><b>Grade 12 Report Card:</b><i class="req">*</i>
                                <a href="../requirements/Grade12Cards/'.$req["g12card"].'" target="_blank">
                                    <small style="display: '.$g12Dis.'"><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current G12 Report Card
                                    </small>
                                </a>  
                            </label>
                            <input type="file" name="g12card2" id="g12cardfile2" class="inputfile form-control" accept=".pdf, .png, .jpg">
                            <small class="text-danger" id="g12error2"></small>
                        </div>   
                    </div> 
                </div> 
                <div id="transcript">
                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="torpg12"><b>Transcript of Records (Page 1):</b><i class="req">*</i>
                                <a href="../requirements/TOR_Page1/'.$req["torpg1"].'" target="_blank">
                                    <small style="display: '.$torpg1Dis.'"><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current ToR 1 Card
                                    </small>
                                </a>  
                            </label>
                            <input type="file" name="torpg12" id="torpg12" class="inputfile form-control" accept=".pdf, .png, .jpg">
                            <small class="text-danger" id="torpg1error2"></small>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="torpg22"><b>Transcript of Records (Page 2):</b><i class="req">*</i>
                                <a href="../requirements/TOR_Page2/'.$req["torpg2"].'" target="_blank">
                                    <small style="display: '.$torpg2Dis.'"><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current ToR 2 Card
                                    </small>
                                </a>  
                            </label>
                            <input type="file" name="torpg22" id="torpg22" class="inputfile form-control" accept=".pdf, .png, .jpg">
                            <small class="text-danger" id="torpg2error2"></small>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <label for="goodmoral"><b>Good Moral Certification:</b><i class="req">*</i>
                            <a href="../requirements/Good Morals/'.$req["goodmoral"].'" target="_blank">
                                <small><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current Good Moral File
                                </small>
                            </a>  
                        </label><br>
                        <input type="file" name="goodmoral2" id="goodmoral2" class="inputfile form-control" accept=".pdf, .png, .jpg">
                        <small class="text-danger" id="goodmoralerror2"></small>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="birthcert"><b>Birth Certificate:</b><i class="req">*</i>
                            <a href="../requirements/BirthCertificates/'.$req["birthcert"].'" target="_blank">
                                <small><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current Birth Certicate
                                </small>
                            </a>  
                        </label><br>
                        <input type="file" name="birthcert2" id="birthcert2" class="inputfile form-control" accept=".pdf, .png, .jpg">
                        <small class="text-danger" id="birthcerterror2"></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <label for="indigency"><b>Certificate of Residency:</b><i class="req">*</i>
                            <a href="../requirements/Indigency/'.$req["indigency"].'" target="_blank">
                                <small><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current Certificate of Residency
                                </small>
                            </a>  
                        </label><br>
                        <input type="file" name="indigency2" id="indigency2" class="inputfile form-control" accept=".pdf, .png, .jpg">
                        <small class="text-danger" id="indigencyerror2"></small>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <label for="votecert"><b>Voters Certification of Student/Parent/Guardian:</b><i class="req">*</i>
                            <a href="../requirements/Voter_Certificates/'.$req["voters"].'" target="_blank">
                                <small"><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current Voters Certificate
                                </small>
                            </a>  
                        </label><br>
                        <input type="file" name="votercert2" id="votecert2" class="inputfile form-control" accept=".pdf, .png, .jpg">
                        <small class="text-danger" id="votecerterror2"></small>
                    </div>
                </div>
                <div class="text-center row mb-3">
                    <div class=" col-md-12 col-sm-12 mb-3">
                        <label for="vaxcard"><b>Copy of Vaccination Card:</b>
                            <a href="../requirements/VaccinationCards/'.$req["vaxcard"].'" target="_blank">
                                <small style="display: '.$display2.'"><i class="bx bx-paperclip bx-rotate-270" style="font-size: 15px"></i>Current Vaccination Card
                                </small>
                            </a> 
                        </label><br>
                        <input type="file" name="vaxcard2" id="vaxcard2" class="inputfile form-control" accept=".pdf, .png, .jpg">
                        <small class="text-danger" id="vaxcarderror2"></small>
                    </div>
                </div>
        </div>
    </div>
    <center>
        <button type="button" id="btn-editStud" data-id="'.$studInfo['student_id'].'" name="btn-editStud" class="btn btn-primary mt-5">Save Details</button>
    </center>
</form>

';

?>
<script>

(function () {
        'use strict'
        var forms = document.querySelectorAll('#editStudentForm')
        Array.prototype.slice.call(forms)
                .forEach(function (form) {

                  $('#btn-editStud').click(function(event){
        
                      if (!form.checkValidity()) {
                          event.preventDefault()
                          event.stopPropagation()
                          imgFormat();
                          alsFormat2();
                          g11Format();
                          g12Format();
                          torpg1Format();
                          torpg2Format();
                          goodmoralFormat();
                          birthcertFormat();
                          indigencyFormat2();
                          votecertFormat2();
                          vaxcardFormat2();

                      }else{
                            if(imgFormat()){
  
                            }else if(alsFormat2()){

                            }else if(g11Format()){

                            }else if(g12Format()){

                            }else if(torpg1Format()){

                            }else if(torpg2Format()){

                            }else if(goodmoralFormat()){

                            }else if(birthcertFormat()){

                            }else if(indigencyFormat2()){

                            }else if(votecertFormat2()){

                            }else if(vaxcardFormat2()){

                            }else{
                        	    $('#btn-editStud').prop('type', 'submit');	
                            }
                        // $('#btn-editStud').prop('type', 'submit');	
                        }
        
                      form.classList.add('was-validated')
                      })
                })
})()

function alsFormat2(){
    if($('#als_cert2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#als_cert2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'ALS Certificate must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(alscertfile2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#alscerterror2').html('');
        return false;
    }
}
function alscertfile2(){
    var alscert = $('#als_cert2')[0].files[0].size;
    if(alscert>5000000){
        $('#alscerterror2').html('File is greater than 5MB');
        return true;
    }else{
        $('#alscerterror2').html('');
        return false;
    }
}
function vaxcardFormat2(){
    if($('#vaxcard2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#vaxcard2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'Vaccination Card must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(vaxcardfile2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#vaxcarderror2').html('');
        return false;
    }
}
function vaxcardfile2(){
    var votecert = $('#vaxcard2')[0].files[0].size;
    if(votecert>5000000){
        $('#vaxcarderror2').html('File is greater than 5MB');
        return true;
    }else{
        $('#vaxcarderror2').html('');
        return false;
    }
}
function g11Format(){
    if($('#g11cardfile2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#g11cardfile2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'G11 Card must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(g11cardfileRestriction2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#g11error2').html('');
        return false;
    }
}
function g11cardfileRestriction2(){
    var g11cardfile = $('#g11cardfile2')[0].files[0].size;
    if(g11cardfile>5000000){
        $('#g11error2').html('File is greater than 5MB');
        return true;
    }else{
        $('#g11error2').html('');
        return false;
    }
}

function g12Format(){
    if($('#g12cardfile2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#g12cardfile2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'G12 Card must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(g12cardfileRestriction2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#g12error2').html('');
        return false;
    }
}
function g12cardfileRestriction2(){
    var g12cardfile = $('#g12cardfile2')[0].files[0].size;
    if(g12cardfile>5000000){
        $('#g12error2').html('File is greater than 5MB');
        return true;
    }else{
        $('#g12error2').html('');
        return false;
    }
}

function torpg1Format(){
    if($('#torpg12').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#torpg12').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'Transcript of Record 1 must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(torpg1file2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#torpg1error2').html('');
        return false;
    }
}
function torpg1file2(){
    var torpg1 = $('#torpg12')[0].files[0].size;
    if(torpg1>5000000){
        $('#torpg1error2').html('File is greater than 5MB');
        return true;
    }else{
        $('#torpg1error2').html('');
        return false;
    }
}

function torpg2Format(){
    if($('#torpg22').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#torpg22').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'Transcript of Record 2 must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(torpg2file2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#torpg2error2').html('');
        return false;
    }
}
function torpg2file2(){
    var torpg2 = $('#torpg22')[0].files[0].size;
    if(torpg2>5000000){
        $('#torpg2error2').html('File is greater than 5MB');
        return true;
    }else{
        $('#torpg2error2').html('');
        return false;
    }
}

function goodmoralFormat(){
    if($('#goodmoral2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#goodmoral2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'Good Moral must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(goodmoralfile2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#goodmoralerror2').html('');
        return false;
    }
}
function goodmoralfile2(){
    var goodmoral = $('#goodmoral2')[0].files[0].size;
    if(goodmoral>5000000){
        $('#goodmoralerror2').html('File is greater than 5MB');
        return true;
    }else{
        $('#goodmoralerror2').html('');
        return false;
    }
}
function birthcertFormat(){
    if($('#birthcert2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#birthcert2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'Birth Certificate must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(birthcertfile2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#birthcerterror2').html('');
        return false;
    }
}
function birthcertfile2(){
    var birthcert = $('#birthcert2')[0].files[0].size;
    if( birthcert>5000000){
        $('#birthcerterror2').html('File is greater than 5MB');
        return true;
    }else{
        $('#birthcerterror2').html('');
        return false;
    }
}

function indigencyFormat2(){
    if($('#indigency2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#indigency2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'Certificate of Residency must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(indigencyfile2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#indigencyerror2').html('');
        return false;
    }
}
function indigencyfile2(){
    var indigency = $('#indigency2')[0].files[0].size;
    if(indigency>5000000){
        $('#indigencyerror2').html('File is greater than 5MB');
        return true;
    }else{
        $('#indigencyerror2').html('');
        return false;
    }
}
function votecertFormat2(){
    if($('#votecert2').val()!=""){
        var ext = ['jpg', 'pdf', 'png', ''];
        if(($.inArray($('#votecert2').val().split('.').pop().toLowerCase(), ext) == -1)){
            $(function() {
                Swal.fire({
                    title: 'Voters Identification/Certification must be in JPG, PNG and PDF format',
                    text: 'Please upload different file format!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
            });
            return true;
        }else if(votecertfile2()){
            return true;
        }else{
            return false;
        }
    }else{
        $('#votecerterror2').html('');
        return false;
    }
}
function votecertfile2(){
    var votecert = $('#votecert2')[0].files[0].size;
    if(votecert>5000000){
        $('#votecerterror2').html('File is greater than 5MB');
        return true;
    }else{
        $('#votecerterror2').html('');
        return false;
    }
}
resetfileerror2();
function resetfileerror2(){
    $('#g11cardfile2').change(function(){
        if($('#g11error2').html()!=""){
            $('#g11error2').html('');
        }
    })
    $('#g12cardfile2').change(function(){
        if($('#g12error2').html()!=""){
            $('#g12error2').html('');
        }
    })
    $('#torpg12').change(function(){
        if($('#torpg1error2').html()!=""){
            $('#torpg1error2').html('');
        }
    })
    $('#torpg22').change(function(){
        if($('#torpg2error2').html()!=""){
            $('#torpg2error2').html('');
        }
    })
    $('#goodmoral2').change(function(){
        if($('#goodmoralerror2').html()!=""){
            $('#goodmoralerror2').html('');
        }
    })
    $('#birthcert2').change(function(){
        if($('#birthcerterror2').html()!=""){
            $('#birthcerterror2').html('');
        }
    })
    $('#indigency2').change(function(){
        if($('#indigencyerror2').html()!=""){
            $('#indigencyerror2').html('');
        }
    })
    $('#votecert2').change(function(){
        if($('#votecerterror2').html()!=""){
            $('#votecerterror2').html('');
        }
    })
    $('#als_cert2').change(function(){
        if($('#alscerterror2').html()!=""){
            $('#alscerterror2').html('');
        }
    })
    $('#vaxcard2').change(function(){
        if($('#vaxcarderror2').html()!=""){
            $('#vaxcarderror2').html('');
        }
    })
}

if($('#status2').val()=="Married"){
    $('#married2').show();
    $("#spouse_name2").prop('required',true);
	$("#spouse_add2").prop('required',true);
	$("#spouse_phone2").prop('required',true);
	$("#spouse_work2").prop('required',true);
	$("#spouse_emp2").prop('required',true);
}else{
    $('#married2').hide();
}

$('#status2').change(function(){
    if($('#status2').val()=="Married"){
        $('#married2').show();
        $("#spouse_name2").prop('required',true);
		$("#spouse_add2").prop('required',true);
		$("#spouse_phone2").prop('required',true);
		$("#spouse_work2").prop('required',true);
		$("#spouse_emp2").prop('required',true);
    }else{
        $('#married2').hide();
        $('#spouse_name2').val("");
        $('#spouse_add2').val("");
        $('#spouse_phone2').val("");
        $('#spouse_work2').val("");
        $('#spouse_emp2').val("");
        $("#spouse_name2").prop('required',false);
		$("#spouse_add2").prop('required',false);
		$("#spouse_phone2").prop('required',false);
		$("#spouse_work2").prop('required',false);
		$("#spouse_emp2").prop('required',false);
    }
})

if($('#calambares2').val()=="Yes"){
    $('#yrs_calamba2').prop('disabled', false);
    $(".yrs_calamba2").prop('required',true);
}else{
    $('#yrs_calamba2').prop('disabled', true);
    $(".yrs_calamba2").prop('required',false);
}

$('#calambares2').change(function(){
    if($('#calambares2').val()=="Yes"){
        $('#yrs_calamba2').prop('disabled', false);
        $(".yrs_calamba2").prop('required',true);
    }else{
        $('#yrs_calamba2').prop('disabled', true);
        $('#yrs_calamba2').val("0");
        $(".yrs_calamba2").prop('required',false);
    }
})

if($('#admit2').val()=="Transferee"){
    $('#college2').show();
    $("#college_name2").prop('required',true);
	$("#college_address2").prop('required',true);
	$("#college_course2").prop('required',true);
	$("#college_gwa2").prop('required',true);
    $("#transcript").show();
    $("#reportcard2").hide();
}else{
    $('#college2').hide();
    $("#college_name2").prop('required',false);
	$("#college_address2").prop('required',false);
	$("#college_course2").prop('required',false);
	$("#college_gwa2").prop('required',false);
    $("#reportcard2").show();
    $("#transcript").hide();
}

$('#admit2').change(function(){
    $("#college_name2").val("");
    $("#college_address2").val("");
    $("#college_course2").val("");
    $("#college_gwa2").val("");
    $('#torpg12').val("");
    $('#torpg22').val("");
    $('#g11cardfile2').val("");
    $('#g12cardfile2').val("");
    if($('#admit2').val()=="Transferee"){
        $('#college2').show();
        $("#college_name2").prop('required',true);
        $("#college_address2").prop('required',true);
        $("#college_course2").prop('required',true);
        $("#college_gwa2").prop('required',true);
        $("#transcript").show();
        $("#reportcard2").hide();
        $('#g11cardfile2').prop('required', false);
        $('#g12cardfile2').prop('required', false);
        if(("<?php echo $req['torpg1'] ?>"!="")&&("<?php echo $req['torpg2'] ?>"!="")){
            $('#torpg12').prop('required', false);
            $('#torpg22').prop('required', false);
        }else{
            $('#torpg12').prop('required', true);
            $('#torpg22').prop('required', true);
            $('#g11cardfile2').prop('required', false);
            $('#g12cardfile2').prop('required', false);
        }
    }else{
        $('#college2').hide();
        $("#college_name2").prop('required',false);
        $("#college_address2").prop('required',false);
        $("#college_course2").prop('required',false);
        $("#college_gwa2").prop('required',false);
        $("#reportcard2").show();
        $("#transcript").hide();
        $('#torpg12').prop('required', false);
        $('#torpg22').prop('required', false);
        if(("<?php echo $req['g11card'] ?>"!="")&&("<?php echo $req['g12card'] ?>"!="")){
            $('#g11cardfile2').prop('required', false);
            $('#g12cardfile2').prop('required', false);
        }else{
            $('#g11cardfile2').prop('required', true);
            $('#g12cardfile2').prop('required', true);
            $('#torpg12').prop('required', false);
            $('#torpg22').prop('required', false);
        }
    }
})

function none()
	{
		if(document.getElementById("none1").checked==false){
			$(function(){
				$("#none1").prop('required',true);
		 	});
                Swal.fire({
                    title: 'Select a group',
                    text: 'If student is not belong to the group list, Check none.',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 2000,
                    allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                    }
                });
           
		}
		if(document.getElementById("none1").checked){
			document.getElementById("stuFap1").disabled = true;
			document.getElementById("disadvantagedGroup1").disabled = true;
			document.getElementById("depressed1").disabled = true;
			document.getElementById("indigenous1").disabled = true;
			document.getElementById("pwd1").disabled = true;
			document.getElementById("4ps1").disabled = true;
			document.getElementById("workingstud1").disabled = true;
			
			document.getElementById("stuFap1").checked = false;
			document.getElementById("disadvantagedGroup1").checked = false;
			document.getElementById("depressed1").checked = false;
			document.getElementById("indigenous1").checked = false;
			document.getElementById("pwd1").checked = false;
			document.getElementById("4ps1").checked = false;
			document.getElementById("workingstud1").checked = false;
		}
		else{
			document.getElementById("stuFap1").disabled = false;
			document.getElementById("disadvantagedGroup1").disabled = false;
			document.getElementById("depressed1").disabled = false;
			document.getElementById("indigenous1").disabled = false;
			document.getElementById("pwd1").disabled = false;
			document.getElementById("4ps1").disabled = false;
			document.getElementById("workingstud1").disabled = false;	
		}
	}

    function uncheck(){
		if(document.getElementById("none1").checked == true){
			document.getElementById("none1").checked = false;
		}
		if((document.getElementById("stuFap1").checked==true)||(document.getElementById("disadvantagedGroup1").checked==true)||(document.getElementById("depressed1").checked==true)||(document.getElementById("indigenous1").checked==true)||(document.getElementById("pwd1").checked==true)||(document.getElementById("4ps1").checked==true)||(document.getElementById("workingstud1").checked==true)){
			$(function(){
				$("#none1").prop('required',false);
		 	});
		}
		else{
			$(function(){
				$("#none1").prop('required',true);
		 	});
		}
	}

var jhsgrad=$('#jhs_dgrad2').val();

		if(jhsgrad>"2015-12-31"){

			$('#shs_name2').prop('required', true);
			$('#shs_address2').prop('required', true);
			$('#shs_tracks2').prop('required', true);
			$('#shs_strands2').prop('required', true);
			$('#shs_dgrad2').prop('required', true);
			$('#g11_gwa2').prop('required', true);
			$('#g12_gwa2').prop('required', true);

			$('#shs2').show();
		}
		else{

			$('#shs_name2').prop('required', false);
			$('#shs_address2').prop('required', false);
			$('#shs_tracks2').prop('required', false);
            $('#shs_strands2').prop('required', false);
			$('#shs_dgrad2').prop('required', false);
			$('#g11_gwa2').prop('required', false);
			$('#g12_gwa2').prop('required', false);

			$('#shs_name2').val('');
			$('#shs_address2').val('');
			$('#shs_tracks2').val('');
			$('#shs_dgrad2').val('');
			$('#g11_gwa2').val('');
			$('#g12_gwa2').val('');
			$('#shs_honors2').val('');
			$('#shs_strands2').val('');

			$('#shs2').hide();
		}

$('#jhs_dgrad2').change(function(){
    var jhsgrad=$('#jhs_dgrad2').val();

		if(jhsgrad>"2015-12-31"){

			$('#shs_name2').prop('required', true);
			$('#shs_address2').prop('required', true);
			$('#shs_tracks2').prop('required', true);
            $('#shs_strands2').prop('required', true);
			$('#shs_dgrad2').prop('required', true);
			$('#g11_gwa2').prop('required', true);
			$('#g12_gwa2').prop('required', true);

			$('#shs2').show();
		}
		else{

			$('#shs_name2').prop('required', false);
			$('#shs_address2').prop('required', false);
			$('#shs_tracks2').prop('required', false);
            $('#shs_strands2').prop('required', false);
			$('#shs_dgrad2').prop('required', false);
			$('#g11_gwa2').prop('required', false);
			$('#g12_gwa2').prop('required', false);

			$('#shs_name2').val('');
			$('#shs_address2').val('');
			$('#shs_tracks2').val('');
			$('#shs_dgrad2').val('');
			$('#g11_gwa2').val('');
			$('#g12_gwa2').val('');
			$('#shs_honors2').val('');
			$('#shs_strands2').val('');

			$('#shs2').hide();
		}
})

if($('#shs_tracks2').val()=="Academics"){
    $("#shs_strands2").prop('required',true);
    $('#techvoc2').hide();
    $('#acads2').show();
    $('#shs_strands2').prop('disabled', false);
}else if($('#shs_tracks2').val()=="Technical-Vocational-Livelihood"){
    $("#shs_strands2").prop('required',true);
    $('#acads2').hide();
    $('#techvoc2').show();
    $('#shs_strands2').prop('disabled', false);
}else{
    $("#shs_strands2").prop('required', false);
    $('#shs_strands2').prop('disabled', true);
}

$('#shs_tracks2').change(function(){
    $("#shs_strands2").val("");
    $('#shs_selected').prop("selected", true);
    if($('#shs_tracks2').val()=="Academics"){
        $("#shs_selected").prop("disabled", true);
        $('#shs_selected').html("Select strands");
        $('#shs_selected').val("");
        $("#shs_strands2").prop('required',true);
        $('#techvoc2').hide();
        $('#acads2').show();
        $('#shs_strands2').prop('disabled', false);
    }else if($('#shs_tracks2').val()=="Technical-Vocational-Livelihood"){
        $("#shs_selected").prop("disabled", true);
        $('#shs_selected').html("Select strands");
        $('#shs_selected').val("");
        $("#shs_strands2").prop('required',true);
        $('#acads2').hide();
        $('#techvoc2').show();
        $('#shs_strands2').prop('disabled', false);
    }else{
        $('#shs_selected').html("N/A");
        
        $("#shs_strands2").prop('required', false);
        $('#shs_strands2').prop('disabled', true);
    }
})


function imgFormat(){
            var fileExt = ['jpg', 'png'];
            // var imgsize = $('#profileImage')[0].files[0].size;
            if($('#profileImage2').val()==""){
                return false;
            }else{
                if($.inArray($('#profileImage2').val().split('.').pop().toLowerCase(), fileExt) == -1){
                    
                    Swal.fire({
                        title: 'Photo must be in .JPG or .PNG',
                        text: 'Please upload valid image format!',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000,
                        allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                        }
                    });
                    $('#profileImage2').reset();
                    return true;
                }
                else{
                    return false;
                }
            }
        }
</script>