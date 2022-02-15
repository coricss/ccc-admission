
$(document).on('submit', '#login', function(e){
  e.preventDefault();

  $.post("queries/login.php", $(this).serialize(), function(data){
    $('#message').html(data);
  })
  
})

$('#fpass').click(function(){
    $('#login').hide();
    $('#forgotpass').show();
  })
  $('#back-to-login').click(function(){
    $('#forgotpass').hide();
    $('#login').show();
  })
  $('#back-to-changepwd').click(function(){
    $('#recoverycode').hide();
    $('#forgotpass').show();
    clearInterval();
  })
  
  $('#cpEmail').keyup(function(){
    var email=$(this).val();
    $.ajax({
      url: 'queries/changepassword.php',
      method: 'post',
      data: {email:email},
      success:function(data){
        $('#validation').html(data);
      }
    });
  })
  $('#getcode').click(function(){
    var email=$('#cpEmail').val();
    $.ajax({
      url: 'queries/emailcode.php',
      method: 'post',
      data: {email:email},
      success:function(data){
        $('#message').html(data);
      }
    });
  })
 
  $('#resendcode').click(function(){
    $('#timer').show();
    $('#resendcode').hide();
    var email=$('#cpEmail').val();
    $.ajax({
      url: 'queries/emailcode.php',
      method: 'post',
      data: {email:email},
      success:function(data){
        $('#message').html(data);
      }
    });
    
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
  setInputFilter(document.getElementById("code"), function(value) {
    return /^-?\d*$/.test(value); });
  
  $('#submitcode').click(function(){
    var code = $('#code').val();
    var email=$('#cpEmail').val();
    $.ajax({
      url: 'queries/submitcode.php',
      method: 'post',
      data: {code:code, email:email},
      success:function(data){
        if(code==null){
          alert();
        }else{
          $('#message').html(data);
        }
       
      }
    });
  })
  $(document).ready(function(){
  $('#savepass').click(function(){
    var pwd1=$('#cpPassword').val();
    var pwd2=$('#cpPassword2').val();
    if(newpass()){

    }else if(pwd1!=pwd2){
      $('#changepwd').html("<small style='color: #dc3545'>Those passwords didn't match. Try again</small>");
    }
    else if((pwd1=="")&&(pwd2=="")){
      $('#changepwd').html("<small style='color: #dc3545'>Enter a password</small>");
    }else{
      
      $('#savepass').prop('type', 'submit');
      $.ajax({
        url: 'queries/changepassword.php',
        method: 'post',
        data: {pwd1:pwd1, pwd2:pwd2},
        success:function(data){
          $('#changepwd').html(data);
        }
      });
    }
    
  })
  $('#showpass').click(function(){
    var pwd1 = document.getElementById("cpPassword");
    var pwd2 = document.getElementById("cpPassword2");
    if (pwd1.type === "password"&&pwd2.type === "password") {
      pwd1.type = "text";
      pwd2.type = "text";
    } else {
      pwd1.type = "password";
      pwd2.type = "password";
    }
  });


  $('#cpPassword').PassRequirements();

  $('#cpPassword').keyup(function(){
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#_\$%\^&\*])(?=.{8,})");
    var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    var pass = $('#cpPassword').val();
    
    if(strongRegex.test(pass)==true){
      $('#changepwd').html("<small style='color: #28a745'>Strong password</small>");
    }else if(mediumRegex.test(pass)==true){
      $('#changepwd').html("<small style='color: #dc3545'>Weak password</small>");
    }else if(pass!=""){
      $('#changepwd').html("<small style='color: #dc3545'>Very weak password</small>");
    }else{
      $('#changepwd').html("<small style=''></small>");
    }
  })
  function newpass(){
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#_\$%\^&\*])(?=.{8,})");
    var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    var pass = $('#cpPassword').val();
    
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
  $('#cpPassword2').keyup(function(){
    var pwd1 = $("#cpPassword").val();
    var pwd2 = $(this).val();
    if((pwd1!=pwd2)){
      $('#changepwd').html("<small style='color: #dc3545'>Those passwords didn't match. Try again</small>");
    }else{
      $('#changepwd').html("");
    }
  })
 })
