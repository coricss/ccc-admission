<form action="" method="post" id="personaldata" enctype="multipart/form-data">
        <div class="container">
            <h1 id=applicationform style="font-weight: 700"><i class="bx bxs-file mb-4"></i>&nbsp;Student's Application Form</h1>
            <div class=progresstep>
                <ul class="steps">
                    <li class="steps is-active" data-step="1">
                        Personal Information
                    </li>
                    <li class="steps active" data-step="1">
                        <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps" data-step="2">
                        Educational Background
                    </li>
                    <li class="steps" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps" data-step="3">
                        Organizational Involvement
                    </li>
                    <li class="steps" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps" data-step="4">
                        Family Background
                    </li>
                    <li class="steps" data-step="1">
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
                    <h4><i class="bx bxs-user-detail"></i>&nbsp;Personal Information</h4>
                </div>
                <div class="Note alert-danger p-2" id="personalNote" style="margin-top: -35px; margin-bottom: 30px; border-radius: 5px; display: none">
                    <small><b><i class='bx bxs-error bx-flashing'></i></b> Please provide the requested information below. Those fields with <i class="req">*</i> are required.</small>
                </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group img-profile text-center col-12" style="position: relative;">
                        <span class="img-div">
                            <div class="text-center img-placeholder" onClick="triggerClick()">
                                <h4>Click to upload your photo</h4>
                            </div>
                            <img src="assets/imgs/attach.png" width="2in" alt="" onClick="triggerClick()" id="profileDisplay">
                        </span>
                            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" accept="image/*">
                            <small>(Photo in White Background)</small>
                    </div>
                </div> <br><br>
                
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="fname" class="required">First Name:<i class="req">*</i></label>
                        <input type="text" name="fname" id=fname placeholder="Given name" class="form-control" required>
                        <div class="text-danger" id="feedbackName">
                           
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="mname">Middle Name:</label>
                        <input type="text" name="mname" id=mname placeholder="Middle name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="lname">Last Name:<i class="req">*</i></label>
                        <input type="text" name="lname" id=lname placeholder="Surname" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <label for="suffixx">Suffix:</label>
                        <select class="form-select" name="suffixx" id="suffixx">
                            <option value="">(e.g. Jr.)</option>
                            <option value="Sr." class="others">Sr.</option>
                            <option value="Jr." class="others">Jr.</option>
                            <option value="I" class="others">I</option>
                            <option value="II" class="others">II</option>
                            <option value="III" class="others">III</option>
                            <option value="IV" class="others">IV</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-3">
                        <label for="age">Age:<i class="req">*</i></label>
                        <!-- <select class="form-control" name="age" id="age"  required>
                            <option value="18" class="others">18</option>
                            <option value="19" class="others">19</option>
                            <option value="20" class="others">20</option>
                            <option value="21" class="others">21</option>
                            <option value="22" class="others">22</option>
                            <option value="23" class="others">23</option>
                            <option value="24" class="others">24</option>
                            <option value="25" class="others">25</option>
                        </select> -->
                        <input type="text" class="form-control" name="age" placeholder="Age" id="age" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                        <label for="birthplace">Place of Birth:<i class="req">*</i></label>
                        <input type="text" name="birthplace" id=birthplace placeholder="Birthplace" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="bday">Date of Birth:<i class="req">*</i></label>
                        <input type="date" name="bday" id=bday class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label for="religion">Religion:<i class="req">*</i></label>
                        <input type="text" name="religion" id=religion placeholder="Religion" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <label for="gender">Gender:<i class="req">*</i></label>
                        <select class="form-select" name="gender" id="gender"  required>
                            <option value="" disabled selected>Gender</option>
                            <option value="Male" class="others">Male</option>
                            <option value="Female" class="others">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <label for="status">Status:<i class="req">*</i></label>
                        <select class="form-select" name="status" id="status" onchange="married()"  required>
                            <option value="" disabled selected>Civil Status</option>
                            <option value="Single" class="others">Single</option>
                            <option value="Married" class="others">Married</option>
                            <option value="Widowed" class="others">Widowed</option>
                            <option value="Seperated" class="others">Seperated</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="admit">Classification:<i class="req">*</i></label>
                        <select class="form-select" name="admit" id="admit" onchange="javascript:classify()"  required >
                            <option value="" disabled selected>Admit Type</option>
                            <option value="Freshman" class="others">New Student</option>
                            <option value="Transferee" class="others">Transferee</option>
                        </select>  
                    </div>
                </div>

                <div id=married style="display: none">
                    <div class="row mb-3">
                        <div class="col-md-3 col-sm-6">
                            <label for="spouse">Spouse:<i class="req">*</i></label>
                            <input type="text" name="spouse_name" id=spouse_name placeholder="Full Name" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="spouse">Address:<i class="req">*</i></label>
                            <input type="text" name="spouse_add" id=spouse_add placeholder="Address" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="spouse">Contact No:<i class="req">*</i></label>
                            <input type="tel" name="spouse_contact" id="spouse_phone" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" placeholder="09XXxxxxxxx" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="spouse">Occupation:<i class="req">*</i></label>
                            <input type="text" name="spouse_work" id=spouse_work placeholder="Occupation" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="spouse">Employer's Name:<i class="req">*</i></label>
                            <input type="text" name="spouse_emp" id=spouse_emp placeholder="Employer" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="email">Email Address:<i class="req">*</i></label>
                        <input type="email" name="email" id=email placeholder="example@domain.com" class="form-control" required>
                        <div class="text-danger" id="feedbackEmail">
                           
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="stud_phone">Mobile No:<i class="req">*</i></label>
                        <input type="tel" name="phone" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" onpaste="return false;" onkeypress="return onlyNumberKey(event)" maxlength="11" minlength="11" id="stud_phone" placeholder="09XXxxxxxxx" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="1stprio">1st Priority Program:<i class="req">*</i></label>
                        <select class="form-select" name="1stprio" id="1stprio"  required>
                            <option value="" disabled selected>(e.g. BSIT)</option>
                            <option value="BSCS" class="others">Bachelor of Science in Computer Science</option>
                            <option value="BSIT" class="others">Bachelor of Science in Information Technology</option>
                            <option value="BSA" class="others">Bachelor of Science in Accountancy</option>
                            <option value="BSAIS" class="others">Bachelor of Science in Accounting Information System</option>
                            <option value="BEED" class="others">Bachelor of Elementary Education</option>
                            <option value="BSEE" class="others">Bachelor of Secondary Education Major in English Language Education</option>
                            <option value="BSEM" class="others">Bachelor of Secondary Education Major in Mathematics Education</option>
                            <option value="BSES" class="others">Bachelor of Secondary Education Major in Science Education</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="2ndprio">2nd Priority Program:<i class="req">*</i></label> <br>
                        <select class="form-select" name="2ndprio" id="2ndprio"  required>
                            <option value="" disabled selected>(e.g. BSIT)</option>
                            <option value="BSCS" class="others">Bachelor of Science in Computer Science</option>
                            <option value="BSIT" class="others">Bachelor of Science in Information Technology</option>
                            <option value="BSA" class="others">Bachelor of Science in Accountancy</option>
                            <option value="BSAIS" class="others">Bachelor of Science in Accounting Information System</option>
                            <option value="BEED" class="others">Bachelor of Elementary Education</option>
                            <option value="BSEE" class="others">Bachelor of Secondary Education Major in English Language Education</option>
                            <option value="BSEM" class="others">Bachelor of Secondary Education Major in Mathematics Education</option>
                            <option value="BSES" class="others">Bachelor of Secondary Education Major in Science Education</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-2 col-sm-6">
                        <label for="calambares">Calamba Resident:<i class="req">*</i></label><br>
                        <select class="form-select" name="calambares" id="calambares" onchange="yesnoCheck()"  required>
                            <option value="" disabled selected>Resident of Calamba?</option>
                            <option value="Yes" class="others">Yes</option>
                            <option value="No" class="others">No</option>
                        </select>
                        <!-- <input type="radio" name="calambayes" onclick="javascript:yesnoCheck();" value="Yes" id="calambayes">
                        <label class="custom-control-label" for="calambayes">Yes</label>
                        <input type="radio" name="calambano" onclick="javascript:yesnoCheck();" value="No" id="calambano">
                        <label class="custom-control-label" for="calambano">No</label> -->
                    </div>
                    <!-- <div class="col-md-2 col-sm-6">
                        <label for="yrs_calamba">Years:</label>
                        <input type="hidden" name="yrs_calamba" id="yrs_calambaa" value="0">
                        <input type="number" name="yrs_calamba" min=0 max=40 value="1" class="form-control yrs_calamba" placeholder="Years" id="yrs_calamba" disabled>
                    </div> -->
                    <div class="col-md-2 col-sm-6">
                        <label for="yrs_calamba">Date of Residency:</label>
                        <input type="date" class="form-control" name="yrs_calamba" id="yrs_calambaa" disabled>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="pre_houseno">Present Address:<i class="req">*</i></label>
                        <input type="text" name="pre_houseno" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village" id="pre_houseno" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div id="calambaresyes" style="display: none">
                            <label for="pre_brgy1">Barangay:<i class="req">*</i></label>
                            <select class="form-select" name="pre_brgy1" id="pre_brgy1">
                                <option value="" >Barangay</option>
                                <option value="Barangay 1" class="others">Barangay 1</option>
                                <option value="Barangay 2" class="others">Barangay 2</option>
                                <option value="Barangay 3" class="others">Barangay 3</option>
                                <option value="Barangay 4" class="others">Barangay 4</option>
                                <option value="Barangay 5" class="others">Barangay 5</option>
                                <option value="Barangay 6" class="others">Barangay 6</option>
                                <option value="Barangay 7" class="others">Barangay 7</option>
                                <option value="Bagong Kalsada" class="others">Bagong Kalsada</option>
                                <option value="Banadero" class="others">Banadero</option>
                                <option value="Banlic" class="others">Banlic</option>
                                <option value="Barandal" class="others">Barandal</option>
                                <option value="Batino" class="others">Batino</option>
                                <option value="Bubuyan" class="others">Bubuyan</option>
                                <option value="Bucal" class="others">Bucal</option>
                                <option value="Bunggo" class="others">Bunggo</option>
                                <option value="Burol" class="others">Burol</option>
                                <option value="Camaligan" class="others">Camaligan</option>
                                <option value="Canlubang" class="others">Canlubang</option>
                                <option value="Halang" class="others">Halang</option>
                                <option value="Hornalan" class="others">Hornalan</option>
                                <option value="Kay-Anlog" class="others">Kay-Anlog</option>
                                <option value="Laguerta" class="others">Laguerta</option>
                                <option value="La Mesa" class="others">La Mesa</option>
                                <option value="Lawa" class="others">Lawa</option>
                                <option value="Lecheria" class="others">Lecheria</option>
                                <option value="Lingga" class="others">Lingga</option>
                                <option value="Looc" class="others">Looc</option>
                                <option value="Mabato" class="others">Mabato</option>
                                <option value="Majada Labas" class="others">Majada Labas</option>
                                <option value="Makiling" class="others">Makiling</option>
                                <option value="Mapagong" class="others">Mapagong</option>
                                <option value="Masili" class="others">Masili</option>
                                <option value="Maunong" class="others">Maunong</option>
                                <option value="Mayapa" class="others">Mayapa</option>
                                <option value="Milagrosa" class="others">Milagrosa</option>
                                <option value="Paciano Rizal" class="others">Paciano Rizal</option>
                                <option value="Palingon" class="others">Palingon</option>
                                <option value="Palo-Alto" class="others">Palo-Alto</option>
                                <option value="Pansol" class="others">Pansol</option>
                                <option value="Parian" class="others">Parian</option>
                                <option value="Prinza" class="others">Prinza</option>
                                <option value="Punta" class="others">Punta</option>
                                <option value="Puting Lupa" class="others">Puting Lupa</option>
                                <option value="Real" class="others">Real</option>
                                <option value="Saimsim" class="others">Saimsim</option>
                                <option value="Sampiruhan" class="others">Sampiruhan</option>
                                <option value="Sirang Lupa" class="others">Sirang Lupa</option>
                                <option value="San Cristobal" class="others">San Cristobal</option>
                                <option value="San Jose" class="others">San Jose</option>
                                <option value="San Juan" class="others">San Juan</option>
                                <option value="Sucol" class="others">Sucol</option>
                                <option value="Turbina" class="others">Turbina</option>
                                <option value="Ulango" class="others">Ulango</option>
                                <option value="Uwisan" class="others">Uwisan</option>
                            </select>
                        </div>
                        <div id="calambaresno" style="display:block">
                            <label for="pre_brgy2">Barangay:<i class="req">*</i></label>
                            <input type="text" name="pre_brgy2" class="form-control" placeholder="Barangay" id="pre_brgy2" required>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="pre_city">City:<i class="req">*</i></label>
                        <input type="text" name="pre_city" class="form-control" placeholder="City" id="pre_city" required>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for="pre_zip">Zip Code:<i class="req">*</i></label>
                        <input type="text" name="pre_zip" onpaste="return false;" onkeypress="return onlyNumberKey(event)" pattern="\d*" maxlength="4" class="form-control" placeholder="Postal Code" id="pre_zip" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <label for="per_houseno">Permanent Address:<i class="req">*</i></label>&nbsp;
                        <input type="checkbox" class="" onclick="javascript:Fill()" name="filladdress" value="Yes" id="filladdress">&nbsp;<small><em>Check if same as current address</em></small></input>
                        <input type="text" name="per_houseno" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village" id="per_houseno" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="per_brgy">Barangay:<i class="req">*</i></label>
                        <input type="text" name="per_brgy" class="form-control" placeholder="Barangay" id="per_brgy" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="per_city">City:<i class="req">*</i></label>
                        <input type="text" name="per_city" class="form-control" placeholder="City" id="per_city" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="per_zip">Zip Code:<i class="req">*</i></label>
                        <input type="text" name="per_zip" onpaste="return false;" onkeypress="return onlyNumberKey(event)" pattern="\d*" maxlength="4" minlength="4" class="form-control" placeholder="Postal Code" id="per_zip" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <label for="">Please select the group you belong to:</label><br><br>
                            <div class="col-md-6">
                                <input type="hidden" name="group" value="N/A">
                                <input type="checkbox" class="non form-check-input" name="group[]" value="N/A" id="none" onclick="wala()" checked>
                                <small>None</small><br>
                                <input type="checkbox" class="form-check-input" name="group[]" value="Recipient of Student Financial Assistance" onclick="uncheck()" id="stuFap">
                                <small>Recipient of Student Financial Assistance</small><br>
                                <input type="checkbox" class="form-check-input" name="group[]" value="Person from Disadvantaged Group" onclick="uncheck()" id="disadvantagedGroup">
                                <small>Person from Disadvantaged Group</small><br>
                                <input type="checkbox" class="form-check-input" name="group[]" value="Person from Depressed or Conflicted-Areas" onclick="uncheck()" id="depressed">
                                <small>Person from Depressed or Conflicted Areas</small><br>
                                </div>
                                <div class="col-md-6">
                                <input type="checkbox" class="form-check-input" name="group[]" value="Member of Indigenous People" onclick="uncheck()" id="indigenous">
                                <small>Member of Indigenous People</small><br>
                                <input type="checkbox" class="form-check-input" name="group[]" value="Person with Disability" onclick="uncheck()" id="pwd">
                                <small>Person with Disability (PWD)</small><br>
                                <input type="checkbox" class="form-check-input" name="group[]" value="Recipient of 4Ps" onclick="uncheck()" id="4ps">
                                <small>Recipient of 4Ps</small><br>
                                <input type="checkbox" class="form-check-input" name="group[]" value="Working Student" onclick="uncheck()" id="workingstud">
                                <small>Working Student</small><br> 
                                  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 p-3">
                        <p style="text-indent: 50px">I have a stable internet connection and the resources to attend online classes (in case of blended learning) for 1st Semester of F.Y. 2021-2022:</p>
                            <input type="hidden" name="stablenet" value="N/A">
                            <select class="form-select" name="stablenet" id="stablenet" req>
                                <option value="" selected>Do you have stable Internet?</option>
                                <option value="Yes" class="others">Yes</option>
                                <option value="No" class="others">No</option>
                            </select>
                    </div>
                </div>
                </div>
                <div class="row mt-3">
                    <center>
                        <button type="button" name=nxtstudinfo id=studinfo class="btn btn-outline-warning next" style="float: right">
                                <b>NEXT <i class="bx bxs-right-arrow" style="font-size: 13px;"></i></b>
                        </button>
                    </center>  
                </div> 
            </div>
        </div>
    <div style="margin-bottom:3rem;"></div>
</form>
   
  <!-- <script>
           // Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));
$("#intTextBox").inputFilter(function(value) {
  return '/^-?\d*$/'.test(value); });
    </script> -->
    