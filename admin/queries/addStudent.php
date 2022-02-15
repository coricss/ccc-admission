<?php 

if(!isset($_SESSION)){
    session_start();
}

include_once("../connect.php");
$con=connect();
use mikehaertl\pdftk\Pdf;

require('../vendor/autoload.php');

  if(isset($_POST["btn-addStud"])){
    $adminID=$_SESSION['ID'];
    $name=$_SESSION['name'];
    date_default_timezone_set('Asia/Manila');
    $year=date("Y");
    
    $stud="SELECT COUNT(`student_id`) AS `count` FROM `student_info` WHERE `application_no` LIKE '%$year%'";
    $stuD=$con->query($stud) or die ($con->error);
    $studs=$stuD->fetch_array();
    $studcount=$studs['count'];

    $val=$studcount+1;
    $studCount=str_pad($val,4,"0",STR_PAD_LEFT);

    $dateNotif=date("Y-m-d h:i:s A");
    $phdate=date('m/d/Y');
    $phtime=date('g:i A');
    $letter1=chr(rand(65,90));
    $letter2=chr(rand(65,80));

    $time=time();
    $default_photo="default_photo.png";
    $ImageName = $time.'_'.$_FILES["profileImage"]['name'];
    $target_file = "../assets/imgs/student2x2/".$ImageName;
    $date=date('F d, Y');
    $fname=mysqli_real_escape_string($con, $_POST['fname']);
    $mname=mysqli_real_escape_string($con, $_POST['mname']);
    $lname=mysqli_real_escape_string($con, $_POST['lname']);
    $stud_name=$fname.' '.$lname;
    
    $suffixx=mysqli_real_escape_string($con, $_POST['suffixx']);
    $age=mysqli_real_escape_string($con, $_POST['age']);
    $birthplace=mysqli_real_escape_string($con, $_POST['birthplace']);
    $bday=mysqli_real_escape_string($con, $_POST['bday']);
    $newbday=date("M d, Y", strtotime($bday)); 

    $religion=mysqli_real_escape_string($con, $_POST['religion']);
    $gender=mysqli_real_escape_string($con, $_POST['gender']);
    $status=mysqli_real_escape_string($con, $_POST['status']);
    $admit=mysqli_real_escape_string($con, $_POST['admit']);
    // if($admit=='Freshman'){
    //     $class='F';
    // }else{
    //     $class='T';
    // }
    $application=$year.'-A-'.$studCount;
    $pdfname=$application.'.pdf';

    $spouse_name=mysqli_real_escape_string($con, $_POST['spouse_name']);
    $spouse_add=mysqli_real_escape_string($con, $_POST['spouse_add']);
    $spouse_contact=mysqli_real_escape_string($con, $_POST['spouse_contact']);
    $spouse_work=mysqli_real_escape_string($con, $_POST['spouse_work']);
    $spouse_emp=mysqli_real_escape_string($con, $_POST['spouse_emp']);

    $email=mysqli_real_escape_string($con, $_POST['email']);
    $phone=mysqli_real_escape_string($con, $_POST['phone']);
    $prio1=mysqli_real_escape_string($con, $_POST['1stprio']);
    $prio2=mysqli_real_escape_string($con, $_POST['2ndprio']);
    $calambares=mysqli_real_escape_string($con, $_POST['calambares']);
    $yrs_calamba=mysqli_real_escape_string($con, $_POST['yrs_calamba']);

    $pre_houseno=mysqli_real_escape_string($con, $_POST['pre_houseno']);
    $pre_brgy=mysqli_real_escape_string($con, $_POST['pre_brgy']);
    // $pre_brgy2=$_POST['pre_brgy2'];
    $pre_city=mysqli_real_escape_string($con, $_POST['pre_city']);
    $pre_zip=mysqli_real_escape_string($con, $_POST['pre_zip']);

    $per_houseno=mysqli_real_escape_string($con, $_POST['per_houseno']);
    $per_brgy=mysqli_real_escape_string($con, $_POST['per_brgy']);
    $per_city=mysqli_real_escape_string($con, $_POST['per_city']);
    $per_zip=mysqli_real_escape_string($con, $_POST['per_zip']);

    $group=$_POST['group'];
    $groups=implode("\n",$group);

    $stablenet=mysqli_real_escape_string($con, $_POST['stablenet']);

     //.JPG .PNG .GIF 
     $allowed_ext=array('gif', 'png', 'jpg', 'jpeg', 'jfif');
     $filename=$_FILES["profileImage"]['name'];
     $file_ext=pathinfo($filename, PATHINFO_EXTENSION);
 
    $sql= "SELECT * FROM `student_info` where `stud_email` = '$email'";
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_array();

    //EDUC BG
    $elem_name=mysqli_real_escape_string($con, $_POST['elem_name']);
    $elem_address=mysqli_real_escape_string($con, $_POST['elem_address']);
    $dgrad_elem=mysqli_real_escape_string($con, $_POST['dgrad_elem']);
    $elemdgrad=date("M d, Y", strtotime($dgrad_elem));
    $elem_honors=mysqli_real_escape_string($con, $_POST['elem_honors']);

    $jhs_name=mysqli_real_escape_string($con, $_POST['jhs_name']);
    $jhs_address=mysqli_real_escape_string($con, $_POST['jhs_address']);
    $jhs_dgrad=mysqli_real_escape_string($con, $_POST['jhs_dgrad']);
    $jhsdgrad=date("M d, Y", strtotime($jhs_dgrad));
    $jhs_honors=mysqli_real_escape_string($con, $_POST['jhs_honors']);

    $shs_name=mysqli_real_escape_string($con, $_POST['shs_name']);
    $shs_address=mysqli_real_escape_string($con, $_POST['shs_address']);
    $shs_tracks=mysqli_real_escape_string($con, $_POST['shs_tracks']);
    $shs_strands=mysqli_real_escape_string($con, $_POST['shs_strands']);
    $shs_dgrad=mysqli_real_escape_string($con, $_POST['shs_dgrad']);
    $shsgrad=date("M d, Y", strtotime($shs_dgrad));
    $shsdgrad="";
    if(empty($shs_dgrad)){
        $shsdgrad="";
    }
    else{
        $shsdgrad=$shsgrad;
    }
    $shs_honors=mysqli_real_escape_string($con, $_POST['shs_honors']);
    $g11_gwa=mysqli_real_escape_string($con, $_POST['g11_gwa']);
    $g12_gwa=mysqli_real_escape_string($con, $_POST['g12_gwa']);

    $college_name=mysqli_real_escape_string($con, $_POST['college_name']);
    $college_address=mysqli_real_escape_string($con, $_POST['college_address']);
    $college_course=mysqli_real_escape_string($con, $_POST['college_course']);
    $college_gwa=mysqli_real_escape_string($con, $_POST['college_gwa']);

    $tvc_name=mysqli_real_escape_string($con, $_POST['tvc_name']);
    $tvc_address=mysqli_real_escape_string($con, $_POST['tvc_address']);
    $tvc_dgrad=mysqli_real_escape_string($con, $_POST['tvc_dgrad']);
    $tvcgrad=date("M d, Y", strtotime($tvc_dgrad));
    if(empty($tvc_dgrad)){
        $tvcdgrad="";
    }
    else{
        $tvcdgrad=$tvcgrad;
    }
    $tvc_course=mysqli_real_escape_string($con, $_POST['tvc_course']);

    $als_name=mysqli_real_escape_string($con, $_POST['als_name']);
    $als_address=mysqli_real_escape_string($con, $_POST['als_address']);

    $org_name1=mysqli_real_escape_string($con, $_POST['org_name1']);
    $position1=mysqli_real_escape_string($con, $_POST['position1']);
    $nature1=mysqli_real_escape_string($con, $_POST['nature1']);
    $yrs_org1=mysqli_real_escape_string($con, $_POST['yrs_org1']);

    $org_name2=mysqli_real_escape_string($con, $_POST['org_name2']);
    $position2=mysqli_real_escape_string($con, $_POST['position2']);
    $nature2=mysqli_real_escape_string($con, $_POST['nature2']);
    $yrs_org2=mysqli_real_escape_string($con, $_POST['yrs_org2']);

    $org_name3=mysqli_real_escape_string($con, $_POST['org_name3']);
    $position3=mysqli_real_escape_string($con, $_POST['position3']);
    $nature3=mysqli_real_escape_string($con, $_POST['nature3']);
    $yrs_org3=mysqli_real_escape_string($con, $_POST['yrs_org3']);

    $father_name=mysqli_real_escape_string($con, $_POST['father_name']);
    $father_citizen=mysqli_real_escape_string($con, $_POST['father_citizen']);
    $father_add=mysqli_real_escape_string($con, $_POST['father_add']);
    $father_contact=mysqli_real_escape_string($con, $_POST['father_contact']);
    $father_email=mysqli_real_escape_string($con, $_POST['father_email']);
    $father_work=mysqli_real_escape_string($con, $_POST['father_work']);
    $father_emp=mysqli_real_escape_string($con, $_POST['father_emp']);
    $father_emp_add=mysqli_real_escape_string($con, $_POST['father_emp_add']);
    $father_emp_no=mysqli_real_escape_string($con, $_POST['father_emp_no']);
    $father_educ=mysqli_real_escape_string($con, $_POST['father_educ']);

    $mother_name=mysqli_real_escape_string($con, $_POST['mother_name']);
    $mother_citizen=mysqli_real_escape_string($con, $_POST['mother_citizen']);
    $mother_add=mysqli_real_escape_string($con, $_POST['mother_add']);
    $mother_contact=mysqli_real_escape_string($con, $_POST['mother_contact']);
    $mother_email=mysqli_real_escape_string($con, $_POST['mother_email']);
    $mother_work=mysqli_real_escape_string($con, $_POST['mother_work']);
    $mother_emp=mysqli_real_escape_string($con, $_POST['mother_emp']);
    $mother_emp_add=mysqli_real_escape_string($con, $_POST['mother_emp_add']);
    $mother_emp_no=mysqli_real_escape_string($con, $_POST['mother_emp_no']);
    $mother_educ=mysqli_real_escape_string($con, $_POST['mother_educ']);

    $guardian_name=mysqli_real_escape_string($con, $_POST['guardian_name']);
    $guardian_relation=mysqli_real_escape_string($con, $_POST['guardian_relation']);
    $guardian_add=mysqli_real_escape_string($con, $_POST['guardian_add']);
    $guardian_contact=mysqli_real_escape_string($con, $_POST['guardian_contact']);
    $guardian_email=mysqli_real_escape_string($con, $_POST['guardian_email']);
    $guardian_bday=mysqli_real_escape_string($con, $_POST['guardian_bday']);
    $gbday=date("M d, Y", strtotime($guardian_bday));
    if(empty($guardian_bday)){
        $guardianbday="";
    }
    else{
        $guardianbday=$gbday;
    }
    $guardian_work=mysqli_real_escape_string($con, $_POST['guardian_work']);
    $guardian_emp=mysqli_real_escape_string($con, $_POST['guardian_emp']);
    $guardian_emp_add=mysqli_real_escape_string($con, $_POST['guardian_emp_add']);
    $guardian_emp_no=mysqli_real_escape_string($con, $_POST['guardian_emp_no']);
    

    $sibling1=mysqli_real_escape_string($con, $_POST['sibling1']);
    $sibling_age1=mysqli_real_escape_string($con, $_POST['sibling_age1']);
    $sibling_status1=mysqli_real_escape_string($con, $_POST['sibling_status1']);
    $sibling_contact1=mysqli_real_escape_string($con, $_POST['sibling_contact1']);

    $sibling2=mysqli_real_escape_string($con, $_POST['sibling2']);
    $sibling_age2=mysqli_real_escape_string($con, $_POST['sibling_age2']);
    $sibling_status2=mysqli_real_escape_string($con, $_POST['sibling_status2']);
    $sibling_contact2=mysqli_real_escape_string($con, $_POST['sibling_contact2']);

    $sibling3=mysqli_real_escape_string($con, $_POST['sibling3']);
    $sibling_age3=mysqli_real_escape_string($con, $_POST['sibling_age3']);
    $sibling_status3=mysqli_real_escape_string($con, $_POST['sibling_status3']);
    $sibling_contact3=mysqli_real_escape_string($con, $_POST['sibling_contact3']);

    $income=mysqli_real_escape_string($con, $_POST['income']);

    $hobbies=mysqli_real_escape_string($con, $_POST['hobbies']);
    $reason4enroll=mysqli_real_escape_string($con, $_POST['reason4enroll']);
    $characteristics=mysqli_real_escape_string($con, $_POST['characteristics']);
    $dream=mysqli_real_escape_string($con, $_POST['dream']);
    
    if(!empty($_FILES['als_cert']['name'])){
        $als_cert=$application.'.'.pathinfo($_FILES["als_cert"]['name'], PATHINFO_EXTENSION);
        $alsTarget="../requirements/AlsCertificates/".$als_cert;
        move_uploaded_file($_FILES["als_cert"]["tmp_name"], $alsTarget);

    }else{
        $als_cert="";
    }

    if(!empty($_FILES['vaxcard']['name'])){
        $vaxcard=$application.'.'.pathinfo($_FILES["vaxcard"]['name'], PATHINFO_EXTENSION);
        $vaxTarget="../requirements/VaccinationCards/".$vaxcard;
        move_uploaded_file($_FILES["vaxcard"]["tmp_name"], $vaxTarget);

    }else{
        $vaxcard="";
    }

    $g11card=$application.'.'.pathinfo($_FILES["g11card"]['name'], PATHINFO_EXTENSION);
    $g12card=$application.'.'.pathinfo($_FILES["g12card"]['name'], PATHINFO_EXTENSION);
    $torpg1=$application.'.'.pathinfo($_FILES["torpg1"]['name'], PATHINFO_EXTENSION);
    $torpg2=$application.'.'.pathinfo($_FILES["torpg2"]['name'], PATHINFO_EXTENSION);

    $goodmoral=$application.'.'.pathinfo($_FILES["goodmoral"]['name'], PATHINFO_EXTENSION);
    $birthcert=$application.'.'.pathinfo($_FILES["birthcert"]['name'], PATHINFO_EXTENSION);
    $indigency=$application.'.'.pathinfo($_FILES["indigency"]['name'], PATHINFO_EXTENSION);
    $votecert=$application.'.'.pathinfo($_FILES["votercert"]['name'], PATHINFO_EXTENSION);
    
    
    $g11cardTarget="../requirements/Grade11Cards/".$g11card;
    $g12cardTarget="../requirements/Grade12Cards/".$g12card;
    $torpg1Target="../requirements/TOR_Page1/".$torpg1;
    $torpg2Target="../requirements/TOR_Page2/".$torpg2;

    $goodmoralTarget="../requirements/Good Morals/".$goodmoral;
    $birthcertTarget="../requirements/BirthCertificates/".$birthcert;
    $indigencyTarget="../requirements/Indigency/".$indigency;
    $votecertTarget="../requirements/Voter_Certificates/".$votecert;

    $ext=array('pdf', 'docx', 'jpg', 'png');
    $g11=mysqli_real_escape_string($con, $_FILES["g11card"]['name']);
    $g12=mysqli_real_escape_string($con, $_FILES["g12card"]['name']);
    $tor1=mysqli_real_escape_string($con, $_FILES["torpg1"]['name']);
    $tor2=mysqli_real_escape_string($con, $_FILES["torpg2"]['name']);
    $gmoral=mysqli_real_escape_string($con, $_FILES["goodmoral"]['name']);
    $bcert=mysqli_real_escape_string($con, $_FILES["birthcert"]['name']);
    $cor=mysqli_real_escape_string($con, $_FILES["indigency"]['name']);
    $voter=mysqli_real_escape_string($con, $_FILES["votercert"]['name']);

     //freshman
     $Freshman=""; $Transferee="";
     if($admit=="Freshman"){
         $Freshman='Yes';
     }
     else{
         $Transferee='Yes';
     }
     //1stprio
     $bscs1="";$bsit1="";$bsa1="";$bsais1="";$beed1="";$bsed1="";$bse1="";$bsm1="";$bss1="";
     switch($prio1){
         case "BSCS":
             $bscs1='Yes';
             break;
         case "BSIT":
             $bsit1='Yes';
             break;
         case "BSA":
             $bsa1='Yes';
             break;
         case "BSAIS":
             $bsais1='Yes';
             break;
         case "BEED":
             $beed1='Yes';
             break;
         case "BSEE":
             $bsed1='Yes';
             $bse1='Yes';
             break;
         case "BSEM":
             $bsm1='Yes';
             $bsed1='Yes';
             break;
         case "BSES":
             $bss1='Yes';
             $bsed1='Yes';
             break;
     }
     //2ndprio
     $bscs2="";$bsit2="";$bsa2="";$bsais2="";$beed2="";$bsed2="";$bse2="";$bsm2="";$bss2="";
     switch($prio2){
         case "BSCS":
             $bscs2='Yes';
             break;
         case "BSIT":
             $bsit2='Yes';
             break;
         case "BSA":
             $bsa2='Yes';
             break;
         case "BSAIS":
             $bsais2='Yes';
             break;
         case "BEED":
             $beed2='Yes';
             break;
         case "BSEE":
             $bsed2='Yes';
             $bse2='Yes';
             break;
         case "BSEM":
             $bsm2='Yes';
             $bsed2='Yes';
             break;
         case "BSES":
             $bss2='Yes';
             $bsed2='Yes';
             break;
     }
     //gender
     $Male=""; $Female="";
     if($gender=="Male"){
         $Male="Yes";
     }
     else{
         $Female="Yes";
     }
    
     //groups
     $stuFap="";$disadvantage="";$depress="";$indigenous="";$pwd="";$porpis="";$working="";
    
     $a=array_search("Recipient of Student Financial Assistance",$group);
     $b=array_search("Person from Disadvantaged Group",$group);
     $c=array_search("Person from Depressed or Conflicted-Areas",$group);
     $d=array_search("Member of Indigenous People",$group);
     $e=array_search("Person with Disability",$group);
     $f=array_search("Recipient of 4Ps",$group);
     $g=array_search("Working Student",$group);
 
     if($a!==false){
         $stuFap='Yes';
     }
     if($b!==false){
         $disadvantage='Yes';
     }
     if($c!==false){
         $depress='Yes';
     }
     if($d!==false){
         $indigenous='Yes';
     }
     if($e!==false){
         $pwd='Yes';
     }
     if($f!==false){
         $porpis='Yes';
     }
     if($g!==false){
         $working='Yes';
     }
 
    $single="";$married="";$widowed="";$seperated="";
     switch($status){
         case "Single":
             $single='Yes';
             break;
         case "Married":
             $married='Yes';
             break;
         case "Widowed":
             $widowed='Yes';
             break;
         case "Seperated":
             $seperated='Yes';
             break;
     }

    $g11_ext=pathinfo($g11, PATHINFO_EXTENSION);
    $g12_ext=pathinfo($g12, PATHINFO_EXTENSION);
    $tor1_ext=pathinfo($tor1, PATHINFO_EXTENSION);
    $tor2_ext=pathinfo($tor2, PATHINFO_EXTENSION);
    $gmoral_ext=pathinfo($gmoral, PATHINFO_EXTENSION);
    $bcert_ext=pathinfo($bcert, PATHINFO_EXTENSION);
    $cor_ext=pathinfo($cor, PATHINFO_EXTENSION);
    $voter_ext=pathinfo($voter, PATHINFO_EXTENSION);

     if($_FILES['profileImage']['name']!=''){
        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            if($admit=="Freshman"){
                if((move_uploaded_file($_FILES["g11card"]["tmp_name"], $g11cardTarget))&&(move_uploaded_file($_FILES["g12card"]["tmp_name"], $g12cardTarget))&&(move_uploaded_file($_FILES["goodmoral"]["tmp_name"], $goodmoralTarget))&&(move_uploaded_file($_FILES["birthcert"]["tmp_name"], $birthcertTarget))&&(move_uploaded_file($_FILES["indigency"]["tmp_name"], $indigencyTarget))&&(move_uploaded_file($_FILES["votercert"]["tmp_name"], $votecertTarget))) {
                //STUDINFO
                 $sql="INSERT INTO `student_info`(`application_no`, `picture`, `first_name`, `middle_name`, `last_name`, `suffix`, `stud_age`, `birthplace`, `stud_bday`, `religion`, `gender`, `civil_status`, `spouse_name`, `spouse_add`, `spouse_no`, `spouse_work`, `spouse_emp`, `admit_type`, `stud_email`, `contactno`, `1stprio`, `2ndprio`, `resident_of_calamba`, `yrs_in_calamba`, `pre_house`, `pre_brgy`, `pre_city`, `pre_zipcode`, `per_house`, `per_brgy`, `per_city`, `per_zipcode`, `groups`, `stable_internet`, `verification`) VALUES ('$application', '$ImageName', '$fname', '$mname', '$lname', '$suffixx', '$age', '$birthplace', '$bday', '$religion', '$gender', '$status', '$spouse_name', '$spouse_add', '$spouse_contact', '$spouse_work', '$spouse_emp', '$admit', '$email', '$phone', '$prio1', '$prio2', '$calambares', '$yrs_calamba', '$pre_houseno', '$pre_brgy', '$pre_city', '$pre_zip', '$per_houseno', '$per_brgy', '$per_city', '$per_zip', '$groups', '$stablenet', 'Pending')";
                 $con->query($sql) or die ($con->error);
                 //EDUCBG
                 $sql="INSERT INTO `educ_bg`(`admit_type`, `elem_name`, `elem_address`, `elem_grad`, `elem_honors`, `jhs_name`, `jhs_address`, `jhs_grad`, `jhs_honors`, `shs_name`, `shs_address`, `shs_tracks`, `shs_strands`, `shs_grad`, `shs_honors`, `g11gwa`, `g12gwa`, `college_name`, `college_address`, `college_course`, `college_gwa`, `tvc_name`, `tvc_address`, `tvc_grad`, `tvc_course`, `als_name`, `als_address`, `als_cert`) VALUES('$admit', '$elem_name','$elem_address','$dgrad_elem','$elem_honors','$jhs_name','$jhs_address','$jhs_dgrad','$jhs_honors','$shs_name','$shs_address','$shs_tracks','$shs_strands','$shs_dgrad','$shs_honors','$g11_gwa','$g12_gwa','$college_name','$college_address','$college_course','$college_gwa','$tvc_name','$tvc_address','$tvc_dgrad','$tvc_course','$als_name','$als_address','$als_cert')";
                 $con->query($sql) or die ($con->error);
                 //ORG
                 $sql="INSERT INTO `org_involvement`(`org1`, `pos1`, `nature1`, `yrs1`, `org2`, `pos2`, `nature2`, `yrs2`, `org3`, `pos3`, `nature3`, `yrs3`) VALUES ('$org_name1', '$position1', '$nature1', '$yrs_org1', '$org_name2', '$position2', '$nature2', '$yrs_org2', '$org_name3', '$position3', '$nature3', '$yrs_org3')";
                 $con->query($sql) or die ($con->error);
                 //FAMBG
                 $sql="INSERT INTO `fam_bg`(`father_name`, `father_citizenship`, `father_address`, `father_contactno`, `father_email`, `father_work`, `father_emp`, `father_emp_add`, `father_no`, `father_educ`, `mother_name`, `mother_citizenship`, `mother_address`, `mother_contactno`, `mother_email`, `mother_work`, `mother_emp`, `mother_emp_add`, `mother_emp_no`, `mother_educ`, `guardian_name`, `guardian_relationship`, `guardian_address`, `guardian_contactno`, `guardian_email`, `guardian_bday`, `guardian_work`, `guardian_emp`, `guardian_emp_address`, `guardian_emp_no`, `sibling_name1`, `sibling_age1`, `sibling_status1`, `sibling_contact1`, `sibling_name2`, `sibling_age2`, `sibling_status2`, `sibling_contact2`, `sibling_name3`, `sibling_age3`, `sibling_status3`, `sibling_contact3`, `income_fam`) VALUES ('$father_name', '$father_citizen', '$father_add', '$father_contact', '$father_email', '$father_work', '$father_emp', '$father_emp_add', '$father_emp_no', '$father_educ', '$mother_name', '$mother_citizen', '$mother_add', '$mother_contact', '$mother_email', '$mother_work', '$mother_emp', '$mother_emp_add', '$mother_emp_no', '$mother_educ', '$guardian_name', '$guardian_relation', '$guardian_add', '$guardian_contact', '$guardian_email', '$guardian_bday', '$guardian_work', '$guardian_emp', '$guardian_emp_add', '$guardian_emp_no', '$sibling1', '$sibling_age1', '$sibling_status1', '$sibling_contact1', '$sibling2', '$sibling_age2', '$sibling_status2', '$sibling_contact2', '$sibling3', '$sibling_age3', '$sibling_status3', '$sibling_contact3', '$income')";
                 $con->query($sql) or die ($con->error);
                 //PERSONAL ADMIRATION
                 $sql="INSERT INTO `personal_admiration`(`hobbies`, `reason_enroll`, `characteristics`, `goals`) VALUES ('$hobbies','$reason4enroll', '$characteristics', '$dream')";
                 $con->query($sql) or die ($con->error);
                 //Requirements
                 $sql="INSERT INTO `requirements`(`admit_type`, `g11card`, `g12card`, `goodmoral`, `birthcert`, `indigency`, `voters`, `vaxcard`) VALUES ('$admit', '$g11card', '$g12card', '$goodmoral', '$birthcert', '$indigency', '$votecert', '$vaxcard')";
                 $con->query($sql) or die ($con->error);
                 //LOG
                 $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ('$adminID','You Registered New Student','$phdate','$phtime')";
                 $con->query($sql) or die ($con->error);
                 //NOTIF
                 $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','registered a student named $stud_name','$dateNotif')");
                //GENERATEPDF
                $pdf = new Pdf('../template.pdf');
                $result =$pdf->fillForm([
                    // '2x2'=>,
                    'Freshman'=>stripslashes($Freshman),
                    'Transferee'=>stripslashes($Transferee),
                    'SINGLE'=>stripslashes($single),
                    'MARRIED'=>stripslashes($married),
                    'WIDOWED'=>stripslashes($widowed),
                    'SEPERATED'=>stripslashes($seperated),
                    'Male'=>stripslashes($Male),
                    'Female'=>stripslashes($Female),
                    '1bscs'=>stripslashes($bscs1),
                    '1bsit'=>stripslashes($bsit1),
                    '1bsa'=>stripslashes($bsa1),
                    '1bsais'=>stripslashes($bsais1),
                    '1bee'=>stripslashes($beed1),
                    '1bse'=>stripslashes($bsed1),
                    '1bsee'=>stripslashes($bse1),
                    '1bsm'=>stripslashes($bsm1),
                    '1bss'=>stripslashes($bss1),
                    
                    '2bscs'=>stripslashes($bscs2),
                    '2bsit'=>stripslashes($bsit2),
                    '2bsa'=>stripslashes($bsa2),
                    '2bsais'=>stripslashes($bsais2),
                    '2bee'=>stripslashes($beed2),
                    '2bse'=>stripslashes($bsed2),
                    '2bsee'=>stripslashes($bse2),
                    '2bsm'=>stripslashes($bsm2),
                    '2bss'=>stripslashes($bss2),

                    'stuFap'=>stripslashes($stuFap),
                    'PDG'=>stripslashes($disadvantage),
                    'depressed'=>stripslashes($depress),
                    'indigenous'=>stripslashes($indigenous),
                    'pwd'=>stripslashes($pwd),
                    '4ps'=>stripslashes($porpis),
                    'working'=>stripslashes($working),

                    'fname'=>stripslashes($fname),
                    'lname'=>stripslashes($lname),
                    'mname'=>stripslashes($mname),
                    'Suffix'=>stripslashes($suffixx),
                    'stud_bday'=>stripslashes($newbday),
                    'birthplace'=>stripslashes($birthplace),
                    'age'=>stripslashes($age),
                    'RELIGION'=>stripslashes($religion),
                    'spouse_name'=>stripslashes($spouse_name),
                    'spouse_work'=>stripslashes($spouse_work),
                    'spouse_add'=>'Spouse Address:'.stripslashes($spouse_add),
                    'spouse_emp'=>'Employer name:'.stripslashes($spouse_emp),
                    'spouse_emp_contact'=>'Spouse contact no:'.stripslashes($spouse_contact),
                    'present_address'=>stripslashes($pre_houseno).' '.stripslashes($pre_brgy).' '.stripslashes($pre_city),
                    'present_zipcode'=>stripslashes($pre_zip),
                    'permanent_address'=>stripslashes($per_houseno).' '.stripslashes($per_brgy).' '.stripslashes($per_city),
                    'permanent_zipcode'=>stripslashes($per_zip),
                    'email'=>stripslashes($email),
                    'mobileno'=>stripslashes($phone),
                    'elemname'=>stripslashes($elem_name),
                    'elemaddress'=>stripslashes($elem_address),
                    'elemdgrad'=>stripslashes($elemdgrad),
                    'elemhonors'=>stripslashes($elem_honors),
                    'jhsname'=>stripslashes($jhs_name),
                    'jhsaddress'=>stripslashes($jhs_address),
                    'jhsdgrad'=>stripslashes($jhsdgrad),
                    'jhshonors'=>stripslashes($jhs_honors),
                    'shsname'=>stripslashes($shs_name),
                    'shsaddress'=>stripslashes($shs_address),
                    'shsdgrad'=>stripslashes($shsdgrad),
                    'shshonors'=>stripslashes($shs_honors),
                    'SHSTRACK'=>'Track: '.stripslashes($shs_tracks),
                    'SHSSTRAND'=>'Strand: '.stripslashes($shs_strands),
                    'shsg11gwa'=>stripslashes($g11_gwa),
                    'shsg12gwa'=>stripslashes($g12_gwa),
                    'collegename'=>stripslashes($college_name),
                    'collegeaddress'=>stripslashes($college_address),
                    'collegecourse'=>stripslashes($college_course),
                    'collegegwa'=>stripslashes($college_gwa),
                    'Application No'=>stripslashes($application),
                    'tvcname'=>stripslashes($tvc_name),
                    'tvcaddress'=>stripslashes($tvc_address),
                    'tvcdgrad'=>stripslashes($tvcdgrad),
                    'tvccourse'=>stripslashes($tvc_course),
                    'Hobbies'=>stripslashes($hobbies),
                    'org1'=>stripslashes($org_name1),
                    'pos1'=>stripslashes($position1),
                    'nature1'=>stripslashes($nature1),
                    'years1'=>stripslashes($yrs_org1),
                    'org2'=>stripslashes($org_name2),
                    'pos2'=>stripslashes($position2),
                    'nature2'=>stripslashes($nature2),
                    'years2'=>stripslashes($yrs_org2),
                    'org3'=>stripslashes($org_name3),
                    'pos3'=>stripslashes($position3),
                    'nature3'=>stripslashes($nature3),
                    'years3'=>stripslashes($yrs_org3),
                    'father_name'=>stripslashes($father_name),
                    'father_citizenship'=>stripslashes($father_citizen),
                    'father_address'=>stripslashes($father_add),
                    'father_contact'=>stripslashes($father_contact),
                    'father_email'=>stripslashes($father_email),
                    'father_occupation'=>stripslashes($father_work),
                    'father_employer'=>stripslashes($father_emp),
                    'father_emp_add'=>stripslashes($father_emp_add),
                    'father_emp_no'=>stripslashes($father_emp_no),
                    'father_educ'=>stripslashes($father_educ),
                    'mother_name'=>stripslashes($mother_name),
                    'mother_citizenship'=>stripslashes($mother_citizen),
                    'mother_address'=>stripslashes($mother_add),
                    'mother_contact'=>stripslashes($mother_contact),
                    'mother_email'=>stripslashes($mother_email),
                    'mother_occupation'=>stripslashes($mother_work),
                    'mother_employer'=>stripslashes($mother_emp),
                    'mother_emp_add'=>stripslashes($mother_emp_add),
                    'mother_emp_no'=>stripslashes($mother_emp_no),
                    'mother_educ'=>stripslashes($mother_educ),
                    'guardian_name'=>stripslashes($guardian_name),
                    'guardian_relationship'=>stripslashes($guardian_relation),
                    'guardian_add'=>stripslashes($guardian_add),
                    'guardian_bday'=>stripslashes($guardianbday),
                    'guardian_work'=>stripslashes($guardian_work),
                    'guardian_no'=>stripslashes($guardian_contact),
                    'sibling1'=>stripslashes($sibling1),
                    'age1'=>stripslashes($sibling_age1),
                    'status1'=>stripslashes($sibling_status1),
                    'contact1'=>stripslashes($sibling_contact1),
                    'sibling2'=>stripslashes($sibling2),
                    'age2'=>stripslashes($sibling_age2),
                    'status2'=>stripslashes($sibling_status2),
                    'contact2'=>stripslashes($sibling_contact2),
                    'sibling3'=>stripslashes($sibling3),
                    'age3'=>stripslashes($sibling_age3),
                    'status3'=>stripslashes($sibling_status3),
                    'contact3'=>stripslashes($sibling_contact3),
                    'reason4enroll'=>stripslashes($reason4enroll),
                    'characteristics'=>stripslashes($characteristics),
                    'dreams'=>stripslashes($dream),
                    'Applicants Name over Sign'=>stripslashes($fname).' '.stripslashes($lname),
                    'DATE'=>$date 
                    ])
                    ->flatten()
                    ->saveAs('../PDFCopies/'.$pdfname);

                    $_SESSION["message"] = "<script>
                    Swal.fire({
                        title: 'Student Registered Successfully',
                        text: 'You added a new student',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
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
                    window.history.replaceState( null, null, window.location.href );
                    </script>";

                }
            }else{
                if((move_uploaded_file($_FILES["torpg1"]["tmp_name"], $torpg1Target))&&(move_uploaded_file($_FILES["torpg2"]["tmp_name"], $torpg2Target))&&(move_uploaded_file($_FILES["goodmoral"]["tmp_name"], $goodmoralTarget))&&(move_uploaded_file($_FILES["birthcert"]["tmp_name"], $birthcertTarget))&&(move_uploaded_file($_FILES["indigency"]["tmp_name"], $indigencyTarget))&&(move_uploaded_file($_FILES["votercert"]["tmp_name"], $votecertTarget))) {
                    //STUDINFO
                     $sql="INSERT INTO `student_info`(`application_no`, `picture`, `first_name`, `middle_name`, `last_name`, `suffix`, `stud_age`, `birthplace`, `stud_bday`, `religion`, `gender`, `civil_status`, `spouse_name`, `spouse_add`, `spouse_no`, `spouse_work`, `spouse_emp`, `admit_type`, `stud_email`, `contactno`, `1stprio`, `2ndprio`, `resident_of_calamba`, `yrs_in_calamba`, `pre_house`, `pre_brgy`, `pre_city`, `pre_zipcode`, `per_house`, `per_brgy`, `per_city`, `per_zipcode`, `groups`, `stable_internet`, `verification`) VALUES ('$application', '$ImageName', '$fname', '$mname', '$lname', '$suffixx', '$age', '$birthplace', '$bday', '$religion', '$gender', '$status', '$spouse_name', '$spouse_add', '$spouse_contact', '$spouse_work', '$spouse_emp', '$admit', '$email', '$phone', '$prio1', '$prio2', '$calambares', '$yrs_calamba', '$pre_houseno', '$pre_brgy', '$pre_city', '$pre_zip', '$per_houseno', '$per_brgy', '$per_city', '$per_zip', '$groups', '$stablenet', 'Pending')";
                     $con->query($sql) or die ($con->error);
                     //EDUCBG
                     $sql="INSERT INTO `educ_bg`(`admit_type`, `elem_name`, `elem_address`, `elem_grad`, `elem_honors`, `jhs_name`, `jhs_address`, `jhs_grad`, `jhs_honors`, `shs_name`, `shs_address`, `shs_tracks`, `shs_strands`, `shs_grad`, `shs_honors`, `g11gwa`, `g12gwa`, `college_name`, `college_address`, `college_course`, `college_gwa`, `tvc_name`, `tvc_address`, `tvc_grad`, `tvc_course`, `als_name`, `als_address`, `als_cert`) VALUES('$admit', '$elem_name','$elem_address','$dgrad_elem','$elem_honors','$jhs_name','$jhs_address','$jhs_dgrad','$jhs_honors','$shs_name','$shs_address','$shs_tracks','$shs_strands','$shs_dgrad','$shs_honors','$g11_gwa','$g12_gwa','$college_name','$college_address','$college_course','$college_gwa','$tvc_name','$tvc_address','$tvc_dgrad','$tvc_course','$als_name','$als_address','$als_cert')";
                     $con->query($sql) or die ($con->error);
                     //ORG
                     $sql="INSERT INTO `org_involvement`(`org1`, `pos1`, `nature1`, `yrs1`, `org2`, `pos2`, `nature2`, `yrs2`, `org3`, `pos3`, `nature3`, `yrs3`) VALUES ('$org_name1', '$position1', '$nature1', '$yrs_org1', '$org_name2', '$position2', '$nature2', '$yrs_org2', '$org_name3', '$position3', '$nature3', '$yrs_org3')";
                     $con->query($sql) or die ($con->error);
                     //FAMBG
                     $sql="INSERT INTO `fam_bg`(`father_name`, `father_citizenship`, `father_address`, `father_contactno`, `father_email`, `father_work`, `father_emp`, `father_emp_add`, `father_no`, `father_educ`, `mother_name`, `mother_citizenship`, `mother_address`, `mother_contactno`, `mother_email`, `mother_work`, `mother_emp`, `mother_emp_add`, `mother_emp_no`, `mother_educ`, `guardian_name`, `guardian_relationship`, `guardian_address`, `guardian_contactno`, `guardian_email`, `guardian_bday`, `guardian_work`, `guardian_emp`, `guardian_emp_address`, `guardian_emp_no`, `sibling_name1`, `sibling_age1`, `sibling_status1`, `sibling_contact1`, `sibling_name2`, `sibling_age2`, `sibling_status2`, `sibling_contact2`, `sibling_name3`, `sibling_age3`, `sibling_status3`, `sibling_contact3`, `income_fam`) VALUES ('$father_name', '$father_citizen', '$father_add', '$father_contact', '$father_email', '$father_work', '$father_emp', '$father_emp_add', '$father_emp_no', '$father_educ', '$mother_name', '$mother_citizen', '$mother_add', '$mother_contact', '$mother_email', '$mother_work', '$mother_emp', '$mother_emp_add', '$mother_emp_no', '$mother_educ', '$guardian_name', '$guardian_relation', '$guardian_add', '$guardian_contact', '$guardian_email', '$guardian_bday', '$guardian_work', '$guardian_emp', '$guardian_emp_add', '$guardian_emp_no', '$sibling1', '$sibling_age1', '$sibling_status1', '$sibling_contact1', '$sibling2', '$sibling_age2', '$sibling_status2', '$sibling_contact2', '$sibling3', '$sibling_age3', '$sibling_status3', '$sibling_contact3', '$income')";
                     $con->query($sql) or die ($con->error);
                     //PERSONAL ADMIRATION
                     $sql="INSERT INTO `personal_admiration`(`hobbies`, `reason_enroll`, `characteristics`, `goals`) VALUES ('$hobbies','$reason4enroll', '$characteristics', '$dream')";
                     $con->query($sql) or die ($con->error);
                     //Requirements
                     $sql="INSERT INTO `requirements`(`admit_type`, `torpg1`, `torpg2`, `goodmoral`, `birthcert`, `indigency`, `voters`, `vaxcard`) VALUES ('$admit', '$torpg1', '$torpg2', '$goodmoral', '$birthcert', '$indigency', '$votecert', '$vaxcard')";
                     $con->query($sql) or die ($con->error);
                     //LOG
                     $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ('$adminID','You Registered New Student','$phdate','$phtime')";
                     $con->query($sql) or die ($con->error);
                     //NOTIF
                     $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','registered a student named $stud_name','$dateNotif')");
                    //GENERATEPDF
                    $pdf = new Pdf('../template.pdf');
                    $result =$pdf->fillForm([
                        // '2x2'=>,
                        'Freshman'=>stripslashes($Freshman),
                        'Transferee'=>stripslashes($Transferee),
                        'SINGLE'=>stripslashes($single),
                        'MARRIED'=>stripslashes($married),
                        'WIDOWED'=>stripslashes($widowed),
                        'SEPERATED'=>stripslashes($seperated),
                        'Male'=>stripslashes($Male),
                        'Female'=>stripslashes($Female),
                        '1bscs'=>stripslashes($bscs1),
                        '1bsit'=>stripslashes($bsit1),
                        '1bsa'=>stripslashes($bsa1),
                        '1bsais'=>stripslashes($bsais1),
                        '1bee'=>stripslashes($beed1),
                        '1bse'=>stripslashes($bsed1),
                        '1bsee'=>stripslashes($bse1),
                        '1bsm'=>stripslashes($bsm1),
                        '1bss'=>stripslashes($bss1),
                        
                        '2bscs'=>stripslashes($bscs2),
                        '2bsit'=>stripslashes($bsit2),
                        '2bsa'=>stripslashes($bsa2),
                        '2bsais'=>stripslashes($bsais2),
                        '2bee'=>stripslashes($beed2),
                        '2bse'=>stripslashes($bsed2),
                        '2bsee'=>stripslashes($bse2),
                        '2bsm'=>stripslashes($bsm2),
                        '2bss'=>stripslashes($bss2),
    
                        'stuFap'=>stripslashes($stuFap),
                        'PDG'=>stripslashes($disadvantage),
                        'depressed'=>stripslashes($depress),
                        'indigenous'=>stripslashes($indigenous),
                        'pwd'=>stripslashes($pwd),
                        '4ps'=>stripslashes($porpis),
                        'working'=>stripslashes($working),
    
                        'fname'=>stripslashes($fname),
                        'lname'=>stripslashes($lname),
                        'mname'=>stripslashes($mname),
                        'Suffix'=>stripslashes($suffixx),
                        'stud_bday'=>stripslashes($newbday),
                        'birthplace'=>stripslashes($birthplace),
                        'age'=>stripslashes($age),
                        'RELIGION'=>stripslashes($religion),
                        'spouse_name'=>stripslashes($spouse_name),
                        'spouse_work'=>stripslashes($spouse_work),
                        'spouse_add'=>'Spouse Address:'.stripslashes($spouse_add),
                        'spouse_emp'=>'Employer name:'.stripslashes($spouse_emp),
                        'spouse_emp_contact'=>'Spouse contact no:'.stripslashes($spouse_contact),
                        'present_address'=>stripslashes($pre_houseno).' '.stripslashes($pre_brgy).' '.stripslashes($pre_city),
                        'present_zipcode'=>stripslashes($pre_zip),
                        'permanent_address'=>stripslashes($per_houseno).' '.stripslashes($per_brgy).' '.stripslashes($per_city),
                        'permanent_zipcode'=>stripslashes($per_zip),
                        'email'=>stripslashes($email),
                        'mobileno'=>stripslashes($phone),
                        'elemname'=>stripslashes($elem_name),
                        'elemaddress'=>stripslashes($elem_address),
                        'elemdgrad'=>stripslashes($elemdgrad),
                        'elemhonors'=>stripslashes($elem_honors),
                        'jhsname'=>stripslashes($jhs_name),
                        'jhsaddress'=>stripslashes($jhs_address),
                        'jhsdgrad'=>stripslashes($jhsdgrad),
                        'jhshonors'=>stripslashes($jhs_honors),
                        'shsname'=>stripslashes($shs_name),
                        'shsaddress'=>stripslashes($shs_address),
                        'shsdgrad'=>stripslashes($shsdgrad),
                        'shshonors'=>stripslashes($shs_honors),
                        'SHSTRACK'=>'Track: '.stripslashes($shs_tracks),
                        'SHSSTRAND'=>'Strand: '.stripslashes($shs_strands),
                        'shsg11gwa'=>stripslashes($g11_gwa),
                        'shsg12gwa'=>stripslashes($g12_gwa),
                        'collegename'=>stripslashes($college_name),
                        'collegeaddress'=>stripslashes($college_address),
                        'collegecourse'=>stripslashes($college_course),
                        'collegegwa'=>stripslashes($college_gwa),
                        'Application No'=>stripslashes($application),
                        'tvcname'=>stripslashes($tvc_name),
                        'tvcaddress'=>stripslashes($tvc_address),
                        'tvcdgrad'=>stripslashes($tvcdgrad),
                        'tvccourse'=>stripslashes($tvc_course),
                        'Hobbies'=>stripslashes($hobbies),
                        'org1'=>stripslashes($org_name1),
                        'pos1'=>stripslashes($position1),
                        'nature1'=>stripslashes($nature1),
                        'years1'=>stripslashes($yrs_org1),
                        'org2'=>stripslashes($org_name2),
                        'pos2'=>stripslashes($position2),
                        'nature2'=>stripslashes($nature2),
                        'years2'=>stripslashes($yrs_org2),
                        'org3'=>stripslashes($org_name3),
                        'pos3'=>stripslashes($position3),
                        'nature3'=>stripslashes($nature3),
                        'years3'=>stripslashes($yrs_org3),
                        'father_name'=>stripslashes($father_name),
                        'father_citizenship'=>stripslashes($father_citizen),
                        'father_address'=>stripslashes($father_add),
                        'father_contact'=>stripslashes($father_contact),
                        'father_email'=>stripslashes($father_email),
                        'father_occupation'=>stripslashes($father_work),
                        'father_employer'=>stripslashes($father_emp),
                        'father_emp_add'=>stripslashes($father_emp_add),
                        'father_emp_no'=>stripslashes($father_emp_no),
                        'father_educ'=>stripslashes($father_educ),
                        'mother_name'=>stripslashes($mother_name),
                        'mother_citizenship'=>stripslashes($mother_citizen),
                        'mother_address'=>stripslashes($mother_add),
                        'mother_contact'=>stripslashes($mother_contact),
                        'mother_email'=>stripslashes($mother_email),
                        'mother_occupation'=>stripslashes($mother_work),
                        'mother_employer'=>stripslashes($mother_emp),
                        'mother_emp_add'=>stripslashes($mother_emp_add),
                        'mother_emp_no'=>stripslashes($mother_emp_no),
                        'mother_educ'=>stripslashes($mother_educ),
                        'guardian_name'=>stripslashes($guardian_name),
                        'guardian_relationship'=>stripslashes($guardian_relation),
                        'guardian_add'=>stripslashes($guardian_add),
                        'guardian_bday'=>stripslashes($guardianbday),
                        'guardian_work'=>stripslashes($guardian_work),
                        'guardian_no'=>stripslashes($guardian_contact),
                        'sibling1'=>stripslashes($sibling1),
                        'age1'=>stripslashes($sibling_age1),
                        'status1'=>stripslashes($sibling_status1),
                        'contact1'=>stripslashes($sibling_contact1),
                        'sibling2'=>stripslashes($sibling2),
                        'age2'=>stripslashes($sibling_age2),
                        'status2'=>stripslashes($sibling_status2),
                        'contact2'=>stripslashes($sibling_contact2),
                        'sibling3'=>stripslashes($sibling3),
                        'age3'=>stripslashes($sibling_age3),
                        'status3'=>stripslashes($sibling_status3),
                        'contact3'=>stripslashes($sibling_contact3),
                        'reason4enroll'=>stripslashes($reason4enroll),
                        'characteristics'=>stripslashes($characteristics),
                        'dreams'=>stripslashes($dream),
                        'Applicants Name over Sign'=>stripslashes($fname).' '.stripslashes($lname),
                        'DATE'=>$date 
                        ])
                        ->flatten()
                        ->saveAs('../PDFCopies/'.$pdfname);
    
                        $_SESSION["message"] = "<script>
                        Swal.fire({
                            title: 'Student Registered Successfully',
                            text: 'You added a new student',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
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
                        window.history.replaceState( null, null, window.location.href );
                        </script>";
    
                    }
            }
        }
     }else{
        if($admit=="Freshman"){
            if((move_uploaded_file($_FILES["g11card"]["tmp_name"], $g11cardTarget))&&(move_uploaded_file($_FILES["g12card"]["tmp_name"], $g12cardTarget))&&(move_uploaded_file($_FILES["goodmoral"]["tmp_name"], $goodmoralTarget))&&(move_uploaded_file($_FILES["birthcert"]["tmp_name"], $birthcertTarget))&&(move_uploaded_file($_FILES["indigency"]["tmp_name"], $indigencyTarget))&&(move_uploaded_file($_FILES["votercert"]["tmp_name"], $votecertTarget))) {
            //STUDINFO
             $sql="INSERT INTO `student_info`(`application_no`, `picture`, `first_name`, `middle_name`, `last_name`, `suffix`, `stud_age`, `birthplace`, `stud_bday`, `religion`, `gender`, `civil_status`, `spouse_name`, `spouse_add`, `spouse_no`, `spouse_work`, `spouse_emp`, `admit_type`, `stud_email`, `contactno`, `1stprio`, `2ndprio`, `resident_of_calamba`, `yrs_in_calamba`, `pre_house`, `pre_brgy`, `pre_city`, `pre_zipcode`, `per_house`, `per_brgy`, `per_city`, `per_zipcode`, `groups`, `stable_internet`, `verification`) VALUES ('$application', '$default_photo', '$fname', '$mname', '$lname', '$suffixx', '$age', '$birthplace', '$bday', '$religion', '$gender', '$status', '$spouse_name', '$spouse_add', '$spouse_contact', '$spouse_work', '$spouse_emp', '$admit', '$email', '$phone', '$prio1', '$prio2', '$calambares', '$yrs_calamba', '$pre_houseno', '$pre_brgy', '$pre_city', '$pre_zip', '$per_houseno', '$per_brgy', '$per_city', '$per_zip', '$groups', '$stablenet', 'Pending')";
             $con->query($sql) or die ($con->error);
             //EDUCBG
             $sql="INSERT INTO `educ_bg`(`admit_type`, `elem_name`, `elem_address`, `elem_grad`, `elem_honors`, `jhs_name`, `jhs_address`, `jhs_grad`, `jhs_honors`, `shs_name`, `shs_address`, `shs_tracks`, `shs_strands`, `shs_grad`, `shs_honors`, `g11gwa`, `g12gwa`, `college_name`, `college_address`, `college_course`, `college_gwa`, `tvc_name`, `tvc_address`, `tvc_grad`, `tvc_course`, `als_name`, `als_address`, `als_cert`) VALUES('$admit', '$elem_name','$elem_address','$dgrad_elem','$elem_honors','$jhs_name','$jhs_address','$jhs_dgrad','$jhs_honors','$shs_name','$shs_address','$shs_tracks','$shs_strands','$shs_dgrad','$shs_honors','$g11_gwa','$g12_gwa','$college_name','$college_address','$college_course','$college_gwa','$tvc_name','$tvc_address','$tvc_dgrad','$tvc_course','$als_name','$als_address','$als_cert')";
             $con->query($sql) or die ($con->error);
             //ORG
             $sql="INSERT INTO `org_involvement`(`org1`, `pos1`, `nature1`, `yrs1`, `org2`, `pos2`, `nature2`, `yrs2`, `org3`, `pos3`, `nature3`, `yrs3`) VALUES ('$org_name1', '$position1', '$nature1', '$yrs_org1', '$org_name2', '$position2', '$nature2', '$yrs_org2', '$org_name3', '$position3', '$nature3', '$yrs_org3')";
             $con->query($sql) or die ($con->error);
             //FAMBG
             $sql="INSERT INTO `fam_bg`(`father_name`, `father_citizenship`, `father_address`, `father_contactno`, `father_email`, `father_work`, `father_emp`, `father_emp_add`, `father_no`, `father_educ`, `mother_name`, `mother_citizenship`, `mother_address`, `mother_contactno`, `mother_email`, `mother_work`, `mother_emp`, `mother_emp_add`, `mother_emp_no`, `mother_educ`, `guardian_name`, `guardian_relationship`, `guardian_address`, `guardian_contactno`, `guardian_email`, `guardian_bday`, `guardian_work`, `guardian_emp`, `guardian_emp_address`, `guardian_emp_no`, `sibling_name1`, `sibling_age1`, `sibling_status1`, `sibling_contact1`, `sibling_name2`, `sibling_age2`, `sibling_status2`, `sibling_contact2`, `sibling_name3`, `sibling_age3`, `sibling_status3`, `sibling_contact3`, `income_fam`) VALUES ('$father_name', '$father_citizen', '$father_add', '$father_contact', '$father_email', '$father_work', '$father_emp', '$father_emp_add', '$father_emp_no', '$father_educ', '$mother_name', '$mother_citizen', '$mother_add', '$mother_contact', '$mother_email', '$mother_work', '$mother_emp', '$mother_emp_add', '$mother_emp_no', '$mother_educ', '$guardian_name', '$guardian_relation', '$guardian_add', '$guardian_contact', '$guardian_email', '$guardian_bday', '$guardian_work', '$guardian_emp', '$guardian_emp_add', '$guardian_emp_no', '$sibling1', '$sibling_age1', '$sibling_status1', '$sibling_contact1', '$sibling2', '$sibling_age2', '$sibling_status2', '$sibling_contact2', '$sibling3', '$sibling_age3', '$sibling_status3', '$sibling_contact3', '$income')";
             $con->query($sql) or die ($con->error);
             //PERSONAL ADMIRATION
             $sql="INSERT INTO `personal_admiration`(`hobbies`, `reason_enroll`, `characteristics`, `goals`) VALUES ('$hobbies','$reason4enroll', '$characteristics', '$dream')";
             $con->query($sql) or die ($con->error);
             //Requirements
             $sql="INSERT INTO `requirements`(`admit_type`, `g11card`, `g12card`, `goodmoral`, `birthcert`, `indigency`, `voters`, `vaxcard`) VALUES ('$admit', '$g11card', '$g12card', '$goodmoral', '$birthcert', '$indigency', '$votecert', '$vaxcard')";
             $con->query($sql) or die ($con->error);
             //LOG
             $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ('$adminID','You Registered New Student','$phdate','$phtime')";
             $con->query($sql) or die ($con->error);
             //NOTIF
             $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','registered a student named $stud_name','$dateNotif')");
            //GENERATEPDF
            $pdf = new Pdf('../template.pdf');
            $result =$pdf->fillForm([
                // '2x2'=>,
                'Freshman'=>stripslashes($Freshman),
                'Transferee'=>stripslashes($Transferee),
                'SINGLE'=>stripslashes($single),
                'MARRIED'=>stripslashes($married),
                'WIDOWED'=>stripslashes($widowed),
                'SEPERATED'=>stripslashes($seperated),
                'Male'=>stripslashes($Male),
                'Female'=>stripslashes($Female),
                '1bscs'=>stripslashes($bscs1),
                '1bsit'=>stripslashes($bsit1),
                '1bsa'=>stripslashes($bsa1),
                '1bsais'=>stripslashes($bsais1),
                '1bee'=>stripslashes($beed1),
                '1bse'=>stripslashes($bsed1),
                '1bsee'=>stripslashes($bse1),
                '1bsm'=>stripslashes($bsm1),
                '1bss'=>stripslashes($bss1),
                
                '2bscs'=>stripslashes($bscs2),
                '2bsit'=>stripslashes($bsit2),
                '2bsa'=>stripslashes($bsa2),
                '2bsais'=>stripslashes($bsais2),
                '2bee'=>stripslashes($beed2),
                '2bse'=>stripslashes($bsed2),
                '2bsee'=>stripslashes($bse2),
                '2bsm'=>stripslashes($bsm2),
                '2bss'=>stripslashes($bss2),

                'stuFap'=>stripslashes($stuFap),
                'PDG'=>stripslashes($disadvantage),
                'depressed'=>stripslashes($depress),
                'indigenous'=>stripslashes($indigenous),
                'pwd'=>stripslashes($pwd),
                '4ps'=>stripslashes($porpis),
                'working'=>stripslashes($working),

                'fname'=>stripslashes($fname),
                'lname'=>stripslashes($lname),
                'mname'=>stripslashes($mname),
                'Suffix'=>stripslashes($suffixx),
                'stud_bday'=>stripslashes($newbday),
                'birthplace'=>stripslashes($birthplace),
                'age'=>stripslashes($age),
                'RELIGION'=>stripslashes($religion),
                'spouse_name'=>stripslashes($spouse_name),
                'spouse_work'=>stripslashes($spouse_work),
                'spouse_add'=>'Spouse Address:'.stripslashes($spouse_add),
                'spouse_emp'=>'Employer name:'.stripslashes($spouse_emp),
                'spouse_emp_contact'=>'Spouse contact no:'.stripslashes($spouse_contact),
                'present_address'=>stripslashes($pre_houseno).' '.stripslashes($pre_brgy).' '.stripslashes($pre_city),
                'present_zipcode'=>stripslashes($pre_zip),
                'permanent_address'=>stripslashes($per_houseno).' '.stripslashes($per_brgy).' '.stripslashes($per_city),
                'permanent_zipcode'=>stripslashes($per_zip),
                'email'=>stripslashes($email),
                'mobileno'=>stripslashes($phone),
                'elemname'=>stripslashes($elem_name),
                'elemaddress'=>stripslashes($elem_address),
                'elemdgrad'=>stripslashes($elemdgrad),
                'elemhonors'=>stripslashes($elem_honors),
                'jhsname'=>stripslashes($jhs_name),
                'jhsaddress'=>stripslashes($jhs_address),
                'jhsdgrad'=>stripslashes($jhsdgrad),
                'jhshonors'=>stripslashes($jhs_honors),
                'shsname'=>stripslashes($shs_name),
                'shsaddress'=>stripslashes($shs_address),
                'shsdgrad'=>stripslashes($shsdgrad),
                'shshonors'=>stripslashes($shs_honors),
                'SHSTRACK'=>'Track: '.stripslashes($shs_tracks),
                'SHSSTRAND'=>'Strand: '.stripslashes($shs_strands),
                'shsg11gwa'=>stripslashes($g11_gwa),
                'shsg12gwa'=>stripslashes($g12_gwa),
                'collegename'=>stripslashes($college_name),
                'collegeaddress'=>stripslashes($college_address),
                'collegecourse'=>stripslashes($college_course),
                'collegegwa'=>stripslashes($college_gwa),
                'Application No'=>stripslashes($application),
                'tvcname'=>stripslashes($tvc_name),
                'tvcaddress'=>stripslashes($tvc_address),
                'tvcdgrad'=>stripslashes($tvcdgrad),
                'tvccourse'=>stripslashes($tvc_course),
                'Hobbies'=>stripslashes($hobbies),
                'org1'=>stripslashes($org_name1),
                'pos1'=>stripslashes($position1),
                'nature1'=>stripslashes($nature1),
                'years1'=>stripslashes($yrs_org1),
                'org2'=>stripslashes($org_name2),
                'pos2'=>stripslashes($position2),
                'nature2'=>stripslashes($nature2),
                'years2'=>stripslashes($yrs_org2),
                'org3'=>stripslashes($org_name3),
                'pos3'=>stripslashes($position3),
                'nature3'=>stripslashes($nature3),
                'years3'=>stripslashes($yrs_org3),
                'father_name'=>stripslashes($father_name),
                'father_citizenship'=>stripslashes($father_citizen),
                'father_address'=>stripslashes($father_add),
                'father_contact'=>stripslashes($father_contact),
                'father_email'=>stripslashes($father_email),
                'father_occupation'=>stripslashes($father_work),
                'father_employer'=>stripslashes($father_emp),
                'father_emp_add'=>stripslashes($father_emp_add),
                'father_emp_no'=>stripslashes($father_emp_no),
                'father_educ'=>stripslashes($father_educ),
                'mother_name'=>stripslashes($mother_name),
                'mother_citizenship'=>stripslashes($mother_citizen),
                'mother_address'=>stripslashes($mother_add),
                'mother_contact'=>stripslashes($mother_contact),
                'mother_email'=>stripslashes($mother_email),
                'mother_occupation'=>stripslashes($mother_work),
                'mother_employer'=>stripslashes($mother_emp),
                'mother_emp_add'=>stripslashes($mother_emp_add),
                'mother_emp_no'=>stripslashes($mother_emp_no),
                'mother_educ'=>stripslashes($mother_educ),
                'guardian_name'=>stripslashes($guardian_name),
                'guardian_relationship'=>stripslashes($guardian_relation),
                'guardian_add'=>stripslashes($guardian_add),
                'guardian_bday'=>stripslashes($guardianbday),
                'guardian_work'=>stripslashes($guardian_work),
                'guardian_no'=>stripslashes($guardian_contact),
                'sibling1'=>stripslashes($sibling1),
                'age1'=>stripslashes($sibling_age1),
                'status1'=>stripslashes($sibling_status1),
                'contact1'=>stripslashes($sibling_contact1),
                'sibling2'=>stripslashes($sibling2),
                'age2'=>stripslashes($sibling_age2),
                'status2'=>stripslashes($sibling_status2),
                'contact2'=>stripslashes($sibling_contact2),
                'sibling3'=>stripslashes($sibling3),
                'age3'=>stripslashes($sibling_age3),
                'status3'=>stripslashes($sibling_status3),
                'contact3'=>stripslashes($sibling_contact3),
                'reason4enroll'=>stripslashes($reason4enroll),
                'characteristics'=>stripslashes($characteristics),
                'dreams'=>stripslashes($dream),
                'Applicants Name over Sign'=>stripslashes($fname).' '.stripslashes($lname),
                'DATE'=>$date 
                ])
                ->flatten()
                ->saveAs('../PDFCopies/'.$pdfname);

                $_SESSION["message"] = "<script>
                Swal.fire({
                    title: 'Student Registered Successfully',
                    text: 'You added a new student',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false,
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
                window.history.replaceState( null, null, window.location.href );
                </script>";

            }
        }else{
            if((move_uploaded_file($_FILES["torpg1"]["tmp_name"], $torpg1Target))&&(move_uploaded_file($_FILES["torpg2"]["tmp_name"], $torpg2Target))&&(move_uploaded_file($_FILES["goodmoral"]["tmp_name"], $goodmoralTarget))&&(move_uploaded_file($_FILES["birthcert"]["tmp_name"], $birthcertTarget))&&(move_uploaded_file($_FILES["indigency"]["tmp_name"], $indigencyTarget))&&(move_uploaded_file($_FILES["votercert"]["tmp_name"], $votecertTarget))) {
                //STUDINFO
                 $sql="INSERT INTO `student_info`(`application_no`, `picture`, `first_name`, `middle_name`, `last_name`, `suffix`, `stud_age`, `birthplace`, `stud_bday`, `religion`, `gender`, `civil_status`, `spouse_name`, `spouse_add`, `spouse_no`, `spouse_work`, `spouse_emp`, `admit_type`, `stud_email`, `contactno`, `1stprio`, `2ndprio`, `resident_of_calamba`, `yrs_in_calamba`, `pre_house`, `pre_brgy`, `pre_city`, `pre_zipcode`, `per_house`, `per_brgy`, `per_city`, `per_zipcode`, `groups`, `stable_internet`, `verification`) VALUES ('$application', '$default_photo', '$fname', '$mname', '$lname', '$suffixx', '$age', '$birthplace', '$bday', '$religion', '$gender', '$status', '$spouse_name', '$spouse_add', '$spouse_contact', '$spouse_work', '$spouse_emp', '$admit', '$email', '$phone', '$prio1', '$prio2', '$calambares', '$yrs_calamba', '$pre_houseno', '$pre_brgy', '$pre_city', '$pre_zip', '$per_houseno', '$per_brgy', '$per_city', '$per_zip', '$groups', '$stablenet', 'Pending')";
                 $con->query($sql) or die ($con->error);
                 //EDUCBG
                 $sql="INSERT INTO `educ_bg`(`admit_type`, `elem_name`, `elem_address`, `elem_grad`, `elem_honors`, `jhs_name`, `jhs_address`, `jhs_grad`, `jhs_honors`, `shs_name`, `shs_address`, `shs_tracks`, `shs_strands`, `shs_grad`, `shs_honors`, `g11gwa`, `g12gwa`, `college_name`, `college_address`, `college_course`, `college_gwa`, `tvc_name`, `tvc_address`, `tvc_grad`, `tvc_course`, `als_name`, `als_address`, `als_cert`) VALUES('$admit', '$elem_name','$elem_address','$dgrad_elem','$elem_honors','$jhs_name','$jhs_address','$jhs_dgrad','$jhs_honors','$shs_name','$shs_address','$shs_tracks','$shs_strands','$shs_dgrad','$shs_honors','$g11_gwa','$g12_gwa','$college_name','$college_address','$college_course','$college_gwa','$tvc_name','$tvc_address','$tvc_dgrad','$tvc_course','$als_name','$als_address','$als_cert')";
                 $con->query($sql) or die ($con->error);
                 //ORG
                 $sql="INSERT INTO `org_involvement`(`org1`, `pos1`, `nature1`, `yrs1`, `org2`, `pos2`, `nature2`, `yrs2`, `org3`, `pos3`, `nature3`, `yrs3`) VALUES ('$org_name1', '$position1', '$nature1', '$yrs_org1', '$org_name2', '$position2', '$nature2', '$yrs_org2', '$org_name3', '$position3', '$nature3', '$yrs_org3')";
                 $con->query($sql) or die ($con->error);
                 //FAMBG
                 $sql="INSERT INTO `fam_bg`(`father_name`, `father_citizenship`, `father_address`, `father_contactno`, `father_email`, `father_work`, `father_emp`, `father_emp_add`, `father_no`, `father_educ`, `mother_name`, `mother_citizenship`, `mother_address`, `mother_contactno`, `mother_email`, `mother_work`, `mother_emp`, `mother_emp_add`, `mother_emp_no`, `mother_educ`, `guardian_name`, `guardian_relationship`, `guardian_address`, `guardian_contactno`, `guardian_email`, `guardian_bday`, `guardian_work`, `guardian_emp`, `guardian_emp_address`, `guardian_emp_no`, `sibling_name1`, `sibling_age1`, `sibling_status1`, `sibling_contact1`, `sibling_name2`, `sibling_age2`, `sibling_status2`, `sibling_contact2`, `sibling_name3`, `sibling_age3`, `sibling_status3`, `sibling_contact3`, `income_fam`) VALUES ('$father_name', '$father_citizen', '$father_add', '$father_contact', '$father_email', '$father_work', '$father_emp', '$father_emp_add', '$father_emp_no', '$father_educ', '$mother_name', '$mother_citizen', '$mother_add', '$mother_contact', '$mother_email', '$mother_work', '$mother_emp', '$mother_emp_add', '$mother_emp_no', '$mother_educ', '$guardian_name', '$guardian_relation', '$guardian_add', '$guardian_contact', '$guardian_email', '$guardian_bday', '$guardian_work', '$guardian_emp', '$guardian_emp_add', '$guardian_emp_no', '$sibling1', '$sibling_age1', '$sibling_status1', '$sibling_contact1', '$sibling2', '$sibling_age2', '$sibling_status2', '$sibling_contact2', '$sibling3', '$sibling_age3', '$sibling_status3', '$sibling_contact3', '$income')";
                 $con->query($sql) or die ($con->error);
                 //PERSONAL ADMIRATION
                 $sql="INSERT INTO `personal_admiration`(`hobbies`, `reason_enroll`, `characteristics`, `goals`) VALUES ('$hobbies','$reason4enroll', '$characteristics', '$dream')";
                 $con->query($sql) or die ($con->error);
                 //Requirements
                 $sql="INSERT INTO `requirements`(`admit_type`, `torpg1`, `torpg2`, `goodmoral`, `birthcert`, `indigency`, `voters`, `vaxcard`) VALUES ('$admit', '$torpg1', '$torpg2', '$goodmoral', '$birthcert', '$indigency', '$votecert', '$vaxcard')";
                 $con->query($sql) or die ($con->error);
                 //LOG
                 $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ('$adminID','You Registered New Student','$phdate','$phtime')";
                 $con->query($sql) or die ($con->error);
                 //NOTIF
                 $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','registered a student named $stud_name','$dateNotif')");
                //GENERATEPDF
                $pdf = new Pdf('../template.pdf');
                $result =$pdf->fillForm([
                    // '2x2'=>,
                    'Freshman'=>stripslashes($Freshman),
                    'Transferee'=>stripslashes($Transferee),
                    'SINGLE'=>stripslashes($single),
                    'MARRIED'=>stripslashes($married),
                    'WIDOWED'=>stripslashes($widowed),
                    'SEPERATED'=>stripslashes($seperated),
                    'Male'=>stripslashes($Male),
                    'Female'=>stripslashes($Female),
                    '1bscs'=>stripslashes($bscs1),
                    '1bsit'=>stripslashes($bsit1),
                    '1bsa'=>stripslashes($bsa1),
                    '1bsais'=>stripslashes($bsais1),
                    '1bee'=>stripslashes($beed1),
                    '1bse'=>stripslashes($bsed1),
                    '1bsee'=>stripslashes($bse1),
                    '1bsm'=>stripslashes($bsm1),
                    '1bss'=>stripslashes($bss1),
                    
                    '2bscs'=>stripslashes($bscs2),
                    '2bsit'=>stripslashes($bsit2),
                    '2bsa'=>stripslashes($bsa2),
                    '2bsais'=>stripslashes($bsais2),
                    '2bee'=>stripslashes($beed2),
                    '2bse'=>stripslashes($bsed2),
                    '2bsee'=>stripslashes($bse2),
                    '2bsm'=>stripslashes($bsm2),
                    '2bss'=>stripslashes($bss2),

                    'stuFap'=>stripslashes($stuFap),
                    'PDG'=>stripslashes($disadvantage),
                    'depressed'=>stripslashes($depress),
                    'indigenous'=>stripslashes($indigenous),
                    'pwd'=>stripslashes($pwd),
                    '4ps'=>stripslashes($porpis),
                    'working'=>stripslashes($working),

                    'fname'=>stripslashes($fname),
                    'lname'=>stripslashes($lname),
                    'mname'=>stripslashes($mname),
                    'Suffix'=>stripslashes($suffixx),
                    'stud_bday'=>stripslashes($newbday),
                    'birthplace'=>stripslashes($birthplace),
                    'age'=>stripslashes($age),
                    'RELIGION'=>stripslashes($religion),
                    'spouse_name'=>stripslashes($spouse_name),
                    'spouse_work'=>stripslashes($spouse_work),
                    'spouse_add'=>'Spouse Address:'.stripslashes($spouse_add),
                    'spouse_emp'=>'Employer name:'.stripslashes($spouse_emp),
                    'spouse_emp_contact'=>'Spouse contact no:'.stripslashes($spouse_contact),
                    'present_address'=>stripslashes($pre_houseno).' '.stripslashes($pre_brgy).' '.stripslashes($pre_city),
                    'present_zipcode'=>stripslashes($pre_zip),
                    'permanent_address'=>stripslashes($per_houseno).' '.stripslashes($per_brgy).' '.stripslashes($per_city),
                    'permanent_zipcode'=>stripslashes($per_zip),
                    'email'=>stripslashes($email),
                    'mobileno'=>stripslashes($phone),
                    'elemname'=>stripslashes($elem_name),
                    'elemaddress'=>stripslashes($elem_address),
                    'elemdgrad'=>stripslashes($elemdgrad),
                    'elemhonors'=>stripslashes($elem_honors),
                    'jhsname'=>stripslashes($jhs_name),
                    'jhsaddress'=>stripslashes($jhs_address),
                    'jhsdgrad'=>stripslashes($jhsdgrad),
                    'jhshonors'=>stripslashes($jhs_honors),
                    'shsname'=>stripslashes($shs_name),
                    'shsaddress'=>stripslashes($shs_address),
                    'shsdgrad'=>stripslashes($shsdgrad),
                    'shshonors'=>stripslashes($shs_honors),
                    'SHSTRACK'=>'Track: '.stripslashes($shs_tracks),
                    'SHSSTRAND'=>'Strand: '.stripslashes($shs_strands),
                    'shsg11gwa'=>stripslashes($g11_gwa),
                    'shsg12gwa'=>stripslashes($g12_gwa),
                    'collegename'=>stripslashes($college_name),
                    'collegeaddress'=>stripslashes($college_address),
                    'collegecourse'=>stripslashes($college_course),
                    'collegegwa'=>stripslashes($college_gwa),
                    'Application No'=>stripslashes($application),
                    'tvcname'=>stripslashes($tvc_name),
                    'tvcaddress'=>stripslashes($tvc_address),
                    'tvcdgrad'=>stripslashes($tvcdgrad),
                    'tvccourse'=>stripslashes($tvc_course),
                    'Hobbies'=>stripslashes($hobbies),
                    'org1'=>stripslashes($org_name1),
                    'pos1'=>stripslashes($position1),
                    'nature1'=>stripslashes($nature1),
                    'years1'=>stripslashes($yrs_org1),
                    'org2'=>stripslashes($org_name2),
                    'pos2'=>stripslashes($position2),
                    'nature2'=>stripslashes($nature2),
                    'years2'=>stripslashes($yrs_org2),
                    'org3'=>stripslashes($org_name3),
                    'pos3'=>stripslashes($position3),
                    'nature3'=>stripslashes($nature3),
                    'years3'=>stripslashes($yrs_org3),
                    'father_name'=>stripslashes($father_name),
                    'father_citizenship'=>stripslashes($father_citizen),
                    'father_address'=>stripslashes($father_add),
                    'father_contact'=>stripslashes($father_contact),
                    'father_email'=>stripslashes($father_email),
                    'father_occupation'=>stripslashes($father_work),
                    'father_employer'=>stripslashes($father_emp),
                    'father_emp_add'=>stripslashes($father_emp_add),
                    'father_emp_no'=>stripslashes($father_emp_no),
                    'father_educ'=>stripslashes($father_educ),
                    'mother_name'=>stripslashes($mother_name),
                    'mother_citizenship'=>stripslashes($mother_citizen),
                    'mother_address'=>stripslashes($mother_add),
                    'mother_contact'=>stripslashes($mother_contact),
                    'mother_email'=>stripslashes($mother_email),
                    'mother_occupation'=>stripslashes($mother_work),
                    'mother_employer'=>stripslashes($mother_emp),
                    'mother_emp_add'=>stripslashes($mother_emp_add),
                    'mother_emp_no'=>stripslashes($mother_emp_no),
                    'mother_educ'=>stripslashes($mother_educ),
                    'guardian_name'=>stripslashes($guardian_name),
                    'guardian_relationship'=>stripslashes($guardian_relation),
                    'guardian_add'=>stripslashes($guardian_add),
                    'guardian_bday'=>stripslashes($guardianbday),
                    'guardian_work'=>stripslashes($guardian_work),
                    'guardian_no'=>stripslashes($guardian_contact),
                    'sibling1'=>stripslashes($sibling1),
                    'age1'=>stripslashes($sibling_age1),
                    'status1'=>stripslashes($sibling_status1),
                    'contact1'=>stripslashes($sibling_contact1),
                    'sibling2'=>stripslashes($sibling2),
                    'age2'=>stripslashes($sibling_age2),
                    'status2'=>stripslashes($sibling_status2),
                    'contact2'=>stripslashes($sibling_contact2),
                    'sibling3'=>stripslashes($sibling3),
                    'age3'=>stripslashes($sibling_age3),
                    'status3'=>stripslashes($sibling_status3),
                    'contact3'=>stripslashes($sibling_contact3),
                    'reason4enroll'=>stripslashes($reason4enroll),
                    'characteristics'=>stripslashes($characteristics),
                    'dreams'=>stripslashes($dream),
                    'Applicants Name over Sign'=>stripslashes($fname).' '.stripslashes($lname),
                    'DATE'=>$date 
                    ])
                    ->flatten()
                    ->saveAs('../PDFCopies/'.$pdfname);

                    $_SESSION["message"] = "<script>
                    Swal.fire({
                        title: 'Student Registered Successfully',
                        text: 'You added a new student',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
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
                    window.history.replaceState( null, null, window.location.href );
                    </script>";

                }
        }
     }

        // $_SESSION["message"] = "<script>
        // Swal.fire({
        //     title: 'Submit your answer?',
        //     text: 'Are you sure to submit your answer now? $application',
        //     icon: 'question',
        //     showCancelButton: true,
        //     confirmButtonColor: '#043e9f',
        //     allowOutsideClick: () => {
        //       const popup = Swal.getPopup()
        //       popup.classList.remove('swal2-show')
        //       setTimeout(() => {
        //         popup.classList.add('animate__animated', 'animate__headShake')
        //       })
        //       setTimeout(() => {
        //         popup.classList.remove('animate__animated', 'animate__headShake')
        //       }, 500)
        //       return false
        //     },
        //     cancelButtonColor: '#dc3545',
        //     confirmButtonText: 'Yes, submit now.'
        // });
        // window.history.replaceState( null, null, window.location.href );
        // </script>";
  }
  
?>