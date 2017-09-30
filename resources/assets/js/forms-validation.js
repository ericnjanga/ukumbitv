/**
 **************************[UkumbiTV App]**************************
 **************************[UkumbiTV App]************************** 
 */
  
// main app
var ukumbitvApp = angular.module('ukumbitvApp', []);



 

/**
 **************************[UkumbiTV Services]**************************
 **************************[UkumbiTV Services]************************** 
 */
ukumbitvApp.factory('servMovies', function() {
  var arrMovies = [{
  	
  }];
  // factory function body that constructs arrMovies
  return arrMovies;
});



 

/**
 **************************[UkumbiTV Services]**************************
 **************************[UkumbiTV Services]************************** 
 */
ukumbitvApp.controller('InstantSearchController', 
	['$scope','servMovies', function($scope,servMovies){

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

