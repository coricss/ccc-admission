<?php
    include_once("../../connect.php");
    $con=connect();
    use mikehaertl\pdftk\Pdf;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\EXCEPTION;

    require('../../vendor/autoload.php');
    require_once('../../PHPMailer/src/PHPMailer.php');
    require_once('../../PHPMailer/src/SMTP.php');
    require_once('../../PHPMailer/src/Exception.php');

    if(isset($_POST['appID'])){
        $appID=mysqli_real_escape_string($con, $_POST['appID']);
        $studname=mysqli_real_escape_string($con, $_POST['studname']);
        $email=mysqli_real_escape_string($con, $_POST['email']);
            //COUNT RAW SCORE
            $scoresql=$con->query("SELECT * FROM `answer_key` INNER JOIN `student_answers` ON answer_key.correct_answer=student_answers.stud_answer WHERE student_answers.application_no='$appID' AND answer_key.question_id=student_answers.question_id");
            $rawscore=$scoresql->num_rows;
            
            //COUNT FIGURAL REASONING
            $figuralsql=$con->query("SELECT * FROM `answer_key` INNER JOIN `student_answers` ON answer_key.correct_answer=student_answers.stud_answer WHERE student_answers.application_no='$appID' AND answer_key.question_id=student_answers.question_id AND answer_key.type='Figural Reasoning'");
            $figuralscore=$figuralsql->num_rows;
            //COUNT QUANTITATIVE REASONING
            $quantitativesql=$con->query("SELECT * FROM `answer_key` INNER JOIN `student_answers` ON answer_key.correct_answer=student_answers.stud_answer WHERE student_answers.application_no='$appID' AND answer_key.question_id=student_answers.question_id AND answer_key.type='Quantitative Reasoning'");
            $quantitativescore=$quantitativesql->num_rows;
            //COUNT VERBAL COMPREHENSION
            $VCsql=$con->query("SELECT * FROM `answer_key` INNER JOIN `student_answers` ON answer_key.correct_answer=student_answers.stud_answer WHERE student_answers.application_no='$appID' AND answer_key.question_id=student_answers.question_id AND answer_key.type='Verbal Comprehension'");
            $VCscore=$VCsql->num_rows;
            //COUNT VERBAL REASONING
            $VRsql=$con->query("SELECT * FROM `answer_key` INNER JOIN `student_answers` ON answer_key.correct_answer=student_answers.stud_answer WHERE student_answers.application_no='$appID' AND answer_key.question_id=student_answers.question_id AND answer_key.type='Verbal Reasoning'");
            $VRscore=$VRsql->num_rows;

            //TOTAL NON-VERBAL 
            $nonverbaltotal=$figuralscore+$quantitativescore;
            //TOTAL NONVERBAL TO SCALED SCORE
            $NVscaledArray=array('0', '498', '524', '540', '552', '562', '570', '577', '584', '590', '596', '601', '606', '611', '616', '621', '625', '630', '634', '639', '643', '648', '653', '657', '662', '667', '673', '678', '684', '691', '698', '706', '716', '728', '744', '770', '793');
            $NVscale=$NVscaledArray[$nonverbaltotal];
            //TOTAL NVSCALED TO PERCENTILE
            $NVscaledScores=array('0', '579', '588', '595', '600', '604', '607', '610', '613', '615', '617', '619', '621', '623', '625', '626', '628', '629', '631', '632', '634', '635', '637', '638', '640', '641', '643', '644', '645', '647', '648', '649', '651', '652', '653', '654', '656', '657', '658', '659', '660', '661', '662', '663', '664', '665', '666', '667', '668', '669', '670', '671', '672', '673', '674', '675', '676', '677', '678', '679', '681', '682', '683', '684', '686', '687', '688', '690', '691', '692', '694', '695', '696', '698', '699', '701', '703', '705', '707', '709', '711', '713', '715', '717', '719', '721', '723', '725', '727', '729', '732', '735', '738', '742', '746', '751', '758', '766', '776', '1000');
            for($i=1; $i<=100; $i++){
                if($NVscale<=$NVscaledScores[$i-1]){
                    $NVpercentile=$i-1;
                    break;
                }
            }

            //TOTAL VERBAL
            $verbaltotal=$VRscore+$VCscore;
            //TOTAL VERBAL TO SCALED SCORE
            $VscaledArray=array('0', '516', '542', '558', '570', '579', '587', '594', '600', '606', '612', '617', '622', '627', '632', '636', '641', '645', '649', '654', '658', '663', '668', '672', '677', '682', '688', '693', '699', '706', '713', '721', '731', '742', '758', '784', '808');
            $Vscale=$VscaledArray[$verbaltotal];
            //TOTAL VSCALED TO PERCENTILE
            $VscaledScores=array('0', '590', '591', '605', '610', '614', '617', '620', '623', '625', '627', '629', '631', '632', '634', '635', '637', '638', '640', '641', '643', '644', '646', '647', '649', '650', '651', '653', '654', '655', '656', '657', '658', '659', '660', '661', '662', '663', '664', '665', '666', '667', '668', '669', '670', '671', '672', '673', '674', '675', '676', '677', '678', '679', '680', '681', '682', '683', '684', '685', '686', '687', '688', '689', '690', '691', '692', '693', '694', '695', '696', '697', '699', '700', '701', '703', '704', '706', '707', '709', '710', '712', '713', '715', '717', '719', '721', '723', '725', '727', '730', '733', '736', '740', '745', '751', '758', '767', '778', '1000');
            for($j=1; $j<=100; $j++){
                if($Vscale<=$VscaledScores[$j-1]){
                    $Vpercentile=$j-1;
                    break;
                }
            }
            //TOTAL RAW SCORE TO SCALED SCORE CONVERSION
            $scaleArray=array('0', '482', '507', '522', '533', '542', '549', '555', '561', '566', '570', '574', '578', '582', '586', '589', '592', '595', '598', '601', '604', '606', '609', '612', '614', '617', '619', '621', '624', '626', '628', '631', '633', '635', '637', '640', '642', '644', '646', '649', '651', '653', '656', '658', '660', '663', '665', '667', '670', '672', '675', '678', '680', '683', '686', '689', '692', '695', '698', '702', '706', '710', '714', '719', '724', '729', '735', '743', '751', '762', '777', '802', '825');
            $scaled=$scaleArray[$rawscore];
            //TOTAL SCALED SCORE TO PERCENTILE RANK
            $scaledScores = array('0', '592', '600', '606', '610', '614', '617', '620', '622', '624', '626', '628', '629', '631', '632', '634', '635', '637', '638', '640', '641', '643', '644', '646', '647', '648', '649', '650', '651', '652', '653', '654', '655', '656', '657', '658', '659', '660', '661', '662', '663', '664', '665', '666', '667', '668', '669', '670', '671', '672', '673', '674', '675', '676', '677', '678', '679', '680', '681', '682', '683', '684', '685', '686', '687', '688', '689', '690', '691', '692', '693', '694', '695', '696', '697', '699', '700', '702', '703', '705', '706', '708', '709', '711', '713', '715', '717', '719', '721', '723', '725', '728', '731', '734', '737', '741', '746', '752', '760', '1000');
            for($x=1; $x<=100; $x++){
                if($scaled<=$scaledScores[$x-1]){
                    $percentile=$x-1;
                    break;
                }
            }
            //TOTAL PERCENT TO STANINE
            $stanineArray = array('0', '3', '10', '22', '39', '59', '76', '88', '95', '99');
            for($y=1; $y<=10; $y++){
                if($percentile<=$stanineArray[$y-1]){
                    $stanine=$y-1;
                    break;
                }
            }
            for($p=1; $p<=10; $p++){
                if($NVpercentile<=$stanineArray[$p-1]){
                    $NVstanine=$p-1;
                    break;
                }
            }
            for($z=1; $z<=10; $z++){
                if($Vpercentile<=$stanineArray[$z-1]){
                    $Vstanine=$z-1;
                    break;
                }
            }
            //STANINE TO VERBAL INTERPRETATION
            //total
            if($stanine<=3){
                $verbal='Below Average';
                $color='red';
            }else if($stanine<=6){
                $verbal='Average';
                $color='#ff6600';
            }else{
                $verbal='Above Average';
                $color='limegreen';
            }
            //nonverbal
            if($NVstanine<=3){
                $NV='Below Average';
            }else if($NVstanine<=6){
                $NV='Average';
            }else{
                $NV='Above Average';
            }
            //verbal
            if($Vstanine<=3){
                $V='Below Average';
            }else if($Vstanine<=6){
                $V='Average';
            }else{
                $V='Above Average';
            }
            //RECOMMENDED COURSES
            if($verbal=='Average'){
                $bscs='Yes';
                $bsit='Yes';
                $bsa='No';
                $bsais='No';
                $beed='No';
                $bsed='No';
                $recommended="
                <div class='row'>
                    <div class='col-md-6 col-sm-12'>
                        <p style='margin-left: 10px'>BS in Information Technology</p>
                    </div>
                    <div class='col-md-6 col-sm-12'>
                        <p style='margin-left: 10px'>BS in Computer Science</p>
                    </div>
                </div>
                ";
            }else if($verbal=='Above Average'){
                $bscs='Yes';
                $bsit='Yes';
                $bsa='Yes';
                $bsais='Yes';
                $beed='Yes';
                $bsed='Yes';
                $recommended="
                <div class='row'>
                    <div class='col-md-6 col-sm-12'>
                        <p style='margin-left: 10px'>BS in Accountancy</p>
                        <p style='margin-left: 10px'>BS in Accounting Information Systems</p>
                        <p style='margin-left: 10px'>BS in Information Technology</p>
                    </div>
                    <div class='col-md-6 col-sm-12'>
                        <p style='margin-left: 10px'>BS in Computer Science</p>
                        <p style='margin-left: 10px'>Bachelor of Elementary Education</p>
                        <p style='margin-left: 10px'>Bachelor of Secondary Education</p>
                    </div>
                </div>
                ";
               
            }else{
                $bscs='No';
                $bsit='No';
                $bsa='No';
                $bsais='No';
                $beed='No';
                $bsed='No';
                $recommended="
                <p style='margin-left: 10px; color: red'>Sorry. You've failed the admission test.</p>
                ";
            }

            $results=$con->query("INSERT INTO `exam_results`(`application_no`, `student_name`, `raw_score`, `scaled_score`, `percentile_rank`, `stanine`, `verbal_interpretation`) VALUES ('$appID','$studname','$rawscore','$scaled','$percentile','$stanine','$verbal')");

            echo "
                        <div class='row mt-5 tbl-results'>
                            <table class='table table-responsive table-bordered text-center' id='test-results'>
                                <thead class='table-dark'>
                                    <th>SUBTESTS</th>
                                    <th># OF ITEMS</th>
                                    <th>RAW SCORE</th>
                                    <th>SCALED SCORE</th>
                                    <th>PERCENTILE RANK</th>
                                    <th>STANINE</th>
                                    <th>VERBAL INTREPRETATION</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Total Verbal</b></td>
                                        <td><b>36</b></td>
                                        <td>$verbaltotal</td>
                                        <td>$Vscale</td>
                                        <td>$Vpercentile</td>
                                        <td>$Vstanine</td>
                                        <td>$V</td>
                                    </tr>
                                    <tr>
                                        <td>Verbal Comprehension</td>
                                        <td>12</td>
                                        <td>$VCscore</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Verbal Reasoning</td>
                                        <td>24</td>
                                        <td>$VRscore</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td><b>Total Non-Verbal</b></td>
                                        <td><b>36</b></td>
                                        <td>$nonverbaltotal</td>
                                        <td>$NVscale</td>
                                        <td>$NVpercentile</td>
                                        <td>$NVstanine</td>
                                        <td>$NV</td>
                                    </tr>
                                    <tr>
                                        <td>Figural Reasoning</td>
                                        <td>18</td>
                                        <td>$figuralscore</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Quantitative Reasoning</td>
                                        <td>18</td>
                                        <td>$quantitativescore</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class='table-dark'>
                                        <td><b>TOTAL</b></td>
                                        <td><b>72</b></td>
                                        <td>$rawscore</td>
                                        <td>$scaled</td>
                                        <td>$percentile</td>
                                        <td>$stanine</td>
                                        <td><b class='text-uppercase' style='color: $color'>$verbal</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='row info-test mt-3' style='border-style: solid; border-width: 1px; border-radius: 10px; padding: 10px'>
                            <div class='col-md-6 col-sm-12'>
                                <p><h6 class='text-center'>TEST DESCRIPTION</h6></p>
                                <p style='text-align: justify'>The <b>Otis-Lennon School Ability Test</b> is designed to measure abstract thinking and reasoning ability that are relevant to school achievement. OLSAT is based on the notion that to learn new things, student must be able to perceive accurately, to recognize and recall what has been perceived, to think logically, to understand relationships, to abstract form a set of particulars, and to apply generalizations to new and different contexts.</p>
                                <p style='text-align: justify'><b>Verbal Comprehension</b> is dependent on the ability to perceive the relational aspects of words and word combinations, to derive meaning from types of words, to understand subtle differences among similar words and phrases, and to manipulate words to produce meaning.</p>
                                <p style='text-align: justify'><b>Verbal Reasoning</b> is dependent on the ability to infer relationships among words, to apply inferences to new situations, to evaluate conditions in order to determine necessary versus optional, and to perceive similarities and differences.</p>
                                <p style='text-align: justify'><b>Figural Reasoning</b> items assess the ability to use geometric figures to infer relationships; to perceive progressions and predict what would be the next step in those progressions; to generalize form one set of figures to another, dissimilar set of figures; and to manipulate spatially.</p>
                                <p style='text-align: justify'><b>Quantitative Reasoning</b> items assess the ability to use numbers in order to inter relationships, educe computational rules, and predict outcomes according to computational rules.</p>
                            </div>
                            <div class='col-md-6 col-sm-12'>
                                <p><h6 class='text-center'>INTERPRETATION OF RESULT</h6></p>
                                <p style='text-align: justify'><b>a. Scaled Scores</b> express performance on all forms of a given subtest along a single scale. It also links together the levels at which content domains are tested, yielding a scale across levels on each subtest and total that is common to those levels.</p>
                                <p style='text-align: justify'><b>b. Percentile Ranks</b> range from a low of 1 to a high of 99, with 50 denoting average performance; these are derived from scaled scores.</p>
                                <p style='text-align: justify'><b>c. Stanines</b> are scores that range from low of 1 to high of 9, with 5 designating average performance.</p>
                                <p style='text-align: justify'><b>d. Verbal Interpretation</b> provides worded description of the test takers' level of performance based on the normal curve distribution of stanines and percentile ranks.</p>
                                <div class='row text-center'>
                                    <div class='col-4'>
                                        <p><b>Percentile Rank</b></p>
                                        1-22 <br> 23-60 <br> 77-99
                                    </div>
                                    <div class='col-4'>
                                        <p><b>Stanine</b></p>
                                        1-3 <br> 4-6 <br> 7-9
                                    </div>
                                    <div class='col-4'>
                                        <p><b>Verbal Interpretation</b></p>
                                        <b style='color: red'>Below Average</b> <br> <b style='color: #ff6600'>Average</b> <br> <b style='color: limegreen'>Above Average</b>
                                    </div>
                                </div><hr>
                                <p><h6><b>RECOMMENDED COURSES:</b></h6></p>
                                $recommended
                            </div>
                        </div>
            ";
            date_default_timezone_set('Asia/Manila');
            $date=date('F d, Y');
            $filename=$appID.'.pdf';
             //GENERATEPDF
             $pdf = new Pdf('../../test results/test_result_template.pdf');
             $result =$pdf->fillForm([ 
                'Name'=>stripslashes($studname),
                'app_no'=>$appID,
                'Date'=>$date,
                'Result'=>$verbal,
                'tv-rawscore'=>$verbaltotal,
                'vc-rawscore'=>$VCscore,
                'vr-rawscore'=>$VRscore,
                'tnv-rawscore'=>$nonverbaltotal,
                'fr-rawscore'=>$figuralscore,
                'qr-rawscore'=>$quantitativescore,
                'total-rawscore'=>$rawscore,

                'tv-scaledscore'=>$Vscale,
                'tnv-scaledscore'=>$NVscale,
                'total-scaledscore'=>$scaled,

                'tv-percent'=>$Vpercentile,
                'tnv-percent'=>$NVpercentile,
                'total-percent'=>$percentile,

                'tv-stanine'=>$Vstanine,
                'tnv-stanine'=>$NVstanine,
                'total-stanine'=>$stanine,

                'tv-verbal'=>$V,
                'tnv-verbal'=>$NV,
                'total-verbal'=>$verbal,

                'bscs'=>$bscs,
                'bsa'=>$bsa,
                'bsit'=>$bsit,
                'bsais'=>$bsais,
                'beed'=>$beed,
                'bsed'=>$bsed
             ])
             ->flatten()
             ->saveAs('../../test results/files/'.$filename);

             $student=stripslashes($studname);
             $mail = new PHPMailer(true);
             try {
                // $mail->SMTPDebug = 4; 
                $mail->isSMTP(); 
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'cccadmissionProject2021@gmail.com';
                $mail->Password   = 'ccc_admission2021-2022'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->setFrom('ccc.gtdc@gmail.com', 'CCC Guidance, Counseling, Testing and Career Development Office');
                $mail->addAddress($email, $student);
                $mail->addAttachment('../../test results/files/'.$filename, $filename);
                $mail->isHTML(true);

                $mail->Subject =  "City College of Calamba Admission Test Result";
                $mail->Body    =  
    "
    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>City College of Calamba</title>
    <style>
        /* A simple css reset */
        body,table,thead,tbody,tr,td,img {
            padding: 0;
            margin: 0;
            border: none;
            border-spacing: 0px;
            border-collapse: collapse;
            vertical-align: top;
        }

        /* Add some padding for small screens */
        .wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }

        h1,h2,h3,h4,h5,h6,p {
            margin: 0;
            padding: 0;
            padding-bottom: 20px;
            line-height: 1.6;
            font-family: 'Helvetica', 'Arial', sans-serif;
        }

        p,a,li {
            font-family: 'Helvetica', 'Arial', sans-serif;
        }

        img {
            width: 100%;
            display: block;
        }

        @media only screen and (max-width: 620px) {

            .wrapper .section {
                width: 100%;
            }

            .wrapper .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body>
    <table width=100%>
        <tbody>
            <tr>
                <td class='wrapper' width='600' align='center'>
                    <!-- Header image -->
                    <table class='section header' cellpadding='0' cellspacing='0' width='800'>
                        <tr>
                            <td class='column'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align='left'>
                                            <img src='https://i.ibb.co/3yZ0r3G/cccheader.png' alt='cccheader' border='0'>
                                            <center>
                                            <a href='https://ccc.edu.ph'><img src='https://i.ibb.co/ym2jbKn/ccc.png' alt='ccc' border='0' style='width: 100px'></a>
                                            </center>
                                            <br><br><br>
                                            <h5>Application number: $appID</h5><br><br>
                                                <h3>Hello $student,</h3>
                                                
                                                <p style='text-align:justify;'>
                                                Please check the copy of your test result attached in this email.</p>
                                                <br>
                                                <p style='text-align:justify;'>For more questions and inquiry please message us on our Facebook page <a href='https://www.facebook.com/CCCGTCDC' style='color: blue' target='_blank'>CCC Guidance, Counseling, Testing and Career Dev't Office</a>.
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <br><br><br><br><br><br><br><br><br><br>
                            <img src='https://i.ibb.co/gSjXRwr/cccfooter2.png' alt='cccfooter2' border='0'>
                            </td>
                        </tr>
                    </table>
                    <!-- Two columns -->
                </td>
            </tr>
        </tbody>
    </table>
    
    
</body>
</html>
    ";
    $mail->send();
             }catch(Exception $e){
                echo "<script>
                Swal.fire({
                    title: 'Email not sent'
                })
                </script>";
             }

    }

    
?>