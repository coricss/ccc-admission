<?php 
    
if(!isset($_SESSION)){
    session_start();    
}

include_once("../connect.php");
$con=connect();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
	<title>Log In | Admission Management System</title>
  <link rel="shortcut icon" type=image/x-icon href=../assets/imgs/logo/ccc.png>

	  <link rel="stylesheet" href="../assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/admincss.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/boxicons-master/css/boxicons.min.css" />

    <script src="assets/js/changepassword.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap-notify.min.js" defer></script>
    <script src="../assets/js/bootstrap.min.js" defer></script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/placeholders.js"></script>
    <script src="../assets/js/aos.js" defer></script>
</head>
<body>

<div class="container-fluid">
  <div id="message">
	  <?php if(isset($_SESSION['message'])){?>
        <?php 
               echo $_SESSION['message'];
               unset($_SESSION['message']);
           ?>
    <?php }?>
    </div>
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row loginRow">
            <div class="col-md-9 col-lg-8 mx-auto">
              <div class="ccc">
                <img src="../assets/imgs/logo/ccc.png" class="schoollogo" width="150px" alt=""><br><br>
                <img src="../assets/imgs/logo/ccc_title.png" class="ccctitle" alt="">
              </div>
              <div class="ccc_gctdco text-center" style="margin-bottom: 100px">
                <img src="../assets/imgs/logo/ccc_guidance_logo_no_bg.png" class="schoollogo" width="190px" alt=""><br><br>
                <img src="../assets/imgs/ccc_gctcdo_title.png" class="ccctitle" width="300px" alt="">
              </div>
              <form id="login">
                <h3 class="login-heading mb-4">Admission Management System</h3>
                  <div class="form-label-group">
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputEmail">Email address</label>
                  </div>

                  <div class="form-label-group">
                    <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                  </div>
                  <br>
                  <button class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold mb-2" name="login" id="btnlogin" type="submit">Log in</button>
                  <div class="text-end">
                    <a class="small" href="#" id="fpass">Forgot password?</a>
                  </div>
              </form>

              <div id="forgotpass" style="display: none">
                <div class='parent' style='display: flex'>
                    <div class="btn-back mt-2" style='margin-right: 5px'>
                         <a class='back' id="back-to-login" style="text-decoration: none; color: black; "><i class='bx bx-arrow-back' style="font-size: 25px; cursor: pointer;"></i></a>
                    </div>
                    <div class='formTitle' style='flex: 1;'>
                      <h3 class="login-heading mb-4">Get Recovery Code</h3>
                    </div>
                </div>
                <p>We will send the recovery code once you enter your registered email below.</p>
                  <div class="form-label-group">
                    <input type="email" name="cpEmail" id="cpEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="cpEmail">Email address</label>
                  </div>
                  <br>
                  <button class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold mb-2" id="getcode">Get Code</button>
              </div>

              <div id="recoverycode" style="display: none">
                  <h3 class="login-heading mb-4">Enter Recovery Code</h3>
                 <p>Please check your email for your recovery code. The code is 6 numbers long.</p>
                  <div class="form-label-group">
                    <input type="text" name="code" id="code" maxlength="6" class="form-control" placeholder="Email address" required autofocus>
                    <label for="code">Enter Code</label>
                    <div class="text-end" id="code">
                      <small style="color: #dc3545" id="timer">The code will expires in <span id="codetimer"></span> second(s)</small>
                      <a href="#" id="resendcode" style="display: none"><small>Resend code?</small></a>
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold mb-2" id="submitcode">Submit Code</button>
              </div>
              
                <div id="changepass" style="display: none">
                  <h3 class="login-heading mb-4">Change Password</h3>
                  <div class="form-label-group">
                    <input type="password" name="cppwd" id="cpPassword" class="form-control" placeholder="New Password" minlength="8" required>
                    <label for="cpPassword">New password</label>
                  </div>
                  <div class="form-label-group">
                    <input type="password" name="cppwd2" id="cpPassword2" class="form-control" placeholder="Re-type New Password" minlength="8" required>
                    <label for="cpPassword2">Confirm new password</label>
                    <div class="text-start mb-2" id="changepwd">
                      
                    </div>
                   
                    <input style="margin-left: 5px" type="checkbox" id="showpass"><small style="margin-left: 5px">Show passwords</small>
                    <br> <br>
                  <button type="button" class="btn btn-lg btn-primary btn-login text-uppercase font-weight-bold mb-2" id="savepass">Save Password</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script src="assets/js/PassRequirements.js"></script>
</html>