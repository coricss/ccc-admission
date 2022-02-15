<?php
    if(!isset($_SESSION)){
        session_start();
    }
    
    include_once("../../connect.php");
    $con=connect();

    $sql=$con->query("SELECT * FROM `admission_status`");
    $row=$sql->fetch_array();

    if($row['status']=='0'){
        echo '<i id="btn-toggle" class="bx bxs-toggle-right" style="font-size: 30px"></i>';
    }else{
        echo '<i id="btn-toggle" class="bx bxs-toggle-left" style="font-size: 30px"></i>';
    }
?>