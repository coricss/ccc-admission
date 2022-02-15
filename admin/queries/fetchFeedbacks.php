<?php 

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
        return "Now";  
    }else if($minutes <=60){  
        if($minutes==1){  
            return "1m";  
        }  
        else{  
            return $minutes."m";  
        }  
    }else if($hours <=24){
        if($hours==1){  
            return "1h";  
        }else{  
            return $hours."h";  
        }  
    }else if($days <=7){  
        if($days==1){  
            return "1d";  
        }else{  
            return $days."d";  
        }  
    }else if($weeks <= 4.3){  
        if($weeks==1){  
            return "1w";  
        }else{  
            return $weeks."w";  
        }  
    }
    else if($months <=12){  
        if($months==1){  
            return "1mo";  
        }else{  
            return $months."mos";  
        }  
    }
    else{  
        if($years==1){  
            return "1yr";  
        }else{  
            return $years."yrs";  
        }  
    } 
}

$sql=$con->query("SELECT feedbacks.feedback_id, feedbacks.application_no, feedbacks.photo, feedbacks.sender, feedbacks.email, feedbacks.message, feedbacks.date_sent FROM `feedbacks` INNER JOIN (SELECT `sender`, max(`feedback_id`) AS MaxFB, `feedback_id` FROM `feedbacks` GROUP BY `sender`) feedback2 ON feedbacks.sender = feedback2.sender AND feedbacks.`feedback_id` = feedback2.MaxFB ORDER BY feedbacks.feedback_id DESC");

if($sql->num_rows!=0){


    while($row = $sql->fetch_array()){
       
        $time_ago          = strtotime($row["date_sent"]); 
        $current_time      = time();  
        $time_difference   = $current_time - $time_ago;  
        $seconds           = $time_difference;  
        $minutes           = round($seconds / 60 );   
        $dateSent = date("l, F j, Y - g:i A", strtotime($row["date_sent"]));
        if($minutes>=15){
            $border="border: 2px solid gray";
            $font="font-weight: 500";
            $font1="font-weight: 400; color: gray";
            $font2="font-weight: 400";
            $new_indicator='<i class="bx bxs-circle bx-tada mx-2" id="indicator-'.$row["feedback_id"].'" style="color: #0754de; font-size: 10px; opacity: 0"></i>';
        }else{
            $border="border: 2px solid #0754de";
            $font="font-weight: 700";
            $font1="font-weight: 500; color: #043ea7";
            $font2="font-weight: 500";
            $new_indicator='<i class="bx bxs-circle bx-tada mx-2 text-start" id="indicator-'.$row["feedback_id"].'" style="float: right; color: #0754de; font-size: 10px; opacity: 1"></i>';
        }
            echo '
            <a id="btn-studentFB" class="btn-studentFB " sender="'.$row["sender"].'" data-id="'.$row["feedback_id"].'" feedback-id="fbID-'.$row["feedback_id"].'">
                <div class="friend-drawer friend-drawer--onhover mt-1" id="fbID-'.$row["feedback_id"].'">
                    '.$new_indicator.'
                    <img class="profile-image" id="stud-img-'.$row["feedback_id"].'" style="'.$border.'" src="../assets/imgs/student2x2/'.$row["photo"].'" alt="">
                    <div class="text">
                        <h6 class="feedback-sender" style="'.$font.'" id="sender-'.$row["feedback_id"].'">'.$row["sender"].'</h6>
                        <small class="" id="message-'.$row["feedback_id"].'" style="'.$font1.'">'.$row["message"].'</small>
                    </div>
                    <small class="time text-muted small" style="'.$font2.'" id="timeSent-'.$row["feedback_id"].'">'.get_time_ago($row["date_sent"]).'</small>
                </div>
            </a>
            ';
     
    }
    
}else{
    echo '<h5 class="text-center">No feedback results.</h5>';
}
?>