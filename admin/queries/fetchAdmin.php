<?php 
 include_once("../../connect.php");
 $con=connect();
$sql=$con->query("SELECT * FROM `admin_info`");

if($sql->num_rows!=0){
    while($row=$sql->fetch_array()){
        echo "
            <tr style='text-align: center '>
                <td style='border: 1px solid gray'>
                    <center>
                        <img style='border: 1px solid gray; border-radius: 50%; width: 60px; height: 60px;' src=../assets/imgs/admin_photos/".$row['admin_photo'].">
                    </center>
                </td>
                <td style='border: 1px solid gray'>".$row['admin_firstname']." ".$row['admin_lastname']."</td>
                <td style='border: 1px solid gray'><a href='mailto:".$row['admin_email']."' style='text-decoration: none; color: black'>".$row['admin_email']."</a></td>
                <td style='border: 1px solid gray'>".$row['admin_contactno']."</td>
                <td style='border: 1px solid gray'>".$row['admin_address']."</td>
            </tr>
        ";
    }
}else{
    echo "
        <tr>
            <td colspan='5'><h5>No admins registered</h5></td>
        </tr>
    ";
}
?>