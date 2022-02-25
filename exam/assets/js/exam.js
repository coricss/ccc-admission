

document.addEventListener('contextmenu', event => event.preventDefault());

document.onkeypress = function (event) {  
  event = (event || window.event);  
  if (event.keyCode == 123) {  
  return false;  
  }  
  }  
  document.onmousedown = function (event) {  
  event = (event || window.event);  
  if (event.keyCode == 123) {  
  return false;  
  }  
  }  
  document.onkeydown = function (event) {  
  event = (event || window.event);  
  if (event.keyCode == 123) {  
  return false;  
  }  
}  

let floating_timer = $('.floating-timer');
let btn = $('#btn-scrolltop');
let feedback = $('#btn-feedback');

feedback.removeClass('show');
$(window).scroll(function() {
  if($('.countdown').html()=="Time's Up"||$('.countdown').html()=="Finished"||$('.countdown').html()=="00:00:00"){
    floating_timer.removeClass('show');
    btn.removeClass('show');
    feedback.addClass('show');
  }else{
    if ($(window).scrollTop() > 400) {
      floating_timer.addClass('show');
      btn.addClass('show');
      feedback.removeClass('show');
    } else {
      floating_timer.removeClass('show');
      btn.removeClass('show');
    }
  }
});
function StopConsoleText() {
  console.log("%cYAMETE KUDASAI!", "color: red; font-family: sans-serif; font-size: 4.5em; font-weight: bolder; text-shadow: #000 1px 1px;")
}
StopConsoleText()
$('.feedback-txt').keyup(function(){
  var len = $(this).val().length;
  if (len == 281) {
    $('#limit-chars').css('color', 'red');
  } else {
    $('#limit-chars').css('color', 'black');
    if($('.feedback-txt').val()==""){
      $('#limit-chars').text(0 +"/280");
    }else{
      $('#limit-chars').text(len +"/280");
    }
  }
})
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({ scrollTop: 0 }, '400');
});
feedback.click(function(e) {
  e.preventDefault();
  $('.feedback-box').toggle();
});
$('.feedback-header, .close-feedback').click(function(){
  $('.feedback-box').hide();
})
$('#fands').mouseenter(function(){
  $('#fands').addClass('bx-tada');
  $(this).mouseleave(function(){
    $('#fands').removeClass('bx-tada');
  })
})
$(document).on('submit', '#feedback-form', function(e){
  e.preventDefault();
  var message = $('#feedback-txt').val();
  var sender = $('#sendAs').val();
  $.ajax({
    url: 'queries/sendFeedback.php',
    type: 'post',
    data: {message:message, sender:sender},
    success:function(data){
      $('#leave').html(data); 
    }
  })
})
$(document).ready(function() {
	$('#sendAs').css('color','#6c757d');
	$('#sendAs').change(function() {
	var current = $('#sendAs').val();
	if (current != 'null') {
		$('#sendAs').css('color','black');
	} else {
		$('#sendAs').css('color','#6c757d');
	}
	}); 
});
// 3hrs =10800
// 4hrs =14400
var upgradeTime = 10800;
var seconds = upgradeTime;
function timer() {
  var days        = Math.floor(seconds/24/60/60);
  var hoursLeft   = Math.floor((seconds) - (days*86400));
  var hours       = Math.floor(hoursLeft/3600);
  var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
  var minutes     = Math.floor(minutesLeft/60);
  var remainingSeconds = seconds % 60;
  function pad(n) {
    return (n < 10 ? "0" + n : n);
  }
  $('.countdown').html(pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds));
  if (seconds == 0) {
    clearInterval(countdownTimer);
    $('.countdown').html("Time's Up");
    $('#autoSubmit').val('submit');
    $('#testForm').submit();
  } else {
    seconds--;
  }
  if(seconds==10797){
    var appID = $('#appID').attr('data-id');
    $.ajax({
      url: 'queries/autologout.php',
      method: 'post',
      data:{appID:appID}
    })
  }
}
var countdownTimer = setInterval('timer()', 1000);

$(document).on('submit', '#testForm', function(e){
  e.preventDefault();
  var autoSubmit = $('#autoSubmit').val();

  if(autoSubmit=='submit'){
    $.post("queries/submitAnswer.php", $(this).serialize(), function(data){
      $('#leave').html(data);
    });
    
  }else if(autoSubmit==''){
    Swal.fire({
      title: 'Submit your answer?',
      text: "Are you sure to submit your answer now?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#043e9f',
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
      },
      cancelButtonColor: '#dc3545',
      confirmButtonText: 'Yes, submit now.'
    }).then((result)=>{
      if(result.isConfirmed){
        $(window).unbind('focus');
        $.post("queries/submitAnswer.php", $(this).serialize(), function(data){
          $('#leave').html(data);
        });
      }
    })
  }else if(autoSubmit=='leave'){
    $.post('queries/submitAnswer.php', $(this).serialize(), function(data){
      $('#leave').html(data);
    });
  }  
  return false;
});

// window.onload = shuffle;

function shuffle() {
 var container = document.getElementById("all-items");
 var elementsArray = Array.prototype.slice.call(container.getElementsByClassName('question'));
     elementsArray.forEach(function(element){
     container.removeChild(element);
 })
 shuffleArray(elementsArray);
 elementsArray.forEach(function(element){
 container.appendChild(element);
 })
}

 function shuffleArray(array) {
     for (var i = array.length - 1; i > 0; i--) {
         var j = Math.floor(Math.random() * (i + 1));
         var temp = array[i];
         array[i] = array[j];
         array[j] = temp;
     }
     return array;
 }

 var mouse_is_inside = false;

 $(document).ready(function()
 {
     $('.feedback-box, #btn-feedback').hover(function(){ 
         mouse_is_inside=true; 
     }, function(){ 
         mouse_is_inside=false; 
     });
 
     $('body').mouseup(function(){ 
         if(! mouse_is_inside) {
         $('.feedback-box').hide();
         }
     });
 });