'use strict';



//Initiate the grid system (only on the video page)
//(Depends on 'grid.js')
$(function() { 
	if($('.page-homevideos').length > 0){


        
    // Initialize lazy load librairy
    //http://dinbror.dk/blog/blazy/?ref=demo-page
    var bLazy = new Blazy({
      
      success: function(element){
		    setTimeout(function(){
			// We want to remove the loader gif now.
			// First we find the parent container
			// then we remove the "loading" class which holds the loader image
			var parent = element.parentNode;
			parent.className = parent.className.replace(/\bloading\b/,'');
		    }, 200);
	        }
	   });



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