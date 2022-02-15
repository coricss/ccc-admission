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

$sql=$con->query("SELECT feedbacks.feedback_id, feedbacks.application_no, feedbacks.photo, feedbacks.sender, feedbacks.email, feedbacks.message, feedbacks.date_sent FROM `feedbacks` INNER JOIN (SELECT `sender`, max(`feedback_id`) AS MaxFB, `feedback_id` FROM `feedbacks` GROUP BY `sender`) feedback2 ON feedbacks.sender = feedback2.sender AND feedbacks.`feedback_id` = feedback2.MaxFB ORDER BY feedbacks.feedback_id DESC");

if($sql->num_rows!=0){
    while($row = $sql->fetch_array()){
        $fbid=$row['feedback_id'];
        $time_ago          = strtotime($row["date_sent"]); 
        $current_time      = time();  
        $time_difference   = $current_time - $time_ago;  
        $seconds           = $time_difference;  
        $minutes           = round($seconds / 60 );
        $minutes           = round($seconds / 60 );           // value 60 is seconds  
        $hours             = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
        $days              = round($seconds / 86400); 

        $dateSent = date("l, F j, Y - g:i A", strtotime($row["date_sent"]));
        if($minutes>=15){
            $time="";
            $timeColor="color: black";
            $opacity="opacity: 0";
        }else{
            $time="new";
            $timeColor="color: #043ea7";
            $opacity="opacity: 1";
        }
        if($days>=7){
           $sqlDel=$con->query("DELETE FROM `feedbacks` WHERE `feedback_id`='$fbid'");
        }
        // '.$link.' '.$time.'  '.$timeColor.' .$opacity.'
            echo '      
            <a href="feedbacks.php" class="msg-link '.$time.'" id="msg-link-'.$row["feedback_id"].'" style="text-decoration: none; color: black">
                <div class="msg-row mb-2">
                    <img class="profile-image-msg" style="border: 1px solid gray" src="../assets/imgs/student2x2/'.$row["photo"].'" alt="">
                    <div class="msg-activity">
                        <p class="notif-msg" ><b>'.$row["sender"].'</b></p> 
                        <small style="'.$timeColor.'">'.$row["message"].'</small> <br>
                        <small class="msg-time text-muted" style="font-size: 12px;">'.get_time_ago($row["date_sent"]).'</small>
                    </div>
                    <i class="bx bxs-circle bx-tada mx-2 text-start" style="float: right; color: #0754de; font-size: 15px; '.$opacity.'"></i>
                </div>
            </a>
            ';
    }
}else{
    echo '
    <center>
    <i class="bx bxs-message-rounded p-1 text-muted"></i>
    <h6 class="text-muted">No Feedbacks Found.</h6>
    </center>
    ';
}
// <a id="btn-studentFB" class="btn-studentFB " sender="'.$row["sender"].'" data-id="'.$row["feedback_id"].'" feedback-id="fbID-'.$row["feedback_id"].'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$dateSent.'">
// <div class="friend-drawer friend-drawer--onhover mt-1" id="fbID-'.$row["feedback_id"].'">
//     '.$new_indicator.'
//     <img class="profile-image" id="stud-img-'.$row["feedback_id"].'" style="'.$border.'" src="../assets/imgs/student2x2/'.$row["photo"].'" alt="">
//     <div class="text">
//         <h6 class="feedback-sender" style="'.$font.'" id="sender-'.$row["feedback_id"].'">'.$row["sender"].'</h6>
//         <small class="" id="message-'.$row["feedback_id"].'" style="'.$font1.'">'.$row["message"].'</small>
//     </div>
//     <small class="time text-muted small" style="'.$font2.'" id="timeSent-'.$row["feedback_id"].'">'.get_time_ago($row["date_sent"]).'</small>
// </div>
// </a>
?>