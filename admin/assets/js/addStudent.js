
    (function () {
        'use strict'
      
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('#addStudentForm')
      
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
                $('#btn-addStud').click(function(event){
									form.classList.add('was-validated')
					if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
							imgFormat();
							alsFormat();
							vaxcardFormat();
							fileFormat();
					}else{
						if(imgFormat()){

						}else if(nameCh()){
							Swal.fire({
								title: 'Student Name Already Exists',
								text: 'Please add unregistered student',
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
						}else if(emailCh()){
							Swal.fire({
								title: 'Email Already Exists',
								text: 'Please enter other email',
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
						}else if(alsFormat()){

						}else if(vaxcardFormat()){

						}else if(fileFormat()){

						}else{
							$('#btn-addStud').prop('type', 'submit');	
            }
                        // var file_data = $('#profileImage').prop('files')[0]; 
                        // var form_data = new FormData();      
                        // form_data.append('file', file_data);
                        // alert(form_data);  
                        // $.ajax({
                        //     url: 'queries/addStudentphp', // <-- point to server-side PHP script 
                        //     dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                        //     cache: false,
                        //     contentType: false,
                        //     processData: false,
                        //     data: form_data,                         
                        //     type: 'post',
                        //     success: function(php_script_response){
                        //         alert(php_script_response); // <-- display response from the PHP script, if any
                        //     }
                        //  });
            }
      
          
                })
          })
      })()

					
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

	  $(document).on('keyup', '#fname', function(e){
		e.preventDefault();
		var firstname = $('#fname').val();
		var middlename = $('#mname').val();
		var lastname = $('#lname').val();
		
		$.ajax({
			url: 'queries/studentCheck.php',
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
			url: 'queries/studentCheck.php',
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
			url: 'queries/studentCheck.php',
			type: 'POST',
			data: {firstname:firstname, middlename:middlename, lastname:lastname},
			success:function(data){
				$('#feedbackName').html(data);		
			}
		});
			
	})
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

  function imgFormat(){
		var fileExt = ['jpg', 'png', 'gif'];
		// var imgsize = $('#profileImage')[0].files[0].size;
		if($('#profileImage').val()==""){
			return false;
		}else{
			if($.inArray($('#profileImage').val().split('.').pop().toLowerCase(), fileExt) == -1){
				
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
					Swal.fire({
						title: 'ALS Certificate must be in JPG, PNG and PDF format',
						text: 'Please upload different file format!',
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
					Swal.fire({
						title: 'Vaccination Card must be in JPG, PNG and PDF format',
						text: 'Please upload different file format!',
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
	function fileFormat(){
		var ext = ['jpg', 'pdf', 'png', ''];
		if($('#admit').val()=="Transferee"){
			
			if(($.inArray($('#torpg1').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#torpg2').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#goodmoral').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#birthcert').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#indigency').val().split('.').pop().toLowerCase(), ext) == -1)||($.inArray($('#votecert').val().split('.').pop().toLowerCase(), ext) == -1)){
				$(function() {
					Swal.fire({
						title: 'Files must be in JPG, PNG and PDF format',
						text: 'Please upload different file format!',
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
					Swal.fire({
						title: 'Files must be in JPG, PNG and PDF format',
						text: 'Please upload different file format!',
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

     $('#status').change(function(){
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
	})
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

    function yesnoCheck() {
		if (document.getElementById('calambares').value=="Yes") {
			document.getElementById('pre_city').value = 'Calamba';
			document.getElementById('yrs_calamba').disabled= false;
			$(".yrs_calamba").prop('required',true);
		}
		else if (document.getElementById('calambares').value=="No") {
			document.getElementById('pre_city').value = '';
			document.getElementById('yrs_calamba').disabled = true;
			$(".yrs_calamba").prop('required',false);
		}
	}
    function onlyNumberKey(evt) { 
              
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false; 
        return true;
    }
    function Fill(){
		
			if(document.getElementById('filladdress').checked){
				document.getElementById('per_houseno').value = document.getElementById('pre_houseno').value;
				document.getElementById('per_brgy').value = document.getElementById('pre_brgy').value;
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
			document.getElementById('reportcard').style.display = "block";

			
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
			document.getElementById('reportcard').style.display = "none";	
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
			$('.shsDetails').show();
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
    function wala()
	{
		if(document.getElementById("none").checked==false){
			$(function(){
				$("#none").prop('required',true);
		 	});
                Swal.fire({
                    title: 'Select a group',
                    text: 'If student is not belong to the group list, Check none.',
                    icon: 'warning',
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

	
		// $(document).on('click', '#btn-editStud', function(){
		//     var id = $(this).attr('data-id');
		// alert(id);
		// })