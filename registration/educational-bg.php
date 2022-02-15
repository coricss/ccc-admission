
    <div class="container">
            <div class=progresstep>
                <ul class="steps">
                    <li class="steps done" data-step="1">
                        Personal Information
                    </li>
                    <li class="steps done" data-step="1">
                    <i class='bx bx-chevrons-right' ></i>
                    </li>
                    <li class="steps is-active" data-step="2">
                        Educational Background
                    </li>
                    <li class="steps active" data-step="1">
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
<form action="" method="post" id="educbackground" enctype="multipart/form-data">
        <div class="col-lg bg-light p-5" style="border-radius: 10px">
            <div class="form-title">
                <h4><i class='bx bxs-book-open' ></i>&nbsp;Educational Background</h4>
            </div>
            <div class="Note alert-danger p-2" id="educationalBG" style="margin-top: -35px; margin-bottom: 30px; border-radius: 5px; display: none">
                <small><b><i class='bx bxs-error bx-flashing'></i></b> Please provide the requested information below. Those fields with <i class="req">*</i> are required.</small>
            </div>
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <label for="elem_name"><b>Elementary School:<i class="req">*</i></b></label>
                        <input type="text" name="elem_name" id=elem_name placeholder="School Name" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="elem_address">Address:<i class="req">*</i></label>
                        <input type="text" name="elem_address" id=elem_address placeholder="School Address" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="dgrad_elem">Date Graduated:<i class="req">*</i></label>
                        <input type="date" name="dgrad_elem" id=dgrad_elem class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="elem_honor">Honors/Awards:</label>
                        <input type="text" name="elem_honors" id=elem_honor placeholder="Honors/Awards" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <label for="jhs_name"><b>Junior High School:<i class="req">*</i></b></label>
                        <input type="text" name="jhs_name" id=jhs_name placeholder="School Name" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="jhs_address">Address:<i class="req">*</i></label>
                        <input type="text" name="jhs_address" id=jhs_address placeholder="School Address" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="jhs_dgrad">Date of Completion:<i class="req">*</i></label>
                        <input type="date" name="jhs_dgrad" id=jhs_dgrad class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="jhs_honors">Honors/Awards:</label>
                        <input type="text" name="jhs_honors" id=jhs_honors placeholder="Honors/Awards" class="form-control">
                    </div>
                </div>
                <div id="shs">
                <hr>
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-12">
                        <label for="shs_name"><b>Senior High School:<i class="req">*</i></b></label>
                        <input type="text" name="shs_name" id=shs_name placeholder="School Name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="shs_address">Address:<i class="req">*</i></label>
                        <input type="text" name="shs_address" id=shs_address placeholder="Address" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="shs_tracks">SHS Tracks:<i class="req">*</i></label>
                        <select class="form-select" name="shs_tracks" id="shs_tracks" onchange="strand()">
                            <option value="">Tracks</option>
                            <option value="Academics" class="others" id="acad">Academics</option>
                            <option value="Technical-Vocational-Livelihood" id="tvl" class="others" >Technical-Vocational-Livelihood</option>
                            <option value="Sports" class="others" id=sports>Sports</option>
                            <option value="Arts and Design" class="others" id=arts>Arts and Design</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="shs_strands">Strands:</label>
                        <input type="hidden" name="shs_strands" value="N/A">
                        <select class="form-select" name="shs_strands" id="shs_strands" disabled>
                            <option value="" disabled selected>Strands</option>
                            <optgroup id=acads label="Academics Strands:">
                                <option value="HUMMS" class="others">HUMMS</option>
                                <option value="GAS" class="others">GAS</option>
                                <option value="STEM" class="others">STEM</option>
                                <option value="ABM" class="others">ABM</option>
                            </optgroup>
                            <optgroup id=techvoc label="TVL Strands:">
                                <option value="Agri-Fishery Arts" class="others">Agri-Fishery Arts</option>
                                <option value="Home Economics" class="others">Home Economics</option>
                                <option value="Industrial Arts" class="others">Industrial Arts</option>
                                <option value="ICT" class="others">ICT</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="shs_dgrad">Date Graduated:<i class="req">*</i></label>
                        <input type="date" name="shs_dgrad" id=shs_dgrad class="form-control" req>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="shs_honors">Honors/Awards:</label>
                        <input type="text" name="shs_honors" id=shs_honors placeholder="Honors/Awards" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="g11_gwa">Grade 11 GWA:<i class="req">*</i></label>
                        <input type="number" name="g11_gwa" id=g11_gwa max="100" min="80" maxlength="5" step=".01" placeholder="Grade 11 GWA" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="g12_gwa">Grade 12 GWA:<i class="req">*</i></label>
                        <input type="number" name="g12_gwa" id=g12_gwa max="100" min="80" step=".01" placeholder="Grade 12 GWA" class="form-control">
                    </div>
                    
                </div>
                </div>
                <div id="college">
                    <div class="row mb-3">
                        <hr>
                        <div class="col-md-3 col-sm-12">
                            <label for="college_name"><b>College/University:<i class="req">*</i></b></label>
                            <input type="text" name="college_name" id=college_name placeholder="School Name" class="form-control" >
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="college_address">Address:<i class="req">*</i></label>
                            <input type="text" name="college_address" id=college_address placeholder="School Address" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="college_course">Course:<i class="req">*</i></label>
                            <input type="text" name="college_course" id=college_course placeholder="Course Taken" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label for="college_gwa">Average:<i class="req">*</i></label>
                            <input type="number" name="college_gwa" max="100" min="80" step=".01" id=college_gwa placeholder="GWA" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-3 col-sm-12">
                        <label for="tvc_name"><b>Technical/Vocational Course:</b></label>
                        <input type="text" name="tvc_name" id=tvc_name placeholder="School Name" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="tvc_address">Address:</label>
                        <input type="text" name="tvc_address" id=tvc_address placeholder="Address" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="tvc_dgrad">Date of Completion:</label>
                        <input type="date" name="tvc_dgrad" id=tvc_dgrad class="form-control" req>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="tvc_course">Course:</label>
                        <input type="text" name="tvc_course" id=tvc_course placeholder="Course Taken" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-6 col-sm-12">
                        <label for="als_name"><b>Alternative Learning System (ALS):</b></label>
                        <input type="text" name="als_name" id=als_name placeholder="School Name" class="form-control">
                    </div>
                    
                    <div class="col-md-3 col-sm-12">
                        <label for="als_address">Address:</label>
                        <input type="text" name="als_address" id=als_address placeholder="Address" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="als_cert">ALS Certification (PDF/JPG):</label>
                        <input type="file" name="als_cert" id=als_cert class="form-control">
                        <small class="text-danger" id="alscerterror"></small>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <center>
                    <button type="button" name=prev id=prv class="btn btn-outline-warning next" style="float: left">
                        <b><i class="bx bxs-left-arrow" style="font-size: 13px;"></i></i> BACK</b>
                    </button>
                    <button type="button" name=next id="educnxt" class="btn btn-outline-warning prev" style="float: right">
                        <b>NEXT <i class="bx bxs-right-arrow" style="font-size: 13px;"></i></b>
                    </button>
                </center>  
             </div> 
        </div> 
    </div>
<div style="margin-bottom:5rem;"></div>
</form>