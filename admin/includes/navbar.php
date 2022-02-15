
    <nav class="navbar fixed-top">
            <div class="hamburger">
                <div class="bar bar1" id='1'></div>
                <div class="bar bar2"></div>
                <div class="bar bar3"></div>
            </div>
            <!-- <i class='bx bxs-right-arrow' ></i> -->
            <div class="ml-auto text-end">
                <div class="text-uppercase" style="align-items: center; display: flex">
                    <small id="timer"></small>
                    <i class='bx bxs-bell p-1' style="margin-right: 5px" id="notif" data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Notifications'></i>
                    <div class="notif-count" id="notif-count" style="display: none">
                        <h6 style="font-size: 10px;" id="count-notif"></h6>
                        <!-- <h6 style="font-size: 10px;" id="count-notif2">0</h6> -->
                    </div>
                    <i class='bx bxs-message-rounded p-1' id='msg' style="margin-right: 5px" data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Feedbacks'></i> 
                    <div class="msg-count" id="msg-count" style="display: none">
                        <h6 style="font-size: 10px;" id="count-msg"></h6>
                    </div>     
                    <i class='bx bx-fullscreen' style="margin-right: 5px" id="fullscreen" data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Fullscreen'></i>
                    <i class='bx bx-log-out-circle logout' data-id="<?php echo $_SESSION['ID']?>" data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-original-title='Logout'></i>
                </div>
            </div>
            <div id="notification-container" style="display: none">
                <div class="notif-title">
                    <h5>Notifications</h5>
                    <div class="" id="dismiss-notif">
                        <i class='bx bx-x'></i>
                    </div> 
                </div>
                <div class="notif-body" id="notif-body">
                    <!-- Notifications -->
                    <div id="notif-try">

                    </div>
                </div>
            </div>
            <div id="msg-container" style="display: none">
                <div class="msg-title">
                    <h5>Feedbacks & Suggestions</h5>
                    <div class="" id="dismiss-msg">
                        <i class='bx bx-x'></i>
                    </div> 
                </div>
                <div class="msg-body" id="msg-body">
                    <!-- Messages -->
                </div>
            </div>
    </nav>
        <div id="annualReport">
        </div>
    <script>
        $('#timer').load('queries/time.php');
        setInterval( function(){
            $('#timer').load('queries/time.php');
            $('#annualReport').load('queries/annualStudentReport.php');
        }, 1000);
    </script>