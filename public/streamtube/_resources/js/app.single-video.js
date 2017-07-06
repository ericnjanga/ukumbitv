'use strict';




/**
 * Display navigation only if mouse is moving
 * ------------------------------------------
*/
if($('.page-singlevideo').length > 0){
	var $nav = $('.main-nav-singlevideo'),
		hide_timeout = 0,
		hide_delay = 4000;
	//...
	$('body').mousemove(function( event ) { 
		//cancel hidding navigation
		clearTimeout(hide_timeout);
		//show nav if hidden
		if($nav.is(':hidden')){
			$nav.fadeIn('slow');
		}
		
	  //When mouse stops moving, hide nav if 
	  //mouse stays still for at least "hide_delay"
	  var lastTimeMouseMoved = new Date().getTime();
		var t = setTimeout(function() {
		  var currentTime = new Date().getTime();
		  if (currentTime - lastTimeMouseMoved > 1000) {
		    hide_timeout = setTimeout(function(){
		    	$nav.fadeOut('slow');
		    }, hide_delay);
		  }
		}, 1000);

	});


	//Go back to prevous page when "back"
	//button is clicked
	$('body').on('click', '#btn-history-back', function(){
		window.history.back();
	});
}