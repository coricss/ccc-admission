<?php 

include_once("../../connect.php");
$con=connect();

if(isset($_POST['id'], $_POST['examid'], $_POST['question'], $_POST['opt1'], $_POST['opt2'], $_POST['opt3'], $_POST['opt4'], $_POST['answer'])){
    //SQL ESCAPE TO ALLOW QUOTATIONS AND OTHER SYMBOLS
    $id=mysqli_real_escape_string($con, $_POST['id']);
	$examid=mysqli_real_escape_string($con, $_POST['examid']);
	$question=mysqli_real_escape_string($con, $_POST['question']);
	$opt1=mysqli_real_escape_string($con, $_POST['opt1']);
	$opt2=mysqli_real_escape_string($con, $_POST['opt2']);
	$opt3=mysqli_real_escape_string($con, $_POST['opt3']);
	$opt4=mysqli_real_escape_string($con, $_POST['opt4']);
	$answer=mysqli_real_escape_string($con, $_POST['answer']);

    $update=$con->query("UPDATE `test_questions` SET `question`='$question', `opt1`='$opt1', `opt2`='$opt2', `opt3`='$opt3', `opt4`='$opt4', `correct_answer`='$answer' WHERE `question_id`=$id AND `exam_id`=$examid ");
}
?>