(function(){
	'use strict';

	angular
		.module('adminModule')
		.controller('modalCtrl', modalCtrl);

		modalCtrl.$inject = ['$scope', '$mdDialog'];

		function modalCtrl($scope, $mdDialog) 
		{
		  $scope.status = '  ';
		  $scope.customFullscreen = false;

		  $scope.showAdvanced = function(ev,turnoUser) {
		    $mdDialog.show({
		      controller: DialogController,
		      templateUrl: '../js/angular/Templates/turnoDialog.tmpl.html',
		      parent: angular.element(document.body),
		      targetEvent: ev,
		      clickOutsideToClose:true,
		      fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
		    });
		    $mdDialog.turnoUser = turnoUser;
		  };


		  function DialogController($scope, $mdDialog) {

			$scope.turno = $scope.$$prevSibling.openOptionTurno($mdDialog.turnoUser);

		    $scope.hide = function() {
		      $mdDialog.hide();
		    };

		    $scope.cancel = function() {
		      $mdDialog.cancel();
		    };

		    $scope.answer = function(answer) {
		      $mdDialog.hide(answer);
		    };

		    $scope.reservar = function()
		    {
		    	console.log('reservar');
		    	$mdDialog.hide();
		    }

		    $scope.fijar = function()
		    {
		    	console.log('fijar');
		    	$mdDialog.hide();
		    }

		    $scope.habilitar = function()
		    {
		    	console.log('habilitar');
		    	$mdDialog.hide();
		    }

		  }
		};
})();