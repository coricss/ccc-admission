<?php 
if(!isset($_SESSION)){
    session_start();    
}
include_once("../../connect.php");
$con=connect();
date_default_timezone_set('Asia/Manila');
function get_time_ago($timestamp){  
    $time_ago          = strtotime($timestamp);  
    $current_time      = time();  
    $time_difference   = $current_time - $time_ago;  
    $seconds           = $time_difference;  
    $minutes           = round($seconds / 60 );           // value 60 is seconds  
    $hours             = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
    $days              = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
    $weeks             = round($seconds / 604800);          // 7*24*60*60;  
    $months            = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
    $years             = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if($seconds <= 60) {  
        return "Just now";  
    }else if($minutes <=60){  
        if($minutes==1){  
            return "a minute ago";  
        }  
        else{  
            return $minutes." minutes ago";  
        }  
    }else if($hours <=24){
        if($hours==1){  
            return "an hour ago";  
        }else{  
            return $hours." hours ago";  
        }  
    }else if($days <=7){  
        if($days==1){  
            return "a day ago";  
        }else{  
            return $days." days ago";  
        }  
    }else if($weeks <= 4.3){  
        if($weeks==1){  
            return "a week ago";  
        }else{  
            return $weeks." weeks ago";  
        }  
    }
    else if($months <=12){  
        if($months==1){  
            return "a month ago";  
        }else{  
            return $months." months ago";  
        }  
    }
    else{  
        if($years==1){  
            return "a year ago";  
        }else{  
            return $years." years ago";  
        }  
    } 
}
$adminID=$_SESSION["ID"];
$sql=$con->query("SELECT * FROM `notifications` INNER JOIN `admin_info` ON notifications.adminID=admin_info.adminID WHERE notifications.adminID!= '$adminID' ORDER BY `notif_id` DESC");

if($sql->num_rows!=0){
    while($row = $sql->fetch_array()){
        $time_ago          = strtotime($row["date_time"]);  
        $current_time      = time();  
        $time_difference   = $current_time - $time_ago;  
        $seconds           = $time_difference;  
        $minutes           = round($seconds / 60 );           // value 60 is seconds  
        $hours             = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
        $days              = round($seconds / 86400); 

        if($minutes>=15){
            $time="";
            $opacity="opacity: 0";
            $timeColor="color: gray";
        }else{
            $timeColor="color: #043ea7";
            $time="new";
            $opacity="opacity: 1";
        }
        if($days>=4){
            $sqlDel=$con->query("DELETE FROM `notifications` WHERE `adminID`!='$adminID'");
         }
        $act=$row['activity'];
        $verify = strchr($row['activity'], 'verified');
        $decline = strchr($row['activity'], 'declined');
        $added = strchr($row['activity'], 'added');
        $register = strchr($row['activity'], 'registered');
        $update = strchr($row['activity'], 'updated');
        $suspended= strchr($row['activity'], 'suspended');
 
        if($verify||$decline||$update){
            $link="student.php";
        }else if($added){
            $link="settings.php";
        }else if($register||$suspended){
            $link="dashboard.php";
        }else{
            $link="";
        }
        echo '
        <a href="'.$link.'" class="notif-link '.$time.'" id="notif-link-'.$row["notif_id"].'" style="text-decoration: none; color: black">
        <div class="notif-row mb-2">
            <img class="profile-image-notif" style="border: 1px solid gray" src="../assets/imgs/admin_photos/'.$row["admin_photo"].'" alt="">
            <div class="notif-activity">
                <p class="notif-msg" ><b>'.$row["admin_name"].'</b> <small>'.$row["activity"].'</small> </p> 
                <div style="align-contents: center;">
                <i class="bx bx-time-five text-muted" style="font-size: 13px; margin-right: 3px" ></i><small class="notif-time" style="font-size: 12px; '.$timeColor.'">'.get_time_ago($row["date_time"]).'</small>
                </div>
            </div>
            <i class="bx bxs-circle bx-tada mx-2 text-start" style="float: right; color: #0754de; font-size: 15px; '.$opacity.'"></i>
        </div>
        </a>
        ';
    }
}else{
    echo '
    <center>
    <i class="bx bxs-bell p-1 text-muted"></i>
    <h6 class="text-muted">No Notifications Found.</h6>
    </center>
    ';
}
?>