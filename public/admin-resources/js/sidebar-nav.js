'use strict';

/**
 * Controlling Admin sidebar navigation
**/
$(function () { 
  //Assign "view" and "add" button urls based on the page
  //......................................................
  //......................................................
  var page_url = document.location.href,
  		$btn_qc1 = $('#btn-qc-add'),
  		$btn_qc2 = $('#btn-qc-view');

	if (page_url.indexOf('user') > -1 || page_url.indexOf('users') > -1){
  	var $menu_item = $('#sidebar-menu > #users'); 
  }
  else if (page_url.indexOf('category') > -1 || page_url.indexOf('categories') > -1){
  	var $menu_item = $('#sidebar-menu > #categories'); 
  }
  else if(page_url.indexOf('actor') > -1 || page_url.indexOf('actors') > -1){
  	var $menu_item = $('#sidebar-menu > #actors'); 
  }
  else if(page_url.indexOf('director') > -1 || page_url.indexOf('directors') > -1){
  	var $menu_item = $('#sidebar-menu > #directors'); 
  	console.log('>>>>$menu_item=', $menu_item);
  }
  else if(page_url.indexOf('lang') > -1 || page_url.indexOf('langs') > -1){
  	var $menu_item = $('#sidebar-menu > #langs'); 
  }
  //For movies (exclude movie producers)
  else if((page_url.indexOf('movie') > -1 || page_url.indexOf('videos') > -1) && page_url.indexOf('movie-producer') == -1){
  	var $menu_item = $('#sidebar-menu > #videos'); 
  }
  else if(page_url.indexOf('producer-agent') > -1 || page_url.indexOf('producer-agents') > -1){
  	var $menu_item = $('#sidebar-menu > #producer_agents'); 
  }
  else if (page_url.indexOf('movie-producer') > -1 || page_url.indexOf('movie-producers') > -1){
  	var $menu_item = $('#sidebar-menu > #movie_producers'); 
  }
  else if (page_url.indexOf('payment-plan') > -1 || page_url.indexOf('payment-plans') > -1){
    var $menu_item = $('#sidebar-menu > #payment_plans');
  }

  //Assig link values
  if($menu_item!==undefined && $menu_item.length > 0){ 
  	$btn_qc1.attr('href', $menu_item.data('btn-add'));
  	$btn_qc2.attr('href', $menu_item.data('btn-view'));
  } 
}); 