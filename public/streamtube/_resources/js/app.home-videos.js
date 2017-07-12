'use strict';



//Initiate the grid system (only on the video page)
//(Depends on 'grid.js')
$(function() { 
	if($('.page-homevideos').length > 0){
		// Grid.init();

		//Open video description in a modal when link is clicked
		var $videoTitle = $('#videoModalLabel');
		var $videoDesc = $('#videoModalDesc');
		var $videoYear = $('#videoModalYear');
		var $videoCat = $('#videoModalCat');
		var $videoDur = $('#videoModalDur');
		var $videoImg = $('#videoModalImg');

		


		$('body').on('click', 'a[data-toggle="modal"]', function(event){
			event.preventDefault();

			$videoTitle.html($(this).data('title'));
			$videoDesc.html($(this).data('description'));
			$videoYear.html($(this).data('theyear'));
			// $videoCat.html($(this).data('description'));
			$videoDur.html($(this).data('duration'));
			$videoImg.attr({src:$(this).data('largesrc')});
			// console.log('...', $(this));
		});
	}


});