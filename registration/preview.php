<form action="" id="finalForm" method="post" enctype="multipart/form-data">
<div class="container" id="previewRes">
    <div class="col-lg bg-light p-5" style="border-radius: 10px">
                <div class="form-title">
                        <h4><i class='bx bx-list-check' style="font-size: 28px"></i>&nbsp;Application Preview</h4>
                </div>
                <div class="Note alert-warning p-2" style="margin-top: -35px; margin-bottom: 30px; border-radius: 5px">
                 <small><b>&nbsp;&nbsp;<i class='bx bxs-info-circle bx-burst'></i></b> Please review your application details below to ensure that all information provided is correct. You can click <b>"BACK"</b> button to edit the details you provided. </small>
                </div>
                <div class="form-group">
                    <div class="" id="cardPreview">  
                        <table class="table table-responsive table-condensed" style="border: 0px solid #343a40; width: 100%">
                            <tbody>
                                <!-- personaldata -->
                                <th valign="top" class="table-dark" style="padding-top: 15px;" colspan="4">
                                    <h5><i class="bx bxs-user-detail"></i>&nbsp;Personal Information</h5>
                                </th>
                                <tr class="">
                                    <td colspan="4" style="text-align:center; padding-bottom: 30px">
                                        <div class="form-group img-profile text-center col-12" style="position: relative;">
                                            <span class="img-div" id="studentPic">
                        
                                            </span>
                                            <div id="imgclone">

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="content" >
                                    <td><b>First Name:</b></td>
                                    <td class="values" id="fname1"></td>
                                    <input type="hidden" name="fname" id="fname2">
                                    <td><b>Last Name:</b></td>
                                    <td class="values" id="lname1"></td>
                                    <input type="hidden" name="lname" id=lname2>
                                </tr>
                                <tr class="content">
                                    <td><b>Middle Name:</b></td>
                                    <td class="values" id="mname1"></td>
                                    <input type="hidden" name="mname" id="mname2">
                                    <td><b>Suffix:</b></td>
                                    <td class="values" id="suffix1"></td>
                                    <input type="hidden" name="suffixx" id=suffix2>
                                </tr>
                                <tr class="content">
                                    <td><b>Age:</b></td>
                                    <td class="values" id="age1"></td>
                                    <input type="hidden" name="age" id=age2>
                                    <td><b>Gender:</b></td>
                                    <td class="values" id="gender1"></td>
                                    <input type="hidden" name="gender" id=gender2>
                                </tr>
                                <tr class="content">
                                    <td><b>Status:</b></td>
                                    <td class="values" id="status1"></td>
                                    <input type="hidden" name="status" id=status2>
                                    <td><b>Religion:</b></td>
                                    <td class="values" id="religion1"></td>
                                    <input type="hidden" name="religion" id=religion2>
                                </tr>
                                <tr class="content spouseDetails noBorder" style="display: none">
                                    <td><b>Spouse Name:</b></td>
                                    <td class="values" id="spouse_name1"></td>
                                    <input type="hidden" name="spouse_name" id=spouse_name2>
                                    <td><b>Occupation:</b></td>
                                    <td class="values" id="spouse_work1"></td>
                                    <input type="hidden" name="spouse_work" id=spouse_work2>
                                </tr>
                                <tr class="content spouseDetails noBorder" style="display: none">
                                    <td><b>Contact No:</b></td>
                                    <td class="values" id="spouse_phone1"></td>
                                    <input type="hidden" name="spouse_contact" id=spouse_phone2>
                                    <td><b>Employer's Name:</b></td>
                                    <td class="values" id="spouse_emp1"></td>
                                    <input type="hidden" name="spouse_emp" id=spouse_emp2>
                                </tr>
                                <tr class="content spouseDetails" style="display: none; ">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Address:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" colspan="3" class="values" id="spouse_add1"></td>
                                    <input type="hidden" name="spouse_add" id=spouse_add2>
                                </tr>
                                <tr class="content">
                                    <td><b>Birthplace:</b></td>
                                    <td class="values" id="birthplace1"></td>
                                    <input type="hidden" name="birthplace" id=birthplace2>
                                    <td><b>Birthday:</b></td>
                                    <td class="values" id="bday1"></td>
                                    <input type="hidden" name="bday" id=bday2>
                                </tr>
                                <tr class="content">
                                    <td><b>Email:</b></td>
                                    <td class="values" id="email1"></td>
                                    <input type="hidden" name="email" id=email2>
                                    <td><b>Mobile No:</b></td>
                                    <td class="values" id="stud_phone1"></td>
                                    <input type="hidden" name="phone" id=stud_phone2>
                                </tr>
                                <tr class="content">
                                    <td><b>Classification:</b></td>
                                    <td class="values" id="admit1"></td>
                                    <input type="hidden" name="admit" id=admit2>
                                    <td><b>1st Priority:</b></td>
                                    <td class="values" id="1stprio1"></td>
                                    <input type="hidden" name="1stprio" id=1stprio2>
                                </tr>
                                <tr class="content">
                                    <td><b>Have stable internet:</b></td>
                                    <td class="values" id="stablenet1"></td>
                                    <input type="hidden" name="stablenet" id=stablenet2>
                                    <td><b>2nd Priority:</b></td>
                                    <td class="values" id="2ndprio1"></td>
                                    <input type="hidden" name="2ndprio" id=2ndprio2>
                                </tr>
                                <tr class="content">
                                    <td><b>Calamba Resident:</b></td>
                                    <td class="values" id="calambares1"></td>
                                    <input type="hidden" name="calambares" id=calambares2>
                                    <td><b>Date of Residency:</b></td>
                                    <td class="values" id="yrs_calamba1"></td>
                                    <input type="hidden" name="yrs_calamba" id=yrs_calamba2>
                                </tr>
                                <tr class="content">
                                    <td><b>Present Address:</b></td>
                                    <td colspan="3">
                                        <a class="values" style="text-decoration: none; color: black" id="pre_houseno1"></a> 
                                        <input type="hidden" name="pre_houseno" id=pre_houseno2>
                                        <a class="values" style="text-decoration: none; color: black" id="pre_brgy"></a> 
                                        <input type="hidden" name="pre_brgy" id=pre_brgy0>
                                        <a class="values" style="text-decoration: none; color: black" id="pre_city1"></a> 
                                        <input type="hidden" name="pre_city" id=pre_city2>
                                        <a class="values" style="text-decoration: none; color: black" id="pre_zip1"></a>
                                        <input type="hidden" name="pre_zip" id=pre_zip2>
                                    </td>
                                </tr>
                                <tr class="content">
                                    <td><b>Permanent Address:</b></td>
                                    <td colspan="3">
                                        <a class="values" style="text-decoration: none; color: black" id="per_houseno1"></a>
                                        <input type="hidden" name="per_houseno" id=per_houseno2>
                                        <a class="values" style="text-decoration: none; color: black" id="per_brgy1"></a>
                                        <input type="hidden" name="per_brgy" id=per_brgy2>
                                        <a class="values" style="text-decoration: none; color: black" id="per_city1"></a>
                                        <input type="hidden" name="per_city" id=per_city2>
                                        <a class="values" style="text-decoration: none; color: black" id="per_zip1"></a>
                                        <input type="hidden" name="per_zip" id=per_zip2>
                                    </td>
                                </tr>
                                <tr class="content">
                                    <td colspan="4" style="padding-bottom: 30px">
                                        <div class="row">
                                            <label for=""><b>Groups you are belong to:</b></label>
                                                    <div class="col-md-4" style="margin-left: 20px">
                                                        <input type="hidden" name="group" value="N/A">
                                                        <input type="radio" class="non" name="group[]" value="N/A" id="nonee2" onclick="return false;">
                                                        <small>None</small><br>
                                                        <input type="radio" class="" name="group[]" value="Recipient of Student Financial Assistance" onclick="return false;" id="stuFap2">
                                                        <small>Recipient of Student Financial Assistance</small><br>
                                                        <input type="radio" class="" name="group[]" value="Person from Disadvantaged Group" onclick="return false;" id="disadvantagedGroup2">
                                                        <small>Person from Disadvantaged Group</small><br>
                                                        <input type="radio" class="" name="group[]" value="Person from Depressed or Conflicted-Areas" onclick="return false;" id="depressed2">
                                                        <small>Person from Depressed or Conflicted Areas</small><br>
                                                    </div>
                                                    <div class="col-md-4" style="margin-left: 20px">
                                                        <input type="radio" class="" name="group[]" value="Member of Indigenous People" onclick="return false;" id="indigenous2">
                                                        <small>Member of Indigenous People</small><br>
                                                        <input type="radio" class="" name="group[]" value="Person with Disability" onclick="return false;" id="pwd2">
                                                        <small>Person with Disability (PWD)</small><br>
                                                        <input type="radio" class="" name="group[]" value="Recipient of 4Ps" onclick="return false;" id="4ps2">
                                                        <small>Recipient of 4Ps</small><br>
                                                        <input type="radio" class="" name="group[]" value="Working Student" onclick="return false;" id="workingstud2">
                                                        <small>Working Student</small><br> 
                                                    </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- EDUCATIONAL BACKGROUND -->
                                    <th valign="top" class="table-dark" style="padding-top: 15px" colspan="4">
                                        <h5><i class='bx bxs-book-open' ></i>&nbsp;Educational Background</h5>                              
                                    </th>
                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Elementary School:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="elem_name1"></td>
                                    <input type="hidden" name="elem_name" id=elem_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Address:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="elem_address1"></td>
                                    <input type="hidden" name="elem_address" id=elem_address2>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Date Graduated:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="dgrad_elem1"></td>
                                    <input type="hidden" name="dgrad_elem" id=dgrad_elem2>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Honors:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="elem_honor1"></td>
                                    <input type="hidden" name="elem_honors" id=elem_honor2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;" ><b>Junior High School:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="jhs_name1"></td>
                                    <input type="hidden" name="jhs_name" id=jhs_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" ><b>Address:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="jhs_address1"></td>
                                    <input type="hidden" name="jhs_address" id=jhs_address2>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Date Graduated:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="jhs_dgrad1"></td>
                                    <input type="hidden" name="jhs_dgrad" id=jhs_dgrad2>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Honors:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="jhs_honors1"></td>
                                    <input type="hidden" name="jhs_honors" id=jhs_honors2>
                                </tr>
                                <tr class="content shsDetails noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Senior High School:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="shs_name1"></td>
                                    <input type="hidden" name="shs_name" id=shs_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Address:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="shs_address1"></td>
                                    <input type="hidden" name="shs_address" id=shs_address2>
                                </tr>
                                <tr class="content shsDetails noBorder">
                                    <td><b>SHS Tracks:</b></td>
                                    <td class="values" id="shs_tracks1"></td>
                                    <input type="hidden" name="shs_tracks" id=shs_tracks2>
                                    <td><b>Strands:</b></td>
                                    <td class="values" id="shs_strands1"></td>
                                    <input type="hidden" name="shs_strands" id=shs_strands2>
                                </tr>
                                <tr class="content shsDetails noBorder">
                                    <td><b>Date Graduated:</b></td>
                                    <td class="values" id="shs_dgrad1"></td>
                                    <input type="hidden" name="shs_dgrad" id=shs_dgrad2>
                                    <td><b>G11 GWA:</b></td>
                                    <td class="values" id="g11_gwa1"></td>
                                    <input type="hidden" name="g11_gwa" id=g11_gwa2>
                                </tr>
                                <tr class="content shsDetails">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Honors:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="shs_honors1"></td>
                                    <input type="hidden" name="shs_honors" id=shs_honors2>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>G12 GWA:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="g12_gwa1"></td>
                                    <input type="hidden" name="g12_gwa" id=g12_gwa2>
                                </tr>

                                <tr class="content collegeDetails noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>College or University:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="college_name1"></td>
                                    <input type="hidden" name="college_name" id=college_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Address:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="college_address1"></td>
                                    <input type="hidden" name="college_address" id=college_address2>
                                </tr>
                                <tr class="content collegeDetails">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Course:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="college_course1"></td>
                                    <input type="hidden" name="college_course" id=college_course2>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Average:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="college_gwa1"></td>
                                    <input type="hidden" name="college_gwa" id=college_gwa2>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Technicval/Vocational Course:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="tvc_name1"></td>
                                    <input type="hidden" name="tvc_name" id=tvc_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Address:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="tvc_address1"></td>
                                    <input type="hidden" name="tvc_address" id=tvc_address2>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Date of Completion:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="tvc_dgrad1"></td>
                                    <input type="hidden" name="tvc_dgrad" id=tvc_dgrad2>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Course:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="tvc_course1"></td>
                                    <input type="hidden" name="tvc_course" id=tvc_course2>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px"><b>Alternative Learning System:</b></td>
                                    <td class="values" id="als_name1"></td>
                                    <input type="hidden" name="als_name" id=als_name2>
                                    <td><b>ALS Certification:</b></td>
                                    <td class="values" id="als_cert1">
                                       
                                    </td>
                                    
                                    <!-- <input type="file" name="als_address" id=als_address2> -->
                                </tr>
                                <tr class="content noBorder" >
                                    <td style="padding-top: 0px; padding-bottom: 30px;"><b>Address:</b></td>
                                    <td colspan=3 class="values" id="als_address1"></td>
                                    <input type="hidden" name="als_address" id=als_address2>
                                </tr>
                                <!-- ORGANIZATIONAL INVOLVEMENT -->
                                <th valign="top" class="table-dark" style="padding-top: 15px" colspan="4">
                                    <h5><i class='bx bxs-group' ></i>&nbsp;Organizational Involvement</h5>
                                </th>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Organization 1:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="org_name11"></td>
                                    <input type="hidden" name="org_name1" id=org_name12>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Position:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="position11"></td>
                                    <input type="hidden" name="position1" id=position12>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Nature:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="nature11"></td>
                                    <input type="hidden" name="nature1" id=nature12>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Years:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="yrs_org11"></td>
                                    <input type="hidden" name="yrs_org1" id=yrs_org12>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Organization 2:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="org_name21"></td>
                                    <input type="hidden" name="org_name2" id=org_name22>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" ><b>Position:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="position21"></td>
                                    <input type="hidden" name="position2" id=position22>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Nature:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="nature21"></td>
                                    <input type="hidden" name="nature2" id=nature22>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Years:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="yrs_org21"></td>
                                    <input type="hidden" name="yrs_org2" id=yrs_org22>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Organization 3:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="org_name31"></td>
                                    <input type="hidden" name="org_name3" id=org_name32>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Position:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="position31"></td>
                                    <input type="hidden" name="position3" id=position32>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 30px;"><b>Nature:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="nature31"></td>
                                    <input type="hidden" name="nature3" id=nature32>
                                    <td style="padding-top: 0px; padding-bottom: 30px;"><b>Years:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="yrs_org31"></td>
                                    <input type="hidden" name="yrs_org3" id=yrs_org32>
                                </tr>

                                
                                <!-- FAMILY BACKGROUND -->
                                <th valign="top" class="table-dark" colspan="4" style="padding-top: 15px">
                                    <h5><i class='bx bxs-home' ></i>&nbsp;Family Background</h5>
                                </th>
                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Father:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="father_name1"></td>
                                    <input type="hidden" name="father_name" id=father_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" ><b>Citizenship:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="father_citizen1"></td>
                                    <input type="hidden" name="father_citizen" id=father_citizen2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Present Address:</b></td>
                                    <td colspan="3" style="padding-top: 0px; padding-bottom: 0px;" class="values" id="father_add1"></td>
                                    <input type="hidden" name="father_add" id=father_add2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Contact No:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="father_contact1"></td>
                                    <input type="hidden" name="father_contact" id=father_contact2>
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Email:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="father_email1"></td>
                                    <input type="hidden" name="father_email" id=father_email2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Occupation:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="father_work1"></td>
                                    <input type="hidden" name="father_work" id=father_work2>
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Employer's Name:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="father_emp1"></td>
                                    <input type="hidden" name="father_emp" id=father_emp2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Employer's Address:</b></td>
                                    <td colspan="3" style="padding-top: 0px; padding-bottom: 0px;" class="values" id="father_emp_add1"></td>
                                    <input type="hidden" name="father_emp_add" id=father_emp_add2>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Employer's Phone:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="father_emp_no1"></td>
                                    <input type="hidden" name="father_emp_no" id=father_emp_no2>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Education:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="father_educ1"></td>
                                    <input type="hidden" name="father_educ" id=father_educ2>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Mother:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="mother_name1"></td>
                                    <input type="hidden" name="mother_name" id=mother_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" ><b>Citizenship:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="mother_citizen1"></td>
                                    <input type="hidden" name="mother_citizen" id=mother_citizen2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Present Address:</b></td>
                                    <td colspan="3" style="padding-top: 0px; padding-bottom: 0px;" class="values" id="mother_add1"></td>
                                    <input type="hidden" name="mother_add" id=mother_add2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Contact No:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="mother_contact1"></td>
                                    <input type="hidden" name="mother_contact" id=mother_contact2>
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Email:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="mother_email1"></td>
                                    <input type="hidden" name="mother_email" id=mother_email2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Occupation:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="mother_work1"></td>
                                    <input type="hidden" name="mother_work" id=mother_work2>
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Employer's Name:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="mother_emp1"></td>
                                    <input type="hidden" name="mother_emp" id=mother_emp2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Employer's Address:</b></td>
                                    <td colspan="3" style="padding-top: 0px; padding-bottom: 0px;" class="values" id="mother_emp_add1"></td>
                                    <input type="hidden" name="mother_emp_add" id=mother_emp_add2>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Employer's Phone:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="mother_emp_no1"></td>
                                    <input type="hidden" name="mother_emp_no" id=mother_emp_no2>
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Education:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 8px;" class="values" id="mother_educ1"></td>
                                    <input type="hidden" name="mother_educ" id=mother_educ2>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Guardian:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="guardian_name1"></td>
                                    <input type="hidden" name="guardian_name" id=guardian_name2>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" ><b>Relationship:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="guardian_relation1"></td>
                                    <input type="hidden" name="guardian_relation" id=guardian_relation2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Present Address:</b></td>
                                    <td colspan="3" style="padding-top: 0px; padding-bottom: 0px;" class="values" id="guardian_add1"></td>
                                    <input type="hidden" name="guardian_add" id=guardian_add2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Contact No:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="guardian_contact1"></td>
                                    <input type="hidden" name="guardian_contact" id=guardian_contact2>
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Email:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="guardian_email1"></td>
                                    <input type="hidden" name="guardian_email" id=guardian_email2>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Birthday:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="guardian_bday1"></td>
                                    <input type="hidden" name="guardian_bday" id=guardian_bday2>
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Occupation:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="guardian_work1"></td>
                                    <input type="hidden" name="guardian_work" id=guardian_work2>
                                </tr>
                               
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Employer's Name:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="guardian_emp1"></td>
                                    <input type="hidden" name="guardian_emp" id=guardian_emp2>
                                    <td style="padding-top: 0px; padding-bottom: 0px;"><b>Employer's No:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 0px;" class="values" id="guardian_emp_no1"></td>
                                    <input type="hidden" name="guardian_emp_no" id=guardian_emp_no2>
                                </tr>
                                <tr class="content">
                                    <td style="padding-top: 0px; padding-bottom: 8px;"><b>Employer's Address:</b></td>
                                    <td colspan="3" style="padding-top: 0px; padding-bottom: 8px;" class="values" id="guardian_emp_add1"></td>
                                    <input type="hidden" name="guardian_emp_add" id=guardian_emp_add2>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Siblings:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="sibling11"></td>
                                    <input type="hidden" name="sibling1" id=sibling12>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Age:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="sibling_age11"></td>
                                    <input type="hidden" name="sibling_age1" id=sibling_age12>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 10px;"><b>Status:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 10px;" class="values" id="sibling_status11"></td>
                                    <input type="hidden" name="sibling_status1" id=sibling_status12>
                                    <td style="padding-top: 0px; padding-bottom: 10px;"><b>Contact No:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 10px;" class="values" id="sibling_contact11"></td>
                                    <input type="hidden" name="sibling_contact1" id=sibling_contact12>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Siblings:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="sibling21"></td>
                                    <input type="hidden" name="sibling2" id=sibling22>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Age:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="sibling_age21"></td>
                                    <input type="hidden" name="sibling_age2" id=sibling_age22>
                                </tr>
                                <tr class="content noBorder">
                                    <td style="padding-top: 0px; padding-bottom: 10px;"><b>Status:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 10px;" class="values" id="sibling_status21"></td>
                                    <input type="hidden" name="sibling_status2" id=sibling_status22>
                                    <td style="padding-top: 0px; padding-bottom: 10px;"><b>Contact No:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 10px;" class="values" id="sibling_contact21"></td>
                                    <input type="hidden" name="sibling_contact2" id=sibling_contact22>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Siblings:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="sibling31"></td>
                                    <input type="hidden" name="sibling3" id=sibling32>
                                    <td style="padding-top: 8px; padding-bottom: 0px;"><b>Age:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 0px;" class="values" id="sibling_age31"></td>
                                    <input type="hidden" name="sibling_age3" id=sibling_age32>
                                </tr>
                                <tr class="content ">
                                    <td style="padding-top: 0px; padding-bottom: 10px;"><b>Status:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 10px;" class="values" id="sibling_status31"></td>
                                    <input type="hidden" name="sibling_status3" id=sibling_status32>
                                    <td style="padding-top: 0px; padding-bottom: 10px;"><b>Contact No:</b></td>
                                    <td style="padding-top: 0px; padding-bottom: 10px;" class="values" id="sibling_contact31"></td>
                                    <input type="hidden" name="sibling_contact3" id=sibling_contact32>
                                </tr>

                                <tr class="content noBorder">
                                    <td style="padding-top: 8px; padding-bottom: 30px;"><b>Socio Economic Status of Family:</b></td>
                                    <td style="padding-top: 8px; padding-bottom: 30px;" class="values" id="income1"></td>
                                    <input type="hidden" name="income" id=income2>
                                </tr>
                               
                                
                               
                                <!-- Personal admiration -->
                                <th valign="top" class="table-dark" colspan="4" style="padding-top: 15px">
                                    <h5><i class="bx bxs-user"></i>&nbsp;Personal Admiration</h5>
                                </th>
                                <tr class="content">
                                   <td colspan="4">
                                        <div class="row">
                                            <div class="col-3">
                                                <b>Hobbies and Interests:</b>
                                            </div>
                                            <div class="col-9">
                                                <textarea class="forms" style="width: 100%; border:0px solid #999999;" readonly name="hobbies" id="hobbies2"></textarea> 
                                            </div>
                                        </div>
                                   </td>
                                </tr>
                                <tr class="content">
                                   <td colspan="4">
                                        <div class="row">
                                            <div class="col-3">
                                                <b>Reason for Enrolling:</b>
                                            </div>
                                            <div class="col-9">
                                                <textarea class="forms" style="width: 100%; border:0px solid #999999;" readonly name="reason4enroll" id="reason4enroll2"></textarea> 
                                            </div>
                                        </div>
                                   </td>
                                </tr>
                                <tr class="content">
                                   <td colspan="4">
                                        <div class="row">
                                            <div class="col-3">
                                                <b>Describe yourself:</b>
                                            </div>
                                            <div class="col-9">
                                                <textarea class="forms" style="width: 100%; border:0px solid #999999;" readonly name="characteristics" id="characteristics2"></textarea> 
                                            </div>
                                        </div>
                                   </td>
                                </tr>
                                <tr class="content">
                                   <td colspan="4" style="padding-bottom: 30px">
                                        <div class="row">
                                            <div class="col-3">
                                                <b>Envision yourself 10 years from now:</b>
                                            </div>
                                            <div class="col-9">
                                                <textarea class="forms" style="width: 100%; border:0px solid #999999;" readonly name="dream" id="dream2"></textarea> 
                                            </div>
                                        </div>
                                   </td>
                                </tr>
                                <!-- Requirements -->
                                <th valign="top" class="table-dark" colspan="4" style="padding-top: 15px">
                                    <h5><i class="bx bxs-copy-alt"></i>&nbsp;Requirements</h5>
                                </th>
                                <tr class='content'>
                                    <td colspan="4" style="padding-bottom: 30px">
                                        <div class="row" id="freshmanclone">
                                            <div class="col-6">
                                                <label for="g11rc"><b>G11 Report Card:</b></label>
                                                <div id="g11rc">
                                            
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="g12rc"><b>G12 Report Card:</b></label>
                                                <div id="g12rc">
                                            
                                                </div>
                                            </div>    
                                        </div>
                                       
                                        <div class="row mt-4" id="transfereeclone">
                                            <div class="col-6">
                                                <label for="tor1"><b>Transcript of Records (Page 1):</b></label>
                                                <div id="tor1">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="tor2"><b>Transcript of Records (Page 2):</b></label>
                                                <div id="tor2">
                                                   
                                                </div>
                                            </div>    
                                        </div>
                                        
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <label for="gmc"><b>Good Moral Certification:</b></label>
                                                <div id="gmc">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="bdaycer"><b>Birth Certificate:</b></label>
                                                <div id="bdaycer">
                                                   
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <label for="coi"><b>Certificate of Indigency:</b></label>
                                                <div id="coi">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="vc"><b>Voter's Certification of Parent/Guardian:</b></label>
                                                <div id="vc">
                                                   
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row mt-4 ">
                                            <div class="col-6" id="group-file2">
                                                <label for="group-req"><b id="groupName2">:</b></label>
                                                <div id="group-req">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-6" id="vax-file2">
                                                <label for="vax"><b>Vaccination Card:</b></label>
                                                <div id="vax">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                    
                        <div class="row mb-3"> 
                            <div class="row mt-3">
                                <center>
                                    <button type="button" name=prev id=prvfinal class="btn btn-outline-warning prev" style="float: left">
                                        <b><i class="bx bxs-left-arrow" style="font-size: 13px;"></i> BACK</b>
                                    </button>
                                    <button type="submit" name=btn-submit id=btn-submit class="btn btn-outline-warning submit" style="float: right">
                                        <b>SUBMIT <i class="bx bxs-right-arrow" style="font-size: 13px;"></i></b>
                                    </button>     
                                </center>  
                            </div> 
                        </div>
                </div>
            </div> 
        </div>    
    </div>
    <div style="margin-bottom:3rem;"></div>
</form>