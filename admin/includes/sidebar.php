<div id="mySidenav" class="sidenav">
    <div class="icons"> 
        <div class="row inactive">
            <div class="col-2">
                <a href="dashboard.php" class="sidelinks"><i class="fas fa-tachometer-alt"></i></a>
            </div>
            <div class="col-10 labels"  id="labels">
                <a href="dashboard.php" class="sidelinks" id="lbl">Dashboard</a>
            </div>
        </div>
        
        <div class="row inactive active">
            <div class="col-2">
                <a href="student.php" class="sidelinks 2"><i class="fas fa-user-edit"></i></a>
            </div>
            <div class="col-10 labels" id="labels">
                <a href="student.php" class="sidelinks 2" id="lbl">Students</a>
            </div>
        </div>
        <div class="row inactive">
            <div class="col-2">
                <a href="#" class="sidelinks"><i class="fas fa-copy"></i></a>
            </div>
            <div class="col-10 labels" id="labels">
                <a href="#" class="sidelinks" id="lbl">Examination</a>
            </div>
        </div>
        <div class="row inactive">
            <div class="col-2">
                <a href="#" class="sidelinks"><i class="fas fa-chart-bar"></i></a>
            </div>
            <div class="col-10 labels" id="labels">
                <a href="#" class="sidelinks" id="lbl">Results</a>
            </div>
        </div>
        <div class="row inactive">
            <div class="col-2">  
                <a href="#" class="sidelinks"><i class="fas fa-comments"></i></a>
            </div>
            <div class="col-10 labels" id="labels">
                <a href="#" class="sidelinks" id="lbl">Feedbacks</a>
            </div>
        </div>
        <div class="row inactive">
            <div class="col-2">  
        <a href="queries/logout.php?logout=<?php echo $_SESSION['ID']?>" name="logout" id="logout" class="sidelinks"><i class="fas fa-sign-out-alt"></i></a>
        </div>
            <div class="col-10 labels" id=labels>
                <a href="?logout=<?php echo $_SESSION['ID']?>" name="logout" class="sidelinks" id="lbl">Logout</a>
            </div>
        </div>
    </div>
</div>