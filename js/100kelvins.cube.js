var currentIndex = 0;
var windowWidth = $(window).width();
var windowHeight = $(window).height();
var isRotatingCube = false;

$( document ).ready(function() {
	renderCube();
});

$( window ).resize(function() {
	windowWidth = $(window).width();
	windowHeight = $(window).height();
	renderCube();
});

document.addEventListener('keydown', function(e) {
	if(e.keyCode == 38) {
		rotateCubeUp();
	} else if (e.keyCode == 40) {
		rotateCubeDown();
	}
}, false);

$('body').on( 'DOMMouseScroll mousewheel', function ( event ) {
	if( event.originalEvent.detail > 0 || event.originalEvent.wheelDelta < 0 ) {
		rotateCubeDown();
	} else {
		rotateCubeUp();
	}
});

document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);
var xDown = null;                                                        
var yDown = null;                                                        

function handleTouchStart(evt) {                                         
    xDown = evt.touches[0].clientX;                                      
    yDown = evt.touches[0].clientY;                                      
};                                                

function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) { return; }
    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;
    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;
    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
            rotateCubeDown(); 
        } else {
            rotateCubeUp();
        }                       
    } else {
        if ( yDiff > 0 ) {
            rotateCubeDown();
        } else { 
            rotateCubeUp();
        }                                                                 
    }
    xDown = null;
    yDown = null;                                             
};

function renderCube() {
	$('.cube').height(windowHeight); $('.cube').width(windowWidth);
	$('.view').height(windowHeight); $('.view').width(windowWidth);
	$('figure').height(windowHeight); $('figure').width(windowWidth);
	$('.front').css({
        'transform': 'translateZ(' + windowHeight/2 + 'px)',
        '-webkit-transform': 'translateZ(' + windowHeight/2 + 'px)',
        '-moz-transform': 'translateZ(' + windowHeight/2 + 'px)'
    });
    $('.top').css({
        'transform': 'rotateX(90deg) translateZ(' + windowHeight/2 + 'px)',
        '-webkit-transform': 'rotateX(90deg) translateZ(' + windowHeight/2 + 'px)',
        '-moz-transform': 'rotateX(90deg) translateZ(' + windowHeight/2 + 'px)'
    });
    $('.back').css({
        'transform': 'rotateX(180deg) translateZ(' + windowHeight/2 + 'px)',
        '-webkit-transform': 'rotateX(180deg) translateZ(' + windowHeight/2 + 'px)',
        '-moz-transform': 'rotateX(180deg) translateZ(' + windowHeight/2 + 'px)'
    });
    $('.bottom').css({
        'transform': 'rotateX(-90deg) translateZ(' + windowHeight/2 + 'px)',
        '-webkit-transform': 'rotateX(270deg) translateZ(' + windowHeight/2 + 'px)',
        '-moz-transform': 'rotateX(270deg) translateZ(' + windowHeight/2 + 'px)'
    });
    $('.cube').css({
        'transform': 'translateZ(-' + windowHeight/2 + 'px)',
        '-webkit-transform': 'translateZ(-' + windowHeight/2 + 'px)',
        '-moz-transform': 'translateZ(-' + windowHeight/2 + 'px)'
    });
}

function rotateCubeUp() {
	if(!isRotatingCube) {
		if(currentIndex == 0) { currentIndex = 3; } else { currentIndex--; }
		rotateCube();
	}
}

function rotateCubeDown() {
	if(!isRotatingCube) {
		if(currentIndex == 3) { currentIndex = 0; } else { currentIndex++; }
		rotateCube();
	}
}

function rotateCube() {
	isRotatingCube = true;
	switch(currentIndex) {
		case 0: 
			$('.cube').css({ 
				'transform': 'translateZ(-' + windowHeight/2 + 'px)',
				'-webkit-transform': 'translateZ(-' + windowHeight/2 + 'px)',
				'-moz-transform': 'translateZ(-' + windowHeight/2 + 'px)'
			});
			break;
		case 1: 
			$('.cube').css({ 
				'transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(90deg)',
				'-webkit-transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(90deg)',
				'-moz-transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(90deg)'
			});
			break;
		case 2: 
			$('.cube').css({ 
				'transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(180deg)',
				'-webkit-transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(180deg)',
				'-moz-transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(180deg)'
			});
			break;
		case 3: 
			$('.cube').css({ 
				'transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(270deg)',
				'-webkit-transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(270deg)',
				'-moz-transform': 'translateZ(-' + windowHeight/2 + 'px) rotateX(270deg)'
			});
			break;
	}
	setTimeout(function(){
		isRotatingCube = false;
	}, 1100);
}