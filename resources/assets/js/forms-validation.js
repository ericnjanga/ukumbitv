/**
 **************************[UkumbiTV App]**************************
 **************************[UkumbiTV App]************************** 
 */ 
// main app
var ukumbitvApp = angular.module('ukumbitvApp', ['ngAnimate']);
//Changing angular tags to avoid collision with Blade
ukumbitvApp.config(['$interpolateProvider', function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
}]);


 

// [service] Fetch movies from the server
ukumbitvApp.factory('servMovies', ['$http','$log', function($http, $log) {
  // var arrMovies = [
	 //  {
	 //  	title : 'Le Contrat',
	 //  	poster : 'https://ukumbitv.com/images/20170928165134/small_image21506617494le-contrat.jpg',
	 //  	video_url : 'https://ukumbitv.com/video/20170928165134',
	 //  	excerpt : 'vjsvse fif fqefqefi, vwvwfi qfqpofjoqfeufo',
	 //  	category: 'catxxx'
	 //  },
	 //  {
	 //  	title : 'Ultime Sursis',
	 //  	poster : 'https://ukumbitv.com/images/20170927160230/small_image21506528150ultime_sursis.jpg',
	 //  	video_url : 'https://ukumbitv.com/video/20170927160230',
	 //  	excerpt : 'vjsvse fif fqefqefi, vwvwfi qfqpofjoqfeufo',
	 //  	category: 'catxxx'
	 //  },
	 //  {
	 //  	title : 'Les deux pères',
	 //  	poster : 'https://ukumbitv.com/images/20170927031133/small_image21506481893les-2-peres.jpg',
	 //  	video_url : 'https://ukumbitv.com/video/20170927031133',
	 //  	excerpt : 'vjsvse fif fqefqefi, vwvwfi qfqpofjoqfeufo',
	 //  	category: 'catxxx'
	 //  },
	 //  {
	 //  	title : 'Officines ',
	 //  	poster : 'https://ukumbitv.com/images/20170927021402/small_image21506478442Officines.jpg',
	 //  	video_url : 'https://ukumbitv.com/video/20170927021402',
	 //  	excerpt : 'vjsvse fif fqefqefi, vwvwfi qfqpofjoqfeufo',
	 //  	category: 'catxxx'
	 //  },
  // ];

  var _get = function (){ 

	  return $http.get(
	  	document.location.origin + '/get-all-movies',
			{ cache: true }
		)
  }
  // factory function body that constructs arrMovies
  return {
  	get : _get
  };
}]);


// [filter] 
// arr: data that is to be filtered
// searchString: argument that may be passed with a colon (searchFor:searchString)
ukumbitvApp.filter('searchForMovies', function(){ 
	return function(arr, searchString){ 
		if(!searchString){
			return arr;
		}

		var result = []; 
		searchString = searchString.toLowerCase();

		// Using the forEach helper method to loop through the array
		angular.forEach(arr, function(item){ 
			if(item.title.toLowerCase().indexOf(searchString) !== -1){
				result.push(item);
			} 
		});
		return result;
	};
});//[end] serchfor filter



 

/**
 **************************[UkumbiTV Services]**************************
 **************************[UkumbiTV Services]************************** 
 */
ukumbitvApp.controller('InstantSearchController', 
	['$scope','servMovies','$log', function($scope, servMovies, $log){

		// $log.log('...servMovies=',servMovies.get());
		servMovies.get().then(function successCallback(response) {
			// $log.log('>>>response=', response);
			$scope.movies = response.data;
			$log.log('>>>>response.data=',response.data);
	    // this callback will be called asynchronously
	    // when the response is available
	  }, function errorCallback(response) {
			// $log.log('>>>response(error)=', response);
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });
	}
]);






/**
 **************************[forms-validation.js]**************************
 **************************[forms-validation.js]************************** 
 */
 
// validationApp 
var validationApp = angular.module('validationApp', ['ngPassword']);

// mainController
validationApp.controller('mainController', ['$scope', function($scope) {
	// function to submit the form after all validation has occurred			
	$scope.submitForm = function() {
		// check to make sure the form is completely valid
		// if ($scope.userForm.$valid) {
		// 	alert('our form is amazing');
		// }
	};
}]);

