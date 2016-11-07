(function(){
	'use strict';

	angular
		.module('adminModule')
		.controller('modalCtrl', modalCtrl);

		modalCtrl.$inject = ['$scope', '$mdDialog', '$filter'];

		function modalCtrl($scope, $mdDialog, $filter) 
		{
		  $scope.status = '  ';
		  $scope.customFullscreen = false;

		  $scope.showDisponible = function(ev,idTurnoAdmin) {
		    $mdDialog.show({
		      controller: DialogDispController,
		      templateUrl: '../js/angular/Templates/turnoDisp.html',
		      parent: angular.element(document.body),
		      targetEvent: ev,
		      clickOutsideToClose:true,
		      fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
		    });
		    $mdDialog.idTurnoAdmin = idTurnoAdmin;
		  };

		  $scope.showNoDisponible = function(ev,idTurnoAdmin,idTurnoUser) {
		    $mdDialog.show({
		      controller: DialogNoDispController,
		      templateUrl: '../js/angular/Templates/turnoNoDisp.html',
		      parent: angular.element(document.body),
		      targetEvent: ev,
		      clickOutsideToClose:true,
		      fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
		    });
		    $mdDialog.idTurnoAdmin = idTurnoAdmin;
		    $mdDialog.idTurnoUser = idTurnoUser;
		  };


		  function DialogDispController($scope, $mdDialog, $filter) {

	   		angular.forEach($scope.$$prevSibling.admin.turnosAdmin, 
	   			function(value, key)
		   		{
		   			if(value.id === $mdDialog.idTurnoAdmin)
	  					$scope.turno = value;
		   		});

		    $scope.hide = function() {
		      $mdDialog.hide();
		    };

		    $scope.cancel = function() {
		      $mdDialog.cancel();
		    };

		    $scope.reservar = function(idTurnoAdmin)
		    {
		    	$scope.$$prevSibling.setReservaTurno(idTurnoAdmin);
		    	$mdDialog.hide();
		    }

		    $scope.fijar = function()
		    {
		    	console.log('fijar');
		    	$mdDialog.hide();
		    }

		    $scope.deshabilitar = function()
		    {
		    	console.log('deshabilitar');
		    	$mdDialog.hide();
		    }

		  }

		  function DialogNoDispController($scope, $mdDialog, $filter) {

		  	angular.forEach($scope.$$prevSibling.admin.turnosAdmin, 
	   			function(value, key)
		   		{
		   			if(value.id === $mdDialog.idTurnoAdmin)
	  					$scope.turno = value;
		   		});

		  	$scope.idTurnoUser = $mdDialog.idTurnoUser;

		  	$scope.hide = function() {
		  	  $mdDialog.hide();
		  	};

		  	$scope.cancel = function() {
		  	  $mdDialog.cancel();
		  	};

		  	$scope.bajarReserva = function(idTurnoUser)
		  	{
		  		$scope.$$prevSibling.deleteReservaTurno(idTurnoUser);
		  		$mdDialog.hide();
		  	}

		  	$scope.bajarFijo = function()
		  	{
		  		console.log('saco fijo');
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