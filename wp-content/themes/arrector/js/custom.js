
////
$(document).ready( function() {
    $('#myCarousel').carousel({
		interval:   4000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});



///slider
$('.custom1').owlCarousel({
		margin:0,
		nav:true,
		items:1,
		autoplay: false,
		loop: true,
		center: true,
		mouseDrag: false,
		navigation:false,
		dots: true,
		responsive:{
			0:{
				dots: true,
				nav: false
			}, 		
		 }	
});

////

$('.custom2').owlCarousel({
		margin:0,
		nav:true,
		items:1,
		autoplay: false,
		loop: true,
		center: true,
		mouseDrag: false,
		navigation:true,
		dots: false,
		responsive:{
			0:{
				dots: false,
				nav: true
			}, 		
		 }	
});

/////
$('.custom3').owlCarousel({
		margin:0,
		nav:true,
		items:1,
		autoplay: false,
		loop: true,
		center: true,
		mouseDrag: false,
		navigation:true,
		dots: false,
		responsive:{
			0:{
				dots: false,
				nav: true
			}, 		
		 }	
});

///scroll

(function($){
		$(window).load(function(){
			
			$(".content").mCustomScrollbar({
				scrollButtons:{
					enable:true,
				},
			});
			function myCallback(el,id){
				if($(id).css("opacity")<1){return;}
				var span=$(id).find("span");
				clearTimeout(timeout);
				span.addClass("on");
				var timeout=setTimeout(function(){span.removeClass("on")},350);
			}
			
		});
		///
	$('.carousel').carousel({ pause: true, interval: false });
})(jQuery);









