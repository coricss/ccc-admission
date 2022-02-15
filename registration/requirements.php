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
                    <li class="steps done" data-step="5">
                        Personal Admiration
                    </li>
                    <li class="steps done" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps is-active" data-step="6">
                        Requirements
                    </li>
                </ul>
            </div>
<form action="" method="post" id="requirements" enctype="multipart/form-data">
        <div class="col-lg bg-light p-5" style="border-radius: 10px">
            <div class="form-title">
                    <h4><i class="bx bxs-copy-alt"></i>&nbsp;Requirements</h4>
            </div>
            <div class="Note alert-warning p-2" style="margin-top: -35px; margin-bottom: 30px; border-radius: 5px">
               <small><b>&nbsp;&nbsp;<i class='bx bxs-info-circle bx-burst'></i></b> In this section, the requirements must be in <b>PDF</b>, <b>JPG</b> or <b>PNG</b> file format and file size is less than <b>5MB</b>.</small>
            </div>
            <div class="form-group">
                <div id="card">
                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="g11cardfile"><b>Grade 11 Report Card:</b><i class="req">*</i></label>
                            <input type="file" name="g11card" id="g11cardfile" class="inputfile form-control" accept=".pdf, .png, .jpg">
                            <small class="text-danger" id="g11error"></small>
                        </div>
                       
                        <div class="col-md-6 col-sm-12">
                            <label for="g12cardfile"><b>Grade 12 Report Card:</b><i class="req">*</i></label>
                            <input type="file" name="g12card" id="g12cardfile" class="inputfile form-control" accept=".pdf, .png, .jpg">
                            <small class="text-danger" id="g12error"></small>
                        </div>   
                    </div> 
                </div>
                
                <div id="tor" style="display: none">
                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="torpg1"><b>Transcript of Records (Page 1):</b><i class="req">*</i></label>
                            <input type="file" name="torpg1" id="torpg1" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                            <small class="text-danger" id="torpg1error"></small>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="torpg2"><b>Transcript of Records (Page 2):</b><i class="req">*</i></label>
                            <input type="file" name="torpg2" id="torpg2" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                            <small class="text-danger" id="torpg2error"></small>
                        </div>
                    </div>
                </div>

                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="goodmoral"><b>Good Moral Certification:</b><i class="req">*</i></label><br>
                            <input type="file" name="goodmoral" id="goodmoral" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                            <small class="text-danger" id="goodmoralerror"></small>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="birthcert"><b>Birth Certificate:</b><i class="req">*</i></label><br>
                            <input type="file" name="birthcert" id="birthcert" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                            <small class="text-danger" id="birthcerterror"></small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="indigency"><b>Certificate of Residency:</b><i class="req">*</i></label><br>
                            <input type="file" name="indigency" id="indigency" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                            <small class="text-danger" id="indigencyerror"></small>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="votecert"><b>Voter's Certification of Parent/Guardian:</b><i class="req">*</i></label><br>
                            <input type="file" name="votercert" id="votecert" class="inputfile form-control" accept=".pdf, .png, .jpg" required>
                            <small class="text-danger" id="votecerterror"></small>
                        </div>
                    </div>
                    <div class="text-center row mb-3">
                        <div class=" col-md-12 col-sm-12 mb-3">
                            <label for="vaxcard"><b>Copy of Vaccination Card:</b></label><br>
                            <input type="file" name="vaxcard" id="vaxcard" class="inputfile form-control" accept=".pdf, .png, .jpg">
                            <small class="text-danger" id="vaxcarderror"></small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <center>
                        <div class="col-md-11 col-sm-12 mb-3" style="text-align: justify; text-indent: 50px">
                            <p>I, certify that the information contained herein is <b>true and correct</b>. I understand that any wrong information,
                            deliberately entered or not, may jeopardize my admission to the City College of Calamba. Furthermore, I authorized the
                            Office of the Registrar of the City College of Calamba, as well as the other offices within the said institution to obtain and
                            reléase information (written or verbal) regarding my Personal Data which are stated below:</p>
                            <p>Full Name (Including Middle Name), Address, Contact Number, Email Address, Date of Birth, Place of Birth, Grade
                            and GWA, Course and Major taken, Previous School Attended, Date of Graduation, Special Order No., NSTP Serial
                            Number, Official Picture, and other Enrollment Data. The display and reléase of the abovementioned data for
                            employment/student verification, request of batch directory, posting for academic and non-academic achievements, and
                            other legal purposes are premissible.</p>       
                        </div>
                        <input type="checkbox" name="agree" id="agree" class="agree form-check-input" required>
                            <small for="agree">Check here to indicate that you have read and agree to the terms stated above.</small>
                        </center>
                        <div class="row mt-3">
                            <center>
                                <button type="button" name=prev id=prvreq class="btn btn-outline-warning prev" style="float: left">
                                    <b><i class="bx bxs-left-arrow" style="font-size: 13px;"></i> BACK</b>
                                </button>
                                <button type="button" name=nxt id=nxtreq class="btn btn-outline-warning submit" style="float: right">
                                    <b>NEXT <i class="bx bxs-right-arrow" style="font-size: 13px;"></i></b>
                                </button>     
                            </center>  
                        </div> 
                    </div>
            </div>
        </div> 
    </div>    
<div style="margin-bottom:3rem;"></div>
</form>