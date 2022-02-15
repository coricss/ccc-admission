<?php 
 include_once("../../connect.php");
 $con=connect();
date_default_timezone_set('Asia/Manila');
extract($_POST);
$sender1=mysqli_real_escape_string($con, $sender);
$sql=$con->query("SELECT * FROM `feedbacks` WHERE `sender`='$sender1' ORDER BY `date_sent` ASC");
$sql2=$con->query("SELECT * FROM `feedbacks` WHERE `sender`='$sender1' ORDER BY `date_sent` ASC");
$profile=$sql2->fetch_array();
if($sql->num_rows!=0){
    if($profile["sender"]=="Anonymous"){$email="noreply@domain.com";}else{$email=$profile["email"];}
        echo '
        <div id="student-header" style="display: flex; align-items: center">
            <img class="profile-image" src="../assets/imgs/student2x2/'.$profile["photo"].'" alt="">
            <div style="margin-left: 10px">
                <h5 class="feedback-title" style="margin: 0px">'.$profile["sender"].'</h5>
                <small><a class="text-muted" id="stud-email" data-email="'.$email.'" href=mailto:"'.$email.'" style="text-decoration: none">'.$email.'</a></small>
            </div>
        </div>
        <hr>
        <div class="chat-body" id="chat-body">
        ';
    while($row = $sql->fetch_array()){
        $dateSent = date("D, M. j, Y - g:i a", strtotime($row["date_sent"]));
        echo "

            <div class='chat-bubble'>
                <div class='chat-message' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='$dateSent'>
                    <p id='txt-message' style='margin: 0'>".$row["message"]."</p>
                </div>
            </div>
        ";
    }
        echo'
        </div>
        
        ';
        echo "
        <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=tooltip]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    ";
}
?>  
<script>
    $('#chat-body').scrollTop($('#chat-body')[0].scrollHeight);
</script>
