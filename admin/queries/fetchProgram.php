<?php 
 include_once("../../connect.php");
 $con=connect();
$sql=$con->query("SELECT * FROM `programs`");

if($sql->num_rows!=0){
    while($row=$sql->fetch_array()){
        echo "
            <tr style='text-align: center'>
                <td style='border: 1px solid gray'>
                  ".$row['program_id']."
                </td>
                <td style='border: 1px solid gray'>".$row['program_name']."</td>
                <td style='border: 1px solid gray'>".$row['abbreviation']."</a></td>
                <td style='border: 1px solid gray'>".$row['required_gwa']."</td>
                <td style='border: 1px solid gray'>".$row['max_no']."</td>
                <td style='border: 1px solid gray'>".$row['type']."</td>
                <td style='border: 1px solid gray' class='actions'>
                  <button class='btn btn-success mb-1' id='btn-edit-program' data-id='".$row['program_id']."'>
                    <i class='bx bxs-pencil fs-5' ></i>
                  </button>
                </td>
            </tr>
        ";
    }
}else{
  echo "
    <tr>
      <td colspan='5'><h5>No programs registered</h5></td>
    </tr>
  ";
}
?>