<?php 
     include_once("../../connect.php");
     $con=connect();
    $program="";
    if(isset($_POST["program"])){
        $search=$_POST["program"];
        $search_program=$con->query("SELECT * FROM `programs` WHERE `program_id` LIKE '%$search%' OR `program_name` LIKE '%$search%' OR `abbreviation` LIKE '%$search%' OR `max_no` LIKE '%$search%'");
    }else{
        $search_program=$con->prepare("SELECT * FROM `admin_info`");
    }
    if($search_program->num_rows!=0){
        $program="
            <thead class='table-ccc'>
              <th style='border: 1px solid gray' width='10%'>Program #</th>
              <th style='border: 1px solid gray' width='20%'>Program Name</th>
              <th style='border: 1px solid gray' width='10%'>Abbreviation</th>
              <th style='border: 1px solid gray' width='10%'>Maximum number of students</th>
              <th style='border: 1px solid gray' width='10%'>Action</th>
            </thead>
        <tbody>
        ";
        while($row= $search_program->fetch_array()){
            $program.="
            <tr style='text-align: center'>
              <td style='border: 1px solid gray'>".$row['program_id']."</td>
              <td style='border: 1px solid gray'>".$row['program_name']."</td>
              <td style='border: 1px solid gray'>".$row['abbreviation']."</a></td>
              <td style='border: 1px solid gray'>".$row['max_no']."</td>
              <td style='border: 1px solid gray' class='actions'>
                <button class='btn btn-success mb-1'>
                  <i class='bx bxs-pencil fs-5' ></i>
                </button>
              </td>
            </tr>
            ";
        $program .="</tbody>";
        }
        echo $program;
    } else{
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Program not found!',
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