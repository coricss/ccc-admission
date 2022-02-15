<?php 
include_once("../connect.php");
$con=connect();

$sql=$con->query("SELECT * FROM `admission_status`");
$row=$sql->fetch_array();
if($row['status']=='1'){
    echo
    "
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Admission is Currently Suspended.',
            text: 'Please contact us for inquiries.',
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false,
            confirmButtonColor: '#0d6efd',
        });
        $('.regform').css('display', 'none');
    </script>
    ";
}else{
    echo
    "
    <script>
        $('.regform').css('display', 'block');
        location.href='#applicationform';
    </script>
    ";
}
?>