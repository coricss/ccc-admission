<?php 
    include_once("../../connect.php");
    $con=connect();
    $admin=$con->query("SELECT * FROM `admin_info` ORDER BY `admin_firstname` ASC");
    date_default_timezone_set('Asia/Manila');
    $SchoolYear=date("m-d-Y");
    if(isset($_POST['print-admin'])){
        if($admin->num_rows!=0){
            print "
                <style>
                    table, td {
                        border:1px solid black
                    } 
                    table{
                        border-collapse:collapse
                    } 
                    .table-header{
                    color: white; background-color: black
                    }</style>
                <table>
                    <tr>
                        <th class='table-header'>First name</th>
                        <th class='table-header'>Last name</th>
                        <th class='table-header'>Email</th>
                        <th class='table-header'>Contact Number</th>
                        <th class='table-header'>Address</th>
                    </tr>
            ";
            while($row = $admin->fetch_array()){
               print "
                <tr>
                    <td>".$row['admin_firstname']."</td>
                    <td>".$row['admin_lastname']."</td>
                    <td>".$row['admin_email']."</td>
                    <td>".$row['admin_contactno']."</td>
                    <td>".$row['admin_address']."</td>
                </tr>"; 
            }
        }
    }
?>