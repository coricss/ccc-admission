<?php 
    
if(!isset($_SESSION)){
    session_start();
}

include_once("../../connect.php");
$con=connect();
extract($_POST);

$sql = "SELECT * FROM `programs` WHERE `program_id`=$id";
$stud=$con->query($sql) or die ($con->error);
$row=$stud->fetch_array();

echo '

<form method="POST" id="editprogramForm" class="form control" enctype="multipart/form-data" autocomplete="on">
  <div class="form-group">
      <div class="form-row">
            <div class="row mt-5">
              <div class="col-md-6 col-sm-12">
                  <label for="programName2" class="required">Program Name:<i class="req">*</i></label>
                  <input type="hidden" value="'.$row['program_id'].'" name="program_id">
                  <input type="text" name="programName" value="'.$row['program_name'].'" id=programName2 placeholder="Program name" class="form-control" required>
                  <div class="text-danger" id="programNameFeedback">
                      <!-- <small>Programname already exists</small> -->
                  </div>
              </div>
              <div class="col-md-6 col-sm-12">
                  <label for="abbr2" class="required">Abbreviation:<i class="req">*</i></label>
                  <input type="text" name="abbr" value="'.$row['abbreviation'].'" id=abbr2 placeholder="Abbreviation" class="form-control" required>
              </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 col-sm-12">
                    <label for="required_gwa2" class="required">Required GWA:<i class="req">*</i></label>
                    <input type="number" name="required_gwa" value="'.$row['required_gwa'].'" id="required_gwa2" placeholder="Required Average" class="form-control" max="100" min="1" required>
                </div>
                <div class="col-md-6 col-sm-12">
                  <label for="max_no2" class="required">Maximum Number of Students:<i class="req">*</i></label>
                  <input type="number" name="max_no" value="'.$row['max_no'].'" id=max_no2 placeholder="Max no. of Students" class="form-control" min="1" required>
                </div>
            </div>
            <div class="row mt-5">
              <div class="text-center">
                  <button type="button" id="btn-updateProgram" name="btn-updateProgram" class="btn btn-primary mt-2">Update Program</button>
                  <button type="reset" class="btn btn-danger mt-2">Reset</button>
              </div>
            </div>
      </div>
  </div>
</form>
';


?>

<script>

(function () {
  'use strict'
    var form1 = document.querySelectorAll('#editprogramForm')

    Array.prototype.slice.call(form1)
    .forEach(function (form) {
      $('#btn-updateProgram').click(function(event){
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }else{
          $('#btn-updateProgram').prop("type", "submit");
        }
        form.classList.add('was-validated')
      })
    })
})()
</script>