<form action="" method="post" id="familybg" enctype="multipart/form-data">
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
                    <li class="steps is-active" data-step="4">
                        Family Background
                    </li>
                    <li class="steps active" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps" data-step="5">
                        Personal Admiration
                    </li>
                    <li class="steps" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps" data-step="6">
                        Requirements
                    </li>
                </ul>
            </div>   
    <div class="col-lg bg-light p-5" style="border-radius: 10px">
        <div class="form-title">
                <h4><i class="bx bxs-home"></i>&nbsp;Family Background</h4>
        </div>
        <div class="Note alert-danger p-2" id="familyBG" style="margin-top: -35px; margin-bottom: 30px; border-radius: 5px; display: none">
            <small><i class='bx bxs-error bx-flashing'></i></b> Please provide the requested information below. Those fields with <i class="req">*</i> are required.</small>
        </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-sm-8">
                        <label for="father_name"><b>Father:<i class="req">*</i></b></label>
                        <input type="text" name="father_name" id=father_name placeholder="Full name" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="father_citizen">Citizenship:<i class="req">*</i></label>
                        <input type="text" name="father_citizen" id=father_citizen placeholder="Citizenship" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="father_add">Present Address:<i class="req">*</i></label>
                        <input type="text" name="father_add" id=father_add placeholder="Present Address" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="father_contact">Contact No:<i class="req">*</i></label>
                        <input type="tel" name="father_contact" id=father_contact pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11"  placeholder="09XXxxxxxxx" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="father_email">Email:<i class="req">*</i></label>
                        <input type="email" name="father_email" min=0 id=father_email placeholder="Email" class="form-control"required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                    <label for="father_work">Occupation:<i class="req">*</i></label>
                        <select class="form-select" name="father_work" id="father_work" required>
                            <option value="">Occupation</option>
                            <option value="Government Employee" class="others">Government Employee</option>
                            <option value="Private Employee" class="others">Private Employee</option>
                            <option value="Self-Employed" class="others">Self-Employed</option>
                            <option value="Unemployed" class="others">Unemployed</option>
                            <option value="Deceased" class="others">Deceased</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <label for="father_emp">Employer's Name:</label>
                        <input type="text" name="father_emp" id=father_emp placeholder="Name of Employer" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="father_emp_add">Employer's Address:</label>
                        <input type="text" name="father_emp_add"  id=father_emp_add placeholder="Employer's Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="father_emp_no">Employer's Phone:</label>
                        <input type="tel" name="father_emp_no" id=father_emp_no pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" placeholder="09XXxxxxxxx" maxlength="11" minlength="11" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                    <label for="father_educ">Education:<i class="req">*</i></label>
                        <select class="form-select" name="father_educ" id="father_educ" required>
                            <option value="">Highest Educational Attainment</option>
                            <option value="Elementary Undergraduate" class="others">Elementary Undergraduate</option>
                            <option value="Elementary Graduate" class="others">Elementary Graduate</option>
                            <option value="High School Undergraduate" class="others">High School Undergraduate</option>
                            <option value="High School Graduate" class="others">High School Graduate</option>
                            <option value="College Undergraduate" class="others">College Undergraduate</option>
                            <option value="College Graduate" class="others">College Graduate</option>
                            <option value="Masteral" class="others">Masteral</option>
                            <option value="Post Graduate Studies" class="others">Post Graduate Studies</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                <hr>
                    <div class="col-md-3 col-sm-8">
                        <label for="mother_name"><b>Mother:<i class="req">*</i></b></label>
                        <input type="text" name="mother_name" id=mother_name placeholder="Full name" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="mother_citizen">Citizenship:<i class="req">*</i></label>
                        <input type="text" name="mother_citizen" id=mother_citizen placeholder="Citizenship" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="mother_add">Present Address:<i class="req">*</i></label>
                        <input type="text" name="mother_add" id=mother_add placeholder="Present Address" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_contact">Contact No:<i class="req">*</i></label>
                        <input type="tel" name="mother_contact" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=mother_contact placeholder="09XXxxxxxxx" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_email">Email:<i class="req">*</i></label>
                        <input type="email" name="mother_email" min=0 id=mother_email placeholder="Email" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_work">Occupation:<i class="req">*</i></label>
                        <select class="form-select" name="mother_work" id="mother_work" required>
                            <option value="">Occupation</option>
                            <option value="Government Employee" class="others">Government Employee</option>
                            <option value="Private Employee" class="others">Private Employee</option>
                            <option value="Self-Employed" class="others">Self-Employed</option>
                            <option value="Unemployed" class="others">Unemployed</option>
                            <option value="Deceased" class="others">Deceased</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <label for="mother_emp">Employer's Name:</label>
                        <input type="text" name="mother_emp" id=mother_emp placeholder="Name of Employer" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="mother_emp_add">Employer's Address:</label>
                        <input type="text" name="mother_emp_add" id=mother_emp_add placeholder="Employer's Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_emp_no">Employer's Phone:</label>
                        <input type="tel" name="mother_emp_no" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" id=mother_emp_no maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="mother_educ">Education:<i class="req">*</i></label>
                        <select class="form-select" name="mother_educ" id="mother_educ" required>
                            <option value="">Highest Educational Attainment</option>
                            <option value="Elementary Undergraduate" class="others">Elementary Undergraduate</option>
                            <option value="Elementary Graduate" class="others">Elementary Graduate</option>
                            <option value="High School Undergraduate" class="others">High School Undergraduate</option>
                            <option value="High School Graduate" class="others">High School Graduate</option>
                            <option value="College Undergraduate" class="others">College Undergraduate</option>
                            <option value="College Graduate" class="others">College Graduate</option>
                            <option value="Masteral" class="others">Masteral</option>
                            <option value="Post Graduate Studies" class="others">Post Graduate Studies</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                <hr>
                    <div class="col-md-3 col-sm-6">
                        <label for="guardian_name"><b>Guardian:</b></label>
                        <input type="text" name="guardian_name" id=guardian_name placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_relation">Relationship:</label>
                        <input type="text" name="guardian_relation" id=guardian_relation placeholder="Relationship" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-8">
                        <label for="guardian_add">Address:</label>
                        <input type="text" name="guardian_add" id=guardian_add placeholder="Present Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="guardian_contact">Contact No:</label>
                        <input type="tel" name="guardian_contact" id=guardian_contact pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_email">Email:</label>
                        <input type="email" name="guardian_email" min=0 id=guardian_email placeholder="Email" class="form-control">
                    </div>
               
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_bday">Date of Birth:</label>
                        <input type="hidden" name="guardian_bday" value="">
                        <input type="date" name="guardian_bday" id="guardian_bday" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="guardian_work">Occupation:</label>
                        <select class="form-select" name="guardian_work" id="guardian_work" req>
                            <option value="">Occupation</option>
                            <option value="Government Employee" class="others">Government Employee</option>
                            <option value="Private Employee" class="others">Private Employee</option>
                            <option value="Self-Employed" class="others">Self-Employed</option>
                            <option value="Unemployed" class="others">Unemployed</option>
                            <option value="Deceased" class="others">Deceased</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <label for="guardian_emp">Employer's Name:</label>
                        <input type="text" name="guardian_emp" id=guardian_emp placeholder="Name of Employer" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-8">
                        <label for="guardian_emp_add">Employer's Address:</label>
                        <input type="text" name="guardian_emp_add" id=guardian_emp_add placeholder="Employer's Address" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="guardian_emp_no">Employer's No:</label>
                        <input type="tel" name="guardian_emp_no" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onkeypress="return onlyNumberKey(event)" id=guardian_emp_no placeholder="09XXxxxxxxx"  maxlength="11" minlength="11" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                <hr>
                    <div class="col-md-3 col-sm-6">
                        <label for="sibling1">Siblings:</label>
                        <input type="text" name="sibling1" id=sibling1 placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="sibling_age1">Age:</label>
                        <input type="number" name="sibling_age1" max=40 min="0" id=sibling_age1 placeholder="Age" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_status1">Status:</label>
                        <select class="form-select" name="sibling_status1" id="sibling_status1" req>
                        <option value="" >Civil Status</option>
                        <option value="Single" class="others">Single</option>
                        <option value="Married" class="others">Married</option>
                        <option value="Widowed" class="others">Widowed</option>
                        <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="sibling_contact1">Contact No:</label>
                        <input type="tel" name="sibling_contact1" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact1 placeholder="09XXxxxxxxx" class="form-control">
                    </div> 
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling2">Siblings:</label>
                        <input type="text" name="sibling2" id=sibling2 placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_age2">Age:</label>
                        <input type="number" name="sibling_age2" max=40 min="0" id=sibling_age2 placeholder="Age" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_status2">Status:</label>
                        <select class="form-select" name="sibling_status2" id="sibling_status2" req>
                            <option value="">Civil Status</option>
                            <option value="Single" class="others">Single</option>
                            <option value="Married" class="others">Married</option>
                            <option value="Widowed" class="others">Widowed</option>
                            <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_contact2">Contact No:</label>
                        <input type="tel" name="sibling_contact2" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact2 placeholder="09XXxxxxxxx" class="form-control">
                    </div> 
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling3">Siblings:</label>
                        <input type="text" name="sibling3" id=sibling3 placeholder="Full name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_age3">Age:</label>
                        <input type="number" name="sibling_age3" max=40 min="0" id=sibling_age3 placeholder="Age" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_status3">Status:</label>
                        <select class="form-select" name="sibling_status3" id="sibling_status3" req>
                            <option value="">Civil Status</option>
                            <option value="Single" class="others">Single</option>
                            <option value="Married" class="others">Married</option>
                            <option value="Widowed" class="others">Widowed</option>
                            <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <label for="sibling_contact3">Contact No:</label>
                        <input type="tel" name="sibling_contact3" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id=sibling_contact3  placeholder="09XXxxxxxxx" class="form-control">
                    </div> 
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-12">
                    <center>
                        <label for="income">Socio Economic Status of Family:<i class="req">*</i></label>
                            <select class="form-select" name="income" id="income" style="max-width: 50%;" required>
                                <option value="">Monthly Income of Family</option>
                                <option value="Below P10, 481" class="others">Below P10, 481</option>
                                <option value="P10, 481.00-P20, 962.00" class="others">P10, 481.00-P20, 962.00</option>
                                <option value="P41, 924.00-P73, 367.00" class="others">P41, 924.00-P73, 367.00</option>
                                <option value="P73, 367.00-P125, 772.00" class="others">P73, 367.00-P125, 772.00</option>
                                <option value="P125,772.00-P209,620.00" class="others">P125, 772.00-P209, 620.00</option>
                                <option value="P209, 620.00 and above" class="others">P209, 620.00 and above</option>
                            </select>
                        </center>
                    </div>
                    <div class="row mt-5">
                        <center>
                            <button type="button" name=prev id=prvfam class="btn btn-outline-warning prev" style="float: left">
                                <b><i class="bx bxs-left-arrow" style="font-size: 13px;"></i> BACK</b>
                            </button>
                            <button type="button" id=nxtfam name=next class="btn btn-outline-warning next" style="float: right">
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