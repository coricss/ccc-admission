
//LOADER FUNCTION
$(window).on('load', function () {
    $('.loading').delay(1000).fadeOut(function(){$(this).remove()});
  }) 

  function onlyNumberKey(evt) { 
              
	// Only ASCII charactar in that range allowed 
	var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
	if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
	return false; 
	return true;
}
var mouse_is_inside = false;

$(document).ready(function()
{
	$('#sidenav').hover(function(){ 
		mouse_is_inside=true; 
	}, function(){ 
		mouse_is_inside=false; 
	});

	$('body:not(#sidenav)').mouseup(function(){ 
		if(! mouse_is_inside) {
		$('#sidenav').removeClass('active');
		}
	});
});
// back to top button
let btn = $('#btn-scrolltop');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});
// var age = $("#age").val();
// var date = $("#bday").val();
// var year = 2022-age;
// $('#age').change(function(){

// 	var current = $('#age').val();
// 	if (current != 'null') {
// 		$('#age').css('color','black');
// 		$('#bday').prop("disabled", false);
// 	} else {
// 		$('#age').css('color','#6c757d');
// 		$('#bday').prop("disabled", true);
// 	}

// 	$('#bday').val("");
// 	var age = $('#age').val();
// 	var currentYear = (new Date).getFullYear();
// 	var birthyear = currentYear-age;
// 	$('#bday').attr("min", birthyear+"-01-01");
// 	$('#bday').attr("max", birthyear+"-12-31");

// })
maxDate();
function maxDate(){
	var currentYear = (new Date).getFullYear();
	var maxYear= currentYear-18;

	$("#bday").attr("max", maxYear+"-12-31");
}
$("#bday").change(function(){
	var day1 = new Date($("#bday").val()); 
	var day2 = new Date();

	var difference= Math.abs(day2-day1);
	days = difference/(1000 * 3600 * 24)

	$("#age").val(Math.trunc(days/365));
})

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});

//Vid auto nxt
var myvid = document.getElementById('cccvideo');

myvid.addEventListener('ended', function() {
  // get the active source and the next video source.
  // I set it so if there's no next, it loops to the first one
  var activesource = document.querySelector("#cccvideo source.active_vid");
  var nextsource = document.querySelector("#cccvideo source.active_vid + source") || document.querySelector("#cccvideo source:first-child");
  
  // deactivate current source, and activate next one
  activesource.className = "";
  nextsource.className = "active_vid";
  
  // update the video source and play
  myvid.src = nextsource.src;
  myvid.play();
});

//ON LOAD RANDOM COVER PHOTO
  window.onload = choosePic;

  var imageURLs = new Array("assets/imgs/coverphotos/admission_dark 2.png", "assets/imgs/coverphotos/alcucoa.png", "assets/imgs/coverphotos/cccbg.png", "assets/imgs/coverphotos/profs.png", "assets/imgs/coverphotos/sirnick.png", "assets/imgs/coverphotos/kalanbanga.png", "assets/imgs/coverphotos/comlab.png", "assets/imgs/coverphotos/ccc.png", "assets/imgs/coverphotos/ched.png");

  function choosePic() {
	var randomNum = Math.floor(Math.random() * imageURLs.length);
	document.getElementById("cover").src = imageURLs[randomNum];
  }
//HAMBURGER VARIABLES
const hamburger = document.querySelector('.hamburger');
const bar1 = document.querySelector('.bar1');
const bar2 = document.querySelector('.bar2');
const bar3 = document.querySelector('.bar3');
const sideNav = document.querySelector('.side-nav');
const wrapper = document.querySelector('.wrapper');
const navbar = document.querySelector('.main-nav')

  hamburger.addEventListener('click', () => {
    // nav.classList.toggle('main-nav-active');
    sideNav.classList.toggle('active');
    wrapper.classList.toggle('active');
})

function closeNav() {
	sideNav.classList.toggle('active');
    wrapper.classList.toggle('active');
	document.getElementById("sidenav").style.width = "0";
  }

const sideLinks = document.getElementsByClassName("side-link");;

for (let i = 0; i < sideLinks.length; i++) {
    sideLinks[i].addEventListener("click", function() {
        let current = document.getElementsByClassName("side-link active");

        // If there's no active class
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" active", "");
        }

        // Add the active class to the current/clicked button
        this.className += " active";
    });
}

const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");
accordionItemHeaders.forEach(accordionItemHeader =>{
	accordionItemHeader.addEventListener("click", event =>{
		accordionItemHeader.classList.toggle("active");
		accordionItemHeader.scrollIntoView({block: 'start',});
		const accordionItemBody = accordionItemHeader.nextElementSibling;
		if(accordionItemHeader.classList.contains("active")){
			accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
			
		}
		else{
			accordionItemBody.style.maxHeight = 0;
		}
	});
});

$('#tvc_name, #tvc_address, #tvc_dgrad, #tvc_course').keyup(function(){
	if($(this).val()!=""){
		$('#tvc_name, #tvc_address, #tvc_dgrad, #tvc_course').prop('required', true);
	}else{
		$('#tvc_name, #tvc_address, #tvc_dgrad, #tvc_course').prop('required', false);
	}
})

$('#tvc_dgrad').change(function(){
	if($(this).val()!=""){
		$('#tvc_name, #tvc_address, #tvc_dgrad, #tvc_course').prop('required', true);
	}else{
		$('#tvc_name, #tvc_address, #tvc_dgrad, #tvc_course').prop('required', false);
	}
})
$('#als_cert').change(function(){
	if($(this).val()!=""){
		$('#als_name, #als_address, #als_cert').prop('required', true);
	}else if($('#als_name').val()!=""||$('#als_address').val()!=""||$('#als_cert').val()!=""){
		$('#als_name, #als_address, #als_cert').prop('required', true);
	}else{
		$('#als_name, #als_address, #als_cert').prop('required', false);
	}
})
$('#als_name, #als_address').keyup(function(){
	if($(this).val()!=""){
		$('#als_name, #als_address, #als_cert').prop('required', true);
	}else if($('#als_name').val()!=""||$('#als_address').val()!=""||$('#als_cert').val()!=""){
		$('#als_name, #als_address, #als_cert').prop('required', true);
	}else{
		$('#als_name, #als_address, #als_cert').prop('required', false);
	}
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

	function yesnoCheck() {
		if (document.getElementById('calambares').value=="Yes") {
			document.getElementById('calambaresyes').style.display= 'block';
			document.getElementById('calambaresno').style.display = 'none';
			document.getElementById('pre_city').value = 'Calamba';
			document.getElementById('pre_zip').value = '4027';
			document.getElementById('yrs_calamba').disabled= false;
			$('#pre_city').prop("readonly", true);
			$('#pre_zip').prop("readonly", true);
			$("#pre_brgy1").prop('required',true);
			$("#pre_brgy2").prop('required',false);
			$(".yrs_calamba").prop('required',true);
		}
		else if (document.getElementById('calambares').value=="No") {
			document.getElementById('calambaresno').style.display = 'block';
			document.getElementById('calambaresyes').style.display = 'none';
			document.getElementById('pre_city').value = '';
			document.getElementById('pre_zip').value = '';
			$('#pre_city').prop("readonly", false);
			$('#pre_zip').prop("readonly", false);
			document.getElementById('yrs_calamba').disabled = true;
			$("#pre_brgy1").prop('required',false);
			$("#pre_brgy2").prop('required',true);
			$(".yrs_calamba").prop('required',false);
		}
		else{
			document.getElementById('calambaresno').style.display = 'block';
		}
	
	}

	function StopConsoleText() {
		console.log("%cYAMETE KUDASAI!", "color: red; font-family: sans-serif; font-size: 4.5em; font-weight: bolder; text-shadow: #000 1px 1px;")
	}
	StopConsoleText()
	function Fill(){
		if(document.getElementById('calambares').value=="Yes"){
			if(document.getElementById('filladdress').checked){
				document.getElementById('per_houseno').value = document.getElementById('pre_houseno').value;
				document.getElementById('per_city').value = document.getElementById('pre_city').value;
				document.getElementById('per_zip').value = document.getElementById('pre_zip').value;
			
				var e = document.getElementById("pre_brgy1");
				var val = e.options[e.selectedIndex].value;
				document.getElementById("per_brgy").value = val;
			}
			else{
				document.getElementById('per_houseno').value = "";
				document.getElementById('per_brgy').value = "";
				document.getElementById('per_city').value = "";
				document.getElementById('per_zip').value = "";
			}
		}
		else{
			if(document.getElementById('filladdress').checked){
				document.getElementById('per_houseno').value = document.getElementById('pre_houseno').value;
				document.getElementById('per_brgy').value = document.getElementById('pre_brgy2').value;
				document.getElementById('per_city').value = document.getElementById('pre_city').value;
				document.getElementById('per_zip').value = document.getElementById('pre_zip').value;	
			}
			else{
				document.getElementById('per_houseno').value = "";
				document.getElementById('per_brgy').value = "";
				document.getElementById('per_city').value = "";
				document.getElementById('per_zip').value = "";
			}
		}
	}
	
	function uncheck(){
		if(document.getElementById("none").checked == true){
			document.getElementById("none").checked = false;
		}
		if((document.getElementById("stuFap").checked==true)||(document.getElementById("disadvantagedGroup").checked==true)||(document.getElementById("depressed").checked==true)||(document.getElementById("indigenous").checked==true)||(document.getElementById("pwd").checked==true)||(document.getElementById("4ps").checked==true)||(document.getElementById("workingstud").checked==true)){
			$(function(){
				$("#none").prop('required',false);
		 	});
		}
		else{
			$(function(){
				$("#none").prop('required',true);
		 	});
		}
	}

	function wala()
	{
		if(document.getElementById("none").checked==false){
			$(function(){
				$("#none").prop('required',true);
		 	});
                $(function() {
                    $.notify({
                        title: 'Select a group',
                        message: 'If you are not belong to the group list, please check none!'
                    },{
                    animate: {
                        enter: 'animate__animated animate__fadeInDown',
                        exit: 'animate__animated animate__fadeOutRight'
                    },
                    delay: 4000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    type: 'pastel-warning',
                    allow_dismiss: false
                    });
                });
           
		}
		if(document.getElementById("none").checked){
			document.getElementById("stuFap").disabled = true;
			document.getElementById("disadvantagedGroup").disabled = true;
			document.getElementById("depressed").disabled = true;
			document.getElementById("indigenous").disabled = true;
			document.getElementById("pwd").disabled = true;
			document.getElementById("4ps").disabled = true;
			document.getElementById("workingstud").disabled = true;
			
			document.getElementById("stuFap").checked = false;
			document.getElementById("disadvantagedGroup").checked = false;
			document.getElementById("depressed").checked = false;
			document.getElementById("indigenous").checked = false;
			document.getElementById("pwd").checked = false;
			document.getElementById("4ps").checked = false;
			document.getElementById("workingstud").checked = false;
		}
		else{
			document.getElementById("stuFap").disabled = false;
			document.getElementById("disadvantagedGroup").disabled = false;
			document.getElementById("depressed").disabled = false;
			document.getElementById("indigenous").disabled = false;
			document.getElementById("pwd").disabled = false;
			document.getElementById("4ps").disabled = false;
			document.getElementById("workingstud").disabled = false;	
		}
	}
	function strand(){
		document.getElementById('shs_strands').value="";
		if(document.getElementById('shs_tracks').value == 'Academics'){

			$(function(){
				$("#shs_strands").prop('required',true);
		 	});

			document.getElementById('techvoc').style.display = "none";
			document.getElementById('acads').style.display = "block";
			document.getElementById('shs_strands').disabled=false;
		}
		else if(document.getElementById('shs_tracks').value == 'Technical-Vocational-Livelihood')
		{
			$(function(){
				$("#shs_strands").prop('required',true);
		 	});

			document.getElementById('acads').style.display = "none";
			document.getElementById('techvoc').style.display = "block";
			document.getElementById('shs_strands').disabled=false;
		}
		else if(document.getElementById('shs_tracks').value == 'Sports'){

			$(function(){
				$("#shs_strands").prop('required',false);
		 	});
			document.getElementById('shs_strands').disabled=true;
		}
		else{
			$(function(){
				$("#shs_strands").prop('required',false);
		 	});
			document.getElementById('shs_strands').disabled=true;
		}
	}
	function classify(){
		
		if(document.getElementById('admit').value=='Freshman'){

			$(function(){
				$("#college_name").prop('required',false);
				$("#college_address").prop('required',false);
				$("#college_course").prop('required',false);
				$("#college_gwa").prop('required',false);
		 	});

			 $(function(){
				$("#torpg1").prop('required',false);
				$("#torpg2").prop('required',false);
				$("#torpg1").val('');
				$("#torpg2").val('');
				$("#g11cardfile").prop('required',true);
				$("#g12cardfile").prop('required',true);
		 	});
			 $('.collegeDetails').hide();
			 $('#transfereeclone').hide();
			 $('#freshmanclone').show();
			document.getElementById('college').style.display = "none";
			document.getElementById('college_name').value = "";
			document.getElementById('college_address').value = "";
			document.getElementById('college_course').value = "";
			document.getElementById('college_gwa').value = "";
			document.getElementById('tor').style.display = "none";
			document.getElementById('card').style.display = "block";

			
		}
		else if(document.getElementById('admit').value=='Transferee'){

			$(function(){
				$("#college_name").prop('required',true);
				$("#college_address").prop('required',true);
				$("#college_course").prop('required',true);
				$("#college_gwa").prop('required',true);
		 	});

			 $(function(){
				$("#torpg1").prop('required',true);
				$("#torpg2").prop('required',true);
				$("#g11cardfile").val('');
				$("#g12cardfile").val('');
				$("#g11cardfile").prop('required',false);
				$("#g12cardfile").prop('required',false);
		 	});
			$('.collegeDetails').show();
			$('#transfereeclone').show();
			$('#freshmanclone').hide();
			document.getElementById('college').style.display = "block";
			document.getElementById('tor').style.display = "block";
			document.getElementById('card').style.display = "none";

			
		}
	}
	function married(){
		if(document.getElementById('status').value=="Married"){
			$(function(){
				$("#spouse_name").prop('required',true);
				$("#spouse_add").prop('required',true);
				$("#spouse_phone").prop('required',true);
				$("#spouse_work").prop('required',true);
				$("#spouse_emp").prop('required',true);
		 	});
			document.getElementById('married').style.display = "block";
		}
		else{
			$(function(){
				$("#spouse_name").prop('required',false);
				$("#spouse_add").prop('required',false);
				$("#spouse_phone").prop('required',false);
				$("#spouse_work").prop('required',false);
				$("#spouse_emp").prop('required',false);

				$("#spouse_name").val('');
				$("#spouse_add").val('');
				$("#spouse_phone").val('');
				$("#spouse_work").val('');
				$("#spouse_emp").val('');
		 	});
			document.getElementById('married').style.display = "none";
		}
	}

	$('#jhs_dgrad').change(function(){
		var jhsgrad=$('#jhs_dgrad').val();

		if(jhsgrad>"2015-12-31"){

			$('#shs_name').prop('required', true);
			$('#shs_address').prop('required', true);
			$('#shs_tracks').prop('required', true);
			$('#shs_dgrad').prop('required', true);
			$('#g11_gwa').prop('required', true);
			$('#g12_gwa').prop('required', true);

			$('#shs').css('display', 'block');
			$('.shsDetails').show();;
		}
		else{

			$('#shs_name').prop('required', false);
			$('#shs_address').prop('required', false);
			$('#shs_tracks').prop('required', false);
			$('#shs_dgrad').prop('required', false);
			$('#g11_gwa').prop('required', false);
			$('#g12_gwa').prop('required', false);

			$('#shs_name').val('');
			$('#shs_address').val('');
			$('#shs_tracks').val('');
			$('#shs_dgrad').val('');
			$('#g11_gwa').val('');
			$('#g12_gwa').val('');
			$('#shs_honors').val('');
			$('#shs_strands').val('');

			$('#shs').css('display', 'none');
			$('.shsDetails').hide();
		}
	});

var personaldata = document.querySelectorAll('#personaldata')
var educbg = document.querySelectorAll('#educbackground')
var orginvolve = document.querySelectorAll('#orginvolve')
var familybg = document.querySelectorAll('#familybg')
var personaladmiration = document.querySelectorAll('#personaladmiration')
var requirements = document.querySelectorAll('#requirements')

	//PERSONAL INFO
	Array.prototype.slice.call(personaldata)
    .forEach(function (form) {
    //   form.addEventListener('submit', function (event) {
        
    //   }, false)
	$(document).on('click', '#studinfo', function(e){
		e.preventDefault();
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
		  $('#personalNote').show();
		  imgFormat();
        }else{
			if(imgFormat()){
				
			}else if(nameCh()){
			
			}else if(emailCh()){
			
			}else{
				$('#personalNote').hide();
				$('.step-1').removeClass('active');
				$('.step-2').addClass('active');
			}
			
         	// $('.step-2').addClass('active');
			// $('.step-1').removeClass('active');
        }
        form.classList.add('was-validated')
      });
	 
    })
	//EDUCBG
	Array.prototype.slice.call(educbg)
    .forEach(function (form) {
    //   form.addEventListener('submit', function (event) {
        
    //   }, false)
      $('#educnxt').click(function(){
				form.classList.add('was-validated');
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
					alsFormat();
		  $('#educationalBG').show();
        }else{
					
					if(alsFormat()){
						// alert('may mali pa');
					}else{
						$('#educationalBG').hide();
						$('.step-3').addClass('active');
			 			$('.step-2').removeClass('active');
					}
		
        }
        form.classList.add('was-validated')
      });
	  $('#prv').click(function(){
		$('.step-2').removeClass('active');
		$('.step-1').addClass('active');
	  });
    })
	//ORG INVOLVE
	Array.prototype.slice.call(orginvolve)
    .forEach(function (form) {
    //   form.addEventListener('submit', function (event) {
        
    //   }, false)
      $('#nxtorg').click(function(){
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }else{

         	$('.step-4').addClass('active');
			$('.step-3').removeClass('active');
        }
        form.classList.add('was-validated')
      });
      $('#prvorg').click(function(){
        $('.step-2').addClass('active');
		$('.step-3').removeClass('active');
      })
    })
	//FAMILY BG
	Array.prototype.slice.call(familybg)
    .forEach(function (form) {
    //   form.addEventListener('submit', function (event) {
        
    //   }, false)
      $('#nxtfam ').click(function(){
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
		  $('#familyBG').show();
        }else{
			$('#familyBG').hide();
         	$('.step-5').addClass('active');
			$('.step-4').removeClass('active');
        }
        form.classList.add('was-validated')
      });
	  $('#prvfam').click(function(){
		$('.step-4').removeClass('active');
		$('.step-3').addClass('active');
	  });
    })
	//Personal Admiration
	Array.prototype.slice.call(personaladmiration)
    .forEach(function (form) {
    //   form.addEventListener('submit', function (event) {
        
    //   }, false)
      $('#nxtpa ').click(function(){
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
		  $('#personalAD').show();
        }else{
			$('#personalAD').hide();
			$('.step-5').removeClass('active');
			$('.step-6').addClass('active');
        }
		
        form.classList.add('was-validated')
      });
	  $('#prvpa').click(function(){
		$('.step-5').removeClass('active');
		$('.step-4').addClass('active');
	  });
    })
	//Requirements
	Array.prototype.slice.call(requirements)
    .forEach(function (form) {
    //   form.addEventListener('submit', function (event) {
        
    //   }, false)
      $('#nxtreq').click(function(){
		form.classList.add('was-validated');
		inputValues();
        if (!form.checkValidity()) {
			event.preventDefault()
			event.stopPropagation()
			reqFormat();
			vaxcardFormat();
		}
		else{
			// reqFormat();
			if(reqFormat()){
				// alert('may mali pa');
			}else if(vaxcardFormat()){
				// alert('may mali sa vaxcard');
			}else{
				// alert('next');
				cloneProfile();
				cloneFiles();
				inputValues();
				$('.step-6').removeClass('active');
				$('.step-7').addClass('active');
			}	
        }
      });
	  $('#prvreq').click(function(){
		$('.step-6').removeClass('active');
		$('.step-5').addClass('active');

	  });
    })
	$('#prvfinal').click(function(){
		undoFinalform();
		$('.step-7').removeClass('active');
		$('.step-6').addClass('active');
	});
	$('#apply').click(function(){
		$.ajax({
			url: 'queries/checkStatus.php',
			type: 'post',
			success:function(data){
				$('#statuscheck').html(data);
			}
		})	
	});
	
	function reg(){
		$.ajax({
			url: 'queries/checkStatus.php',
			type: 'post',
			success:function(data){
				$('#statuscheck').html(data);
			}
		})	
	}
	// $(document).on('submit', '#finalForm', function(e){
	// 	e.preventDefault();
	// 	Swal.fire({
	// 		title: 'Submit Your Application?',
	// 		text: "Make sure your provided details are correct.",
	// 		icon: 'warning',
	// 		showCancelButton: true,
	// 		confirmButtonColor: '#043e9f',
	// 		allowOutsideClick: () => {
	// 		  const popup = Swal.getPopup()
	// 		  popup.classList.remove('swal2-show')
	// 		  setTimeout(() => {
	// 			popup.classList.add('animate__animated', 'animate__headShake')
	// 		  })
	// 		  setTimeout(() => {
	// 			popup.classList.remove('animate__animated', 'animate__headShake')
	// 		  }, 500)
	// 		  return false
	// 		},
	// 		cancelButtonColor: '#dc3545',
	// 		confirmButtonText: 'Yes, submit now.'
	// 	  }).then((result)=>{
	// 		if(result.isConfirmed){
	// 			$.post(".", $(this).serialize(), function(data){

	// 			})
	// 		}
	// 	  })
	// })
	// $(document).on('submit', '#finalForm', function(e){ .
	// 	e.preventDefault();
	// 	$.post("registration/submit.php", $(this).serialize(), function(data){
	// 		if(data){
	// 			alert();
	// 		}
	// 	})
	// })
	function imgFormat(){
		var fileExt = ['jpg', 'png'];
		// var imgsize = $('#profileImage')[0].files[0].size;
		if($('#profileImage').val()==""){
			return false;
		}else{
			if($.inArray($('#profileImage').val().split('.').pop().toLowerCase(), fileExt) == -1){
				$(function() {
					$.notify({
						title: 'Photo must be in JPG or PNG',
						message: 'Please upload valid image!'
					},{
					animate: {
						enter: 'animate__animated animate__fadeInDown',
						exit: 'animate__animated animate__fadeOutRight'
					},
					delay: 6000,
					placement: {
						from: 'top',
						align: 'right'
					},
					type: 'pastel-danger',
					allow_dismiss: false
					});
				});
				$('#profileImage').reset();
				return true;
			}
			else{
				return false;
			}
		}
	}
	function alsFormat(){
		if($('#als_cert').val()!=""){
			var ext = ['jpg', 'pdf', 'png', ''];
			if(($.inArray($('#als_cert').val().split('.').pop().toLowerCase(), ext) == -1)){
				$(function() {
					$.notify({
						title: 'Files must be in JPG, PNG and PDF format',
						message: 'Please check again each file format to proceed!'
					},{
					animate: {
						enter: 'animate__animated animate__fadeInDown',
						exit: 'animate__animated animate__fadeOutRight'
					},
					delay: 6000,
					placement: {
						from: 'top',
						align: 'right'
					},
					type: 'pastel-danger',
					allow_dismiss: false
					});
				});
				return true;
			}else if(alscertfile()){
				return true;
			}else{
				return false;
			}
		}else{
			$('#alscerterror').html('');
			return false;
		}
	}
	function alscertfile(){
		var alscert = $('#als_cert')[0].files[0].size;
		if(alscert>5000000){
			$('#alscerterror').html('File is greater than 5MB');
			return true;
		}else{
			$('#alscerterror').html('');
			return false;
		}
	}
	function vaxcardFormat(){
		if($('#vaxcard').val()!=""){
			var ext = ['jpg', 'pdf', 'png', ''];
			if(($.inArray($('#vaxcard').val().split('.').pop().toLowerCase(), ext) == -1)){
				$(function() {
					$.notify({
						title: 'Files must be in JPG, PNG and PDF format',
						message: 'Please check again each file format to proceed!'
					},{
					animate: {
						enter: 'animate__animated animate__fadeInDown',
						exit: 'animate__animated animate__fadeOutRight'
					},
					delay: 6000,
					placement: {
						from: 'top',
						align: 'right'
					},
					type: 'pastel-danger',
					allow_dismiss: false
					});
				});
				return true;
			}else if(vaxcardfile()){
				return true;
			}else{
				return false;
			}
		}else{
			$('#vaxcarderror').html('');
			return false;
		}
	}
	function vaxcardfile(){
		var votecert = $('#vaxcard')[0].files[0].size;
		if(votecert>5000000){
			$('#vaxcarderror').html('File is greater than 5MB');
			return true;
		}else{
			$('#vaxcarderror').html('');
			return false;
		}
	}
	function reqFormat(){
		var ext = ['jpg', 'pdf', 'png', ''];
		if($('#admit').val()=="Transferee"){
			
			if(($.inArray($('#torpg1').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#torpg2').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#goodmoral').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#birthcert').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#indigency').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#votecert').val().split('.').pop().toLowerCase(), ext) == -1)){
				$(function() {
					$.notify({
						title: 'Files must be in JPG, PNG and PDF format',
						message: 'Please check again each file format to proceed!'
					},{
					animate: {
						enter: 'animate__animated animate__fadeInDown',
						exit: 'animate__animated animate__fadeOutRight'
					},
					delay: 6000,
					placement: {
						from: 'top',
						align: 'right'
					},
					type: 'pastel-danger',
					allow_dismiss: false
					});
				});
			
				return true;
			}else if(torpg1file()||torpg2file()||goodmoralfile()||birthcertfile()||indigencyfile()||votecertfile()){
				return true;
			}
			else {
				return false;
			}
			
		}else{
			
			
			// g11cardfileRestriction();
			// g12cardfileRestriction();
			// goodmoralfile();
			// birthcertfile();
			// indigencyfile();
			// votecertfile();
			
			if(($.inArray($('#g11cardfile').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#g12cardfile').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#goodmoral').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#birthcert').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#indigency').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#votecert').val().split('.').pop().toLowerCase(), ext) == -1)){
				$(function() {
					$.notify({
						title: 'Files must be in JPG, PNG and PDF format',
						message: 'Please check again each file format to proceed!'
					},{
					animate: {
						enter: 'animate__animated animate__fadeInDown',
						exit: 'animate__animated animate__fadeOutRight'
					},
					delay: 6000,
					placement: {
						from: 'top',
						align: 'right'
					},
					type: 'pastel-danger',
					allow_dismiss: false
					});
				});
			
				return true;
			}else if(g11cardfileRestriction()||g12cardfileRestriction()||goodmoralfile()||birthcertfile()||indigencyfile()||votecertfile()){
				return true;
			}else{
				return false;
			}
		
		}
	
	}
	function g11cardfileRestriction(){
		var g11cardfile = $('#g11cardfile')[0].files[0].size;
		if(g11cardfile>5000000){
			$('#g11error').html('File is greater than 5MB');
			return true;
		}else{
			$('#g11error').html('');
			return false;
		}
	}
	function g12cardfileRestriction(){
		var g12cardfile = $('#g12cardfile')[0].files[0].size;
		if(g12cardfile>5000000){
			$('#g12error').html('File is greater than 5MB');
			return true;
		}else{
			$('#g12error').html('');
			return false;
		}
	}
	function torpg1file(){
		var torpg1 = $('#torpg1')[0].files[0].size;
		if(torpg1>5000000){
			$('#torpg1error').html('File is greater than 5MB');
			return true;
		}else{
			$('#torpg1error').html('');
			return false;
		}
	}
	function torpg2file(){
		var torpg2 = $('#torpg2')[0].files[0].size;
		if(torpg2>5000000){
			$('#torpg2error').html('File is greater than 5MB');
			return true;
		}else{
			$('#torpg2error').html('');
			return false;
		}
	}
	function goodmoralfile(){
		var goodmoral = $('#goodmoral')[0].files[0].size;
		if(goodmoral>5000000){
			$('#goodmoralerror').html('File is greater than 5MB');
			return true;
		}else{
			$('#goodmoralerror').html('');
			return false;
		}
	}
	function birthcertfile(){
		var birthcert = $('#birthcert')[0].files[0].size;
		if( birthcert>5000000){
			$('#birthcerterror').html('File is greater than 5MB');
			return true;
		}else{
			$('#birthcerterror').html('');
			return false;
		}
	}
	function indigencyfile(){
		var indigency = $('#indigency')[0].files[0].size;
		if(indigency>5000000){
			$('#indigencyerror').html('File is greater than 5MB');
			return true;
		}else{
			$('#indigencyerror').html('');
			return false;
		}
	}
	function votecertfile(){
		var votecert = $('#votecert')[0].files[0].size;
		if(votecert>5000000){
			$('#votecerterror').html('File is greater than 5MB');
			return true;
		}else{
			$('#votecerterror').html('');
			return false;
		}
	}
	

	resetFileerror();
	function resetFileerror(){
		$('#g11cardfile').change(function(){
			if($('#g11error').html()!=""){
				$('#g11error').html('');
			}
		})
		$('#g12cardfile').change(function(){
			if($('#g12error').html()!=""){
				$('#g12error').html('');
			}
		})
		$('#torpg1').change(function(){
			if($('#torpg1error').html()!=""){
				$('#torpg1error').html('');
			}
		})
		$('#torpg2').change(function(){
			if($('#torpg2error').html()!=""){
				$('#torpg2error').html('');
			}
		})
		$('#goodmoral').change(function(){
			if($('#goodmoralerror').html()!=""){
				$('#goodmoralerror').html('');
			}
		})
		$('#birthcert').change(function(){
			if($('#birthcerterror').html()!=""){
				$('#birthcerterror').html('');
			}
		})
		$('#indigency').change(function(){
			if($('#indigencyerror').html()!=""){
				$('#indigencyerror').html('');
			}
		})
		$('#votecert').change(function(){
			if($('#votecerterror').html()!=""){
				$('#votecerterror').html('');
			}
		})
		$('#als_cert').change(function(){
			if($('#alscerterror').html()!=""){
				$('#alscerterror').html('');
			}
		})
		$('#vaxcard').change(function(){
			if($('#vaxcarderror').html()!=""){
				$('#vaxcarderror').html('');
			}
		})
		
	}
	function cloneProfile(){
		var img = $('#profileImage'),
		imgnew = img.clone();
		img.addClass('x');
		imgnew.attr('id', '#profileImageNew');
		imgnew.attr('onclick', 'return false;');
		// imgnew.insertAfter('#imgclone');
	

		var displayImg = $('#profileDisplay'),
		displayImgNew = displayImg.clone();
		// displayImg.attr('id', '#displayImgOld');
		displayImgNew.attr('onclick', 'return false;');
		// displayImgNew.insertAfter('#imgclone1'); 
		$('#imgclone').html(imgnew);
		$('#studentPic').html(displayImgNew);
		if($('#profileImage').val()==""){
			displayImgNew.attr('src', 'assets/imgs/student2x2/default_photo.png');
			// imgnew.attr('value', 'default_photo.png');
		}
	}
	function cloneFiles(){
		var g11card = $('#g11cardfile'),
		g11cardnew = g11card.clone();
		g11cardnew.attr('id', '#g11cardfilenew');
		g11cardnew.attr('onclick', 'return false;');
		$('#g11rc').html(g11cardnew);

		var g12card = $('#g12cardfile'),
		g12cardnew = g12card.clone();
		g12cardnew.attr('id', '#g12cardfilenew');
		g12cardnew.attr('onclick', 'return false;');
		$('#g12rc').html(g12cardnew);

		var torpg1 = $('#torpg1'),
		torpg1new = torpg1.clone();
		torpg1new.attr('id', '#torpg1new');
		torpg1new.attr('onclick', 'return false;');
		$('#tor1').html(torpg1new);

		var torpg2 = $('#torpg2'),
		torpg2new = torpg2.clone();
		torpg2new.attr('id', '#torpg2new');
		torpg2new.attr('onclick', 'return false;');
		$('#tor2').html(torpg2new);
		
		var goodmoral = $('#goodmoral'),
		goodmoralnew = goodmoral.clone();
		goodmoralnew.attr('id', '#goodmoralnew');
		goodmoralnew.attr('onclick', 'return false;');
		$('#gmc').html(goodmoralnew);

		var birthcert = $('#birthcert'),
		birthcertnew = birthcert.clone();
		birthcertnew.attr('id', '#birthcertnew');
		birthcertnew.attr('onclick', 'return false;');
		$('#bdaycer').html(birthcertnew);

		var indigency = $('#indigency'),
		indigencynew = indigency.clone();
		indigencynew.attr('id', '#indigencynew');
		indigencynew.attr('onclick', 'return false;');
		$('#coi').html(indigencynew);

		var votecert = $('#votecert'),
		votecertnew = votecert.clone();
		votecertnew.attr('id', '#votecertnew');
		votecertnew.attr('onclick', 'return false;');
		$('#vc').html(votecertnew);

		var alscert=$('#als_cert');
		alscertnew = alscert.clone();
		alscertnew.attr('id', '#alscertnew');
		alscertnew.attr('onclick', 'return false;');
		$('#als_cert1').html(alscertnew);

		var alscert=$('#vaxcard');
		alscertnew = alscert.clone();
		alscertnew.attr('id', '#vaxcardnew');
		alscertnew.attr('onclick', 'return false;');
		$('#vax').html(alscertnew);
			
		// var img = $('#profileImage'),
		// imgnew = img.clone();
		// img.addClass('x');
		// imgnew.attr('id', '#profileImageNew');
		// imgnew.attr('onclick', 'return false;');
		// imgnew.insertAfter('#imgclone');
	

		// var displayImg = $('#profileDisplay'),
		// displayImgNew = displayImg.clone();
		// // displayImg.attr('id', '#displayImgOld');
		// displayImgNew.attr('onclick', 'return false;');
		// // displayImgNew.insertAfter('#imgclone1'); 
		// $('#imgclone').html(imgnew);
		// $('#studentPic').html(displayImgNew);
		// if($('#profileImage').val()==""){
		// 	displayImgNew.attr('src', 'assets/imgs/student2x2/default_photo.png');
		// 	// imgnew.attr('value', 'default_photo.png');
		// }
	}
	function inputValues(){
		//PREVIEW
		//PERSONAL DATA
		$('#fname1').html($('#fname').val());
		$('#lname1').html($('#lname').val());
		$('#mname1').html($('#mname').val());
		if($('#suffixx').val()==""){
			$('#suffix1').html("N/A");
		}else{
			$('#suffix1').html($('#suffixx').val());
		}
		$('#age1').html($('#age').val());
		$('#gender1').html($('#gender').val());
		$('#status1').html($('#status').val());
		if($('#status').val()=="Married"){
			//html
			$('.spouseDetails').show();
			$('#spouse_name1').html($('#spouse_name').val());
			$('#spouse_phone1').html($('#spouse_phone').val());
			$('#spouse_work1').html($('#spouse_work').val());
			$('#spouse_emp1').html($('#spouse_emp').val());
			$('#spouse_add1').html($('#spouse_add').val());
			//input
			$('#spouse_name2').val($('#spouse_name').val());
			$('#spouse_phone2').val($('#spouse_phone').val());
			$('#spouse_work2').val($('#spouse_work').val());
			$('#spouse_emp2').val($('#spouse_emp').val());
			$('#spouse_add2').val($('#spouse_add').val());
		}else{
			$('.spouseDetails').hide();
		}
		$('#religion1').html($('#religion').val());
		$('#birthplace1').html($('#birthplace').val());
		$('#bday1').html($('#bday').val());
		$('#email1').html($('#email').val());
		$('#stud_phone1').html($('#stud_phone').val());
		if($('#calambares').val()=="Yes"){
			$('#pre_brgy').html($('#pre_brgy1').val());
			$('#pre_brgy0').val($('#pre_brgy1').val());
		}else{
			$('#pre_brgy').html($('#pre_brgy2').val());
			$('#pre_brgy0').val($('#pre_brgy2').val());
		}
		$('#pre_houseno1').html($('#pre_houseno').val());
		$('#pre_city1').html($('#pre_city').val());
		$('#pre_zip1').html($('#pre_zip').val());

		$('#per_brgy1').html($('#per_brgy').val());
		$('#per_houseno1').html($('#per_houseno').val());
		$('#per_city1').html($('#per_city').val());
		$('#per_zip1').html($('#per_zip').val());

		if(document.getElementById("none").checked==true){
			$('#nonee2').attr('checked', true);
		}else{
			$('#nonee2').attr('checked', false);
		}
		if(document.getElementById("stuFap").checked==true){
			$('#stuFap2').attr('checked', true);
		}else{
			$('#stuFap2').attr('checked', false);
		}
		if(document.getElementById("disadvantagedGroup").checked==true){
			$('#disadvantagedGroup2').attr('checked', true);
		}else{
			$('#disadvantagedGroup2').attr('checked', false);
		}
		if(document.getElementById("depressed").checked==true){
			$('#depressed2').attr('checked', true);
		}else{
			$('#depressed2').attr('checked', false);
		}
		if(document.getElementById("indigenous").checked==true){
			$('#indigenous2').attr('checked', true);
		}else{
			$('#indigenous2').attr('checked', false);
		}
		if(document.getElementById("pwd").checked==true){
			$('#pwd2').attr('checked', true);
		}else{
			$('#pwd2').attr('checked', false);
		}
		if(document.getElementById("4ps").checked==true){
			$('#4ps2').attr('checked', true);
		}else{
			$('#4ps2').attr('checked', false);
		}
		if(document.getElementById("workingstud").checked==true){
			$('#workingstud2').attr('checked', true);
		}else{
			$('#workingstud2').attr('checked', false);
		}

		$('#admit1').html($('#admit').val());
		$('#1stprio1').html($('#1stprio').val());
		$('#2ndprio1').html($('#2ndprio').val());
		if($('#stablenet').val()==""){
			$('#stablenet1').html("N/A");
		}else{
			$('#stablenet1').html($('#stablenet').val());
		}
		$('#calambares1').html($('#calambares').val());
		if($('#calambares').val()=="Yes"){
			$('#yrs_calamba1').html($('#yrs_calamba').val());
			$('#yrs_calamba2').val($('#yrs_calamba').val());
		}else{
			$('#yrs_calamba1').html("N/A");
			$('#yrs_calamba2').val("0");
		}
		//EDUC BG
		$('#elem_name1').html($('#elem_name').val());
		$('#elem_address1').html($('#elem_address').val());
		$('#elem_honor1').html($('#elem_honor').val());
		$('#dgrad_elem1').html($('#dgrad_elem').val());
		$('#jhs_name1').html($('#jhs_name').val());
		$('#jhs_address1').html($('#jhs_address').val());
		$('#jhs_honors1').html($('#jhs_honors').val());
		$('#jhs_dgrad1').html($('#jhs_dgrad').val());
		$('#shs_name1').html($('#shs_name').val());
		$('#shs_address1').html($('#shs_address').val());
		$('#shs_honors1').html($('#shs_honors').val());
		$('#shs_dgrad1').html($('#shs_dgrad').val());
		$('#shs_tracks1').html($('#shs_tracks').val());
		if($('#shs_tracks').val()=="Arts and Design"||$('#shs_tracks').val()=="Sports"){
			$('#shs_strands1').html("N/A");
		}else{
			$('#shs_strands1').html($('#shs_strands').val());
		}
		$('#g11_gwa1').html($('#g11_gwa').val());
		$('#g12_gwa1').html($('#g12_gwa').val());
		$('#college_name1').html($('#college_name').val());
		$('#college_address1').html($('#college_address').val());
		$('#college_course1').html($('#college_course').val());
		$('#college_gwa1').html($('#college_gwa').val());
		$('#tvc_name1').html($('#tvc_name').val());
		$('#tvc_address1').html($('#tvc_address').val());
		$('#tvc_dgrad1').html($('#tvc_dgrad').val());
		$('#tvc_course1').html($('#tvc_course').val());
		$('#als_name1').html($('#als_name').val());
		$('#als_address1').html($('#als_address').val());

		//ORG
		$('#org_name11').html($('#org_name1').val());
		$('#nature11').html($('#nature1').val());
		$('#position11').html($('#position1').val());
		$('#yrs_org11').html($('#yrs_org1').val());

		$('#org_name21').html($('#org_name2').val());
		$('#nature21').html($('#nature2').val());
		$('#position21').html($('#position2').val());
		$('#yrs_org21').html($('#yrs_org2').val());

		$('#org_name31').html($('#org_name3').val());
		$('#nature31').html($('#nature3').val());
		$('#position31').html($('#position3').val());
		$('#yrs_org31').html($('#yrs_org3').val());

		//FAMBG
		$('#father_name1').html($('#father_name').val());
		$('#father_citizen1').html($('#father_citizen').val());
		$('#father_add1').html($('#father_add').val());
		$('#father_contact1').html($('#father_contact').val());
		$('#father_email1').html($('#father_email').val());
		$('#father_work1').html($('#father_work').val());
		$('#father_emp_add1').html($('#father_emp_add').val());
		$('#father_emp_no1').html($('#father_emp_no').val());
		$('#father_emp1').html($('#father_emp').val());
		$('#father_educ1').html($('#father_educ').val());

		$('#mother_name1').html($('#mother_name').val());
		$('#mother_citizen1').html($('#mother_citizen').val());
		$('#mother_add1').html($('#mother_add').val());
		$('#mother_contact1').html($('#mother_contact').val());
		$('#mother_email1').html($('#mother_email').val());
		$('#mother_work1').html($('#mother_work').val());
		$('#mother_emp_add1').html($('#mother_emp_add').val());
		$('#mother_emp_no1').html($('#mother_emp_no').val());
		$('#mother_emp1').html($('#mother_emp').val());
		$('#mother_educ1').html($('#mother_educ').val());

		$('#guardian_name1').html($('#guardian_name').val());
		$('#guardian_relation1').html($('#guardian_relation').val());
		$('#guardian_add1').html($('#guardian_add').val());
		$('#guardian_contact1').html($('#guardian_contact').val());
		$('#guardian_email1').html($('#guardian_email').val());
		$('#guardian_bday1').html($('#guardian_bday').val());
		$('#guardian_emp_add1').html($('#guardian_emp_add').val());
		$('#guardian_emp_no1').html($('#guardian_emp_no').val());
		$('#guardian_emp1').html($('#guardian_emp').val());
		$('#guardian_work1').html($('#guardian_work').val());
		
		$('#sibling11').html($('#sibling1').val());
		$('#sibling_age11').html($('#sibling_age1').val());
		$('#sibling_status11').html($('#sibling_status1').val());
		$('#sibling_contact11').html($('#sibling_contact1').val());
		
		$('#sibling21').html($('#sibling2').val());
		$('#sibling_age21').html($('#sibling_age2').val());
		$('#sibling_status21').html($('#sibling_status2').val());
		$('#sibling_contact21').html($('#sibling_contact2').val());

		$('#sibling31').html($('#sibling3').val());
		$('#sibling_age31').html($('#sibling_age3').val());
		$('#sibling_status31').html($('#sibling_status3').val());
		$('#sibling_contact31').html($('#sibling_contact3').val());

		$('#income1').html($('#income').val());
		
		//HIDDEN INPUTS
		//PERSONAL DATA
		$('#fname2').val($('#fname').val());
		$('#mname2').val($('#mname').val());
		$('#lname2').val($('#lname').val());
		$('#suffix2').val($('#suffixx').val());
		$('#age2').val($('#age').val());
		$('#gender2').val($('#gender').val());
		$('#status2').val($('#status').val());
		$('#religion2').val($('#religion').val());
		$('#birthplace2').val($('#birthplace').val());
		$('#bday2').val($('#bday').val());
		$('#email2').val($('#email').val());
		$('#stud_phone2').val($('#stud_phone').val());
		$('#admit2').val($('#admit').val());
		$('#1stprio2').val($('#1stprio').val());
		$('#2ndprio2').val($('#2ndprio').val());
		$('#stablenet2').val($('#stablenet').val());
		$('#calambares2').val($('#calambares').val());
		$('#pre_houseno2').val($('#pre_houseno').val());
		$('#pre_city2').val($('#pre_city').val());
		$('#pre_zip2').val($('#pre_zip').val());

		$('#per_houseno2').val($('#per_houseno').val());
		$('#per_brgy2').val($('#per_brgy').val());
		$('#per_city2').val($('#per_city').val());
		$('#per_zip2').val($('#per_zip').val());

		//EDUC BG
		$('#elem_name2').val($('#elem_name').val());
		$('#elem_address2').val($('#elem_address').val());
		$('#elem_honor2').val($('#elem_honor').val());
		$('#dgrad_elem2').val($('#dgrad_elem').val());
		$('#jhs_name2').val($('#jhs_name').val());
		$('#jhs_address2').val($('#jhs_address').val());
		$('#jhs_honors2').val($('#jhs_honors').val());
		$('#jhs_dgrad2').val($('#jhs_dgrad').val());
		$('#shs_name2').val($('#shs_name').val());
		$('#shs_address2').val($('#shs_address').val());
		$('#shs_honors2').val($('#shs_honors').val());
		$('#shs_dgrad2').val($('#shs_dgrad').val());
		$('#shs_tracks2').val($('#shs_tracks').val());
		if($('#shs_tracks').val()=="Arts and Design"||$('#shs_tracks').val()=="Sports"){
			$('#shs_strands2').val("N/A");
		}else{
			$('#shs_strands2').val($('#shs_strands').val());
		}
		$('#g11_gwa2').val($('#g11_gwa').val());
		$('#g12_gwa2').val($('#g12_gwa').val());
		$('#college_name2').val($('#college_name').val());
		$('#college_address2').val($('#college_address').val());
		$('#college_course2').val($('#college_course').val());
		$('#college_gwa2').val($('#college_gwa').val());
		$('#tvc_name2').val($('#tvc_name').val());
		$('#tvc_address2').val($('#tvc_address').val());
		$('#tvc_dgrad2').val($('#tvc_dgrad').val());
		$('#tvc_course2').val($('#tvc_course').val());
		$('#als_name2').val($('#als_name').val());
		$('#als_address2').val($('#als_address').val());

		//ORG
		$('#org_name12').val($('#org_name1').val());
		$('#nature12').val($('#nature1').val());
		$('#position12').val($('#position1').val());
		$('#yrs_org12').val($('#yrs_org1').val());

		$('#org_name22').val($('#org_name2').val());
		$('#nature22').val($('#nature2').val());
		$('#position22').val($('#position2').val());
		$('#yrs_org22').val($('#yrs_org2').val());

		$('#org_name32').val($('#org_name3').val());
		$('#nature32').val($('#nature3').val());
		$('#position32').val($('#position3').val());
		$('#yrs_org32').val($('#yrs_org3').val());

		//FAM BG
		$('#father_name2').val($('#father_name').val());
		$('#father_citizen2').val($('#father_citizen').val());
		$('#father_add2').val($('#father_add').val());
		$('#father_contact2').val($('#father_contact').val());
		$('#father_email2').val($('#father_email').val());
		$('#father_work2').val($('#father_work').val());
		$('#father_emp_add2').val($('#father_emp_add').val());
		$('#father_emp_no2').val($('#father_emp_no').val());
		$('#father_emp2').val($('#father_emp').val());
		$('#father_educ2').val($('#father_educ').val());

		$('#mother_name2').val($('#mother_name').val());
		$('#mother_citizen2').val($('#mother_citizen').val());
		$('#mother_add2').val($('#mother_add').val());
		$('#mother_contact2').val($('#mother_contact').val());
		$('#mother_email2').val($('#mother_email').val());
		$('#mother_work2').val($('#mother_work').val());
		$('#mother_emp_add2').val($('#mother_emp_add').val());
		$('#mother_emp_no2').val($('#mother_emp_no').val());
		$('#mother_emp2').val($('#mother_emp').val());
		$('#mother_educ2').val($('#mother_educ').val());

		$('#guardian_name2').val($('#guardian_name').val());
		$('#guardian_relation2').val($('#guardian_relation').val());
		$('#guardian_add2').val($('#guardian_add').val());
		$('#guardian_contact2').val($('#guardian_contact').val());
		$('#guardian_email2').val($('#guardian_email').val());
		$('#guardian_bday2').val($('#guardian_bday').val());
		$('#guardian_emp_add2').val($('#guardian_emp_add').val());
		$('#guardian_emp_no2').val($('#guardian_emp_no').val());
		$('#guardian_emp2').val($('#guardian_emp').val());
		$('#guardian_work2').val($('#guardian_work').val());

		$('#sibling12').val($('#sibling1').val());
		$('#sibling_age12').val($('#sibling_age1').val());
		$('#sibling_status12').val($('#sibling_status1').val());
		$('#sibling_contact12').val($('#sibling_contact1').val());
		
		$('#sibling22').val($('#sibling2').val());
		$('#sibling_age22').val($('#sibling_age2').val());
		$('#sibling_status22').val($('#sibling_status2').val());
		$('#sibling_contact22').val($('#sibling_contact2').val());

		$('#sibling32').val($('#sibling3').val());
		$('#sibling_age32').val($('#sibling_age3').val());
		$('#sibling_status32').val($('#sibling_status3').val());
		$('#sibling_contact32').val($('#sibling_contact3').val());
		$('#income2').val($('#income').val());
		//PERSONAL ADMIRE
		$('#hobbies2').val($('#hobbies').val());
		$('#reason4enroll2').val($('#reason4enroll').val());
		$('#characteristics2').val($('#characteristics').val());
		$('#dream2').val($('#dream').val());
	}
	function undoFinalform(){
		$('#studentPic').html('');
		$('#imgclone').html('');
		$("input[type=hidden]").val("");
		$(".values").html("");

		$('#nonee2').attr('checked', false);
		$('#stuFap2').attr('checked', false);
		$('#disadvantagedGroup2').attr('checked', false);
		$('#depressed2').attr('checked', false);
		$('#indigenous2').attr('checked', false);
		$('#pwd2').attr('checked', false);
		$('#4ps2').attr('checked', false);
		$('#workingstud2').attr('checked', false);

		$('#hobbies2').val("");
		$('#reason4enroll2').val("");
		$('#characteristics2').val("");
		$('#dream2').val("");

		$('#g11rc').html("");
		$('#g12rc').html("");
		$('#tor1').html("");
		$('#tor2').html("");
		$('#gmc').html("");
		$('#bdaycer').html("");
		$('#coi').html("");
		$('#vc').html("");
		$('#als_cert1').html("");
		$('#vax').html("");
	}
	

	var resize = $(window).resize(function() {
		var width = $(window).width();
		if (width < 1200){
			// alert('Your screen is too small');
			$('#previewRes').removeClass( "container" ).addClass( "container-fluid" );
			$('#cardPreview').css('overflow', 'auto');
		}else{
			$('#previewRes').removeClass( "container-fluid" ).addClass( "container" );
			$('#cardPreview').css('overflow', '');
		}
	});

	setInterval(function(){ resize }, 2000);

	
	$(document).on('keyup', '#fname', function(e){
		e.preventDefault();
		var firstname = $('#fname').val();
		var middlename = $('#mname').val();
		var lastname = $('#lname').val();
		
		$.ajax({
			url: 'queries/userCheck.php',
			type: 'POST',
			data: {firstname:firstname, middlename:middlename, lastname:lastname},
			success:function(data){
				$('#feedbackName').html(data);		
			}
		});
			
	})
	$(document).on('keyup', '#mname', function(e){
		e.preventDefault();
		var firstname = $('#fname').val();
		var middlename = $('#mname').val();
		var lastname = $('#lname').val();
		
		$.ajax({
			url: 'queries/userCheck.php',
			type: 'POST',
			data: {firstname:firstname, middlename:middlename, lastname:lastname},
			success:function(data){
				$('#feedbackName').html(data);		
			}
		});
			
	})
	$(document).on('keyup', '#lname', function(e){
		e.preventDefault();
		var firstname = $('#fname').val();
		var middlename = $('#mname').val();
		var lastname = $('#lname').val();
		
		$.ajax({
			url: 'queries/userCheck.php',
			type: 'POST',
			data: {firstname:firstname, middlename:middlename, lastname:lastname},
			success:function(data){
				$('#feedbackName').html(data);		
			}
		});
			
	})
	// function emailCheck(){
	$(document).on('keyup', '#email', function(e){
		e.preventDefault();
		var email = $('#email').val();
		$.ajax({
			url: 'queries/emailCheck.php',
			type: 'POST',
			data: {email:email},
			success:function(data){
				$('#feedbackEmail').html(data);	
			}
		});
	})
	// }

	function emailCh(){
		if($('#feedbackEmail').html()!=""){
			return true;
		}else{
			return false;
		}
	}
	function nameCh(){
		if($('#feedbackName').html()!=""){
			return true;
		}else{
			return false;
		}
	}