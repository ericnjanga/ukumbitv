'use strict';

(function($){

	//some code
	$('body').on('mouseenter', '.video-thumbnail', function(){
		$(this).find('a[data-toggle="collapse"]').trigger('click');
		console.log('>>>> mouseenter');
	}).on('mouseleave', '.video-thumbnail', function(){
		$(this).find('a[data-toggle="collapse"]').trigger('click');
		console.log('>>>> mouseleave');
	});

})(jQuery);