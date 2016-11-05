(function(){
	'use strict';

	angular
		.module('adminModule')
		.controller('sidenavCtrl', sidenavCtrl);

	sidenavCtrl.$inject = ['$scope', '$timeout', '$mdSidenav']; 

	function sidenavCtrl($scope, $timeout, $mdSidenav) {
		    $scope.toggleLeft = buildToggler('left');
		    $scope.toggleRight = buildToggler('right');

		    function buildToggler(componentId) {
		      return function() {
		        $mdSidenav(componentId).toggle();
		      }
		    }
		  };
})();