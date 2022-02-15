<?php 
     include_once("../../connect.php");
     $con=connect();
    $admin="";
    if(isset($_POST["admin"])){
        $search=$_POST["admin"];
        $search_admin=$con->query("SELECT * FROM `admin_info` WHERE `admin_firstname` LIKE '%$search%' OR `admin_lastname` LIKE '%$search%' OR `admin_email` LIKE '%$search%' OR `admin_contactno` LIKE '%$search%' OR `admin_address` LIKE '%$search%'");
    }else{
        $search_admin=$con->prepare("SELECT * FROM `admin_info`");
    }
    if($search_admin->num_rows!=0){
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
        while($row= $search_admin->fetch_array()){
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
        $admin .="</tbody>";
        }
        echo $admin;
    } else{
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Admin not found!',
                    text: 'Try to search other term instead of $search.',
                    confirmButtonText: `Ok`,
                    confirmButtonColor: '#0d6efd'
                }).then((result) => {
                    if(result.isConfirmed){
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                            location.reload();
                        }
                    }else{
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                            location.reload();
                        }
                    }
                    });
            </script>";  
    }  
    
?>