'use strict';

(function($){

	//some code
	$('body').on('mouseenter', '.video-thumbnail', function(){
		$(this).find('.video-thumbnail-accordion').collapse('show');
		console.log('>>>> mouseenter');
	}).on('mouseenter', '.video-thumbnail', function(){
		$(this).find('.video-thumbnail-accordion').collapse('hide');
		console.log('>>>> mouseenter');
	});

})(jQuery);