<?php
    // extract($_POST);
    if(isset($_POST['btn-submit'])){
        $file=$_FILES["profileImage"]["name"];
        $g11card=$_FILES["g11card"]["name"];
        $g12card=$_FILES["g12card"]["name"];
        $fname=$_POST["fname"];
        $mname=$_POST["mname"];
        $lname=$_POST["lname"];
        $pre_brgy=$_POST["pre_brgy"];
        $status=$_POST['status'];
        $spouse_name=$_POST['spouse_name'];
        $spouse_contact=$_POST['spouse_contact'];
        $hobbies=$_POST['hobbies'];
        $reason4enroll=$_POST['reason4enroll'];
        $characteristics=$_POST['characteristics'];
        $dream=$_POST['dream'];
        $group=$_POST["group"];
        $groups=implode("<br>", $group);
        if($file==""){
            echo "Walang picture";
        }else{
            echo $file;
        }
        
        echo "<br>".$fname."<br>".$lname."<br>".$mname."<br>".$pre_brgy."<br>".$status."<br>".$spouse_name."<br>".$spouse_contact;
        echo "<br>".$hobbies."<br>".$reason4enroll."<br>".$characteristics."<br>".$dream."<br>".$g11card."<br>".$g12card."<br>";
        echo $groups;
    }
   
?>