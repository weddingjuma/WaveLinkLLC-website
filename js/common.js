$( document ).ready(function() {
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		//alert(scroll);
		if (scroll >= 30) {
			$(".header").addClass("header_background", 250, "linear");
		} else {
			$(".header").removeClass("header_background", 250, "linear");
		}
	});	
});

$( document ).ready(function() {
	$('#nav_button').click( 
		function() {
			var position = $('.menu').position();
			if(position.left < 0) {
				$('.menu').animate({ left: 0 }, 'fast', function() {
					$('#nav_button').css('color', '#f9d204');
				});
			} else {
				$('.menu').animate({ left: -500 }, 'fast', function() {
					$('#nav_button').css('color', 'white');
				});
			}
		}
	);
});