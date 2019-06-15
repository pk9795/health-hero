$(document).ready(function(){

	// slick slider about-us page
	$('.slider').slick({
		dots: true,
		speed: 300,
		autoplay: true,
		slidesToShow: 1,
	});

	new WOW().init();

	// services click and then scrollto that content 

	$('.scrollTo').click(function(){
		$('html, body').animate({
			scrollTop: $( $(this).attr('href') ).offset().top
		}, 1000);
		return false;
	});

	// slick slider in homepage

	$('.about-slider').slick({
		dots: true,
		speed: 300,
		autoplay: true,
		slidesToShow: 1,
		infinite: true
		
	});


	// top scroller btn

	var btn = $('#button');

	$(window).scroll(function() {
		if ($(window).scrollTop() > 300) {
			btn.addClass('show');
		} else {
			btn.removeClass('show');
		}
	});

	btn.on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop:0}, '300');
	});



});