'use strict';

//Grid system script prepended here
//...

//Initiate the grid system (only on the video page)
$(function() {
	console.log('>>>>>', $('.page-videos').length);
	console.log('>>>>>Grid=', Grid);
	if($('.page-videos').length > 0){
		Grid.init();
	}
});