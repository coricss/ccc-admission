// $(document).ready(function(){
  var tooltipTriggerList = [].slice.call(document.querySelectorAll("[data-bs-toggle='tooltip']"))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
// })
$(document).on('click', '#toggle-admission', function(){
  if($('#btn-toggle').hasClass('bxs-toggle-right')){
    Swal.fire({
      icon: 'info',
      title: 'Are your sure to suspend the admisison?',
      width: 600,
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if(result.isConfirmed){
        $.ajax({
          url: 'queries/admissionStatus.php',
          type: 'post',
          success:function(data){
            $('.toggle-admission').html(data);
            location.reload();
          }
        })
      }
    })
  }else{
    Swal.fire({
      icon: 'info',
      title: 'Are your sure to continue the admisison?',
      width: 600,
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if(result.isConfirmed){
        $.ajax({
          url: 'queries/admissionStatus.php',
          type: 'post',
          success:function(data){
            $('.toggle-admission').html(data);
            location.reload();
          }
        })
      }
    })
  }
  
})
$('.toggle-admission').load('queries/fetchStatus.php');
//Variables
const hamburger = document.querySelector('.hamburger');
const sideNav = document.querySelector('.sidebar');
const navbar = document.querySelector('.main')

// hamburger menu side nav
hamburger.addEventListener('click', () => {
    // nav.classList.toggle('main-nav-active');
    sideNav.classList.toggle('active');
    navbar.classList.toggle('active');
})
$('#dashboardbtn').click(function(){
    $('.dashboardbtn').removeClass('active');
    $(this).addClass('active');      
});
  
    const customSwalBtn = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-danger',
          
        },
        buttonsStyling: true
      })

$('.logout').click(function(e){
  e.preventDefault();
  
  Swal.fire({
      title: 'Are you sure to log out?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        var id=$(this).attr('data-id');
          $.ajax({
            type: 'POST',
            url: 'queries/logout.php',
            data: {id:id},
            success:function(data){
              location.href="index.php";
            }
          })
      }
  })
});
$(document).ready(function(){
(function () {
  'use strict'
  var forms = document.querySelectorAll('#adminForm')
  var form2 = document.querySelectorAll('#updatepwd')
  var form3 = document.querySelectorAll('#edit-admin')

          Array.prototype.slice.call(forms)
          .forEach(function (form) {
            $('#btn-addAdmin').click(function(event){
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                imgFormatAdmin()
                newPass()
                confirmPass()
              }else if(imgFormatAdmin()){
                
              }else if(newPass()){

              }else if(confirmPass()){

              }else{
                $('#btn-addAdmin').prop("type", "submit");
              }
              form.classList.add('was-validated')
            })
          })

          Array.prototype.slice.call(form2)
          .forEach(function (form) {
            $('#updatepass').click(function(event){
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                newPwd()
              }else if(newPwd()){
                $('#updatepass').prop("type", "button");
              }else{
                $('#updatepass').prop("type", "submit");
              }
              form.classList.add('was-validated')
            })
          })
          Array.prototype.slice.call(form3)
          .forEach(function (form) {
            $('#savedetails').click(function(event){
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }else{
                var admin_name = $('div.name').html();
                
                (async () => {

                  const {value: pwd} = await Swal.fire({
                      icon: 'question',
                      title: 'Is that really you '+admin_name+'?',
                      input: 'password',
                      inputPlaceholder: 'Enter your password',
                      confirmButtonColor: '#0d6efd',
                      confirmButtonText: 'Submit',
                      showCloseButton: true,
                      inputValidator: (value) => {
                          return new Promise((resolve) => {
                              if (value !== '') {
                                  resolve()
                              } else {
                                  resolve('Please verify by typing your password.')
                              }
                          })
                      },
                      allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                      }
                  })
                    if (pwd) {
                      var admin_fname = $('#admin_fname').val();
                      var admin_lname = $('#admin_lname').val();
                      var admin_email = $('#admin_email').val();
                      var admin_contact =$('#admin_contact').val();
                      var admin_address = $('#admin_address').val();

                        $.ajax({
                          url: 'queries/editDetails.php',
                          type: 'post',
                          data: {pwd:pwd, admin_fname:admin_fname, admin_lname:admin_lname, admin_email:admin_email, admin_contact:admin_contact, admin_address:admin_address},
                          success: function(data){
                            $('#details').html(data);
                          }
                        })
                    }
                  })()
                  
                  // $('#savedetails').prop("type", "submit");
              }
              form.classList.add('was-validated')
            })
          })
  
})()

function imgFormatAdmin(){
  var fileExt = ['jpg', 'png', 'gif'];
  // var imgsize = $('#profileImage')[0].files[0].size;
  if($('#profileImageAdmin').val()==""){
    return false;
  }else{
    if($.inArray($('#profileImageAdmin').val().split('.').pop().toLowerCase(), fileExt) == -1){
      
              Swal.fire({
                  title: 'Photo must be in .JPG or .PNG',
                  text: 'Please upload valid image format!',
                  icon: 'error',
                  showConfirmButton: false,
                  timer: 2000,
                  allowOutsideClick: () => {
                  const popup = Swal.getPopup()
                  popup.classList.remove('swal2-show')
                  setTimeout(() => {
                      popup.classList.add('animate__animated', 'animate__headShake')
                  })
                  setTimeout(() => {
                      popup.classList.remove('animate__animated', 'animate__headShake')
                  }, 500)
                  return false
                  }
              });
      $('#profileImageAdmin').reset();
      return true;
    }
    else{
      return false;
    }
  }
}
  $('#newpwd').PassRequirements();
  $('#newpass').PassRequirements();
    function newPwd(){
      var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#_\$%\^&\*])(?=.{8,})");
      var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
      var pass = $('#newpass').val();

      if(strongRegex.test(pass)==true){
        return false;
      }else if(mediumRegex.test(pass)==true){
        return true;
      }else if(pass!=""){
        return true;
      }else{
        return true;
      }
    }
    function newPass(){
      var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#_\$%\^&\*])(?=.{8,})");
      var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
      var pass = $('#newpwd').val();
      
      if(strongRegex.test(pass)==true){
        return false;
      }else if(mediumRegex.test(pass)==true){
        Swal.fire({
          icon: 'error',
          title: 'Weak Password',
          text: 'Please complete password requirements.',
          showConfirmButton: false,
                  timer: 2000,
                  allowOutsideClick: () => {
                  const popup = Swal.getPopup()
                  popup.classList.remove('swal2-show')
                  setTimeout(() => {
                      popup.classList.add('animate__animated', 'animate__headShake')
                  })
                  setTimeout(() => {
                      popup.classList.remove('animate__animated', 'animate__headShake')
                  }, 500)
                  return false
                  }
        })
        return true;
      }else if(pass!=""){
        Swal.fire({
          icon: 'error',
          title: 'Very Weak Password',
          text: 'Please complete password requirements.',
          showConfirmButton: false,
                  timer: 2000,
                  allowOutsideClick: () => {
                  const popup = Swal.getPopup()
                  popup.classList.remove('swal2-show')
                  setTimeout(() => {
                      popup.classList.add('animate__animated', 'animate__headShake')
                  })
                  setTimeout(() => {
                      popup.classList.remove('animate__animated', 'animate__headShake')
                  }, 500)
                  return false
                  }
        })
        return true;
      }else{
        return true;
      }
    }
    function confirmPass(){
      if($('#newpwd').val()!=$('#confirmpwd').val()){
        Swal.fire({
          icon: 'error',
          title: 'Passwords Do Not Match',
          text: 'Please confirm password and try again.',
          showConfirmButton: false,
                  timer: 2000,
                  allowOutsideClick: () => {
                  const popup = Swal.getPopup()
                  popup.classList.remove('swal2-show')
                  setTimeout(() => {
                      popup.classList.add('animate__animated', 'animate__headShake')
                  })
                  setTimeout(() => {
                      popup.classList.remove('animate__animated', 'animate__headShake')
                  }, 500)
                  return false
                  }
        })
        return true;
      }else{
        return false;
      }
    }
    
  $('#newpass').keyup(function(){
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#_\$%\^&\*])(?=.{8,})");
    var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    var pass = $(this).val();

    if(strongRegex.test(pass)==true){
      $('#chpass').html("<small style='color: #28a745'>Strong password</small>");
    }else if(mediumRegex.test(pass)==true){
      $('#chpass').html("<small style='color: #dc3545'>Weak password</small>");
    }else if(pass!=""){
      $('#chpass').html("<small style='color: #dc3545'>Very weak password</small>");
    }else{
      $('#chpass').html("<small style=''></small>");
    }
  })

  $('#newpwd').keyup(function(){

    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#_\$%\^&\*])(?=.{8,})");
    var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    var pass = $('#newpwd').val();
    
    if(strongRegex.test(pass)==true){
      $('#passres').html("Strong password");
      $('#passres').css('color', '#28a745');
    }else if(mediumRegex.test(pass)==true){
      $('#passres').html("Weak password");
      $('#passres').css('color', '#dc3545');
    }else if(pass!=""){
      $('#passres').html("Very weak password");
      $('#passres').css('color', '#dc3545');
    }else{
      $('#passres').html("");
      $('#passres').css('color', '');
    }
  })

  $('#confirmpwd').keyup(function(){
    if($('#newpwd').val()==""){
      $('#passres').html("Enter new password");
      $('#passres').css('color', '#dc3545');
    }else if($('#confirmpwd').val()==""){
      $('#passres').html("");
      $('#passres').css('color', '');
    }else if($('#newpwd').val()!=$('#confirmpwd').val()){
      $('#passres').html("Those passwords didn't match. Try again.");
      $('#passres').css('color', '#dc3545');
    }else{
      $('#passres').html("");
      $('#passres').css('color', '');
    }
  })


  $('#showPass').click(function(){
    var pwd1 = document.getElementById("newpwd");
    var pwd2 = document.getElementById("confirmpwd");
    if (pwd1.type === "password"&&pwd2.type === "password") {
      pwd1.type = "text";
      pwd2.type = "text";
    } else {
      pwd1.type = "password";
      pwd2.type = "password";
    }
  });
})

function getFullscreenElement() {
  return document.fullscreenElement
      || document.webkitFullscreenElement
      || document.mozFullscreenElement
      || document.msFullscreenElement;
}

function toggleFullscreen() {
  if (getFullscreenElement()) {
      document.exitFullscreen();
      $('#fullscreen').removeClass("bx bx-exit-fullscreen");
      $('#fullscreen').addClass("bx bx-fullscreen");
      $('#fullscreen').attr("data-bs-original-title", "Fullscreen");
   } else {
    $('#fullscreen').removeClass("bx bx-fullscreen");
    $('#fullscreen').addClass("bx bx-exit-fullscreen");
    $('#fullscreen').attr("data-bs-original-title", "Exit fullscreen");
      document.documentElement.requestFullscreen().catch((e) =>{
          console.log(e);
      });
    }
}

$('#fullscreen').click(function(){
  toggleFullscreen()

})

$('#fnameAdmin, #lnameAdmin').keyup(function(){
  var fname = $('#fnameAdmin').val();
  var lname = $('#lnameAdmin').val();
  $.ajax({
    url: 'queries/adminNameCheck.php',
    type: 'POST',
    data: {fname:fname, lname:lname},
    success:function(data){
      $('#adminNameFeedback').html(data);
    }
  })
})

$('#emailAdmin').keyup(function(){
  var email = $('#emailAdmin').val();
  $.ajax({
    url: 'queries/adminEmailCheck.php',
    type: 'POST',
    data: {email:email},
    success:function(data){
      $('#adminEmailFeedback').html(data);
    }
  })
})

$(document).mousemove(function(){
  var timeStamp=new Date();
  sessionStorage.setItem("lastTimeStamp", timeStamp);
})

// timeChecker();

function timeChecker(){
  timer=setInterval(function(){
    var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
    timeCompare(storedTimeStamp);
  }, 1000);
}

function timeCompare(timeString){
  var currentTime = new Date();
  var pastTime    = new Date(timeString);
  var timeDiff    = currentTime - pastTime;
  var minPast     = Math.floor((timeDiff/300000));

  console.log(minPast);
  if(minPast>1){
    var id=$('.logout').attr('data-id');
    $.ajax({
      url: 'queries/autologout.php',
      type: 'POST',
      data: {id:id},
      success:function(result){
        if(result){
          clearInterval(timer);
          Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Session Timeout',
            text: 'You are being timed-out due to inactivity.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK',
            timer: 10000,
            allowOutsideClick: () => {
              const popup = Swal.getPopup()
              popup.classList.remove('swal2-show')
              setTimeout(() => {
              popup.classList.add('animate__animated', 'animate__headShake')
              })
              setTimeout(() => {
              popup.classList.remove('animate__animated', 'animate__headShake')
              }, 500)
              return false
            }
          }).then((result)=>{
            if(result.isConfirmed){
              location.reload();
            }else{
              location.reload();
            }
          })
        }
      }
    });
    sessionStorage.removeItem("lastTimeStamp");
  }else{
   
  }
}

$(document).ready(function(){
  fetch_verify();
  function fetch_verify(){
    $.ajax({
      url: "queries/verification.php",
      success:function(data){
        $('#studDataa').html(data);
      }
    })
  }
  //Verify
  $(document).on('click', '.verify', function(e){
    e.preventDefault();
    var id = $(this).data("id");
    var email=$(this).attr("data-email");
    var fname=$(this).attr("data-fname");
    var lname=$(this).attr("data-lname");
    // alert(fname+" " +lname);
    Swal.fire({
        title: 'Confirm Student?',
        text: "This record will be verified.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type : "post",
                url : "queries/verify.php",
                dataType : "json",  
                data : {id:id, email:email, fname:fname, lname:lname},
                cache : false,
                success: function(data){
                    if(data.res == "success"){
                        // customSwalBtn.fire({
                        //     title: 'Confirmation Done!',
                        //     text: 'The student has been verified.',
                        //     icon: 'success',
                        //     confirmButtonColor: '#0d6efd'
                        // }).then((result)=>{
                        //     // if(result.isConfirmed){
                              location.reload();
                              $('#studVerify').load(document.URL +  ' #studVerify');
                              $('#search_text').load($('#search_text').val(""));
                            // }
                        // });
                      $('#widgetData').load(document.URL +  ' #widgetData');
                    }
                },
                error : function(xhr, ErrorStatus, error){
                    console.log(status.error);
                  }
            });
          }
        })
    });
//Decline
$(document).on('click', '.decline', function(e){
  e.preventDefault();
  var id = $(this).data("id");
  var email=$(this).attr("data-email");
  var fname=$(this).attr("data-fname");
  var lname=$(this).attr("data-lname");
  Swal.fire({
      title: 'Decline Student?',
      text: "This record will be declined.",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type : "post",
              url : "queries/decline.php",
              dataType : "json",  
              data : {id:id, email:email, fname:fname, lname:lname},
              cache : false,
              success: function(data){
                  if(data.res == "success"){
                      // customSwalBtn.fire({
                      //     title:'Successfully Declined!',
                      //     text: 'The student has been declined.',
                      //     icon: 'success',
                      //     confirmButtonColor: '#0d6efd'
                      // }).then((result)=>{
                          // if(result.isConfirmed){
                            location.reload();
                            $('#studVerify').load(document.URL +  ' #studVerify');
                            $('#search_text').load($('#search_text').val(""));
                      //     }
                      // });
                      $('#widgetData').load(document.URL +  ' #widgetData');
                  }
              },
              error : function(xhr, ErrorStatus, error){
                  console.log(status.error);
                }
          });
        }
      })
  return false;
});
$('.sort').css('color','#6c757d');
	$('.sort').change(function() {
	var current = $('.sort').val();
	if (current != 'null') {
		$('.sort').css('color','black');
	} else {
		$('.sort').css('color','#6c757d');
	}
	});  
$(document).on('click', '#refresh', function(e){
  e.preventDefault();
  location.reload();
});
$(document).on('change', '#sortAdmin', function(e){
  e.preventDefault();
  var column_name=$(this).val();
  $.ajax({
    url: 'queries/sortAdmin.php',
    method: 'post',
    data: {column_name:column_name},
    success:function(data){
      $('#tblAdmin').html(data);
    }
  })
})
$(document).on('change', '#sort', function(e){
  e.preventDefault();
  var column_name=$(this).val();
  $.ajax({
    url: 'queries/sortverify.php',
    method: 'post',
    data: {column_name:column_name},
    success:function(data){
      $('#studVerify').html(data);
    }
  })
})
$(document).on('change', '#sortoverview', function(e){
  e.preventDefault();
  var column_name=$(this).val();
  $.ajax({
    url: 'queries/sortoverview.php',
    method: 'post',
    data: {column_name:column_name},
    success:function(data){
      $('#studData').html(data);
    }
  })
})

$('#search_admin').keyup(function(e){
  e.preventDefault();
  var search = $(this).val();
  $.ajax({
    url: "queries/searchAdmin.php",
    method: "POST",
    data: {admin:search},
    success:function(data){
      $('#tblAdmin').html(data);
    }
  })
})

$('#search_ver').keyup(function(e){
  e.preventDefault();
  var search = $(this).val();
  $.ajax({
    url: "queries/searchVerify.php",
    method: "POST",
    data: {studer:search},
    success:function(data){
      $('#studVerify').html(data);
    }
  })
})
});
  
$('#search_reg').keyup(function(e){
  e.preventDefault();
  var search = $(this).val();
  $.ajax({
    url: "queries/search.php",
    method: "POST",
    data: {query:search},
    success:function(data){
      $('#studData').html(data);
    }
  })
})
//FETCH RESULT
$(document).ready(function(){
  fetch_data(); 
  function fetch_data(){
    $.ajax({
      url: "queries/fetchResults.php",
      success:function(data){
        $('#result').html(data);
      }
    });
  }
});
 //SEARCH RESULT
 $('#search_result').keyup(function(e){
   e.preventDefault();
  var searchkey = $(this).val();
  $.ajax({
    url: 'queries/searchResult.php',
    method: 'POST',
    data: {searchkey:searchkey},
    success:function(data){
      $('#results').html(data); 
    }
  })
});

$('#search_resultArchive').keyup(function(e){
  e.preventDefault();
 var searchkey = $(this).val();
 $.ajax({
   url: 'queries/searchresultArchive.php',
   method: 'POST',
   data: {searchkey:searchkey},
   success:function(data){
     $('#tbl-results-archive').html(data); 
   }
 })
});
//SORT RESULT
$(document).on('change', '#sortresult', function(e){
  e.preventDefault();
  var column_name=$(this).val();
  $.ajax({
    url: 'queries/sortresult.php',
    method: 'post',
    data: {column_name:column_name},
    success:function(data){
      $('#results').html(data);
    }
  })
})
function notif(){
  $('.notif-body').each(function() { 
    var countNotif = $(this).children('.notif-link.new').length;
    if(countNotif>=99){
      var count = 99;
      $('#notif-count').show();
      $('.bxs-bell').addClass('bx-tada');
    }else if(countNotif>=1){
      var count = countNotif;
      $('#notif-count').show();
      $('.bxs-bell').addClass('bx-tada');
    }else{
      var count = 0;
      $('#notif-count').hide();
      $('.bxs-bell').removeClass('bx-tada');
    }
    $("#count-notif").text(count);
  });
}

function notifMsg(){
  $('.msg-body').each(function() { 
    var countNotif = $(this).children('.msg-link.new').length;
    if(countNotif>=99){
      var count = 99;
      $('#msg-count').show();
      $('.bxs-message-rounded').addClass('bx-tada');
    }else if(countNotif>=1){
      var count = countNotif;
      $('#msg-count').show();
      $('.bxs-message-rounded').addClass('bx-tada');
    }else{
      var count =0;
      $('#msg-count').hide();
      $('.bxs-message-rounded').removeClass('bx-tada');
    }
    $("#count-msg").text(count);
  });
}
//ADD NOTIF
// var notifs = parseInt($("#count-notif").html());
// var msg = parseInt($("#count-msg").html());
// var ct = notifs+msg;

// document.title ="("+ct+") " + document.title;

var mouse_is_inside = false;

$(document).ready(function()
{
    $('#notification-container, #msg-container').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    });

    $('#main, .sidebar').mouseup(function(){ 
        if(! mouse_is_inside) $('#notification-container').hide();
        if(! mouse_is_inside) $('#msg-container').hide();
        $('.bxs-bell').removeClass('active');
        $('.bxs-message-rounded').removeClass('active');
    });
});

function StopConsoleText() {
  console.log("%cYAMETE KUDASAI!", "color: red; font-family: sans-serif; font-size: 4.5em; font-weight: bolder; text-shadow: #000 1px 1px;")
}
StopConsoleText()

$(document).ready(function(){
  $('#dataa').load('queries/overview.php');
  $('#studDataa').load('queries/verification.php');
  $('#result').load('queries/fetchResults.php');
  $('#activity').load('queries/logs.php');
  $('#feedback-drawer').load('queries/fetchFeedbacks.php');
  $('.rank-list').load('queries/fetchRanks.php');
  $('#tbladmin-body').load('queries/fetchAdmin.php');
  $('#notif-body').load('queries/fetchNotif.php');
  $('#msg-body').load('queries/fetchNotifMsg.php');
  $('#stud-archives').load('queries/studentArchive.php');
  $('#result-archive').load('queries/resultArchive.php');
  notif()
  notifMsg()
  setInterval(function(){
    //  $('#dataa').load('queries/overview.php');
    //  $('#studDataa').load('queries/verification.php');
    //  $('#result').load('queries/fetchResults.php');
    //  $('#activity').load('queries/logs.php');
    //  $('.rank-list').load('queries/fetchRanks.php');
    //  $('#tbladmin-body').load('queries/fetchAdmin.php');
    //  $('#notif-body').load('queries/fetchNotif.php');
    //  $('#msg-body').load('queries/fetchNotifMsg.php');
     notif()
     notifMsg()
  }, 1000);
 
})
$('#refresh-FB').click(function(){
  $('#feedback-drawer').load('queries/fetchFeedbacks.php');
})
$(document).on('click', '#btn-studentFB', function(e){
  e.preventDefault();
  // clearInterval(updateFB);
  var sender=$(this).attr("sender");
  var fbID= $(this).attr("feedback-id");
  
  // var x = $('#sender-'+feedID).html();

  $('.friend-drawer.active').removeClass("active");
  $('#'+fbID).addClass("active");
 
  if(sender!="Anonymous"){
    $('#txt-reply').val("");
    $('#txt-reply').prop('disabled', false);
    $('#btn-sendEmail').prop('disabled', false);
  }else{
    $('#txt-reply').val("");
    $('#txt-reply').prop('disabled', true);
    $('#btn-sendEmail').prop('disabled', true);
  }

  $.ajax({
    url: 'queries/fetchMessages.php',
    method: 'post',
    data: {sender:sender},
    success:function(data){
      $('#studfeedback').html(data);
    }
  }) 
 
})

$('#notif').click(function(e){
  e.preventDefault();
  $('#notification-container').toggle(200);
  if($('#msg-container').is(":visible"))
      $('#msg-container').hide();
  if($(this).hasClass('active')){
    $(this).removeClass('active');
  }else{
    $(this).addClass('active');
  }
  if($('#msg').hasClass('active')){
    $('#msg').removeClass('active');
  }
});

$('#msg').click(function(e){
  e.preventDefault();
  $('#msg-container').toggle(200);
  if($('#notification-container').is(":visible")){
      $('#notification-container').hide();
  }
  if($(this).hasClass('active')){
    $(this).removeClass('active');
  }else{
    $(this).addClass('active');
  }
  if($('#notif').hasClass('active')){
    $('#notif').removeClass('active');
  }
});


$('#dismiss-notif').click(function(){
  $('#notification-container').hide();
  $('#notif').removeClass('active');
})
$('#dismiss-msg').click(function(){
  $('#msg-container').hide();
  $('#msg').removeClass('active');
})

// $("#count-notif").text("1");
function loadFB(){
  $('#feedback-drawer').load('queries/fetchFeedbacks.php');
}
// var updateFB=setInterval('loadFB()', 1000);

$(document).on('click', '#btn-sendEmail', function(){
  var email=$('#stud-email').attr('data-email');
  var message=$('#txt-reply').val();
  var student=$('.feedback-title').html();
  if(message!=""){
    $.ajax({
      url: 'queries/emailFeedback.php',
      method: 'post',
      data: {email:email, message:message, student:student},
      success:function(data){
        $('#emailNotif').html(data);
      }
    })
  }
})

$('.addStudent').click(function(){
  $('#main-card').hide();
  $('#addStud').show();
})
$('.btn-add-admin').click(function(){
  $('.admincard').hide();
  $('.add-admincard').show();
})
$('#goback').click(function(){
  $('#addStud').hide();
  $('#main-card').show();
})
$('#goback-admin').click(function(){
  $('.admincard').show();
  $('.add-admincard').hide();
})
$('#goback2').click(function(){
  $('#editStud').hide();
  $('#main-card').show();
})
$(document).on('click', "#print-students", function(){
  $("#actions").hide();
  $("td.actions").hide();
  printJS('studData', 'html')
  $("#actions").show();
  $("td.actions").show();
})
$(document).on('click', "#print-results", function(){
  $("#actions").hide();
  $("td.actions").hide();
  printJS('results', 'html')
  $("#actions").show();
  $("td.actions").show();
})
$(document).on('click', "#print-studentsArchive", function(){
  $("#actions").hide();
  $("td.actions").hide();
  printJS('tbl-stud-archive', 'html')
  $("#actions").show();
  $("td.actions").show();
})
$(document).on('click', "#print-resultsArchive", function(){
  $("#actions-results").hide();
  $("td.actions").hide();
  printJS('tbl-results-archive', 'html')
  $("#actions-results").show();
  $("td.actions").show();
})

$(document).ready(function(){
  $("#home-tab").addClass("active");
  $("#home").addClass("active");
  $('button[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('archive-tab', $(this).attr('id'));
  });

  var activeTab = localStorage.getItem('archive-tab');
  if(activeTab){
    $('#myTab button[id="' + activeTab + '"]').tab('show');
  }
})

$('#print-admin').click(function(){
  $('#admin-table').printThis();
})
// $('#export-pending').click(function(){
//   $.ajax({
//     url: 'queries/export-pending.php',
//     method: 'post',
//     success:function(data){
//       alert();
//     }
//   })
// })
$(document).on('click', '.stud-del',function(e){
  e.preventDefault();
  var id = $(this).attr('data-id');
  Swal.fire({
    icon: 'warning',
    title: 'Delete this record permanently?',
    showCancelButton: true,
    confirmButtonColor: '#0d6efd',
    cancelButtonColor: '#dc3545',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        url: 'queries/deleteStud.php',
        type: 'post',
        data: {id:id},
        success:function(data){
          location.reload();
        }
      })
    }
  })
})
$('.delStud').click(function(){
  if($('#nodata-stud').attr('data-id')==0){

  }else{
    Swal.fire({
      icon: 'warning',
      title: 'Delete all records in student archive?',
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result)=>{
      if(result.isConfirmed){
        $.ajax({
          url: 'queries/deleteAllStud.php',
          type: 'post',
          success:function(data){
            location.reload();
          }
        })
      }
    })
  }
})
$('.delStud2').click(function(){
  if($('#nodata-stud').attr('data-id')==0){

  }else{
    Swal.fire({
      icon: 'warning',
      title: 'Delete all records in student archive?',
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result)=>{
      if(result.isConfirmed){
        $.ajax({
          url: 'queries/deleteAllStud.php',
          type: 'post',
          success:function(data){
            location.reload();
          }
        })
      }
    })
  }
})
$(document).on('click', '.result-del',function(e){
  e.preventDefault();
  var id = $(this).attr('data-id');
  Swal.fire({
    icon: 'warning',
    title: 'Delete this record permanently?',
    showCancelButton: true,
    confirmButtonColor: '#0d6efd',
    cancelButtonColor: '#dc3545',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        url: 'queries/deleteResult.php',
        type: 'post',
        data: {id:id},
        success:function(data){
          location.reload();
        }
      })
    }
  })
})
$('.delRes').click(function(){
  if($('#nodata-res').attr('data-id')==0){

  }else{
    Swal.fire({
      icon: 'warning',
      title: 'Delete all records in result archive?',
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result)=>{
      if(result.isConfirmed){
        $.ajax({
          url: 'queries/deleteAllResult.php',
          type: 'post',
          success:function(data){
            location.reload();
          }
        })
      }
    })
  }
})
$('.delRes2').click(function(){
  if($('#nodata-res').attr('data-id')==0){

  }else{
    Swal.fire({
      icon: 'warning',
      title: 'Delete all records in result archive?',
      showCancelButton: true,
      confirmButtonColor: '#0d6efd',
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result)=>{
      if(result.isConfirmed){
        $.ajax({
          url: 'queries/deleteAllResult.php',
          type: 'post',
          success:function(data){
            location.reload();
          }
        })
      }
    })
  }
})
$(document).on('keyup', '#search_studArchive', function(e){
  e.preventDefault();
  var search = $(this).val();
  $.ajax({
    url: 'queries/searchStudArchive.php',
    type: 'post',
    data: {searchver:search},
    success:function(data){
      $('#tbl-stud-archive').html(data);
    }
  })
})
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
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
  });
}
$(document).on('click', '#btn-view', function(e){
  e.preventDefault();
  var id = $(this).attr("data-id");
  $("#modal-overview-"+id).show();
})
$(document).on('click', '#btn-view-results', function(e){
  e.preventDefault();
  var id = $(this).attr("data-id");
  $("#modal-results-"+id).show();
})
$(document).on('click', '#editstudent', function(e){
  e.preventDefault();
   var id = $(this).attr("data-id");
    $.ajax({
      url: 'queries/editStudent.php',
      method: 'post',
      data: {id:id},
      success: function(data){
        $('#displayEditForm').html(data);
      }
    })
   $('#main-card').hide();
  $('#editStud').show();
 });
 
setInputFilter(document.getElementById("admin_contact"), function(value) {
  return /^-?\d*$/.test(value); });
//
$(document).on('submit', '#updatepwd', function(e){
  e.preventDefault();
  // alert();
  $.post("queries/updatepass.php", $(this).serialize(), function(data){
    $('#chpass').html(data);
  })
})

$('#showpass2').click(function(){
  var pwd1 = document.getElementById("currentpass");
  var pwd2 = document.getElementById("newpass");
  var pwd3 = document.getElementById("confirmpass");
  if (pwd1.type === "password"&&pwd2.type === "password"&&pwd3.type === "password") {
    pwd1.type = "text";
    pwd2.type = "text";
    pwd3.type = "text";
  } else {
    pwd1.type = "password";
    pwd2.type = "password";
    pwd3.type = "password";
  }
});


function adminPic(e) {
  document.querySelector('#profileImg').click();
}
$('#profileImg').change(function(){
 $("#upload").click();
})



function triggerClick(e) {
	document.querySelector('#profileImage').click();
	}
	function displayImage(e) {
	if (e.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){
		document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
		}
	}
  
  function triggerClick2(e) {
    document.querySelector('#profileImage2').click();
    }
    function displayImage2(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
      document.querySelector('#profileDisplay2').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
      }
    }

    function triggerClickAdmin(e) {
      document.querySelector('#profileImageAdmin').click();
      }
      function displayImageAdmin(e) {
      if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
        document.querySelector('#profileDisplayAdmin').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        }
      }

      



 
