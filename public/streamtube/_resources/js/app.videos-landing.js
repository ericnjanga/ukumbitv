'use strict';

(function($){

	//some code
	$('body').on('mouseenter', '.video-thumbnail', function(){
		$(this).find('.video-thumbnail-accordion').collapse('show');
	}).on('mouseenter', '.video-thumbnail', function(){
		$(this).find('.video-thumbnail-accordion').collapse('hide');
	});

})(jQuery);