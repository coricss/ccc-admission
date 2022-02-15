<?php
    if(!isset($_SESSION)){
		session_start();
	}
  include_once("../../connect.php");
  $con=connect();
    extract($_POST);

    $appID=$_SESSION['appID'];
    $name=$_SESSION['f_name'];

    $select=$con->query("SELECT * FROM `student_answers`");
    date_default_timezone_set('Asia/Manila');
    $time=date("h:i A");

                $answer=$_POST['answer'];
                foreach($answer as $key => $value) {
                $studentAnswer=mysqli_real_escape_string($con, $value['answer']);
                $sql=$con->query("INSERT INTO `student_answers`(`application_no`, `question_id`, `stud_answer`) VALUES ('$appID','$key','$studentAnswer')");  
                }
                // $res=array("res" => "success");
                echo "
                <script>
                if($('#autoSubmit').val()=='submit'){
                    $(window).unbind('focus');
                    var appID = $('#appID').attr('data-id');
                    var studname = $('#studentName').attr('data-id');
                    var email =  $('#studentName').attr('email-id');
                    $.ajax({
                      url: 'queries/results.php',
                      method: 'post',
                      data: {appID:appID, studname:studname, email:email},
                      success:function(data){
                        $('.result').show();
                        $(window).unbind('beforeunload');
                        $('#results').html(data);
                      }
                    });
                    Swal.fire({
                      icon: 'error',
                      title: 'Time&#39;s Up!',
                      text: 'Sorry, you ran out of time',
                      confirmButtonColor: '#043e9f',
                      confirmButtonText: 'View result',
                      allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                          popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                          popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                      }
                    }).then((result)=>{
                      if(result.isConfirmed){
                        $('.test').hide();
                        $('.examset').hide();
                      }
                    })
                }else if($('#autoSubmit').val()==''){
                    $('.countdown').html('Finished');
                    clearInterval(countdownTimer);
                    $(window).unbind('beforeunload');
                    var appID = $('#appID').attr('data-id');
                    var studname = $('#studentName').attr('data-id');
                    var email =  $('#studentName').attr('email-id');
                    $.ajax({
                      url: 'queries/results.php',
                      method: 'post',
                      data: {appID:appID, studname:studname, email:email},
                      success:function(data){
                        $('#results').html(data);
                      }
                    });
                      Swal.fire({
                        title: 'Thank you for answering the Admission Test',
                        text: 'Your answers are successfully submitted!',
                        icon: 'success',
                        width: 600,
                        allowOutsideClick: false,
                        confirmButtonColor: '#043e9f',
                        confirmButtonText: 'View result',
                        allowOutsideClick: () => {
                          const popup = Swal.getPopup()
                          popup.classList.remove('swal2-show')
                          setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                          })
                          setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                          }, 500)
                          return false
                        }
                      }).then((result) => {
                        if(result.isConfirmed){
                            $('.test').hide();
                            $('.result').show();
                        }
                      })
                }else if($('#autoSubmit').val()=='leave'){
                    $(window).unbind('focus');
                    clearInterval(countdownTimer);
                    $('.countdown').html('00:00:00');
                    var appID = $('#appID').attr('data-id');
                    var studname = $('#studentName').attr('data-id');
                    var email =  $('#studentName').attr('email-id');
                    $.ajax({
                      url: 'queries/results.php',
                      method: 'post',
                      data: {appID:appID, studname:studname, email:email},
                      success:function(data){
                        $(window).unbind('beforeunload');
                        $('#results').html(data);
                      }
                    });
                    Swal.fire({
                        title: 'Sorry, your attempts to leave the Admission Test exceeded 3 times ',
                        html: 'Your answer have been submitted',
                        icon: 'error',
                        width: 600,
                        confirmButtonText: 'View result',
                        confirmButtonColor: '#043e9f',
                        allowOutsideClick: () => {
                            const popup = Swal.getPopup()
                            popup.classList.remove('swal2-show')
                            setTimeout(() => {
                                popup.classList.add('animate__animated', 'animate__headShake')
                            })
                            setTimeout(() => {
                                popup.classList.remove('animate__animated', 'animate__headShake')
                            }, 500)
                            return false
                            }
                        }).then((result)=>{
                        if(result.isConfirmed){
                            clearInterval(countdownTimer);
                            $('.countdown').html('00:00:00');
                            $('.test').hide();
                            $('.examset').hide();
                            $('.result').show();
                        }
                    })
                }
                    
                </script>
                ";
            

            $updatelog=$con->query("UPDATE `student_exam_log` SET `time_ended`='$time' WHERE `application_no`='$appID'");
?>