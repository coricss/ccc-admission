<?php 
  include_once("../../connect.php");
  $con=connect();
  date_default_timezone_set('Asia/Manila');
  $year=date("Y");

  $stud=$con->query("SELECT * FROM `student_info` INNER JOIN `requirements` ON student_info.student_id=requirements.student_id INNER JOIN `educ_bg` ON student_info.student_id=educ_bg.student_id WHERE student_info.verification='Pending'  AND student_info.application_no LIKE '%$year%' ORDER BY student_info.student_id DESC");

  while($row = $stud->fetch_array()){
        $files=$row["provided_files"];
        $a="Recipient of Student Financial Assistance";
        $b="Person from Disadvantaged Group";
        $c="Person from Depressed or Conflicted-Areas";
        $d="Member of Indigenous People";
        $e="Person with Disability";
        $f="Recipient of 4Ps";
        $g="Working Student";

        $h="Grade 11 Card";
        $i="Grade 12 Card";
        $j="Transcript of Record Page 1";
        $k="Transcript of Record Page 2";
        $l="Good Moral";
        $m="Birth Certificate";
        $n="Certificate of Residency";
        $o="Voters Certificate Identification";
        $p="ALS Certification";
        $q="Vaccination Card";

        if(preg_match("/{$a}/", $files)){
            echo "<script>$('#group-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$b}/", $files)){
            echo "<script>$('#group-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$c}/", $files)){
            echo "<script>$('#group-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$d}/", $files)){
            echo "<script>$('#group-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$e}/", $files)){
            echo "<script>$('#group-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$f}/", $files)){
            echo "<script>$('#group-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$g}/", $files)){
            echo "<script>$('#group-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$h}/", $files)){
            echo "<script>$('#g11-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$i}/", $files)){
            echo "<script>$('#g12-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$j}/", $files)){
            echo "<script>$('#torpg1-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$k}/", $files)){
            echo "<script>$('#torpg2-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$l}/", $files)){
            echo "<script>$('#goodmoral-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$m}/", $files)){
            echo "<script>$('#birthcert-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$n}/", $files)){
            echo "<script>$('#cor-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$o}/", $files)){
            echo "<script>$('#voters-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$p}/", $files)){
            echo "<script>$('#als-$row[student_id]').prop('checked', true);</script>";
        }
        if(preg_match("/{$q}/", $files)){
            echo "<script>$('#vax-$row[student_id]').prop('checked', true);</script>";
        }
  }
?>