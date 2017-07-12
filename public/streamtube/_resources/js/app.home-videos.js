'use strict';



//Initiate the grid system (only on the video page)
//(Depends on 'grid.js')
$(function() { 
	if($('.page-homevideos').length > 0){
		// Grid.init();

		//Open video description in a modal when link is clicked
		var $videoTitle = $('#videoModalLabel');
		$('body').on('click', 'a[data-toggle="modal"]', function(event){
			event.preventDefault();

			$videoTitle.html($(this).data('title'));
			console.log('...', $(this));
		});
	}


});