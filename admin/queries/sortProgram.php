<?php 
  include_once("../../connect.php");
  $con=connect();
 $program="";
 extract($_POST);
 
 $sql="SELECT * FROM `programs` ORDER BY `$column_name` ASC";
$result=$con->query($sql) or die ($con->error);

$program="
    <thead class='table-ccc'>
        <th style='border: 1px solid gray' width='10%'>Program #</th>
        <th style='border: 1px solid gray' width='20%'>Program Name</th>
        <th style='border: 1px solid gray' width='10%'>Abbreviation</th>
        <th style='border: 1px solid gray' width='10%'>Required GWA</th>
        <th style='border: 1px solid gray' width='10%'>Maximum number of students</th>
        <th style='border: 1px solid gray' width='10%'>Action</th>
    </thead>
<tbody>
";
while($row= $result->fetch_array()){
    $program.="
        <tr style='text-align: center'>
            <td style='border: 1px solid gray'>".$row['program_id']."</td>
            <td style='border: 1px solid gray'>".$row['program_name']."</td>
            <td style='border: 1px solid gray'>".$row['abbreviation']."</a></td>
            <td style='border: 1px solid gray'>".$row['required_gwa']."</td>
            <td style='border: 1px solid gray'>".$row['max_no']."</td>
            <td style='border: 1px solid gray' class='actions'>
              <button class='btn btn-success mb-1'>
                <i class='bx bxs-pencil fs-5' ></i>
              </button>
            </td>
        </tr>
    ";
}
$program .="</tbody>";
echo $program;
?>