<?php 
  include_once("../../connect.php");
  $con=connect();
 $admin="";
 $column_name=$_POST['column_name'];
 $sql="SELECT * FROM `admin_info` ORDER BY `$column_name` ASC";
$result=$con->query($sql) or die ($con->error);

$admin="
    <thead class='table-ccc'>
        <th style='border: 1px solid gray' width='10%'>Photo</th>
        <th style='border: 1px solid gray' width='20%'>Name</th>
        <th style='border: 1px solid gray' width='20%'>Email</th>
        <th style='border: 1px solid gray' width='20%'>Contact No</th>
        <th style='border: 1px solid gray' width='20%'>Address</th>
    </thead>
<tbody>
";
while($row= $result->fetch_array()){
    $admin.="
        <tr style='text-align: center'>
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
$admin .="</tbody>";
echo $admin;
?>