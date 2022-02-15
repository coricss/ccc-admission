<?php
if(!isset($_SESSION)){
	session_start();
}
include_once("../connect.php");
$con=connect();

if(isset($_SESSION['appID'])){
    $_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
    $appID=$_SESSION['appID'];
    $name=$_SESSION['f_name'].' '.$_SESSION['l_name'];
    $logsql="SELECT * FROM `student_exam_log` WHERE `application_no`='$appID'";
    $log = $con->query($logsql) or die ($con->error);
    $record=$log->fetch_array();
   
    if($record['test_status']=='Taken'){
        header('location: index.php');
    }
}else{
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Test | City College of Calamba</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/imgs/logo/ccc.png">
    
    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/exam.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    

    <script src="assets/js/exam.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/rdmgrid.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
    <script src="../assets/js/bootstrap.min.js" defer></script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/placeholders.js"></script>
    
</head>
<body>
    <a id="btn-scrolltop"><i class='bx bx-chevron-up arrowUp'></i></a>
    <a id="btn-feedback"><i class='bx bxs-message-rounded-detail' id="fands"></i></a>
    <div class="feedback-box" style="display: none">
        <div class="feedback-header">
            <h6>Feedback & Suggestions</h6>
            <i class='bx bx-x close-feedback'></i>
        </div>
        <div class="feedback-content">
            <form action="" method="POST" id="feedback-form">
                <textarea class="feedback-txt" onpaste="return false;" placeholder="Write a message..." name="feedback-txt" id="feedback-txt" rows="10" maxlength="280" required></textarea> 
                <small id="limit-chars" style="margin: 0; position: absolute; bottom: 70px; right: 20px">0/280</small>
                <div class="mt-2" style="display: flex">
                    <select class="form-select" name="sendAs" id="sendAs" style='border-radius: 50px' required>
                        <option value="" selected disabled>Send as:</option>
                        <option style="color: black" value="<?php echo $record['student_name']?>"><?php echo $record['student_name']?></option>
                        <option style="color: black" value="Anonymous">Anonymous</option>
                    </select>
                    <button type="submit" id="btn-send" class=""><i class='bx bxs-send' ></i></button>
                </div>     
            </form>
        </div>
    </div>
    <div class="row fixed-top">
        <center>
            <div class="floating-timer mt-3">
                <div class="countdown-box bg-dark">
                    <p class="countdown">00:00:00</p>
                </div>
            </div>
        </center>
    </div>
    <div class="container">
        <div id="leave">

        </div>
            <div class="row mt-5 header" data-aos="fade" data-aos-duration="2000">
                <center>
                    <div class="head">
                        <img src="../assets/imgs/logo/ccc.png" class="ccclogo" alt=""> <br> 
                        <img src="../assets/imgs/logo/ccc_title.png" class="ccctitle" width="300px" alt="">      
                    </div> 
                </center>
                <div class="col-lg-6 col-md-12 mb-2 student-profile">
                <center>
                    <div class="profile">
                        <img src="<?php echo '../assets/imgs/student2x2/'.$_SESSION['pic']?>" class="photo" alt=""> 
                    </div>
                </center>
                    <div class="name mt-3">
                        <h4 class="examinee" id="studentName" email-id="<?php echo $_SESSION['studemail']?>" data-id="<?php echo $_SESSION['f_name'].' '.$_SESSION['l_name']?>"><?php echo $_SESSION['f_name'].' '.$_SESSION['l_name']?></h4>    
                        <h5 id="firstname" data-id="<?php echo $_SESSION['f_name']?>"><?php echo $_SESSION['studemail']?></h5>
                    </div>
                </div>
            
                <div class="col-lg-6 col-md-12 mb-2 student-app">
                    <div class="right">
                        <center> 
                            <div class="appno mt-3">
                                <h4><small style="font-weight: 400;" id="appID" data-id="<?php echo $_SESSION['appID']?>">Application No:</small> <?php echo $_SESSION['appID']?></h4>
                                <h4>
                                    <small style="font-weight: 400;">Remaining Time:</small> 
                                    <b id="countdown" class="text-danger countdown" value="00:00"></b>
                            </h4>
                            </div>
                        </center> 
                    </div>
                </div>
            </div>
            <div class="row bg-light mt-4 mb-5 test" data-aos="fade" data-aos-duration="2000"> 
                <div id="items">
                   <div class="row">
                     <form action="" method="POST" id="testForm">
                        <input type='hidden' name='autoSubmit' id='autoSubmit'>
                            <div class='mb-3 text-center' data-aos="fade" data-aos-duration="1000">
                                <h3 class='text-uppercase' id='title'>Otis-Lennon School Ability Test</h3>
                                <text>by Arthur S. Otis and Roger T. Lennon</text>
                                <hr>
                            </div>
                            <br>
                            <p class="instructions" data-aos="fade" style="text-align: justify"><b>INSTRUCTIONS:</b> Please answer the following 72 questions carefully. This examination can only be taken <b>ONCE</b>. When you <b>REFRESH</b>, the page will logout automatically. When the time is up, your anwers will force submit. Make sure to finish the test on time. Scroll down to answer the questions.</p>
                            <div id="all-items" class="mt-5">
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> Choose the words that <i>best</i> complete this sentence: ____________ I was nervous, I had a _____________ manner.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[1][answer]' value='A' class='form-check-input' type='radio' id=' 1When - sad' required>
                                            <label class='form-check-label opt' for=' 1When - sad'>
                                                A. When - sad                     
                                            </label><br>
                                            <input name='answer[1][answer]' value='B' class='form-check-input' type='radio' id='1After - jitter' required>
                                            <label class='form-check-label opt' for='1After - jitter'>
                                                B. After - jittery                    
                                            </label>
                                            <br>
                                            <input name='answer[1][answer]' value='C' class='form-check-input' type='radio' id='1If - reasonable' required>
                                            <label class='form-check-label opt' for='1If - reasonable'>
                                                C. If - reasonable                    
                                            </label>
                                            <br>
                                            <input name='answer[1][answer]' value='D' class='form-check-input' type='radio' id='1Although - quiet' required>
                                            <label class='form-check-label opt' for='1Although - quiet'>
                                                D. Although - quiet                   
                                            </label>
                                            <br>
                                            <input name='answer[1][answer]' value='E' class='form-check-input' type='radio' id='1Where - humorous' required>
                                            <label class='form-check-label opt' for='1Where - humorous'>
                                                E. Where - humorous                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> The words in the box go together in a certain way. Choose the word that goes where you see the question mark.</p>
                                <div class="row" >
                                    <div class="col-md-3 col-sm-4">
                                        <div class='form-group pl-4'>
                                            <input name='answer[2][answer]' value='F' class='form-check-input' type='radio' id='2seat' required>
                                            <label class='form-check-label opt' for='2seat'>
                                                F. seat                     
                                            </label><br>
                                            <input name='answer[2][answer]' value='G' class='form-check-input' type='radio' id='2rate' required>
                                            <label class='form-check-label opt' for='2rate'>
                                                G. rate                    
                                            </label>
                                            <br>
                                            <input name='answer[2][answer]' value='H' class='form-check-input' type='radio' id='2tail' required>
                                            <label class='form-check-label opt' for='2tail'>
                                                H. tail                    
                                            </label>
                                            <br>
                                            <input name='answer[2][answer]' value='I' class='form-check-input' type='radio' id='2slat' required>
                                            <label class='form-check-label opt' for='2slat'>
                                                I. slat                   
                                            </label>
                                            <br>
                                            <input name='answer[2][answer]' value='J' class='form-check-input' type='radio' id='2late' required>
                                            <label class='form-check-label opt' for='2late'>
                                                J. late                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>ail</p>
                                                        <p>ate</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>rail</p>
                                                        <p>?</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>trail</p>
                                                        <p>slate</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The numbers in the box go together in a certain way. Choose the number that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[3][answer]' value='A' class='form-check-input' type='radio' id='3-4' required>
                                            <label class='form-check-label opt' for='3-4'>
                                                A. 4                     
                                            </label><br>
                                            <input name='answer[3][answer]' value='B' class='form-check-input' type='radio' id='3-5' required>
                                            <label class='form-check-label opt' for='3-5'>
                                                B. 5                    
                                            </label>
                                            <br>
                                            <input name='answer[3][answer]' value='C' class='form-check-input' type='radio' id='3-7' required>
                                            <label class='form-check-label opt' for='3-7'>
                                                C. 7                    
                                            </label>
                                            <br>
                                            <input name='answer[3][answer]' value='D' class='form-check-input' type='radio' id='3-9' required>
                                            <label class='form-check-label opt' for='3-9'>
                                                D. 9                   
                                            </label>
                                            <br>
                                            <input name='answer[3][answer]' value='E' class='form-check-input' type='radio' id='3-30' required>
                                            <label class='form-check-label opt' for='3-30'>
                                                E. 30                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>3</p>
                                                        <p>1</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>9</p>
                                                        <p>3</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>27</p>
                                                        <p>?</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> Answer the following:</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 4/4-1.png" alt="" style="width: 50px;"> is to <img src="assets/imgs/icons/question 4/4-2.png" alt="" style="width: 50px;"> as <img src="assets/imgs/icons/question 4/4-3.png" alt="" style="width: 50px;"> is to -
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 4/4-f.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[4][answer]' value='F' class='form-check-input' type='radio' id='4-f' required>
                                                    <label class='form-check-label opt' for='4-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 4/4-g.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[4][answer]' value='G' class='form-check-input' type='radio' id='4-g' required>
                                                    <label class='form-check-label opt' for='4-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 4/4-h.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[4][answer]' value='H' class='form-check-input' type='radio' id='4-h' required>
                                                    <label class='form-check-label opt' for='4-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 4/4-j.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[4][answer]' value='I' class='form-check-input' type='radio' id='4-j' required>
                                                    <label class='form-check-label opt' for='4-j'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 4/4-k.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[4][answer]' value='J' class='form-check-input' type='radio' id='4-k' required>
                                                    <label class='form-check-label opt' for='4-k'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> <b>First</b> is to <b>original</b> as <b>only</b> is to.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[5][answer]' value='A' class='form-check-input' type='radio' id=' 5special' required>
                                            <label class='form-check-label opt' for=' 5special'>
                                                A. special                     
                                            </label><br>
                                            <input name='answer[5][answer]' value='B' class='form-check-input' type='radio' id='5unique' required>
                                            <label class='form-check-label opt' for='5unique'>
                                                B. unique                    
                                            </label>
                                            <br>
                                            <input name='answer[5][answer]' value='C' class='form-check-input' type='radio' id='5expensive' required>
                                            <label class='form-check-label opt' for='5expensive'>
                                                C. expensive                    
                                            </label>
                                            <br>
                                            <input name='answer[5][answer]' value='D' class='form-check-input' type='radio' id='5many' required>
                                            <label class='form-check-label opt' for='5many'>
                                                D. many                   
                                            </label>
                                            <br>
                                            <input name='answer[5][answer]' value='E' class='form-check-input' type='radio' id='5last' required>
                                            <label class='form-check-label opt' for='5last'>
                                                E. last                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> If the words below were arranged to make the <i>best</i> sentence, with which letter would the <u>first</u> word of the sentence <u>begin</u>?</p>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[6][answer]' value='F' class='form-check-input' type='radio' id='6-F' required>
                                            <label class='form-check-label opt' for='6-F'>
                                                F. F                     
                                            </label><br>
                                            <input name='answer[6][answer]' value='G' class='form-check-input' type='radio' id='6-W' required>
                                            <label class='form-check-label opt' for='6-W'>
                                                G. W                    
                                            </label>
                                            <br>
                                            <input name='answer[6][answer]' value='H' class='form-check-input' type='radio' id='6-H' required>
                                            <label class='form-check-label opt' for='6-H'>
                                                H. H                    
                                            </label>
                                            <br>
                                            <input name='answer[6][answer]' value='I' class='form-check-input' type='radio' id='6-T' required>
                                            <label class='form-check-label opt' for='6-T'>
                                                I. T                   
                                            </label>
                                            <br>
                                            <input name='answer[6][answer]' value='J' class='form-check-input' type='radio' id='6-M' required>
                                            <label class='form-check-label opt' for='6-M'>
                                                J. M                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>way</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>help</p>     
                                                   </div>
                                                   <div class="col">
                                                        <p>the</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>find</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>me</p>  
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> The numbers in each box go together by following the <i>same</i> rule. Decide what the rule is and choose the number that goes where you see the question mark.</p>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[7][answer]' value='A' class='form-check-input' type='radio' id='18' required>
                                            <label class='form-check-label opt' for='18'>
                                                A. 18                     
                                            </label><br>
                                            <input name='answer[7][answer]' value='B' class='form-check-input' type='radio' id='20' required>
                                            <label class='form-check-label opt' for='20'>
                                                B. 20                    
                                            </label>
                                            <br>
                                            <input name='answer[7][answer]' value='C' class='form-check-input' type='radio' id='21' required>
                                            <label class='form-check-label opt' for='21'>
                                                C. 21                    
                                            </label>
                                            <br>
                                            <input name='answer[7][answer]' value='D' class='form-check-input' type='radio' id='22' required>
                                            <label class='form-check-label opt' for='22'>
                                                D. 22                   
                                            </label>
                                            <br>
                                            <input name='answer[7][answer]' value='E' class='form-check-input' type='radio' id='24' required>
                                            <label class='form-check-label opt' for='24'>
                                                E. 24                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px;">
                                               <div class="row text-center">
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">5, 8, 16</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">7, 10, 20</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">9, 12, ?</p>
                                                   </div>
                                                   
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the first part of the row go together to form a series. In the next part of the row, choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 8/8-1.png" alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 8/8-f.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[8][answer]' value='F' class='form-check-input' type='radio' id='8-f' required>
                                                    <label class='form-check-label opt' for='8-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 8/8-g.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[8][answer]' value='G' class='form-check-input' type='radio' id='8-g' required>
                                                    <label class='form-check-label opt' for='8-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 8/8-h.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[8][answer]' value='H' class='form-check-input' type='radio' id='8-h' required>
                                                    <label class='form-check-label opt' for='8-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 8/8-i.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[8][answer]' value='I' class='form-check-input' type='radio' id='8-i' required>
                                                    <label class='form-check-label opt' for='8-i'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 8/8-j.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[8][answer]' value='J' class='form-check-input' type='radio' id='8-j' required>
                                                    <label class='form-check-label opt' for='8-j'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> What number comes next in this series? 1&nbsp&nbsp&nbsp6&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp13&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[9][answer]' value='A' class='form-check-input' type='radio' id='9-14' required>
                                            <label class='form-check-label opt' for='9-14'>
                                                A. 14                     
                                            </label><br>
                                            <input name='answer[9][answer]' value='B' class='form-check-input' type='radio' id='9-16' required>
                                            <label class='form-check-label opt' for='9-16'>
                                                B. 16                    
                                            </label>
                                            <br>
                                            <input name='answer[9][answer]' value='C' class='form-check-input' type='radio' id='9-17' required>
                                            <label class='form-check-label opt' for='9-17'>
                                                C. 17                    
                                            </label>
                                            <br>
                                            <input name='answer[9][answer]' value='D' class='form-check-input' type='radio' id='9-18' required>
                                            <label class='form-check-label opt' for='9-18'>
                                                D. 18                   
                                            </label>
                                            <br>
                                            <input name='answer[9][answer]' value='E' class='form-check-input' type='radio' id='9-19' required>
                                            <label class='form-check-label opt' for='9-19'>
                                                E. 19                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> The oppposite of <b>confinement</b> is -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[10][answer]' value='F' class='form-check-input' type='radio' id='10recognition' required>
                                            <label class='form-check-label opt' for='10recognition'>
                                                F. recognition                     
                                            </label><br>
                                            <input name='answer[10][answer]' value='G' class='form-check-input' type='radio' id='10satisfaction' required>
                                            <label class='form-check-label opt' for='10satisfaction'>
                                                G. satisfaction                    
                                            </label>
                                            <br>
                                            <input name='answer[10][answer]' value='H' class='form-check-input' type='radio' id='10cooperation' required>
                                            <label class='form-check-label opt' for='10cooperation'>
                                                H. cooperation                    
                                            </label>
                                            <br>
                                            <input name='answer[10][answer]' value='I' class='form-check-input' type='radio' id='10dedication' required>
                                            <label class='form-check-label opt' for='10dedication'>
                                                I. dedication                   
                                            </label>
                                            <br>
                                            <input name='answer[10][answer]' value='J' class='form-check-input' type='radio' id='10freedom' required>
                                            <label class='form-check-label opt' for='10freedom'>
                                                J. freedom                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Which word does <i>not</i> go with the other four?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[11][answer]' value='A' class='form-check-input' type='radio' id='11honest' required>
                                            <label class='form-check-label opt' for='11honest'>
                                                A. honest                     
                                            </label><br>
                                            <input name='answer[11][answer]' value='B' class='form-check-input' type='radio' id='11polite' required>
                                            <label class='form-check-label opt' for='11polite'>
                                                B. polite                   
                                            </label>
                                            <br>
                                            <input name='answer[11][answer]' value='C' class='form-check-input' type='radio' id='11truthful' required>
                                            <label class='form-check-label opt' for='11truthful'>
                                                C. truthful                    
                                            </label>
                                            <br>
                                            <input name='answer[11][answer]' value='D' class='form-check-input' type='radio' id='11open' required>
                                            <label class='form-check-label opt' for='11open'>
                                                D. open                   
                                            </label>
                                            <br>
                                            <input name='answer[11][answer]' value='E' class='form-check-input' type='radio' id='11frank' required>
                                            <label class='form-check-label opt' for='11frank'>
                                                E. frank                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the box go together in a certain way. Choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 12/12-1.png" alt="" style="width: 50%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 12/12-f.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[12][answer]' value='F' class='form-check-input' type='radio' id='12-f' required>
                                                    <label class='form-check-label opt' for='12-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 12/12-g.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[12][answer]' value='G' class='form-check-input' type='radio' id='12-g' required>
                                                    <label class='form-check-label opt' for='12-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 12/12-h.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[12][answer]' value='H' class='form-check-input' type='radio' id='12-h' required>
                                                    <label class='form-check-label opt' for='12-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 12/12-i.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[12][answer]' value='I' class='form-check-input' type='radio' id='12-i' required>
                                                    <label class='form-check-label opt' for='12-i'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 12/12-j.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[12][answer]' value='J' class='form-check-input' type='radio' id='12-k' required>
                                                    <label class='form-check-label opt' for='12-k'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> There are five houses in a row. One house is green. Two yellow houses are next to each other. The end house is red. The middle house is blue. What colors are the houses that are farthest apart.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[13][answer]' value='A' class='form-check-input' type='radio' id='13redandyellow' required>
                                            <label class='form-check-label opt' for='13redandyellow'>
                                                A. Red and yellow                     
                                            </label><br>
                                            <input name='answer[13][answer]' value='B' class='form-check-input' type='radio' id='13redandblue' required>
                                            <label class='form-check-label opt' for='13redandblue'>
                                                B. Red and blue                   
                                            </label>
                                            <br>
                                            <input name='answer[13][answer]' value='C' class='form-check-input' type='radio' id='13yellowandblue' required>
                                            <label class='form-check-label opt' for='13yellowandblue'>
                                                C. Yellow and blue                    
                                            </label>
                                            <br>
                                            <input name='answer[13][answer]' value='D' class='form-check-input' type='radio' id='13greenandyellow' required>
                                            <label class='form-check-label opt' for='13greenandyellow'>
                                                D. Green and yellow                   
                                            </label>
                                            <br>
                                            <input name='answer[13][answer]' value='E' class='form-check-input' type='radio' id='13blueandgreen' required>
                                            <label class='form-check-label opt' for='13blueandgreen'>
                                                E. Blue and green                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> An enclosure always has -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[14][answer]' value='F' class='form-check-input' type='radio' id='14entrance' required>
                                            <label class='form-check-label opt' for='14entrance'>
                                                F. an entrance                     
                                            </label><br>
                                            <input name='answer[14][answer]' value='G' class='form-check-input' type='radio' id='14ventilation' required>
                                            <label class='form-check-label opt' for='14ventilation'>
                                                G. ventilation                   
                                            </label>
                                            <br>
                                            <input name='answer[14][answer]' value='H' class='form-check-input' type='radio' id='14sides' required>
                                            <label class='form-check-label opt' for='14sides'>
                                                H. sides                    
                                            </label>
                                            <br>
                                            <input name='answer[14][answer]' value='I' class='form-check-input' type='radio' id='14roof' required>
                                            <label class='form-check-label opt' for='14roof'>
                                                I. a roof                   
                                            </label>
                                            <br>
                                            <input name='answer[14][answer]' value='J' class='form-check-input' type='radio' id='14windows' required>
                                            <label class='form-check-label opt' for='14windows'>
                                                J. windows                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Choose the word that <i>best</i> completes this sentence. Faulty reasoning generally results in _______________ conclusions.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[15][answer]' value='A' class='form-check-input' type='radio' id='15intelligent' required>
                                            <label class='form-check-label opt' for='15intelligent'>
                                                A. intelligent                     
                                            </label><br>
                                            <input name='answer[15][answer]' value='B' class='form-check-input' type='radio' id='15valid' required>
                                            <label class='form-check-label opt' for='15valid'>
                                                B. valid                   
                                            </label>
                                            <br>
                                            <input name='answer[15][answer]' value='C' class='form-check-input' type='radio' id='15eccentric' required>
                                            <label class='form-check-label opt' for='15eccentric'>
                                                C. eccentric                    
                                            </label>
                                            <br>
                                            <input name='answer[15][answer]' value='D' class='form-check-input' type='radio' id='15erroneous' required>
                                            <label class='form-check-label opt' for='15erroneous'>
                                                D. erroneous                   
                                            </label>
                                            <br>
                                            <input name='answer[15][answer]' value='E' class='form-check-input' type='radio' id='15offensive' required>
                                            <label class='form-check-label opt' for='15offensive'>
                                                E. offensive                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p style="margin-bottom: 0px"><b class="number"></b> One number in this series is wrong.&nbsp&nbsp&nbsp1/4&nbsp&nbsp&nbsp1&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp16&nbsp&nbsp&nbsp62&nbsp&nbsp&nbsp256.</p>
                            <p style="text-indent: 25px">What should that number be?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[16][answer]' value='F' class='form-check-input' type='radio' id='162' required>
                                            <label class='form-check-label opt' for='162'>
                                                F. 2                     
                                            </label><br>
                                            <input name='answer[16][answer]' value='G' class='form-check-input' type='radio' id='166' required>
                                            <label class='form-check-label opt' for='166'>
                                                G. 6                   
                                            </label>
                                            <br>
                                            <input name='answer[16][answer]' value='H' class='form-check-input' type='radio' id='1614' required>
                                            <label class='form-check-label opt' for='1614'>
                                                H. 14                    
                                            </label>
                                            <br>
                                            <input name='answer[16][answer]' value='I' class='form-check-input' type='radio' id='1664' required>
                                            <label class='form-check-label opt' for='1664'>
                                                I. 64                   
                                            </label>
                                            <br>
                                            <input name='answer[16][answer]' value='J' class='form-check-input' type='radio' id='161025' required>
                                            <label class='form-check-label opt' for='161025'>
                                                J. 1025                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The numbers in the box go together in a certain way. Choose the number that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[17][answer]' value='A' class='form-check-input' type='radio' id='17-14' required>
                                            <label class='form-check-label opt' for='17-14'>
                                                A. 14                     
                                            </label><br>
                                            <input name='answer[17][answer]' value='B' class='form-check-input' type='radio' id='17-15' required>
                                            <label class='form-check-label opt' for='17-15'>
                                                B. 15                    
                                            </label>
                                            <br>
                                            <input name='answer[17][answer]' value='C' class='form-check-input' type='radio' id='17-17' required>
                                            <label class='form-check-label opt' for='17-17'>
                                                C. 17                    
                                            </label>
                                            <br>
                                            <input name='answer[17][answer]' value='D' class='form-check-input' type='radio' id='17-21' required>
                                            <label class='form-check-label opt' for='17-21'>
                                                D. 21                   
                                            </label>
                                            <br>
                                            <input name='answer[17][answer]' value='E' class='form-check-input' type='radio' id='17-24' required>
                                            <label class='form-check-label opt' for='17-24'>
                                                E. 24                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>1</p>
                                                        <p>4</p>
                                                        <p>9</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>4</p>
                                                        <p>7</p>
                                                        <p>12</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>9</p>
                                                        <p>12</p>
                                                        <p>?</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> If the words below were arranged to make the <i>best</i> sentence, with which letter would the <u>last</u> word of the sentence <u>begin</u>?</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[18][answer]' value='F' class='form-check-input' type='radio' id='18-b' required>
                                            <label class='form-check-label opt' for='18-b'>
                                                F. b                     
                                            </label><br>
                                            <input name='answer[18][answer]' value='G' class='form-check-input' type='radio' id='18-o' required>
                                            <label class='form-check-label opt' for='18-o'>
                                                G. o                    
                                            </label>
                                            <br>
                                            <input name='answer[18][answer]' value='H' class='form-check-input' type='radio' id='18-h' required>
                                            <label class='form-check-label opt' for='18-h'>
                                                H. h                    
                                            </label>
                                            <br>
                                            <input name='answer[18][answer]' value='I' class='form-check-input' type='radio' id='18-w' required>
                                            <label class='form-check-label opt' for='18-w'>
                                                I. w                   
                                            </label>
                                            <br>
                                            <input name='answer[18][answer]' value='J' class='form-check-input' type='radio' id='18-n' required>
                                            <label class='form-check-label opt' for='18-n'>
                                                J. n                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>left</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>new</p>     
                                                   </div>
                                                   <div class="col">
                                                        <p>was</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>bike</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>his</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>outside</p>  
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the box go together in a certain way. Choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 19/19-1.png" alt="" style="width: 50%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 19/19-a.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[19][answer]' value='A' class='form-check-input' type='radio' id='19-a' required>
                                                    <label class='form-check-label opt' for='19-a'>
                                                                A.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 19/19-b.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[19][answer]' value='B' class='form-check-input' type='radio' id='19-b' required>
                                                    <label class='form-check-label opt' for='19-b'>
                                                                B.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 19/19-c.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[19][answer]' value='C' class='form-check-input' type='radio' id='19-c' required>
                                                    <label class='form-check-label opt' for='19-c'>
                                                                C.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 19/19-d.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[19][answer]' value='D' class='form-check-input' type='radio' id='19-d' required>
                                                    <label class='form-check-label opt' for='19-d'>
                                                                D.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 19/19-e.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[19][answer]' value='E' class='form-check-input' type='radio' id='19-e' required>
                                                    <label class='form-check-label opt' for='19-e'>
                                                                E.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> <b>Increase</b> is to <b>reveal</b> as <b>decrease</b> is to -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[20][answer]' value='F' class='form-check-input' type='radio' id='20reduce' required>
                                            <label class='form-check-label opt' for='20reduce'>
                                                F. reduce                     
                                            </label><br>
                                            <input name='answer[20][answer]' value='G' class='form-check-input' type='radio' id='20concede' required>
                                            <label class='form-check-label opt' for='20concede'>
                                                G. concede                  
                                            </label>
                                            <br>
                                            <input name='answer[20][answer]' value='H' class='form-check-input' type='radio' id='20refuse' required>
                                            <label class='form-check-label opt' for='20refuse'>
                                                H. refuse                    
                                            </label>
                                            <br>
                                            <input name='answer[20][answer]' value='I' class='form-check-input' type='radio' id='20conceal' required>
                                            <label class='form-check-label opt' for='20conceal'>
                                                I. conceal                   
                                            </label>
                                            <br>
                                            <input name='answer[20][answer]' value='J' class='form-check-input' type='radio' id='20disclose' required>
                                            <label class='form-check-label opt' for='20disclose'>
                                                J. disclose                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Robert buys 14 cans of dog food every week for his dogs, who each eat one day. If Robert has twice as many cats as dogs, how many cats does he have?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[21][answer]' value='A' class='form-check-input' type='radio' id='212' required>
                                            <label class='form-check-label opt' for='212'>
                                                A. 2                     
                                            </label><br>
                                            <input name='answer[21][answer]' value='B' class='form-check-input' type='radio' id='214' required>
                                            <label class='form-check-label opt' for='214'>
                                                B. 4                  
                                            </label>
                                            <br>
                                            <input name='answer[21][answer]' value='C' class='form-check-input' type='radio' id='216' required>
                                            <label class='form-check-label opt' for='216'>
                                                C. 6                    
                                            </label>
                                            <br>
                                            <input name='answer[21][answer]' value='D' class='form-check-input' type='radio' id='217' required>
                                            <label class='form-check-label opt' for='217'>
                                                D. 7                   
                                            </label>
                                            <br>
                                            <input name='answer[21][answer]' value='E' class='form-check-input' type='radio' id='218' required>
                                            <label class='form-check-label opt' for='218'>
                                                E. 8                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> Answer the following:</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 22/22-1.png" alt="" style="width: 50px;"> is to <img src="assets/imgs/icons/question 22/22-2.png" alt="" style="width: 50px;"> as <img src="assets/imgs/icons/question 22/22-3.png" alt="" style="width: 50px;"> is to -
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 22/22-f.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[22][answer]' value='F' class='form-check-input' type='radio' id='22-f' required>
                                                    <label class='form-check-label opt' for='22-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 22/22-g.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[22][answer]' value='G' class='form-check-input' type='radio' id='22-g' required>
                                                    <label class='form-check-label opt' for='22-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 22/22-h.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[22][answer]' value='H' class='form-check-input' type='radio' id='22-h' required>
                                                    <label class='form-check-label opt' for='22-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 22/22-i.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[22][answer]' value='I' class='form-check-input' type='radio' id='22-i' required>
                                                    <label class='form-check-label opt' for='22-i'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 22/22-j.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[22][answer]' value='J' class='form-check-input' type='radio' id='22-j' required>
                                                    <label class='form-check-label opt' for='22-j'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> What comes next in this series?&nbsp&nbsp&nbsp10C&nbsp&nbsp&nbsp8A&nbsp&nbsp&nbsp12E&nbsp&nbsp&nbsp10C&nbsp&nbsp&nbsp14G&nbsp&nbsp&nbsp?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[23][answer]' value='A' class='form-check-input' type='radio' id='2312E' required>
                                            <label class='form-check-label opt' for='2312E'>
                                                A. 12E                     
                                            </label><br>
                                            <input name='answer[23][answer]' value='B' class='form-check-input' type='radio' id='2312G' required>
                                            <label class='form-check-label opt' for='2312G'>
                                                B. 12G                  
                                            </label>
                                            <br>
                                            <input name='answer[23][answer]' value='C' class='form-check-input' type='radio' id='2314E' required>
                                            <label class='form-check-label opt' for='2314E'>
                                                C. 14E                    
                                            </label>
                                            <br>
                                            <input name='answer[23][answer]' value='D' class='form-check-input' type='radio' id='2316I' required>
                                            <label class='form-check-label opt' for='2316I'>
                                                D. 16I                   
                                            </label>
                                            <br>
                                            <input name='answer[23][answer]' value='E' class='form-check-input' type='radio' id='2318K' required>
                                            <label class='form-check-label opt' for='2318K'>
                                                E. 18K                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Paul was born in 1970. Dick was born in 1972. If John is younger than Dick, then we know that -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[24][answer]' value='F' class='form-check-input' type='radio' id='24F' required>
                                            <label class='form-check-label opt' for='24F'>
                                                F. Dick is younger than Paul and older than John.                     
                                            </label><br>
                                            <input name='answer[24][answer]' value='G' class='form-check-input' type='radio' id='24G' required>
                                            <label class='form-check-label opt' for='24G'>
                                                G. Paul is older than Dick and younger than John.                  
                                            </label>
                                            <br>
                                            <input name='answer[24][answer]' value='H' class='form-check-input' type='radio' id='24H' required>
                                            <label class='form-check-label opt' for='24H'>
                                                H. Paul is younger than Dick and older than John.                    
                                            </label>
                                            <br>
                                            <input name='answer[24][answer]' value='I' class='form-check-input' type='radio' id='24I' required>
                                            <label class='form-check-label opt' for='24I'>
                                                I. Paul is younger than Dick and John.                   
                                            </label>
                                            <br>
                                            <input name='answer[24][answer]' value='J' class='form-check-input' type='radio' id='24J' required>
                                            <label class='form-check-label opt' for='24J'>
                                                J. Dick is older than Paul and younger than John.                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Which word goes <i>most clearly</i> with: <b>peaceful&nbsp&nbsp&nbspserene&nbsp&nbsp&nbsptranquil</b>?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[25][answer]' value='A' class='form-check-input' type='radio' id='25joyous' required>
                                            <label class='form-check-label opt' for='25joyous'>
                                                A. joyous.                     
                                            </label><br>
                                            <input name='answer[25][answer]' value='B' class='form-check-input' type='radio' id='25monotous' required>
                                            <label class='form-check-label opt' for='25monotous'>
                                                B. monotonous.                  
                                            </label>
                                            <br>
                                            <input name='answer[25][answer]' value='C' class='form-check-input' type='radio' id='25emotional' required>
                                            <label class='form-check-label opt' for='25emotional'>
                                                C. emotional.                    
                                            </label>
                                            <br>
                                            <input name='answer[25][answer]' value='D' class='form-check-input' type='radio' id='25sensible' required>
                                            <label class='form-check-label opt' for='25sensible'>
                                                D. sensible.                   
                                            </label>
                                            <br>
                                            <input name='answer[25][answer]' value='E' class='form-check-input' type='radio' id='25calm' required>
                                            <label class='form-check-label opt' for='25calm'>
                                                E. calm.                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> The numbers in each box go together by following the <i>same</i> rule. Decide what the rule is, and choose the number that goes where you see the question mark.</p>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[26][answer]' value='F' class='form-check-input' type='radio' id='26-35' required>
                                            <label class='form-check-label opt' for='26-35'>
                                                F. 35                     
                                            </label><br>
                                            <input name='answer[26][answer]' value='G' class='form-check-input' type='radio' id='26-40' required>
                                            <label class='form-check-label opt' for='26-40'>
                                                G. 40                    
                                            </label>
                                            <br>
                                            <input name='answer[26][answer]' value='H' class='form-check-input' type='radio' id='26-45' required>
                                            <label class='form-check-label opt' for='26-45'>
                                                H. 45                    
                                            </label>
                                            <br>
                                            <input name='answer[26][answer]' value='I' class='form-check-input' type='radio' id='26-50' required>
                                            <label class='form-check-label opt' for='26-50'>
                                                I. 50                   
                                            </label>
                                            <br>
                                            <input name='answer[26][answer]' value='J' class='form-check-input' type='radio' id='26-55' required>
                                            <label class='form-check-label opt' for='26-55'>
                                                J. 55                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px;">
                                               <div class="row text-center">
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">20, 15</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">40, 30</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">60, ?</p>
                                                   </div>
                                                   
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> If the words below were arranged to make the <i>best</i> sentence, with which letter would the <u>first</u> word of the sentence <u>begin</u>?</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[27][answer]' value='A' class='form-check-input' type='radio' id='27-h' required>
                                            <label class='form-check-label opt' for='27-h'>
                                                A. H                     
                                            </label><br>
                                            <input name='answer[27][answer]' value='B' class='form-check-input' type='radio' id='27-b' required>
                                            <label class='form-check-label opt' for='27-b'>
                                                B. B                    
                                            </label>
                                            <br>
                                            <input name='answer[27][answer]' value='C' class='form-check-input' type='radio' id='27-p' required>
                                            <label class='form-check-label opt' for='27-p'>
                                                C. P                    
                                            </label>
                                            <br>
                                            <input name='answer[27][answer]' value='D' class='form-check-input' type='radio' id='27-w' required>
                                            <label class='form-check-label opt' for='27-w'>
                                                D. W                   
                                            </label>
                                            <br>
                                            <input name='answer[27][answer]' value='E' class='form-check-input' type='radio' id='27-t' required>
                                            <label class='form-check-label opt' for='27-t'>
                                                E. T                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>here</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>two</p>     
                                                   </div>
                                                   <div class="col">
                                                        <p>park</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>blocks</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>walk</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>and</p>  
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> The opposite of <b>discord</b> is -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[28][answer]' value='F' class='form-check-input' type='radio' id='28harmony' required>
                                            <label class='form-check-label opt' for='28harmony'>
                                                F. harmony                     
                                            </label><br>
                                            <input name='answer[28][answer]' value='G' class='form-check-input' type='radio' id='28grace' required>
                                            <label class='form-check-label opt' for='28grace'>
                                                G. grace                  
                                            </label>
                                            <br>
                                            <input name='answer[28][answer]' value='H' class='form-check-input' type='radio' id='28traditon' required>
                                            <label class='form-check-label opt' for='28traditon'>
                                                H. traditon                    
                                            </label>
                                            <br>
                                            <input name='answer[28][answer]' value='I' class='form-check-input' type='radio' id='28silence' required>
                                            <label class='form-check-label opt' for='28silence'>
                                                I. silence                   
                                            </label>
                                            <br>
                                            <input name='answer[28][answer]' value='J' class='form-check-input' type='radio' id='28friendliness' required>
                                            <label class='form-check-label opt' for='28friendliness'>
                                                J. friendliness                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the first part of the row go together to form a series. In the next part of the row, choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 29/29-1.png" alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 29/29-a.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[29][answer]' value='A' class='form-check-input' type='radio' id='29-A' required>
                                                    <label class='form-check-label opt' for='29-A'>
                                                                A.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 29/29-b.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[29][answer]' value='B' class='form-check-input' type='radio' id='29-B' required>
                                                    <label class='form-check-label opt' for='29-B'>
                                                                B.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 29/29-c.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[29][answer]' value='C' class='form-check-input' type='radio' id='29-C' required>
                                                    <label class='form-check-label opt' for='29-C'>
                                                                C.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 29/29-d.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[29][answer]' value='D' class='form-check-input' type='radio' id='29-D' required>
                                                    <label class='form-check-label opt' for='29-D'>
                                                                D.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 29/29-e.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[29][answer]' value='E' class='form-check-input' type='radio' id='29-E' required>
                                                    <label class='form-check-label opt' for='29-E'>
                                                                E.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The numbers in the box go together in a certain way. Choose the number that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[30][answer]' value='F' class='form-check-input' type='radio' id='30-12' required>
                                            <label class='form-check-label opt' for='30-12'>
                                                F. 12                     
                                            </label><br>
                                            <input name='answer[30][answer]' value='G' class='form-check-input' type='radio' id='30-24' required>
                                            <label class='form-check-label opt' for='30-24'>
                                                G. 24                    
                                            </label>
                                            <br>
                                            <input name='answer[30][answer]' value='H' class='form-check-input' type='radio' id='30-32' required>
                                            <label class='form-check-label opt' for='30-32'>
                                                H. 32                    
                                            </label>
                                            <br>
                                            <input name='answer[30][answer]' value='I' class='form-check-input' type='radio' id='30-48' required>
                                            <label class='form-check-label opt' for='30-48'>
                                                I. 48                   
                                            </label>
                                            <br>
                                            <input name='answer[30][answer]' value='J' class='form-check-input' type='radio' id='30-64' required>
                                            <label class='form-check-label opt' for='30-64'>
                                                J. 64                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>2</p>
                                                        <p>4</p>
                                                        <p>8</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>8</p>
                                                        <p>16</p>
                                                        <p>?</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>4</p>
                                                        <p>8</p>
                                                        <p>16</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the first part of the row go together to form a series. In the next part of the row, choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 31/31-1.png" alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 31/31-a.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[31][answer]' value='A' class='form-check-input' type='radio' id='31-A' required>
                                                    <label class='form-check-label opt' for='31-A'>
                                                                A.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 31/31-b.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[31][answer]' value='B' class='form-check-input' type='radio' id='31-B' required>
                                                    <label class='form-check-label opt' for='31-B'>
                                                                B.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 31/31-c.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[31][answer]' value='C' class='form-check-input' type='radio' id='31-C' required>
                                                    <label class='form-check-label opt' for='31-C'>
                                                                C.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 31/31-d.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[31][answer]' value='D' class='form-check-input' type='radio' id='31-D' required>
                                                    <label class='form-check-label opt' for='31-D'>
                                                                D.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 31/31-e.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[31][answer]' value='E' class='form-check-input' type='radio' id='31-E' required>
                                                    <label class='form-check-label opt' for='31-E'>
                                                                E.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> Answer the following:</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 32/32-1.png" alt="" style="width: 50px;"> is to <img src="assets/imgs/icons/question 32/32-2.png" alt="" style="width: 50px;"> as <img src="assets/imgs/icons/question 32/32-3.png" alt="" style="width: 50px;"> is to -
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 32/32-f.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[32][answer]' value='F' class='form-check-input' type='radio' id='32-f' required>
                                                    <label class='form-check-label opt' for='32-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 32/32-g.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[32][answer]' value='G' class='form-check-input' type='radio' id='32-g' required>
                                                    <label class='form-check-label opt' for='32-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 32/32-h.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[32][answer]' value='H' class='form-check-input' type='radio' id='32-h' required>
                                                    <label class='form-check-label opt' for='32-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 32/32-i.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[32][answer]' value='I' class='form-check-input' type='radio' id='32-i' required>
                                                    <label class='form-check-label opt' for='32-i'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 32/32-j.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[32][answer]' value='J' class='form-check-input' type='radio' id='32-j' required>
                                                    <label class='form-check-label opt' for='32-j'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> <b>Possible</b> is to <b>maybe</b> as <b>probable</b> is to - </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[33][answer]' value='A' class='form-check-input' type='radio' id='33gradually' required>
                                            <label class='form-check-label opt' for='33gradually'>
                                                A. gradually                     
                                            </label><br>
                                            <input name='answer[33][answer]' value='B' class='form-check-input' type='radio' id='33hopefully' required>
                                            <label class='form-check-label opt' for='33hopefully'>
                                                B. hopefully                  
                                            </label>
                                            <br>
                                            <input name='answer[33][answer]' value='C' class='form-check-input' type='radio' id='33certainly' required>
                                            <label class='form-check-label opt' for='33certainly'>
                                                C. certainly                    
                                            </label>
                                            <br>
                                            <input name='answer[33][answer]' value='D' class='form-check-input' type='radio' id='33eventually' required>
                                            <label class='form-check-label opt' for='33eventually'>
                                                D. eventually                   
                                            </label>
                                            <br>
                                            <input name='answer[33][answer]' value='E' class='form-check-input' type='radio' id='33likely' required>
                                            <label class='form-check-label opt' for='33likely'>
                                                E. likely                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Mr. and Mrs. DiNapoli have two sons and three daughters. When the whole family is together for dinner, they have to bring one extra chair to the table. How many chairs do they usually have around the table?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[34][answer]' value='F' class='form-check-input' type='radio' id='344' required>
                                            <label class='form-check-label opt' for='344'>
                                                F. 4                     
                                            </label><br>
                                            <input name='answer[34][answer]' value='G' class='form-check-input' type='radio' id='345' required>
                                            <label class='form-check-label opt' for='345'>
                                                G. 5                  
                                            </label>
                                            <br>
                                            <input name='answer[34][answer]' value='H' class='form-check-input' type='radio' id='346' required>
                                            <label class='form-check-label opt' for='346'>
                                                H. 6                    
                                            </label>
                                            <br>
                                            <input name='answer[34][answer]' value='I' class='form-check-input' type='radio' id='347' required>
                                            <label class='form-check-label opt' for='347'>
                                                I. 7                   
                                            </label>
                                            <br>
                                            <input name='answer[34][answer]' value='J' class='form-check-input' type='radio' id='348' required>
                                            <label class='form-check-label opt' for='348'>
                                                J. 8                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> The opposite of <b>moderate</b> is -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[35][answer]' value='A' class='form-check-input' type='radio' id='35sudden' required>
                                            <label class='form-check-label opt' for='35sudden'>
                                                A. sudden                     
                                            </label><br>
                                            <input name='answer[35][answer]' value='B' class='form-check-input' type='radio' id='35swift' required>
                                            <label class='form-check-label opt' for='35swift'>
                                                B. swift                  
                                            </label>
                                            <br>
                                            <input name='answer[35][answer]' value='C' class='form-check-input' type='radio' id='35treacherous' required>
                                            <label class='form-check-label opt' for='35treacherous'>
                                                C. treacherous                    
                                            </label>
                                            <br>
                                            <input name='answer[35][answer]' value='D' class='form-check-input' type='radio' id='35violent' required>
                                            <label class='form-check-label opt' for='35violent'>
                                                D. violent                   
                                            </label>
                                            <br>
                                            <input name='answer[35][answer]' value='E' class='form-check-input' type='radio' id='35extreme' required>
                                            <label class='form-check-label opt' for='35extreme'>
                                                E. extreme                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawing in the box go together in a certain way. Choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[36][answer]' value='F' class='form-check-input' type='radio' id='361/2' required>
                                            <label class='form-check-label opt' for='361/2'>
                                                F. 1/2                     
                                            </label><br>
                                            <input name='answer[36][answer]' value='G' class='form-check-input' type='radio' id='361/3' required>
                                            <label class='form-check-label opt' for='361/3'>
                                                G. 1/3                  
                                            </label>
                                            <br>
                                            <input name='answer[36][answer]' value='H' class='form-check-input' type='radio' id='361/6' required>
                                            <label class='form-check-label opt' for='361/6'>
                                                H. 1/6                    
                                            </label>
                                            <br>
                                            <input name='answer[36][answer]' value='I' class='form-check-input' type='radio' id='361/8' required>
                                            <label class='form-check-label opt' for='361/8'>
                                                I. 1/8                   
                                            </label>
                                            <br>
                                            <input name='answer[36][answer]' value='J' class='form-check-input' type='radio' id='361/12' required>
                                            <label class='form-check-label opt' for='361/12'>
                                                J. 1/12                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>1</p>
                                                        <p>1/2</p>
                                                        <p>1/4</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>1/2</p>
                                                        <p>1/4</p>
                                                        <p>?</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>1/4</p>
                                                        <p>1/8</p>
                                                        <p>1/16</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The group of letters in the box go together in a certain way. Choose the group of letters that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[37][answer]' value='A' class='form-check-input' type='radio' id='37WXZY' required>
                                            <label class='form-check-label opt' for='37WXZY'>
                                                A. WXZY                     
                                            </label><br>
                                            <input name='answer[37][answer]' value='B' class='form-check-input' type='radio' id='37XYZW' required>
                                            <label class='form-check-label opt' for='37XYZW'>
                                                B. XYZW                  
                                            </label>
                                            <br>
                                            <input name='answer[37][answer]' value='C' class='form-check-input' type='radio' id='37YXZW' required>
                                            <label class='form-check-label opt' for='37YXZW'>
                                                C. YXZW                    
                                            </label>
                                            <br>
                                            <input name='answer[37][answer]' value='D' class='form-check-input' type='radio' id='37YZWX' required>
                                            <label class='form-check-label opt' for='37YZWX'>
                                                D. YZWX                   
                                            </label>
                                            <br>
                                            <input name='answer[37][answer]' value='E' class='form-check-input' type='radio' id='37ZYXW' required>
                                            <label class='form-check-label opt' for='37ZYXW'>
                                                E. ZYXW                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>ABCD</p>
                                                        <p>WXYZ</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>ADCB</p>
                                                        <p>WZYX</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>CDAB</p>
                                                        <p>?</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Every country must have -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[38][answer]' value='F' class='form-check-input' type='radio' id='38coasts' required>
                                            <label class='form-check-label opt' for='38coasts'>
                                                F. coasts                     
                                            </label><br>
                                            <input name='answer[38][answer]' value='G' class='form-check-input' type='radio' id='38a president' required>
                                            <label class='form-check-label opt' for='38a president'>
                                                G. a president                  
                                            </label>
                                            <br>
                                            <input name='answer[38][answer]' value='H' class='form-check-input' type='radio' id='38boundaries' required>
                                            <label class='form-check-label opt' for='38boundaries'>
                                                H. boundaries                    
                                            </label>
                                            <br>
                                            <input name='answer[38][answer]' value='I' class='form-check-input' type='radio' id='38a navy' required>
                                            <label class='form-check-label opt' for='38a navy'>
                                                I. a navy                   
                                            </label>
                                            <br>
                                            <input name='answer[38][answer]' value='J' class='form-check-input' type='radio' id='38a flag' required>
                                            <label class='form-check-label opt' for='38a flag'>
                                                J. a flag                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> What number is missing from this series?&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp8&nbsp&nbsp&nbsp6&nbsp&nbsp&nbsp12&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp?&nbsp&nbsp&nbsp18&nbsp&nbsp&nbsp36</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[39][answer]' value='A' class='form-check-input' type='radio' id='398' required>
                                            <label class='form-check-label opt' for='398'>
                                                A. 8                     
                                            </label><br>
                                            <input name='answer[39][answer]' value='B' class='form-check-input' type='radio' id='3914' required>
                                            <label class='form-check-label opt' for='3914'>
                                                B. 14                  
                                            </label>
                                            <br>
                                            <input name='answer[39][answer]' value='C' class='form-check-input' type='radio' id='3916' required>
                                            <label class='form-check-label opt' for='3916'>
                                                C. 16                    
                                            </label>
                                            <br>
                                            <input name='answer[39][answer]' value='D' class='form-check-input' type='radio' id='3920' required>
                                            <label class='form-check-label opt' for='3920'>
                                                D. 20                   
                                            </label>
                                            <br>
                                            <input name='answer[39][answer]' value='E' class='form-check-input' type='radio' id='3924' required>
                                            <label class='form-check-label opt' for='3924'>
                                                E. 24                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p style="margin-bottom: 0px"><b class="number"></b> Assume that -</p>
                            <p style="margin-left: 50px; margin-bottom: 0px">All <b>A</b>s are <b>C</b>s.<br>Some <b>D</b>s are <b>C</b>s.<br>No <b>B</b>s are <b>C</b>s</p><p style="margin-left: 30px; margin-bottom: 0px">We know that -</p><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[40][answer]' value='F' class='form-check-input' type='radio' id='40AD' required>
                                            <label class='form-check-label opt' for='40AD'>
                                                F. no <b>As</b> are <b>D</b>s                     
                                            </label><br>
                                            <input name='answer[40][answer]' value='G' class='form-check-input' type='radio' id='40AB' required>
                                            <label class='form-check-label opt' for='40AB'>
                                                G. no <b>A</b>s are <b>B</b>s                  
                                            </label>
                                            <br>
                                            <input name='answer[40][answer]' value='H' class='form-check-input' type='radio' id='40BD' required>
                                            <label class='form-check-label opt' for='40BD'>
                                                H. some <b>B</b>s are <b>D</b>s                    
                                            </label>
                                            <br>
                                            <input name='answer[40][answer]' value='I' class='form-check-input' type='radio' id='40AC' required>
                                            <label class='form-check-label opt' for='40AC'>
                                                I. no <b>A</b>s are both <b>C</b>s and <b>D</b>s                   
                                            </label>
                                            <br>
                                            <input name='answer[40][answer]' value='J' class='form-check-input' type='radio' id='40DB' required>
                                            <label class='form-check-label opt' for='40DB'>
                                                J. no <b>D</b>s are <b>B</b>s                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> Answer the following:</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 41/41-1.png" alt="" style="width: 50px;"> is to <img src="assets/imgs/icons/question 41/41-2.png" alt="" style="width: 50px;"> as <img src="assets/imgs/icons/question 41/41-3.png" alt="" style="width: 50px;"> is to -
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 41/41-a.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[41][answer]' value='A' class='form-check-input' type='radio' id='41-A' required>
                                                    <label class='form-check-label opt' for='41-A'>
                                                                A.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 41/41-b.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[41][answer]' value='B' class='form-check-input' type='radio' id='41-B' required>
                                                    <label class='form-check-label opt' for='41-B'>
                                                                B.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 41/41-c.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[41][answer]' value='C' class='form-check-input' type='radio' id='41-C' required>
                                                    <label class='form-check-label opt' for='41-C'>
                                                                C.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 41/41-d.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[41][answer]' value='D' class='form-check-input' type='radio' id='41-D' required>
                                                    <label class='form-check-label opt' for='41-D'>
                                                                D.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 41/41-e.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[41][answer]' value='E' class='form-check-input' type='radio' id='41-E' required>
                                                    <label class='form-check-label opt' for='41-E'>
                                                                E.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> The numbers in each box go together by following the <i>same</i> rule. Decide what the rule is and choose the number that goes where you see the question mark.</p>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[42][answer]' value='F' class='form-check-input' type='radio' id='42-35' required>
                                            <label class='form-check-label opt' for='42-35'>
                                                F. 13                     
                                            </label><br>
                                            <input name='answer[42][answer]' value='G' class='form-check-input' type='radio' id='42-40' required>
                                            <label class='form-check-label opt' for='42-40'>
                                                G. 14                    
                                            </label>
                                            <br>
                                            <input name='answer[42][answer]' value='H' class='form-check-input' type='radio' id='42-45' required>
                                            <label class='form-check-label opt' for='42-45'>
                                                H. 15                    
                                            </label>
                                            <br>
                                            <input name='answer[42][answer]' value='I' class='form-check-input' type='radio' id='42-50' required>
                                            <label class='form-check-label opt' for='42-50'>
                                                I. 16                   
                                            </label>
                                            <br>
                                            <input name='answer[42][answer]' value='J' class='form-check-input' type='radio' id='42-55' required>
                                            <label class='form-check-label opt' for='42-55'>
                                                J. 18                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px;">
                                               <div class="row text-center">
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">1, 4, 10</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">3, 6, 12</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">5, 8, ?</p>
                                                   </div>
                                                   
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the box go together in a certain way. Choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 43/43-1.png" alt="" style="width: 50%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 43/43-a.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[43][answer]' value='A' class='form-check-input' type='radio' id='43-a' required>
                                                    <label class='form-check-label opt' for='43-a'>
                                                                A.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 43/43-b.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[43][answer]' value='B' class='form-check-input' type='radio' id='43-b' required>
                                                    <label class='form-check-label opt' for='43-b'>
                                                                B.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 43/43-c.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[43][answer]' value='C' class='form-check-input' type='radio' id='43-c' required>
                                                    <label class='form-check-label opt' for='43-c'>
                                                                C.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 43/43-d.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[43][answer]' value='D' class='form-check-input' type='radio' id='43-d' required>
                                                    <label class='form-check-label opt' for='43-d'>
                                                                D.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 43/43-e.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[43][answer]' value='E' class='form-check-input' type='radio' id='43-e' required>
                                                    <label class='form-check-label opt' for='43-e'>
                                                                E.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The numbers in the box go together in a certain way. Choose the number that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[44][answer]' value='F' class='form-check-input' type='radio' id='4419' required>
                                            <label class='form-check-label opt' for='4419'>
                                                F. 19                     
                                            </label><br>
                                            <input name='answer[44][answer]' value='G' class='form-check-input' type='radio' id='4421' required>
                                            <label class='form-check-label opt' for='4421'>
                                                G. 21                  
                                            </label>
                                            <br>
                                            <input name='answer[44][answer]' value='H' class='form-check-input' type='radio' id='4424' required>
                                            <label class='form-check-label opt' for='4424'>
                                                H. 24                    
                                            </label>
                                            <br>
                                            <input name='answer[44][answer]' value='I' class='form-check-input' type='radio' id='4427' required>
                                            <label class='form-check-label opt' for='4427'>
                                                I. 27                   
                                            </label>
                                            <br>
                                            <input name='answer[44][answer]' value='J' class='form-check-input' type='radio' id='4436' required>
                                            <label class='form-check-label opt' for='4436'>
                                                J. 36                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>10</p>
                                                        <p>8</p>
                                                        <p>12</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>7</p>
                                                        <p>5</p>
                                                        <p>9</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>21</p>
                                                        <p>15</p>
                                                        <p>?</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Which word goes <i>most clearly</i> with:&nbsp&nbsp&nbsp<b>forward&nbsp&nbsp&nbspsideways&nbsp&nbsp&nbspdown</b> ?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[45][answer]' value='A' class='form-check-input' type='radio' id='45top' required>
                                            <label class='form-check-label opt' for='45top'>
                                                A. top                     
                                            </label><br>
                                            <input name='answer[45][answer]' value='B' class='form-check-input' type='radio' id='45up' required>
                                            <label class='form-check-label opt' for='45up'>
                                                B. up                  
                                            </label>
                                            <br>
                                            <input name='answer[45][answer]' value='C' class='form-check-input' type='radio' id='45above' required>
                                            <label class='form-check-label opt' for='45above'>
                                                C. above                    
                                            </label>
                                            <br>
                                            <input name='answer[45][answer]' value='D' class='form-check-input' type='radio' id='45over' required>
                                            <label class='form-check-label opt' for='45over'>
                                                D. over                   
                                            </label>
                                            <br>
                                            <input name='answer[45][answer]' value='E' class='form-check-input' type='radio' id='45beyond' required>
                                            <label class='form-check-label opt' for='45beyond'>
                                                E. beyond                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> What number is equal to one-third of the difference between the squares of ten and eight?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[46][answer]' value='F' class='form-check-input' type='radio' id='463' required>
                                            <label class='form-check-label opt' for='463'>
                                                F. 3                     
                                            </label><br>
                                            <input name='answer[46][answer]' value='G' class='form-check-input' type='radio' id='466' required>
                                            <label class='form-check-label opt' for='466'>
                                                G. 6                  
                                            </label>
                                            <br>
                                            <input name='answer[46][answer]' value='H' class='form-check-input' type='radio' id='4612' required>
                                            <label class='form-check-label opt' for='4612'>
                                                H. 12                    
                                            </label>
                                            <br>
                                            <input name='answer[46][answer]' value='I' class='form-check-input' type='radio' id='4618' required>
                                            <label class='form-check-label opt' for='4618'>
                                                I. 18                   
                                            </label>
                                            <br>
                                            <input name='answer[46][answer]' value='J' class='form-check-input' type='radio' id='4636' required>
                                            <label class='form-check-label opt' for='4636'>
                                                J. 36                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> What letter comes next in this series?&nbsp&nbsp&nbspH&nbsp&nbsp&nbspI&nbsp&nbsp&nbsp&nbspK&nbsp&nbsp&nbsp&nbspL&nbsp&nbsp&nbspN&nbsp&nbsp&nbsp&nbspO&nbsp&nbsp&nbsp?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[47][answer]' value='A' class='form-check-input' type='radio' id='47M' required>
                                            <label class='form-check-label opt' for='47M'>
                                                A. M                     
                                            </label><br>
                                            <input name='answer[47][answer]' value='B' class='form-check-input' type='radio' id='47P' required>
                                            <label class='form-check-label opt' for='47P'>
                                                B. P                  
                                            </label>
                                            <br>
                                            <input name='answer[47][answer]' value='C' class='form-check-input' type='radio' id='47Q' required>
                                            <label class='form-check-label opt' for='47Q'>
                                                C. Q                    
                                            </label>
                                            <br>
                                            <input name='answer[47][answer]' value='D' class='form-check-input' type='radio' id='47R' required>
                                            <label class='form-check-label opt' for='47R'>
                                                D. R                   
                                            </label>
                                            <br>
                                            <input name='answer[47][answer]' value='E' class='form-check-input' type='radio' id='47S' required>
                                            <label class='form-check-label opt' for='47S'>
                                                E. S                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the box go together in a certain way. Choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 48/48-1.png" alt="" style="width: 50%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 48/48-f.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[48][answer]' value='F' class='form-check-input' type='radio' id='48-F' required>
                                                    <label class='form-check-label opt' for='48-F'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 48/48-g.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[48][answer]' value='G' class='form-check-input' type='radio' id='48-G' required>
                                                    <label class='form-check-label opt' for='48-G'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 48/48-h.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[48][answer]' value='H' class='form-check-input' type='radio' id='48-H' required>
                                                    <label class='form-check-label opt' for='48-H'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 48/48-i.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[48][answer]' value='I' class='form-check-input' type='radio' id='48-I' required>
                                                    <label class='form-check-label opt' for='48-I'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 48/48-j.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[48][answer]' value='J' class='form-check-input' type='radio' id='48-J' required>
                                                    <label class='form-check-label opt' for='48-J'>
                                                                J.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> The numbers in each box go together by following the <i>same</i> rule. Decide what the rule is and choose the number that goes where you see the question mark.</p>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[49][answer]' value='A' class='form-check-input' type='radio' id='4935' required>
                                            <label class='form-check-label opt' for='4935'>
                                                A. 35                     
                                            </label><br>
                                            <input name='answer[49][answer]' value='B' class='form-check-input' type='radio' id='4940' required>
                                            <label class='form-check-label opt' for='4940'>
                                                B. 40                    
                                            </label>
                                            <br>
                                            <input name='answer[49][answer]' value='C' class='form-check-input' type='radio' id='4943' required>
                                            <label class='form-check-label opt' for='4943'>
                                                C. 43                    
                                            </label>
                                            <br>
                                            <input name='answer[49][answer]' value='D' class='form-check-input' type='radio' id='4948' required>
                                            <label class='form-check-label opt' for='4948'>
                                                D. 48                   
                                            </label>
                                            <br>
                                            <input name='answer[49][answer]' value='E' class='form-check-input' type='radio' id='4960' required>
                                            <label class='form-check-label opt' for='4960'>
                                                E. 60                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px;">
                                               <div class="row text-center">
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">5, 18, 16</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">10, 3, 28</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">15, 45, ?</p>
                                                   </div>
                                                   
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> <b>Electricity</b> is <b>light bulb</b> as -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[50][answer]' value='F' class='form-check-input' type='radio' id='503' required>
                                            <label class='form-check-label opt' for='503'>
                                                F. furnace is to heat                     
                                            </label><br>
                                            <input name='answer[50][answer]' value='G' class='form-check-input' type='radio' id='506' required>
                                            <label class='form-check-label opt' for='506'>
                                                G. steam to radiator                  
                                            </label>
                                            <br>
                                            <input name='answer[50][answer]' value='H' class='form-check-input' type='radio' id='5012' required>
                                            <label class='form-check-label opt' for='5012'>
                                                H. water is to dam                    
                                            </label>
                                            <br>
                                            <input name='answer[50][answer]' value='I' class='form-check-input' type='radio' id='5018' required>
                                            <label class='form-check-label opt' for='5018'>
                                                I. fuel is to engine                   
                                            </label>
                                            <br>
                                            <input name='answer[50][answer]' value='J' class='form-check-input' type='radio' id='5036' required>
                                            <label class='form-check-label opt' for='5036'>
                                                J. smoke is to fire                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> The numbers in each box go together by following the <i>same</i> rule. Decide what the rule is and choose the number that goes where you see the question mark.</p>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[51][answer]' value='A' class='form-check-input' type='radio' id='5111' required>
                                            <label class='form-check-label opt' for='5111'>
                                                A. 11                     
                                            </label><br>
                                            <input name='answer[51][answer]' value='B' class='form-check-input' type='radio' id='5113' required>
                                            <label class='form-check-label opt' for='5113'>
                                                B. 13                    
                                            </label>
                                            <br>
                                            <input name='answer[51][answer]' value='C' class='form-check-input' type='radio' id='5118' required>
                                            <label class='form-check-label opt' for='5118'>
                                                C. 18                    
                                            </label>
                                            <br>
                                            <input name='answer[51][answer]' value='D' class='form-check-input' type='radio' id='5127' required>
                                            <label class='form-check-label opt' for='5127'>
                                                D. 27                   
                                            </label>
                                            <br>
                                            <input name='answer[51][answer]' value='E' class='form-check-input' type='radio' id='5136' required>
                                            <label class='form-check-label opt' for='5136'>
                                                E. 36                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px;">
                                               <div class="row text-center">
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">2, 4, 8</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">3, 9, ?</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">4, 16, 20</p>
                                                   </div>
                                                   
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The words in the box go together in a certain way. Choose the word that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[52][answer]' value='F' class='form-check-input' type='radio' id='52glass' required>
                                            <label class='form-check-label opt' for='52glass'>
                                                F. glass                     
                                            </label><br>
                                            <input name='answer[52][answer]' value='G' class='form-check-input' type='radio' id='52cup' required>
                                            <label class='form-check-label opt' for='52cup'>
                                                G. cup                  
                                            </label>
                                            <br>
                                            <input name='answer[52][answer]' value='H' class='form-check-input' type='radio' id='52pour' required>
                                            <label class='form-check-label opt' for='52pour'>
                                                H. pour                    
                                            </label>
                                            <br>
                                            <input name='answer[52][answer]' value='I' class='form-check-input' type='radio' id='52milk' required>
                                            <label class='form-check-label opt' for='52milk'>
                                                I. milk                   
                                            </label>
                                            <br>
                                            <input name='answer[52][answer]' value='J' class='form-check-input' type='radio' id='52break' required>
                                            <label class='form-check-label opt' for='52break'>
                                                J. break                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>steel</p>
                                                        <p>china</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>shovel</p>
                                                        <p>pitcher</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>dig</p>
                                                        <p>?</p> 
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> There can be no message if there is no -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[53][answer]' value='A' class='form-check-input' type='radio' id='53M' required>
                                            <label class='form-check-label opt' for='53M'>
                                                A. word                     
                                            </label><br>
                                            <input name='answer[53][answer]' value='B' class='form-check-input' type='radio' id='53P' required>
                                            <label class='form-check-label opt' for='53P'>
                                                B. note                  
                                            </label>
                                            <br>
                                            <input name='answer[53][answer]' value='C' class='form-check-input' type='radio' id='53Q' required>
                                            <label class='form-check-label opt' for='53Q'>
                                                C. messenger                    
                                            </label>
                                            <br>
                                            <input name='answer[53][answer]' value='D' class='form-check-input' type='radio' id='53R' required>
                                            <label class='form-check-label opt' for='53R'>
                                                D. thought                   
                                            </label>
                                            <br>
                                            <input name='answer[53][answer]' value='E' class='form-check-input' type='radio' id='53S' required>
                                            <label class='form-check-label opt' for='53S'>
                                                E. pencil                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the first part of the row go together to form a series. In the next part of the row, choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 54/54-1.png" alt="" style="width: 100%;"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 54/54-f.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[54][answer]' value='F' class='form-check-input' type='radio' id='54-f' required>
                                                    <label class='form-check-label opt' for='54-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 54/54-g.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[54][answer]' value='G' class='form-check-input' type='radio' id='54-g' required>
                                                    <label class='form-check-label opt' for='54-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 54/54-h.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[54][answer]' value='H' class='form-check-input' type='radio' id='54-h' required>
                                                    <label class='form-check-label opt' for='54-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 54/54-i.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[54][answer]' value='I' class='form-check-input' type='radio' id='54-i' required>
                                                    <label class='form-check-label opt' for='54-i'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 54/54-j.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[54][answer]' value='J' class='form-check-input' type='radio' id='54-j' required>
                                                    <label class='form-check-label opt' for='54-j'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p style="margin-bottom: 0px;"><b class="number"></b> Choose the words that vest complete this sentence:</p>
                            <p style="margin-left: 25px;">The evidence against him was ___________ so the charges were____________</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[55][answer]' value='A' class='form-check-input' type='radio' id='55M' required>
                                            <label class='form-check-label opt' for='55M'>
                                                A. convincing - dropped                     
                                            </label><br>
                                            <input name='answer[55][answer]' value='B' class='form-check-input' type='radio' id='55P' required>
                                            <label class='form-check-label opt' for='55P'>
                                                B. feeble - extended                  
                                            </label>
                                            <br>
                                            <input name='answer[55][answer]' value='C' class='form-check-input' type='radio' id='55Q' required>
                                            <label class='form-check-label opt' for='55Q'>
                                                C. overwhelming - reduced                    
                                            </label>
                                            <br>
                                            <input name='answer[55][answer]' value='D' class='form-check-input' type='radio' id='55R' required>
                                            <label class='form-check-label opt' for='55R'>
                                                D. damaging - withdrawn                   
                                            </label>
                                            <br>
                                            <input name='answer[55][answer]' value='E' class='form-check-input' type='radio' id='55S' required>
                                            <label class='form-check-label opt' for='55S'>
                                                E. unsupported - dismissed                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the box go together in a certain way. Choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 56/56-1.png" alt="" style="width: 50%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 56/56-f.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[56][answer]' value='F' class='form-check-input' type='radio' id='56-F' required>
                                                    <label class='form-check-label opt' for='56-F'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 56/56-g.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[56][answer]' value='G' class='form-check-input' type='radio' id='56-G' required>
                                                    <label class='form-check-label opt' for='56-G'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 56/56-h.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[56][answer]' value='H' class='form-check-input' type='radio' id='56-H' required>
                                                    <label class='form-check-label opt' for='56-H'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 56/56-i.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[56][answer]' value='I' class='form-check-input' type='radio' id='56-I' required>
                                                    <label class='form-check-label opt' for='56-I'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 56/56-j.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[56][answer]' value='J' class='form-check-input' type='radio' id='56-J' required>
                                                    <label class='form-check-label opt' for='56-J'>
                                                                J.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> The opposite of <b>scarcity</b> is -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[57][answer]' value='A' class='form-check-input' type='radio' id='57M' required>
                                            <label class='form-check-label opt' for='57M'>
                                                A. necessity                     
                                            </label><br>
                                            <input name='answer[57][answer]' value='B' class='form-check-input' type='radio' id='57P' required>
                                            <label class='form-check-label opt' for='57P'>
                                                B. bonus                  
                                            </label>
                                            <br>
                                            <input name='answer[57][answer]' value='C' class='form-check-input' type='radio' id='57Q' required>
                                            <label class='form-check-label opt' for='57Q'>
                                                C. privilege                    
                                            </label>
                                            <br>
                                            <input name='answer[57][answer]' value='D' class='form-check-input' type='radio' id='57R' required>
                                            <label class='form-check-label opt' for='57R'>
                                                D. abundance                   
                                            </label>
                                            <br>
                                            <input name='answer[57][answer]' value='E' class='form-check-input' type='radio' id='57S' required>
                                            <label class='form-check-label opt' for='57S'>
                                                E. expansion                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> In a foreign language <b>tana dona meka</b> means <b>very cold water, tana neta</b> means <b>hot water</b>, and <b>dona bela</b> means very good. Which word means cold?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[58][answer]' value='F' class='form-check-input' type='radio' id='583' required>
                                            <label class='form-check-label opt' for='583'>
                                                F. dona                     
                                            </label><br>
                                            <input name='answer[58][answer]' value='G' class='form-check-input' type='radio' id='586' required>
                                            <label class='form-check-label opt' for='586'>
                                                G. neta                  
                                            </label>
                                            <br>
                                            <input name='answer[58][answer]' value='H' class='form-check-input' type='radio' id='5812' required>
                                            <label class='form-check-label opt' for='5812'>
                                                H. tana                    
                                            </label>
                                            <br>
                                            <input name='answer[58][answer]' value='I' class='form-check-input' type='radio' id='5818' required>
                                            <label class='form-check-label opt' for='5818'>
                                                I. bela                   
                                            </label>
                                            <br>
                                            <input name='answer[58][answer]' value='J' class='form-check-input' type='radio' id='5836' required>
                                            <label class='form-check-label opt' for='5836'>
                                                J. meka                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> Answer the following:</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 59/59-1.png" alt="" style="width: 50px;"> is to <img src="assets/imgs/icons/question 59/59-2.png" alt="" style="width: 50px;"> as <img src="assets/imgs/icons/question 59/59-3.png" alt="" style="width: 50px;"> is to -
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 59/59-a.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[59][answer]' value='A' class='form-check-input' type='radio' id='59-A' required>
                                                    <label class='form-check-label opt' for='59-A'>
                                                                A.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 59/59-b.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[59][answer]' value='B' class='form-check-input' type='radio' id='59-B' required>
                                                    <label class='form-check-label opt' for='59-B'>
                                                                B.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 59/59-c.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[59][answer]' value='C' class='form-check-input' type='radio' id='59-C' required>
                                                    <label class='form-check-label opt' for='59-C'>
                                                                C.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 59/59-d.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[59][answer]' value='D' class='form-check-input' type='radio' id='59-D' required>
                                                    <label class='form-check-label opt' for='59-D'>
                                                                D.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 59/59-e.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[59][answer]' value='E' class='form-check-input' type='radio' id='59-E' required>
                                                    <label class='form-check-label opt' for='59-E'>
                                                                E.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> What number comes next in this series?&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp11&nbsp&nbsp&nbsp16&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp23&nbsp&nbsp&nbsp?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[60][answer]' value='F' class='form-check-input' type='radio' id='603' required>
                                            <label class='form-check-label opt' for='603'>
                                                F. 24                     
                                            </label><br>
                                            <input name='answer[60][answer]' value='G' class='form-check-input' type='radio' id='606' required>
                                            <label class='form-check-label opt' for='606'>
                                                G. 25                  
                                            </label>
                                            <br>
                                            <input name='answer[60][answer]' value='H' class='form-check-input' type='radio' id='6012' required>
                                            <label class='form-check-label opt' for='6012'>
                                                H. 27                    
                                            </label>
                                            <br>
                                            <input name='answer[60][answer]' value='I' class='form-check-input' type='radio' id='6018' required>
                                            <label class='form-check-label opt' for='6018'>
                                                I. 28                   
                                            </label>
                                            <br>
                                            <input name='answer[60][answer]' value='J' class='form-check-input' type='radio' id='6036' required>
                                            <label class='form-check-label opt' for='6036'>
                                                J. 29                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> Which word does <i>not</i> go with the other four?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[61][answer]' value='A' class='form-check-input' type='radio' id='61M' required>
                                            <label class='form-check-label opt' for='61M'>
                                                A. dropped                     
                                            </label><br>
                                            <input name='answer[61][answer]' value='B' class='form-check-input' type='radio' id='61P' required>
                                            <label class='form-check-label opt' for='61P'>
                                                B. risky                  
                                            </label>
                                            <br>
                                            <input name='answer[61][answer]' value='C' class='form-check-input' type='radio' id='61Q' required>
                                            <label class='form-check-label opt' for='61Q'>
                                                C. hazardous                    
                                            </label>
                                            <br>
                                            <input name='answer[61][answer]' value='D' class='form-check-input' type='radio' id='61R' required>
                                            <label class='form-check-label opt' for='61R'>
                                                D. unsafe                   
                                            </label>
                                            <br>
                                            <input name='answer[61][answer]' value='E' class='form-check-input' type='radio' id='61S' required>
                                            <label class='form-check-label opt' for='61S'>
                                                E. frightened                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> If the words below were arranged to make the <i>best</i> sentence, with which letter would the <u>last</u> word of the sentence <u>begin</u>?</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[62][answer]' value='F' class='form-check-input' type='radio' id='62-b' required>
                                            <label class='form-check-label opt' for='62-b'>
                                                F. a                     
                                            </label><br>
                                            <input name='answer[62][answer]' value='G' class='form-check-input' type='radio' id='62-o' required>
                                            <label class='form-check-label opt' for='62-o'>
                                                G. g                   
                                            </label>
                                            <br>
                                            <input name='answer[62][answer]' value='H' class='form-check-input' type='radio' id='62-h' required>
                                            <label class='form-check-label opt' for='62-h'>
                                                H. s                    
                                            </label>
                                            <br>
                                            <input name='answer[62][answer]' value='I' class='form-check-input' type='radio' id='62-w' required>
                                            <label class='form-check-label opt' for='62-w'>
                                                I. m                   
                                            </label>
                                            <br>
                                            <input name='answer[62][answer]' value='J' class='form-check-input' type='radio' id='62-n' required>
                                            <label class='form-check-label opt' for='62-n'>
                                                J. i                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>live</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>many</p>     
                                                   </div>
                                                   <div class="col">
                                                        <p>of</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>groups</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p>in</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p> animals</p>  
                                                   </div>
                                                   <div class="col">
                                                        <p> species</p>  
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the first part of the row go together to form a series. In the next part of the row, choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 63/63-1.png" alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 63/63-a.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[63][answer]' value='A' class='form-check-input' type='radio' id='63-A' required>
                                                    <label class='form-check-label opt' for='63-A'>
                                                                A.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 63/63-b.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[63][answer]' value='B' class='form-check-input' type='radio' id='63-B' required>
                                                    <label class='form-check-label opt' for='63-B'>
                                                                B.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 63/63-c.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[63][answer]' value='C' class='form-check-input' type='radio' id='63-C' required>
                                                    <label class='form-check-label opt' for='63-C'>
                                                                C.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 63/63-d.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[63][answer]' value='D' class='form-check-input' type='radio' id='63-D' required>
                                                    <label class='form-check-label opt' for='63-D'>
                                                                D.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 63/63-e.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[63][answer]' value='E' class='form-check-input' type='radio' id='63-E' required>
                                                    <label class='form-check-label opt' for='63-E'>
                                                                E.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                                <p><b class="number"></b> The numbers in each box go together by following the <i>same</i> rule. Decide what the rule is and choose the number that goes where you see the question mark.</p>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class='form-group pl-4'>
                                            <input name='answer[64][answer]' value='F' class='form-check-input' type='radio' id='64-35' required>
                                            <label class='form-check-label opt' for='64-35'>
                                                F. 4                     
                                            </label><br>
                                            <input name='answer[64][answer]' value='G' class='form-check-input' type='radio' id='64-40' required>
                                            <label class='form-check-label opt' for='64-40'>
                                                G. 6                    
                                            </label>
                                            <br>
                                            <input name='answer[64][answer]' value='H' class='form-check-input' type='radio' id='64-45' required>
                                            <label class='form-check-label opt' for='64-45'>
                                                H. 8                    
                                            </label>
                                            <br>
                                            <input name='answer[64][answer]' value='I' class='form-check-input' type='radio' id='64-50' required>
                                            <label class='form-check-label opt' for='64-50'>
                                                I. 10                   
                                            </label>
                                            <br>
                                            <input name='answer[64][answer]' value='J' class='form-check-input' type='radio' id='64-55' required>
                                            <label class='form-check-label opt' for='64-55'>
                                                J. 12                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px;">
                                               <div class="row text-center">
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">16, ?, 2</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">54, 27, 3</p>
                                                   </div>
                                                   <div class="col" style="border-style: solid; border-radius: 10px; border-color:  #043e9f; padding: 10px; margin-right: 5px">
                                                        <p style="margin: 0px">128, 64, 4</p>
                                                   </div>
                                                   
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> A cloud is always -</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[65][answer]' value='A' class='form-check-input' type='radio' id='65M' required>
                                            <label class='form-check-label opt' for='65M'>
                                                A. humid                     
                                            </label><br>
                                            <input name='answer[65][answer]' value='B' class='form-check-input' type='radio' id='65P' required>
                                            <label class='form-check-label opt' for='65P'>
                                                B. fluffy                  
                                            </label>
                                            <br>
                                            <input name='answer[65][answer]' value='C' class='form-check-input' type='radio' id='65Q' required>
                                            <label class='form-check-label opt' for='65Q'>
                                                C. white                    
                                            </label>
                                            <br>
                                            <input name='answer[65][answer]' value='D' class='form-check-input' type='radio' id='65R' required>
                                            <label class='form-check-label opt' for='65R'>
                                                D. big                   
                                            </label>
                                            <br>
                                            <input name='answer[65][answer]' value='E' class='form-check-input' type='radio' id='65S' required>
                                            <label class='form-check-label opt' for='65S'>
                                                E. high                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the box go together in a certain way. Choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 66/66-1.png" alt="" style="width: 50%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 66/66-f.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[66][answer]' value='F' class='form-check-input' type='radio' id='66-F' required>
                                                    <label class='form-check-label opt' for='66-F'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 66/66-g.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[66][answer]' value='G' class='form-check-input' type='radio' id='66-G' required>
                                                    <label class='form-check-label opt' for='66-G'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 66/66-h.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[66][answer]' value='H' class='form-check-input' type='radio' id='66-H' required>
                                                    <label class='form-check-label opt' for='66-H'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 66/66-i.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[66][answer]' value='I' class='form-check-input' type='radio' id='66-I' required>
                                                    <label class='form-check-label opt' for='66-I'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 66/66-j.png" alt="" style="width: 60px;"><br>
                                                    <input name='answer[66][answer]' value='J' class='form-check-input' type='radio' id='66-J' required>
                                                    <label class='form-check-label opt' for='66-J'>
                                                                J.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The numbers in the box go together in a certain way. Choose the word that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[67][answer]' value='A' class='form-check-input' type='radio' id='67-4' required>
                                            <label class='form-check-label opt' for='67-4'>
                                                A. zoology                     
                                            </label><br>
                                            <input name='answer[67][answer]' value='B' class='form-check-input' type='radio' id='67-5' required>
                                            <label class='form-check-label opt' for='67-5'>
                                                B. dissection                   
                                            </label>
                                            <br>
                                            <input name='answer[67][answer]' value='C' class='form-check-input' type='radio' id='67-7' required>
                                            <label class='form-check-label opt' for='67-7'>
                                                C. laboratory                    
                                            </label>
                                            <br>
                                            <input name='answer[67][answer]' value='D' class='form-check-input' type='radio' id='67-9' required>
                                            <label class='form-check-label opt' for='67-9'>
                                                D. experiment                   
                                            </label>
                                            <br>
                                            <input name='answer[67][answer]' value='E' class='form-check-input' type='radio' id='67-30' required>
                                            <label class='form-check-label opt' for='67-30'>
                                                E. science                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>triangle</p>
                                                        <p>frog</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>geometry</p>
                                                        <p>biology</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>mathematics</p>
                                                        <p>?</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> Answer the following:</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 68/68-1.png" alt="" style="width: 50px;"> is to <img src="assets/imgs/icons/question 68/68-2.png" alt="" style="width: 50px;"> as <img src="assets/imgs/icons/question 68/68-3.png" alt="" style="width: 50px;"> is to -
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 68/68-f.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[68][answer]' value='F' class='form-check-input' type='radio' id='68-f' required>
                                                    <label class='form-check-label opt' for='68-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 68/68-g.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[68][answer]' value='G' class='form-check-input' type='radio' id='68-g' required>
                                                    <label class='form-check-label opt' for='68-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 68/68-h.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[68][answer]' value='H' class='form-check-input' type='radio' id='68-h' required>
                                                    <label class='form-check-label opt' for='68-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 68/68-i.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[68][answer]' value='I' class='form-check-input' type='radio' id='68-i' required>
                                                    <label class='form-check-label opt' for='68-i'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 68/68-j.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[68][answer]' value='J' class='form-check-input' type='radio' id='68-j' required>
                                                    <label class='form-check-label opt' for='68-j'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The numbers in the box go together in a certain way. Choose the word that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class='form-group pl-4'>
                                            <input name='answer[69][answer]' value='A' class='form-check-input' type='radio' id='69-4' required>
                                            <label class='form-check-label opt' for='69-4'>
                                                A. 18                     
                                            </label><br>
                                            <input name='answer[69][answer]' value='B' class='form-check-input' type='radio' id='69-5' required>
                                            <label class='form-check-label opt' for='69-5'>
                                                B. 20                   
                                            </label>
                                            <br>
                                            <input name='answer[69][answer]' value='C' class='form-check-input' type='radio' id='69-7' required>
                                            <label class='form-check-label opt' for='69-7'>
                                                C. 24                    
                                            </label>
                                            <br>
                                            <input name='answer[69][answer]' value='D' class='form-check-input' type='radio' id='69-9' required>
                                            <label class='form-check-label opt' for='69-9'>
                                                D. 28                   
                                            </label>
                                            <br>
                                            <input name='answer[69][answer]' value='E' class='form-check-input' type='radio' id='69-30' required>
                                            <label class='form-check-label opt' for='69-30'>
                                                E. 32                    
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class='form-group pl-4'>
                                           <div class="box" style=" padding: 10px; border-style: solid; border-radius: 10px; border-color: #043e9f;">
                                               <div class="row text-center">
                                                   <div class="col">
                                                        <p>0</p>
                                                        <p>4</p>
                                                        <p>12</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>4</p>
                                                        <p>8</p>
                                                        <p>16</p>
                                                   </div>
                                                   <div class="col">
                                                        <p>12</p>
                                                        <p>16</p>
                                                        <p>?</p>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                               <p><b class="number"></b> The drawings in the first part of the row go together to form a series. In the next part of the row, choose the drawing that goes where you see the question mark.</p>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class='form-group pl-4 text-center'>
                                            <img src="assets/imgs/icons/question 70/70-1.png" alt="" style="width: 100%;"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class='form-group'>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 70/70-f.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[70][answer]' value='F' class='form-check-input' type='radio' id='70-f' required>
                                                    <label class='form-check-label opt' for='70-f'>
                                                                F.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 70/70-g.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[70][answer]' value='G' class='form-check-input' type='radio' id='70-g' required>
                                                    <label class='form-check-label opt' for='70-g'>
                                                                G.                    
                                                            </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 70/70-h.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[70][answer]' value='H' class='form-check-input' type='radio' id='70-h' required>
                                                    <label class='form-check-label opt' for='70-h'>
                                                                H.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 70/70-i.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[70][answer]' value='I' class='form-check-input' type='radio' id='70-i' required>
                                                    <label class='form-check-label opt' for='70-i'>
                                                                I.                    
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <img src="assets/imgs/icons/question 70/70-j.png" alt="" style="width: 50px;"><br>
                                                    <input name='answer[70][answer]' value='J' class='form-check-input' type='radio' id='70-j' required>
                                                    <label class='form-check-label opt' for='70-j'>
                                                                J.                    
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p><b class="number"></b> What number divided by three is equal to ten plus two?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[71][answer]' value='A' class='form-check-input' type='radio' id='71M' required>
                                            <label class='form-check-label opt' for='71M'>
                                                A. 12                     
                                            </label><br>
                                            <input name='answer[71][answer]' value='B' class='form-check-input' type='radio' id='71P' required>
                                            <label class='form-check-label opt' for='71P'>
                                                B. 13                  
                                            </label>
                                            <br>
                                            <input name='answer[71][answer]' value='C' class='form-check-input' type='radio' id='71Q' required>
                                            <label class='form-check-label opt' for='71Q'>
                                                C. 24                    
                                            </label>
                                            <br>
                                            <input name='answer[71][answer]' value='D' class='form-check-input' type='radio' id='71R' required>
                                            <label class='form-check-label opt' for='71R'>
                                                D. 30                   
                                            </label>
                                            <br>
                                            <input name='answer[71][answer]' value='E' class='form-check-input' type='radio' id='71S' required>
                                            <label class='form-check-label opt' for='71S'>
                                                E. 36                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question" data-aos="fade-right" data-aos-offset="300" data-aos-duration="500">
                            <p style="margin-bottom: 0px;"><b class="number"></b> Choose the words that <i>best</i> complete this sentence:</p>
                            <p style="margin-left: 25px;">Although Jamie's grade were ___________, her parents were____________</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class='form-group pl-4'>
                                            <input name='answer[72][answer]' value='F' class='form-check-input' type='radio' id='72M' required>
                                            <label class='form-check-label opt' for='72M'>
                                                F. excellent - delighted                     
                                            </label><br>
                                            <input name='answer[72][answer]' value='G' class='form-check-input' type='radio' id='72P' required>
                                            <label class='form-check-label opt' for='72P'>
                                                G. terrible - furious                 
                                            </label>
                                            <br>
                                            <input name='answer[72][answer]' value='H' class='form-check-input' type='radio' id='72Q' required>
                                            <label class='form-check-label opt' for='72Q'>
                                                H. poor - dissatisfied                    
                                            </label>
                                            <br>
                                            <input name='answer[72][answer]' value='I' class='form-check-input' type='radio' id='72R' required>
                                            <label class='form-check-label opt' for='72R'>
                                                I. acceptable - dissappointed                   
                                            </label>
                                            <br>
                                            <input name='answer[72][answer]' value='J' class='form-check-input' type='radio' id='72S' required>
                                            <label class='form-check-label opt' for='72S'>
                                                J. superior - interested                    
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <center>
                                <input class='btn btn-lg mt-5' type='submit' value='SUBMIT' name='pass' id='pass' data-aos="fade" data-aos-offset="100" data-aos-duration="500">
                            </center>
                    <input type="hidden" name="answer[73][answer]" value="">
                     </form>
                   </div>
                        
                </div>
            </div>
            <div class="row bg-light mt-4 mb-5 result" style='display: none'> 
                <h3 class="text-center text-uppercase">Admission Test Results</h3>
                <div id="results">
                        
                </div>
            </div>
    </div>
</body>
<script src="../assets/js/aos.js"></script>
<script>
    AOS.init();

    $(window).on('beforeunload',function(){
        return 'REFRESHING or LEAVING the admission test will not save your answers';
    });
     $(window).on('focus', function() {
        var appID = $('#appID').attr('data-id');
        $.ajax({
        url: 'queries/leaveAttempt.php',
        method: 'POST',
        data: {appID:appID},
        success:function(data){
            $('#leave').html(data);
        }
        })
    });
</script>
</html>