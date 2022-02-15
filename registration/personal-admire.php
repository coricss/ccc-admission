<div class="container">
            <div class=progresstep>
                <ul class="steps">
                    <li class="steps done" data-step="1">
                        Personal Information
                    </li>
                    <li class="steps done" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps done" data-step="2">
                        Educational Background
                    </li>
                    <li class="steps done" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps done" data-step="3">
                        Organizational Involvement
                    </li>
                    <li class="steps done" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps done" data-step="4">
                        Family Background
                    </li>
                    <li class="steps done" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps is-active" data-step="5">
                        Personal Admiration
                    </li>
                    <li class="steps active" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps" data-step="6">
                        Requirements
                    </li>
                </ul>
            </div>
<form action="" method="post" id="personaladmiration" enctype="multipart/form-data">
    <div class="col-lg bg-light p-5" style="border-radius: 10px">
            <div class="form-title">
                    <h4><i class="bx bxs-user"></i>&nbsp;Personal Admiration</h4>
            </div>
            <div class="Note alert-danger p-2" id="personalAD" style="margin-top: -35px; margin-bottom: 30px; border-radius: 5px; display: none">
               <small><b>&nbsp;&nbsp;<i class='bx bxs-error bx-flashing'></i></b> Please fill up this part to provide basis for verification and upcoming interview.</small>
            </div>
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-md-12 col-sm-12">
                        <label for="hobbies"><b>Hobbies and Interests:<i class="req">*</i></b></label> <br>
                        <textarea name="hobbies" id="hobbies" placeholder="List down your hobbies & interests?" class="form-control forms" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="reason4enroll"><b>Reasons for enrolling:<i class="req">*</i></b></label> <br>
                        <textarea name="reason4enroll" id="reason4enroll" placeholder="What are your reasons for enrolling City College of Calamba?" class="form-control forms" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="characteristics"><b>Describe yourself:<i class="req">*</i></b></label> <br>
                        <textarea name="characteristics" id="characteristics" placeholder="Physical & Inner Characteristics" class="form-control forms" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="dream"><b>Envision yourself 10 years from now:<i class="req">*</i></b></label> <br>
                        <textarea name="dream" id="dream" placeholder="What are your dreams and goals" class="form-control forms" required></textarea>
                    </div>
                </div>
                <div class="row mt-5">
                    <center>
                        <button type="button" name=prev id=prvpa class="btn btn-outline-warning prev" style="float: left">
                            <b><i class="bx bxs-left-arrow" style="font-size: 13px;"></i> BACK</b>
                        </button>
                        <button type="button" id=nxtpa name=next class="btn btn-outline-warning next" style="float: right">
                            <b>NEXT <i class="bx bxs-right-arrow" style="font-size: 13px;"></i></b>
                        </button>
                    </center>  
                </div> 
            </div>
    </div>
</div>   
<div style="margin-bottom:3rem;"></div>
</form>