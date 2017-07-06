'use strict';



//Initiate the grid system (only on the video page)
//(Depends on 'grid.js')
$(function() { 
	if($('.page-homevideos').length > 0){
		Grid.init();
	}
});