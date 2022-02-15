<?php 
if(!isset($_SESSION)){
    session_start();    
}

include_once("../../connect.php");
$con=connect();
$id=$_SESSION['ID'];
$sql=$con->query("SELECT * FROM `admin_logs` WHERE `adminID`=$id ORDER BY `log_id` DESC");

while($row= $sql->fetch_array()){
    echo"
    <tr>
        <td><b>".$row['activity']."</b></td>
        <td>".$row['date']."</td>
        <td>".$row['time']."</td>
    </tr>
    ";
}

?>