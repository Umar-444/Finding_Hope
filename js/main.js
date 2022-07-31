


  // Initiate the wowjs
  new WOW().init();


  $(document).ready(function() {

var div_box="<div id='loader-wrapper'><div id='loader'></div></div>";

$('body').prepend(div_box);
$('#loader-wrapper').delay(1000).fadeOut(1200, function(){
$(this).remove();
});




  // Initiate the wowjs
  new WOW().init();


  $(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
      $('.back-to-top').fadeIn('slow');
      $('#myNavbar').addClass('myNavbar-fixed');
    } else {
      $('.back-to-top').fadeOut('slow');
      $('#myNavbar').removeClass('myNavbar-fixed');
    }
  });

  
    $('.back-to-top').click(function(){
   
    $('html, body').animate({scrollTop : 0},2000, 'easeInOutExpo');
   
    return false;
  });





});

	$(document).ready(function () {
$('.dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });



	$("#logout").click(function(){
		 var logout = 'logout';
                $.post('logout.php', {logout:logout}, function(logout) {
        
            if (logout == 0) {
                  window.location ="index.php";
                }
      });
	});
});
