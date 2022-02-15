<?php 
if(!isset($_SESSION)){
    session_start();    
}
    date_default_timezone_set('Asia/Manila');
    $time=date("Y-m-d g:i:s A");
    include_once("../../connect.php");
    $con=connect();
    $adminID=$_SESSION["ID"];
    $sql=$con->query("SELECT * FROM `notifications` WHERE TIMEDIFF('$time', `date_time`) >= '00:03:00' AND `adminID`!='$adminID'");

    $countNotif=$sql->num_rows;
  
    // while($row = $sql->fetch_array()){
    //     $time_ago          = strtotime($row["date_time"]); 
    //     $current_time      = time();  
    //     $time_difference   = $current_time - $time_ago;  
    //     $seconds           = $time_difference;  
    //     $minutes           = round($seconds / 60 );   
    //     if($minutes>=15){
    //         $count=0;
    //     }else{
    //         $count=$countNotif-1;
    //     }
    // }
    // echo "
    //         <script>
    //             Swal.fire({
    //                 text: '$time'
    //             })
    //         </script>
    //     ";
    // if($countNotif>=99){
    //     echo '
    //         <script>
    //             $("#notif-count").show();
    //         </script>
    //     ';
    //     echo '<h6 style="font-size: 10px;">99</h6>';
    // }else if($countNotif>=1){
    //     echo '
    //         <script>
    //             $("#notif-count").show();
    //         </script>
    //     ';
    //     echo '<h6 style="font-size: 10px;">'.$countNotif.'</h6>';
    // }else{
    //     echo '
    //         <script>
    //             $("#notif-count").hide();
    //         </script>
    //     ';
    // }

?>