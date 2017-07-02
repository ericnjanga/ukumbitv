'use strict';

//Grid system script prepended here
//...

//Initiate the grid system (only on the video page)
$(function() {
	if($('.page-videos').length > 0){
		Grid.init();
	}
});