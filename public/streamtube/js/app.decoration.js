/*
 * Background image slider for login and registration pages
 */
var ukumbitv_deco = (function(){
	var arrDecoImages = [
      "https://ukumbitv.com/streamtube/images/deco/x9fwkuz96805.jpg", 
      "https://ukumbitv.com/streamtube/images/deco/x9fwkuz96819.jpg", 
      "https://ukumbitv.com/streamtube/images/deco/x9fwkuz96820.jpg", 
      "https://ukumbitv.com/streamtube/images/deco/x9fwkuz96893.jpg", 
      "https://ukumbitv.com/streamtube/images/deco/x9fwkuz96768.jpg", 
      "https://ukumbitv.com/streamtube/images/deco/x9fwkuz96725.jpg", 
      "https://ukumbitv.com/streamtube/images/deco/x9fwkuz96701.jpg"
  ];

  //....
  //Shuffle array elements
	//https://css-tricks.com/snippets/javascript/shuffle-array/
	function Shuffle(o) {
		for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		return o;
	};

	var _public = {
		initialize : function(){ 
			//Shuffle...
			arrDecoImages = Shuffle(arrDecoImages); 
			//http://www.jquery-backstretch.com/
		  $.backstretch(arrDecoImages, {duration: 3000, fade: 750});
		} 
	};

	return _public;
})();




//Initialization ...
ukumbitv_deco.initialize(); 


