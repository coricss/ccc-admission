<?php 

include_once("../connect.php");
$con=connect();

extract($_POST);

$total_reg="";
$school_yr="";
$bar_graph="";

$sql =$con->query("SELECT * FROM `annual_reg_stud`");
$rowcount=$sql->num_rows;
if($rowcount>0){
    while($row=$sql->fetch_array()){
        $total_reg .='"' . $row["total_reg_students"] . '",';
        $school_yr.= '"' . $row["school_year"] . '",';
    }
}
$total_reg = substr($total_reg, 0, -1);
$school_yr = substr($school_yr, 0, -1);
$bar_graph ='
<canvas id="myChart" data-settings=
\'{
"type": "bar",
"data":
 "labels": ['. $school_yr . '],
 "datasets":
 [{
   "label": " Personnel",
   "backgroundColor": "#00ee00",
   "borderColor": "#000000",
   "data": [' . $total_reg. ']
 }]
},
"options":
 "legend":
   "display": true
}\'
></canvas>';
echo $bar_graph;
?>
