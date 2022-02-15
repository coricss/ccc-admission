<?php 

 include('queries/insert.php');
 date_default_timezone_set('Asia/Manila');
 $syNow=date('Y');
 $syNxt=date('Y')+1;
//  include('registration/submit.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission | City College of Calamba</title>
    <link rel="shortcut icon" type=image/x-icon href=assets/imgs/logo/ccc.png>
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
   
    <link rel="stylesheet" href="assets/css/bootstrap-5.0.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/boxicons-master/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <script src="assets/js/main.js" defer></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap-notify.min.js" defer></script>
    <script src="assets/js/bootstrap.min.js" defer></script>
    <script src="assets/js/bootstrap.bundle.min.js" ></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/placeholders.js"></script>
    <script src="assets/js/aos.js" defer></script>
    <script src="assets/js/button.js"></script>
    

</head>
<body>
<div class="loading">Loading&#8230;</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="eSlbD9Uz"></script>


<div class="row">
<?php include('includes/header.php')?>
<!-- <div class="cover" onload="get"></div> -->
     <img src="assets/imgs/coverphotos/defaultcover.png" id="cover" alt="" style="width:100%;">
</div>
<?php include('includes/modal.php')?>
<div class="container">
  <div class="content">
    <!--Back to top button-->
    <a id="btn-scrolltop"><i class='bx bx-chevron-up arrowUp'></i></a>
    <div class="container head">
          <h1 class=title>ONLINE ADMISSION | CITY COLLEGE OF CALAMBA</h1>
          <p class=subtitle>Pre-Registration for Fiscal Year <?php echo $syNow.'-'.$syNxt?></p><br>
          <!-- <a href="#applicationform"> -->
            <button type="submit" class="btn btn-lg register" id="apply" name=apply style="color:white;" onclick="javascript:showForm()">
              <h4 class="applynow" style="font-weight: 700">APPLY NOW</h4>
            </button>
          <!-- </a> -->
    </div>
  </div>

    <?php if(isset($_SESSION['message'])){?>
        <?php 
               echo $_SESSION['message'];
               unset($_SESSION['message']);
           ?>
    <?php }?>
    <div id="statuscheck">

    </div>
  <!-- ACCORDION -->
  <?php include('includes/accordion.php')?>
    <!--END OF ACCORDION-->
    <div class="row">
      <img src="assets/imgs/ccc_bg_blur.jpg" alt="" class="mb-5 ccc" style="width:100%;">
    </div>
    <div class="container container-about">
      <section class="mb-5 text-white about" id=about>
        <h1 class="mb-3 text-center">City College of Calamba</h1>
        <p class="lead">
            The City College of Calamba was founded in 2006 during the administration of Calamba City Mayor Joaquin M. Chipeco, Jr. He envisioned to provide quality yet, affordable tertiary education to the financially challenged but deserving youth of Calamba through the establishment of a College funded by the City Government. Through the unflinching determination of stakeholders and the Sangguniang Panlungsod ng Calamba headed by then Vice Mayor Pursino C. Oruga, the Charter of CCC was passed on June 5, 2006, known as Ordinance No. 359 – AN ORDINANCE ESTABLISHING THE CITY COLLEGE OF CALAMBA AND FOR OTHER PURPOSES...<small><a href="https://ccc.edu.ph/application/history.php" class="links">See more</a></small>
        </p>
        <div class="row mb-5">
          <div class="col-lg m-1">
            <h2 class="text-center">Vision</h2>
            <p class="lead"> The City College of Calamba envisions itself as an accredited premiere academic institution in the region, providing quality learning opportunities to financially-challenged but deserving students in order to produce competent, conscientious, committed and compassionate global professionals.
            </p>
          </div>
       
          <div class="col-lg m-1">
            <h2 class="text-center">Mission</h2>
            <p class="lead">In pursuit of this vision, We, the faculty, staff, and students of City College of Calamba recognize our vital roles in collaboratively honing the professional by promoting social responsibility, moral uprightness, and national servitude, guided by the ideals, philosophies, and values of our national hero, Dr. Jose Rizal.
            </p>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-lg">
            <center>
            <video id="cccvideo" poster="assets/imgs/ccc_ads/thumbnail.png" width="600px" controls style="background:black">
              <source class="active_vid" src="assets/imgs/ccc_ads/Ccc_Promotional Avp_Revised_5.mp4" type="video/mp4">
              <source src="assets/imgs/ccc_ads/buti_nalang_may_ccc.mp4" type="video/mp4">
              <source src="assets/imgs/ccc_ads/Calamba_Hymn.mp4" type="video/mp4">
            </video>
            </center>
          </div>
          <div class="col-lg">
            <center>
              <a href="https://www.ccc.edu.ph" target="_blank"><img src="assets/imgs/logo/ccc.png" style="width:40%;" alt=""></a>
              <a href="https://www.facebook.com/CCCGTCDC" target="_blank"><img src="assets/imgs/logo/ccc_guidance_logo.png" style="width:40%;" alt=""></a>
            </center>
          </div>
        </div>
      </section>
    </div>
  <!--Reg Form-->
    
         
        <div class="regform" style="display: none">
            <div class="step step-1 active"><?php include('registration/personaldata.php')?></div>
            
            <div class="step step-2 "><?php include('registration/educational-bg.php')?></div>
        
            <div class="step step-3 "><?php include('registration/org-involvement.php')?></div>
          
            <div class="step step-4 "><?php include('registration/family-bg.php')?></div>
          
            <div class="step step-5 "><?php include('registration/personal-admire.php')?></div>

            <div class="step step-6 "><?php include('registration/requirements.php')?></div>
      
            <div class="step step-7 "><?php include('registration/preview.php')?></div>
        </div>
</div>     
    

  <?php include("includes/footer.php");?>
</body>

</html>