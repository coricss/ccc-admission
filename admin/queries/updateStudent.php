<?php 


if(!isset($_SESSION)){
  session_start();
}
include_once("../connect.php");
$con=connect();
use mikehaertl\pdftk\Pdf;

require('../vendor/autoload.php');

if(isset($_POST['btn-editStud'])){
  $adminID=$_SESSION['ID'];
  $name=$_SESSION['name'];

  $studID=$_POST["studID"];
  $stud="SELECT * FROM `student_info` WHERE `student_id`='$studID'";
  $stuD=$con->query($stud) or die ($con->error);
  $studs=$stuD->fetch_array();  

  date_default_timezone_set('Asia/Manila');
  $dateNotif=date("Y-m-d h:i:s A");
  $phdate=date('m/d/Y');
  $phtime=date('g:i A');
  $time=time();
  $default_photo="default_photo.png";
  $oldimg=$studs['picture'];
  $ImageName = $time.'_'.$_FILES["profileImage2"]['name']; 
  $target_file = "../assets/imgs/student2x2/".$ImageName;
  $date=date('F d, Y');
  $fname=mysqli_real_escape_string($con, $_POST['fname2']);
  $mname=mysqli_real_escape_string($con, $_POST['mname2']);
  $lname=mysqli_real_escape_string($con, $_POST['lname2']);
  $stud_name=$fname.' '.$lname;

  $suffixx=mysqli_real_escape_string($con, $_POST['suffixx2']);
  $age=mysqli_real_escape_string($con, $_POST['age2']);
  $birthplace=mysqli_real_escape_string($con, $_POST['birthplace2']);
  $bday=mysqli_real_escape_string($con, $_POST['bday2']);
  $newbday=date("M d, Y", strtotime($bday)); 

  $religion=mysqli_real_escape_string($con, $_POST['religion2']);
  $gender=mysqli_real_escape_string($con, $_POST['gender2']);
  $status=mysqli_real_escape_string($con, $_POST['status2']);
  $admit=mysqli_real_escape_string($con, $_POST['admit2']);

  $application = mysqli_real_escape_string($con, $_POST['applicationNo']);

  $pdfname=$application.'.pdf';

  $spouse_name=mysqli_real_escape_string($con, $_POST['spouse_name2']);
  $spouse_add=mysqli_real_escape_string($con, $_POST['spouse_add2']);
  $spouse_contact=mysqli_real_escape_string($con, $_POST['spouse_contact2']);
  $spouse_work=mysqli_real_escape_string($con, $_POST['spouse_work2']);
  $spouse_emp=mysqli_real_escape_string($con, $_POST['spouse_emp2']);

  $email=mysqli_real_escape_string($con, $_POST['email2']);
  $phone=mysqli_real_escape_string($con, $_POST['phone2']);
  $prio1=mysqli_real_escape_string($con, $_POST['1stprio2']);
  $prio2=mysqli_real_escape_string($con, $_POST['2ndprio2']);
  $calambares=mysqli_real_escape_string($con, $_POST['calambares2']);
  $yrs_calamba=mysqli_real_escape_string($con, $_POST['yrs_calamba2']);

  $pre_houseno=mysqli_real_escape_string($con, $_POST['pre_houseno2']);
  $pre_brgy=mysqli_real_escape_string($con, $_POST['pre_brgy2']);
  $pre_city=mysqli_real_escape_string($con, $_POST['pre_city2']);
  $pre_zip=mysqli_real_escape_string($con, $_POST['pre_zip2']);

  $per_houseno=mysqli_real_escape_string($con, $_POST['per_houseno2']);
  $per_brgy=mysqli_real_escape_string($con, $_POST['per_brgy2']);
  $per_city=mysqli_real_escape_string($con, $_POST['per_city2']);
  $per_zip=mysqli_real_escape_string($con, $_POST['per_zip2']);

  $group=$_POST['group2'];
  $groups=implode("\n",$group);

  $stablenet=mysqli_real_escape_string($con, $_POST['stablenet2']);

  $elem_name=mysqli_real_escape_string($con, $_POST['elem_name2']);
  $elem_address=mysqli_real_escape_string($con, $_POST['elem_address2']);
  $dgrad_elem=mysqli_real_escape_string($con, $_POST['dgrad_elem2']);
  $elemdgrad=date("M d, Y", strtotime($dgrad_elem));
  $elem_honors=mysqli_real_escape_string($con, $_POST['elem_honors2']);

  $jhs_name=mysqli_real_escape_string($con, $_POST['jhs_name2']);
  $jhs_address=mysqli_real_escape_string($con, $_POST['jhs_address2']);
  $jhs_dgrad=mysqli_real_escape_string($con, $_POST['jhs_dgrad2']);
  $jhsdgrad=date("M d, Y", strtotime($jhs_dgrad));
  $jhs_honors=mysqli_real_escape_string($con, $_POST['jhs_honors2']);

  $shs_name=mysqli_real_escape_string($con, $_POST['shs_name2']);
  $shs_address=mysqli_real_escape_string($con, $_POST['shs_address2']);
  $shs_tracks=mysqli_real_escape_string($con, $_POST['shs_tracks2']);
  $shs_strands=mysqli_real_escape_string($con, $_POST['shs_strands2']);
  $shs_dgrad=mysqli_real_escape_string($con, $_POST['shs_dgrad2']);
  $shsgrad=date("M d, Y", strtotime($shs_dgrad));
  $shsdgrad="";
  if(empty($shs_dgrad)){
      $shsdgrad="";
  }
  else{
      $shsdgrad=$shsgrad;
  }
  $shs_honors=mysqli_real_escape_string($con, $_POST['shs_honors2']);
  $g11_gwa=mysqli_real_escape_string($con, $_POST['g11_gwa2']);
  $g12_gwa=mysqli_real_escape_string($con, $_POST['g12_gwa2']);

  $college_name=mysqli_real_escape_string($con, $_POST['college_name2']);
  $college_address=mysqli_real_escape_string($con, $_POST['college_address2']);
  $college_course=mysqli_real_escape_string($con, $_POST['college_course2']);
  $college_gwa=mysqli_real_escape_string($con, $_POST['college_gwa2']);

  $tvc_name=mysqli_real_escape_string($con, $_POST['tvc_name2']);
  $tvc_address=mysqli_real_escape_string($con, $_POST['tvc_address2']);
  $tvc_dgrad=mysqli_real_escape_string($con, $_POST['tvc_dgrad2']);
  $tvcgrad=date("M d, Y", strtotime($tvc_dgrad));
  if(empty($tvc_dgrad)){
      $tvcdgrad="";
  }
  else{
      $tvcdgrad=$tvcgrad;
  }

  $tvc_course=mysqli_real_escape_string($con, $_POST['tvc_course2']);

  $als_name=mysqli_real_escape_string($con, $_POST['als_name2']);
  $als_address=mysqli_real_escape_string($con, $_POST['als_address2']);

  $org_name1=mysqli_real_escape_string($con, $_POST['org_name12']);
  $position1=mysqli_real_escape_string($con, $_POST['position12']);
  $nature1=mysqli_real_escape_string($con, $_POST['nature12']);
  $yrs_org1=mysqli_real_escape_string($con, $_POST['yrs_org12']);

  $org_name2=mysqli_real_escape_string($con, $_POST['org_name22']);
  $position2=mysqli_real_escape_string($con, $_POST['position22']);
  $nature2=mysqli_real_escape_string($con, $_POST['nature22']);
  $yrs_org2=mysqli_real_escape_string($con, $_POST['yrs_org22']);

  $org_name3=mysqli_real_escape_string($con, $_POST['org_name32']);
  $position3=mysqli_real_escape_string($con, $_POST['position32']);
  $nature3=mysqli_real_escape_string($con, $_POST['nature32']);
  $yrs_org3=mysqli_real_escape_string($con, $_POST['yrs_org32']);

  $father_name=mysqli_real_escape_string($con, $_POST['father_name2']);
  $father_citizen=mysqli_real_escape_string($con, $_POST['father_citizen2']);
  $father_add=mysqli_real_escape_string($con, $_POST['father_add2']);
  $father_contact=mysqli_real_escape_string($con, $_POST['father_contact2']);
  $father_email=mysqli_real_escape_string($con, $_POST['father_email2']);
  $father_work=mysqli_real_escape_string($con, $_POST['father_work2']);
  $father_emp=mysqli_real_escape_string($con, $_POST['father_emp2']);
  $father_emp_add=mysqli_real_escape_string($con, $_POST['father_emp_add2']);
  $father_emp_no=mysqli_real_escape_string($con, $_POST['father_emp_no2']);
  $father_educ=mysqli_real_escape_string($con, $_POST['father_educ2']);

  $mother_name=mysqli_real_escape_string($con, $_POST['mother_name2']);
  $mother_citizen=mysqli_real_escape_string($con, $_POST['mother_citizen2']);
  $mother_add=mysqli_real_escape_string($con, $_POST['mother_add2']);
  $mother_contact=mysqli_real_escape_string($con, $_POST['mother_contact2']);
  $mother_email=mysqli_real_escape_string($con, $_POST['mother_email2']);
  $mother_work=mysqli_real_escape_string($con, $_POST['mother_work2']);
  $mother_emp=mysqli_real_escape_string($con, $_POST['mother_emp2']);
  $mother_emp_add=mysqli_real_escape_string($con, $_POST['mother_emp_add2']);
  $mother_emp_no=mysqli_real_escape_string($con, $_POST['mother_emp_no2']);
  $mother_educ=mysqli_real_escape_string($con, $_POST['mother_educ2']);

  $guardian_name=mysqli_real_escape_string($con, $_POST['guardian_name2']);
  $guardian_relation=mysqli_real_escape_string($con, $_POST['guardian_relation2']);
  $guardian_add=mysqli_real_escape_string($con, $_POST['guardian_add2']);
  $guardian_contact=mysqli_real_escape_string($con, $_POST['guardian_contact2']);
  $guardian_email=mysqli_real_escape_string($con, $_POST['guardian_email2']);
  $guardian_bday=mysqli_real_escape_string($con, $_POST['guardian_bday2']);
  $gbday=date("M d, Y", strtotime($guardian_bday));
  if(empty($guardian_bday)){
      $guardianbday="";
  }
  else{
      $guardianbday=$gbday;
  }
  $guardian_work=mysqli_real_escape_string($con, $_POST['guardian_work2']);
  $guardian_emp=mysqli_real_escape_string($con, $_POST['guardian_emp2']);
  $guardian_emp_add=mysqli_real_escape_string($con, $_POST['guardian_emp_add2']);
  $guardian_emp_no=mysqli_real_escape_string($con, $_POST['guardian_emp_no2']);

  $sibling1=mysqli_real_escape_string($con, $_POST['sibling12']);
  $sibling_age1=mysqli_real_escape_string($con, $_POST['sibling_age12']);
  $sibling_status1=mysqli_real_escape_string($con, $_POST['sibling_status12']);
  $sibling_contact1=mysqli_real_escape_string($con, $_POST['sibling_contact12']);

  $sibling2=mysqli_real_escape_string($con, $_POST['sibling22']);
  $sibling_age2=mysqli_real_escape_string($con, $_POST['sibling_age22']);
  $sibling_status2=mysqli_real_escape_string($con, $_POST['sibling_status22']);
  $sibling_contact2=mysqli_real_escape_string($con, $_POST['sibling_contact22']);

  $sibling3=mysqli_real_escape_string($con, $_POST['sibling32']);
  $sibling_age3=mysqli_real_escape_string($con, $_POST['sibling_age32']);
  $sibling_status3=mysqli_real_escape_string($con, $_POST['sibling_status32']);
  $sibling_contact3=mysqli_real_escape_string($con, $_POST['sibling_contact32']);

  $income=mysqli_real_escape_string($con, $_POST['income2']);

  $hobbies=mysqli_real_escape_string($con, $_POST['hobbies2']);
  $reason4enroll=mysqli_real_escape_string($con, $_POST['reason4enroll2']);
  $characteristics=mysqli_real_escape_string($con, $_POST['characteristics2']);
  $dream=mysqli_real_escape_string($con, $_POST['dream2']);

  $sql_educ="SELECT * FROM `educ_bg` WHERE `student_id`='$studID'";
  $educ=$con->query($sql_educ) or die ($con->error);
  $educBG=$educ->fetch_array();  

  $sql_req="SELECT * FROM `requirements` WHERE `student_id`='$studID'";
  $req=$con->query($sql_req) or die ($con->error);
  $reqs=$req->fetch_array();  

  //ALS_CERT
  if(!empty($_FILES['als_cert2']['name'])){
    if(!empty($educBG['als_cert'])){
        unlink("../requirements/AlsCertificates/".$educBG['als_cert']);
    }
    $als_cert=$application.'.'.pathinfo($_FILES["als_cert2"]['name'], PATHINFO_EXTENSION);
    $alsTarget="../requirements/AlsCertificates/".$als_cert;
    move_uploaded_file($_FILES["als_cert2"]["tmp_name"], $alsTarget);
    
  }else{
    $als_cert=$educBG['als_cert'];
  }
  //VAXCARD
  if(!empty($_FILES['vaxcard2']['name'])){
    if(!empty($reqs['vaxcard'])){
        unlink("../requirements/VaccinationCards/".$reqs['vaxcard']);
    }
    $vaxcard=$application.'.'.pathinfo($_FILES["vaxcard2"]['name'], PATHINFO_EXTENSION);
    $vaxTarget="../requirements/VaccinationCards/".$vaxcard;
    move_uploaded_file($_FILES["vaxcard2"]["tmp_name"], $vaxTarget);
    
  }else{
    $vaxcard=$reqs['vaxcard'];
  }
  //GOODMORAL
  if(!empty($_FILES['goodmoral2']['name'])){
    if(!empty($reqs['goodmoral'])){
        unlink("../requirements/Good Morals/".$reqs['goodmoral']);
    }
    $goodmoral=$application.'.'.pathinfo($_FILES["goodmoral2"]['name'], PATHINFO_EXTENSION);
    $goodmoralTarget="../requirements/Good Morals/".$goodmoral;
    move_uploaded_file($_FILES["goodmoral2"]["tmp_name"], $goodmoralTarget);
    
  }else{
    $goodmoral=$reqs['goodmoral'];
  }
  //BirthCert
  if(!empty($_FILES['birthcert2']['name'])){
    if(!empty($reqs['birthcert'])){
        unlink("../requirements/BirthCertificates/".$reqs['birthcert']);
    }
    $birthcert=$application.'.'.pathinfo($_FILES["birthcert2"]['name'], PATHINFO_EXTENSION);
    $birthcertTarget="../requirements/BirthCertificates/".$birthcert;
    move_uploaded_file($_FILES["birthcert2"]["tmp_name"], $birthcertTarget);
    
  }else{
    $birthcert=$reqs['birthcert'];
  }
  //Indigency
  if(!empty($_FILES['indigency2']['name'])){
    if(!empty($reqs['indigency'])){
        unlink("../requirements/Indigency/".$reqs['indigency']);
    }
    $indigency=$application.'.'.pathinfo($_FILES["indigency2"]['name'], PATHINFO_EXTENSION);
    $indigencyTarget="../requirements/Indigency/".$indigency;
    move_uploaded_file($_FILES["indigency2"]["tmp_name"], $indigencyTarget);
    
  }else{
    $indigency=$reqs['indigency'];
  }
  //voters
  if(!empty($_FILES['votercert2']['name'])){
    if(!empty($reqs['voters'])){
        unlink("../requirements/Voter_Certificates/".$reqs['voters']);
    }
    $votecert=$application.'.'.pathinfo($_FILES["votercert2"]['name'], PATHINFO_EXTENSION);
    $votecertTarget="../requirements/Voter_Certificates/".$votecert;
    move_uploaded_file($_FILES["votercert2"]["tmp_name"], $votecertTarget);
  }else{
    $votecert=$reqs['voters'];
  }

  //CARDS
  if($admit=="Freshman"){
    if(!empty($_FILES['g11card2']['name'])){
        if(!empty($reqs['g11card'])){
            unlink("../requirements/Grade11Cards/".$reqs['g11card']);
        }else{
            unlink("../requirements/TOR_Page1/".$reqs['torpg1']);
        }
        $g11card=$application.'.'.pathinfo($_FILES["g11card2"]['name'], PATHINFO_EXTENSION);
        $g11cardTarget="../requirements/Grade11Cards/".$g11card;
        move_uploaded_file($_FILES["g11card2"]["tmp_name"], $g11cardTarget);
        $torpg1="";
        
    }else{
        $g11card=$reqs['g11card'];
        $torpg1="";
    }
    if(!empty($_FILES['g12card2']['name'])){
        if(!empty($reqs['g12card'])){
            unlink("../requirements/Grade12Cards/".$reqs['g12card']);
        }else{
            unlink("../requirements/TOR_Page2/".$reqs['torpg2']);
        }
        $g12card=$application.'.'.pathinfo($_FILES["g12card2"]['name'], PATHINFO_EXTENSION);
        $g12cardTarget="../requirements/Grade12Cards/".$g12card;
        move_uploaded_file($_FILES["g12card2"]["tmp_name"], $g12cardTarget);
        $torpg2="";
        
    }else{
        $g12card=$reqs['g12card'];
        $torpg2="";
    }
  }else if($admit=="Transferee"){
    if(!empty($_FILES['torpg12']['name'])){
        if(!empty($reqs['torpg1'])){
            unlink("../requirements/TOR_Page1/".$reqs['torpg1']);
        }else{
            unlink("../requirements/Grade11Cards/".$reqs['g11card']);
        }

        $torpg1=$application.'.'.pathinfo($_FILES["torpg12"]['name'], PATHINFO_EXTENSION);
        $torpg1Target="../requirements/TOR_Page1/".$torpg1;
        move_uploaded_file($_FILES["torpg12"]["tmp_name"], $torpg1Target);
        $g11card="";
        
    }else{
        $torpg1=$reqs['torpg1'];
        $g11card="";
    }
    if(!empty($_FILES['torpg22']['name'])){
        if(!empty($reqs['torpg2'])){
            unlink("../requirements/TOR_Page2/".$reqs['torpg2']);
        }else{
            unlink("../requirements/Grade12Cards/".$reqs['g12card']);
        }

        $torpg2=$application.'.'.pathinfo($_FILES["torpg22"]['name'], PATHINFO_EXTENSION);
        $torpg2Target="../requirements/TOR_Page2/".$torpg2;
        move_uploaded_file($_FILES["torpg22"]["tmp_name"], $torpg2Target);
        $g12card="";
        
    }else{
        $torpg2=$reqs['torpg2'];
        $g12card="";
    }
  }

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
    
     if($_FILES['profileImage2']['name']!=''){
        if(move_uploaded_file($_FILES["profileImage2"]["tmp_name"], $target_file)){
            if($oldimg!="default_photo.png"){
                unlink("../assets/imgs/student2x2/".$oldimg);
                //PERSONAL DATA
                $sql= "UPDATE `student_info` SET `picture`='$ImageName',`first_name`='$fname',`middle_name`='$mname',`last_name`='$lname',`suffix`='$suffixx',`stud_age`='$age',`birthplace`='$birthplace',`stud_bday`='$bday',`religion`='$religion',`gender`='$gender',`civil_status`='$status',`spouse_name`='$spouse_name',`spouse_add`='$spouse_add',`spouse_no`='$spouse_contact',`spouse_work`='$spouse_work',`spouse_emp`='$spouse_emp',`admit_type`='$admit',`stud_email`='$email',`contactno`='$phone',`1stprio`='$prio1',`2ndprio`='$prio2',`resident_of_calamba`='$calambares',`yrs_in_calamba`='$yrs_calamba',`pre_house`='$pre_houseno',`pre_brgy`='$pre_brgy',`pre_city`='$pre_city',`pre_zipcode`='$pre_zip',`per_house`='$per_houseno',`per_brgy`='$per_brgy',`per_city`='$per_city',`per_zipcode`='$per_zip',`groups`='$groups',`stable_internet`='$stablenet' WHERE `student_id`='$studID'";
                $con->query($sql) or die ($con->error);
                //EDUC BG
                $sql="UPDATE `educ_bg` SET `admit_type`='$admit',`elem_name`='$elem_name',`elem_address`='$elem_address',`elem_grad`='$dgrad_elem',`elem_honors`='$elem_honors',`jhs_name`='$jhs_name',`jhs_address`='$jhs_address',`jhs_grad`='$jhs_dgrad',`jhs_honors`='$jhs_honors',`shs_name`='$shs_name',`shs_address`='$shs_address',`shs_tracks`='$shs_tracks',`shs_strands`='$shs_strands',`shs_grad`='$shs_dgrad',`shs_honors`='$shs_honors',`g11gwa`='$g11_gwa',`g12gwa`='$g12_gwa',`college_name`='$college_name',`college_address`='$college_address',`college_course`='$college_course',`college_gwa`='$college_gwa',`tvc_name`='$tvc_name',`tvc_address`='$tvc_address',`tvc_grad`='$tvc_dgrad',`tvc_course`='$tvc_course',`als_name`='$als_name',`als_address`='$als_address', `als_cert`='$als_cert' WHERE `student_id`='$studID'";
                $con->query($sql) or die ($con->error);
                //FAMBG
                $sql="UPDATE `fam_bg` SET `father_name`='$father_name',`father_citizenship`='$father_citizen',`father_address`='$father_add',`father_contactno`='$father_contact',`father_email`='$father_email',`father_work`='$father_work',`father_emp`='$father_emp',`father_emp_add`='$father_emp_add',`father_no`='$father_emp_no',`father_educ`='$father_educ',`mother_name`='$mother_name',`mother_citizenship`='$mother_citizen',`mother_address`='$mother_add',`mother_contactno`='$mother_contact',`mother_email`='$mother_email',`mother_work`='$mother_work',`mother_emp`='$mother_emp',`mother_emp_add`='$mother_emp_add',`mother_emp_no`='$mother_emp_no',`mother_educ`='$mother_educ',`guardian_name`='$guardian_name',`guardian_relationship`='$guardian_relation',`guardian_address`='$guardian_add',`guardian_contactno`='$guardian_contact',`guardian_email`='$guardian_email',`guardian_bday`='$guardian_bday',`guardian_work`='$guardian_work',`guardian_emp`='$guardian_emp',`guardian_emp_address`='$guardian_emp_add',`guardian_emp_no`='$guardian_emp_no',`sibling_name1`='$sibling1',`sibling_age1`='$sibling_age1',`sibling_status1`='$sibling_status1',`sibling_contact1`='$sibling_contact1',`sibling_name2`='$sibling2',`sibling_age2`='$sibling_age2',`sibling_status2`='$sibling_status2',`sibling_contact2`='$sibling_contact2',`sibling_name3`='$sibling3',`sibling_age3`='$sibling_age3',`sibling_status3`='$sibling_status3',`sibling_contact3`='$sibling_contact3',`income_fam`='$income' WHERE `student_id`='$studID'";
                $con->query($sql) or die ($con->error);
                 //ORG INVOLVEMENT
                 $sql="UPDATE `org_involvement` SET `org1`='$org_name1',`pos1`='$position1',`nature1`='$nature1',`yrs1`='$yrs_org1',`org2`='$org_name2',`pos2`='$position2',`nature2`='$nature2',`yrs2`='$yrs_org2',`org3`='$org_name3',`pos3`='$position3',`nature3`='$nature3',`yrs3`='$yrs_org3' WHERE `student_id`='$studID'";
                 $con->query($sql) or die ($con->error);
                //PERSONAL ADMIRE
                 $sql="UPDATE `personal_admiration` SET `hobbies`='$hobbies',`reason_enroll`='$reason4enroll',`characteristics`='$characteristics',`goals`='$dream' WHERE `student_id`='$studID'";
                 $con->query($sql) or die ($con->error);
                //REQUIREMENTS
                $sql=$con->query("UPDATE `requirements` SET `g11card`='$g11card', `g12card`='$g12card', `torpg1`='$torpg1', `torpg2`='$torpg2', `goodmoral`='$goodmoral', `birthcert`='$birthcert', `indigency`='$indigency', `voters`='$votecert', `vaxcard`='$vaxcard' WHERE `student_id`='$studID'");
                 //NOTIF
               $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','updated the details of $stud_name','$dateNotif')");

                //LOG
                $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Updated Student Details','$phdate','$phtime')";
                $con->query($sql) or die ($con->error);

                $_SESSION["message"] = "<script>
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Successfully Saved',
                  text: 'You updated student details',
                  showConfirmButton: false,
                  timer: 2000
                })
                // window.history.replaceState( null, null, window.location.href );
                </script>";
            }else{
                //PERSONAL DATA
              $sql= "UPDATE `student_info` SET `picture`='$ImageName',`first_name`='$fname',`middle_name`='$mname',`last_name`='$lname',`suffix`='$suffixx',`stud_age`='$age',`birthplace`='$birthplace',`stud_bday`='$bday',`religion`='$religion',`gender`='$gender',`civil_status`='$status',`spouse_name`='$spouse_name',`spouse_add`='$spouse_add',`spouse_no`='$spouse_contact',`spouse_work`='$spouse_work',`spouse_emp`='$spouse_emp',`admit_type`='$admit',`stud_email`='$email',`contactno`='$phone',`1stprio`='$prio1',`2ndprio`='$prio2',`resident_of_calamba`='$calambares',`yrs_in_calamba`='$yrs_calamba',`pre_house`='$pre_houseno',`pre_brgy`='$pre_brgy',`pre_city`='$pre_city',`pre_zipcode`='$pre_zip',`per_house`='$per_houseno',`per_brgy`='$per_brgy',`per_city`='$per_city',`per_zipcode`='$per_zip',`groups`='$groups',`stable_internet`='$stablenet' WHERE `student_id`='$studID'";
                $con->query($sql) or die ($con->error);
              //EDUC BG
              $sql="UPDATE `educ_bg` SET `admit_type`='$admit',`elem_name`='$elem_name',`elem_address`='$elem_address',`elem_grad`='$dgrad_elem',`elem_honors`='$elem_honors',`jhs_name`='$jhs_name',`jhs_address`='$jhs_address',`jhs_grad`='$jhs_dgrad',`jhs_honors`='$jhs_honors',`shs_name`='$shs_name',`shs_address`='$shs_address',`shs_tracks`='$shs_tracks',`shs_strands`='$shs_strands',`shs_grad`='$shs_dgrad',`shs_honors`='$shs_honors',`g11gwa`='$g11_gwa',`g12gwa`='$g12_gwa',`college_name`='$college_name',`college_address`='$college_address',`college_course`='$college_course',`college_gwa`='$college_gwa',`tvc_name`='$tvc_name',`tvc_address`='$tvc_address',`tvc_grad`='$tvc_dgrad',`tvc_course`='$tvc_course',`als_name`='$als_name',`als_address`='$als_address', `als_cert`='$als_cert' WHERE `student_id`='$studID'";
              $con->query($sql) or die ($con->error);
              //FAMBG
              $sql="UPDATE `fam_bg` SET `father_name`='$father_name',`father_citizenship`='$father_citizen',`father_address`='$father_add',`father_contactno`='$father_contact',`father_email`='$father_email',`father_work`='$father_work',`father_emp`='$father_emp',`father_emp_add`='$father_emp_add',`father_no`='$father_emp_no',`father_educ`='$father_educ',`mother_name`='$mother_name',`mother_citizenship`='$mother_citizen',`mother_address`='$mother_add',`mother_contactno`='$mother_contact',`mother_email`='$mother_email',`mother_work`='$mother_work',`mother_emp`='$mother_emp',`mother_emp_add`='$mother_emp_add',`mother_emp_no`='$mother_emp_no',`mother_educ`='$mother_educ',`guardian_name`='$guardian_name',`guardian_relationship`='$guardian_relation',`guardian_address`='$guardian_add',`guardian_contactno`='$guardian_contact',`guardian_email`='$guardian_email',`guardian_bday`='$guardian_bday',`guardian_work`='$guardian_work',`guardian_emp`='$guardian_emp',`guardian_emp_address`='$guardian_emp_add',`guardian_emp_no`='$guardian_emp_no',`sibling_name1`='$sibling1',`sibling_age1`='$sibling_age1',`sibling_status1`='$sibling_status1',`sibling_contact1`='$sibling_contact1',`sibling_name2`='$sibling2',`sibling_age2`='$sibling_age2',`sibling_status2`='$sibling_status2',`sibling_contact2`='$sibling_contact2',`sibling_name3`='$sibling3',`sibling_age3`='$sibling_age3',`sibling_status3`='$sibling_status3',`sibling_contact3`='$sibling_contact3',`income_fam`='$income' WHERE `student_id`='$studID'";
              $con->query($sql) or die ($con->error);
              //ORG INVOLVEMENT
              $sql="UPDATE `org_involvement` SET `org1`='$org_name1',`pos1`='$position1',`nature1`='$nature1',`yrs1`='$yrs_org1',`org2`='$org_name2',`pos2`='$position2',`nature2`='$nature2',`yrs2`='$yrs_org2',`org3`='$org_name3',`pos3`='$position3',`nature3`='$nature3',`yrs3`='$yrs_org3' WHERE `student_id`='$studID'";
              $con->query($sql) or die ($con->error);
              //PERSONAL ADMIRE
              $sql="UPDATE `personal_admiration` SET `hobbies`='$hobbies',`reason_enroll`='$reason4enroll',`characteristics`='$characteristics',`goals`='$dream' WHERE `student_id`='$studID'";
              $con->query($sql) or die ($con->error);
              //REQUIREMENTS
              $sql=$con->query("UPDATE `requirements` SET `g11card`='$g11card', `g12card`='$g12card', `torpg1`='$torpg1', `torpg2`='$torpg2', `goodmoral`='$goodmoral', `birthcert`='$birthcert', `indigency`='$indigency', `voters`='$votecert', `vaxcard`='$vaxcard' WHERE `student_id`='$studID'");
               //NOTIF
               $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','updated the details of $stud_name','$dateNotif')");

              //LOG
              $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Updated Student Details','$phdate','$phtime')";
              $con->query($sql) or die ($con->error);

                $_SESSION["message"] = "<script>
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Successfully Saved',
                  text: 'You updated student details',
                  showConfirmButton: false,
                  timer: 2000
                })
                window.history.replaceState( null, null, window.location.href );
                </script>";
            }
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
        }

     }else{
      //PERSONAL DATA
      $sql= "UPDATE `student_info` SET `first_name`='$fname',`middle_name`='$mname',`last_name`='$lname',`suffix`='$suffixx',`stud_age`='$age',`birthplace`='$birthplace',`stud_bday`='$bday',`religion`='$religion',`gender`='$gender',`civil_status`='$status',`spouse_name`='$spouse_name',`spouse_add`='$spouse_add',`spouse_no`='$spouse_contact',`spouse_work`='$spouse_work',`spouse_emp`='$spouse_emp',`admit_type`='$admit',`stud_email`='$email',`contactno`='$phone',`1stprio`='$prio1',`2ndprio`='$prio2',`resident_of_calamba`='$calambares',`yrs_in_calamba`='$yrs_calamba',`pre_house`='$pre_houseno',`pre_brgy`='$pre_brgy',`pre_city`='$pre_city',`pre_zipcode`='$pre_zip',`per_house`='$per_houseno',`per_brgy`='$per_brgy',`per_city`='$per_city',`per_zipcode`='$per_zip',`groups`='$groups',`stable_internet`='$stablenet' WHERE `student_id`='$studID'";
      $con->query($sql) or die ($con->error);
      //EDUC BG
      $sql="UPDATE `educ_bg` SET `admit_type`='$admit',`elem_name`='$elem_name',`elem_address`='$elem_address',`elem_grad`='$dgrad_elem',`elem_honors`='$elem_honors',`jhs_name`='$jhs_name',`jhs_address`='$jhs_address',`jhs_grad`='$jhs_dgrad',`jhs_honors`='$jhs_honors',`shs_name`='$shs_name',`shs_address`='$shs_address',`shs_tracks`='$shs_tracks',`shs_strands`='$shs_strands',`shs_grad`='$shs_dgrad',`shs_honors`='$shs_honors',`g11gwa`='$g11_gwa',`g12gwa`='$g12_gwa',`college_name`='$college_name',`college_address`='$college_address',`college_course`='$college_course',`college_gwa`='$college_gwa',`tvc_name`='$tvc_name',`tvc_address`='$tvc_address',`tvc_grad`='$tvc_dgrad',`tvc_course`='$tvc_course',`als_name`='$als_name',`als_address`='$als_address', `als_cert`='$als_cert' WHERE `student_id`='$studID'";
      $con->query($sql) or die ($con->error);
      //FAMBG
      $sql="UPDATE `fam_bg` SET `father_name`='$father_name',`father_citizenship`='$father_citizen',`father_address`='$father_add',`father_contactno`='$father_contact',`father_email`='$father_email',`father_work`='$father_work',`father_emp`='$father_emp',`father_emp_add`='$father_emp_add',`father_no`='$father_emp_no',`father_educ`='$father_educ',`mother_name`='$mother_name',`mother_citizenship`='$mother_citizen',`mother_address`='$mother_add',`mother_contactno`='$mother_contact',`mother_email`='$mother_email',`mother_work`='$mother_work',`mother_emp`='$mother_emp',`mother_emp_add`='$mother_emp_add',`mother_emp_no`='$mother_emp_no',`mother_educ`='$mother_educ',`guardian_name`='$guardian_name',`guardian_relationship`='$guardian_relation',`guardian_address`='$guardian_add',`guardian_contactno`='$guardian_contact',`guardian_email`='$guardian_email',`guardian_bday`='$guardian_bday',`guardian_work`='$guardian_work',`guardian_emp`='$guardian_emp',`guardian_emp_address`='$guardian_emp_add',`guardian_emp_no`='$guardian_emp_no',`sibling_name1`='$sibling1',`sibling_age1`='$sibling_age1',`sibling_status1`='$sibling_status1',`sibling_contact1`='$sibling_contact1',`sibling_name2`='$sibling2',`sibling_age2`='$sibling_age2',`sibling_status2`='$sibling_status2',`sibling_contact2`='$sibling_contact2',`sibling_name3`='$sibling3',`sibling_age3`='$sibling_age3',`sibling_status3`='$sibling_status3',`sibling_contact3`='$sibling_contact3',`income_fam`='$income' WHERE `student_id`='$studID'";
      $con->query($sql) or die ($con->error);
      //ORG INVOLVEMENT
      $sql="UPDATE `org_involvement` SET `org1`='$org_name1',`pos1`='$position1',`nature1`='$nature1',`yrs1`='$yrs_org1',`org2`='$org_name2',`pos2`='$position2',`nature2`='$nature2',`yrs2`='$yrs_org2',`org3`='$org_name3',`pos3`='$position3',`nature3`='$nature3',`yrs3`='$yrs_org3' WHERE `student_id`='$studID'";
      $con->query($sql) or die ($con->error);
      //PERSONAL ADMIRE
      $sql="UPDATE `personal_admiration` SET `hobbies`='$hobbies',`reason_enroll`='$reason4enroll',`characteristics`='$characteristics',`goals`='$dream' WHERE `student_id`='$studID'";
      $con->query($sql) or die ($con->error);

       //LOG
       $sql="INSERT INTO `admin_logs`(`adminID`, `activity`, `date`, `time`) VALUES ($adminID,'You Updated Student Details','$phdate','$phtime')";
       $con->query($sql) or die ($con->error);
        //REQUIREMENTS
        $sql=$con->query("UPDATE `requirements` SET `g11card`='$g11card', `g12card`='$g12card', `torpg1`='$torpg1', `torpg2`='$torpg2', `goodmoral`='$goodmoral', `birthcert`='$birthcert', `indigency`='$indigency', `voters`='$votecert', `vaxcard`='$vaxcard' WHERE `student_id`='$studID'");
        //NOTIF
      $sqlNotif=$con->query("INSERT INTO `notifications`(`adminID`, `admin_name`, `activity`, `date_time`) VALUES ('$adminID','$name','updated the details of $stud_name','$dateNotif')");

      $_SESSION["message"] = "<script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Successfully Saved',
        text: 'You updated student details',
        showConfirmButton: false,
        timer: 2000
      })
      window.history.replaceState( null, null, window.location.href );
      </script>";

     

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

     }

}
   
  

  
?>