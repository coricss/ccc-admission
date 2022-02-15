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
                    <li class="steps is-active" data-step="3">
                        Org Involvement
                    </li>
                    <li class="steps active" data-step="1">
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
<form action="" method="post" id="orginvolve" enctype="multipart/form-data">
        <div class="col-lg bg-light p-5" style="border-radius: 10px">
            <div class="form-title">
                    <h4><i class="bx bxs-group"></i>&nbsp;Organizational Involvement</h4>
            </div>
            <div class="Note alert-warning p-2" style="margin-top: -35px; margin-bottom: 30px; border-radius: 5px">
               <small><i class='bx bxs-info-circle bx-burst'></i></b> This part is optional. You can click <b>"NEXT"</b> if you are not involve in an organization.</small>
            </div>
        
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6">
                        <label for="org_name1"><b>Organization 1:</b></label>
                        <input type="text" name="org_name1" id=org_name1 placeholder="Name of Organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="position1">Position:</label>
                        <input type="text" name="position1" id=position1 placeholder="Position in organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="nature1">Nature:</label>
                        <input type="text" name="nature1" id=nature1 placeholder="Nature of organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="yrs_org1">Years:</label>
                        <input type="number" name="yrs_org1" max=20 min=0 id=yrs_org1 placeholder="Years in joining the organization" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-3 col-sm-6">
                        <label for="org_name2"><b>Organization 2:</b></label>
                        <input type="text" name="org_name2" id=org_name2 placeholder="Name of Organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="position2">Position:</label>
                        <input type="text" name="position2" id=position2 placeholder="Position in organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="nature2">Nature:</label>
                        <input type="text" name="nature2" id=nature2 placeholder="Nature of organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="yrs_org2">Years:</label>
                        <input type="number" name="yrs_org2" max=20 min=0 id=yrs_org2 placeholder="Years in joining the organization" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <hr>
                    <div class="col-md-3 col-sm-6">
                        <label for="org_name3"><b>Organization 3:</b></label>
                        <input type="text" name="org_name3" id=org_name3 placeholder="Name of Organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="position3">Position:</label>
                        <input type="text" name="position3" id=position3 placeholder="Position in organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="nature3">Nature:</label>
                        <input type="text" name="nature3" id=nature3 placeholder="Nature of organization" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="yrs_org3">Years:</label>
                        <input type="number" name="yrs_org3" max=20 min=0 id=yrs_org3 placeholder="Years in joining the organization" class="form-control">
                    </div>
                </div>
                <div class="row mt-5">
                    <center>
                        <button type="button" name=prev id='prvorg' class="btn btn-outline-warning submit" style="float: left">
                            <b><i class="bx bxs-left-arrow" style="font-size: 13px;"></i> BACK</b>
                        </button>
                        <button type="button" id="nxtorg" name=next class="btn btn-outline-warning submit" style="float: right">
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