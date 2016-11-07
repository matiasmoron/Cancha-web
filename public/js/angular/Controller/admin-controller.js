(function(){
	'use strict';

	angular
		.module('adminModule')
		.controller('adminController', adminController);

	adminController.$inject = ['$scope', '$log', 'adminService'];

	function adminController($scope, $log, adminService)
	{
		var vm = this;

		//Declaración de variables del controlador
		vm.currentUser;
		vm.turnosAdmin = null;
		vm.turnosUser = null;
		vm.turnoUserModal;
		vm.messageError;

		vm.establUser;
		vm.establ = null;

		vm.disableCanchaUser = true;
		vm.canchaUser;
		vm.cancha = null;

		//Calendar
		vm.day = moment();
		moment.locale('es');

		//Declaración de funciones del controlador
		vm.getDataUser = getDataUser;
		vm.getTurnoAdminCancha = getTurnoAdminCancha;
		vm.getEstablUser = getEstablUser;
		vm.getCanchaUser = getCanchaUser;
		vm.getTurnoUserDate = getTurnoUserDate;

		//Declaración de funciones para scope de modal
		$scope.openOptionTurno = openOptionTurno;
		$scope.setReservaTurno = setReservaTurno;
		$scope.deleteReservaTurno = deleteReservaTurno;

		//Función inicial al crear el controller
		active();

		function active()
		{
			vm.getDataUser();
		}


		//Funciones
		function getDataUser()
		{
			adminService
				.getDataForUser()
				.then(function(response){
					vm.currentUser = response.data;
					console.log(response.data);
					vm.getEstablUser();
				})
				.catch(function(error)
				{
					vm.messageError = error;
					$log.error('Error: ' + error.data);
				});
		}

		function getEstablUser()
		{
			adminService
				.getEstablecimientoForUser(vm.currentUser.id, vm.currentUser.api_token)
				.then(function(response)
				{
					vm.establUser = response.data;
					console.log(response.data);
				})
				.catch(function(error)
				{
					vm.messageError = error;
					$log.error('Error: ' + error.data);
				});
		}

		function getCanchaUser()
		{
			adminService
				.getCanchaForEstabl(vm.establ, vm.currentUser.api_token)
				.then(function(response)
				{
					vm.canchaUser = response.data;
					vm.disableCanchaUser = false;
					console.log(response.data);
				})
				.catch(function(error)
				{
					vm.messageError = error;
					$log.error('Error: ' + error.data);
				});
		}

		function getTurnoAdminCancha($scp)
		{
			if(vm.cancha != null)
			{
				adminService
				.getTurnoAdminForCancha(vm.cancha, vm.currentUser.api_token)
				.then(function(response)
				{
					vm.turnosAdmin = response.data;
					vm.getTurnoUserDate();
					console.log(vm.turnosAdmin);
				})
				.catch(function(error)
				{
					vm.messageError = error;
					$log.error('Error: ' + error.data);
				});
			}
		}

		function getTurnoUserDate()
		{
			var momentObj = $scope.calendarCtrl.selected;
			var date = getDate(momentObj);
			var id_dia = (momentObj.day() == 0) ? 7 : momentObj.day();
			console.log(date + " " + id_dia);

			adminService
			.getTurnoUserForDate(date, id_dia, vm.cancha, vm.currentUser.api_token)
			.then(function(response)
			{
				vm.turnosUser = response.data;
				console.log(vm.turnosUser);
			})
			.catch(function(error)
			{
				vm.messageError = error;
				$log.error('Error: ' + error.data);
			});
		}

		function setReservaTurno(idTurnoAdmin)
		{
			var momentObj = $scope.calendarCtrl.selected;
			var date = getDate(momentObj);

			adminService
			.addTurnoUserForDate(idTurnoAdmin, date, vm.currentUser.id, vm.currentUser.api_token)
			.then(function(response)
			{
				getTurnoUserDate();
				console.log(response.data);
			})
			.catch(function(error)
			{
				vm.messageError = error;
				$log.error('Error: ' + error.data);
			});
		}

		function setReservaTurno(idTurnoAdmin)
		{
			var momentObj = $scope.calendarCtrl.selected;
			var date = getDate(momentObj);

			adminService
			.addTurnoUserForDate(idTurnoAdmin, date, vm.currentUser.id, vm.currentUser.api_token)
			.then(function(response)
			{
				getTurnoUserDate();
				console.log(response.data);
			})
			.catch(function(error)
			{
				vm.messageError = error;
				$log.error('Error: ' + error.data);
			});
		}

		function deleteReservaTurno(idTurnoUser)
		{
			adminService
			.deleteTurnoUserForId(idTurnoUser, vm.currentUser.api_token)
			.then(function(response)
			{
				getTurnoUserDate();
				console.log(response.data);
			})
			.catch(function(error)
			{
				vm.messageError = error;
				$log.error('Error: ' + error.data);
			});
		}

		function openOptionTurno(idTurnoAdmin) 
		{	
			adminService
			.getTurnoAdminForId(idTurnoAdmin, vm.currentUser.api_token)
			.then(function(response)
			{
				vm.turnoUserModal = response.data;
			})
			.catch(function(error)
			{
				vm.messageError = error;
				$log.error('Error: ' + error.data);
			});
		}

		//private fuctions

		function getDate(momentObj)
		{
			var mes = '';
			if((parseInt(momentObj.get('month')) + 1) < 10)
			{
				mes = '0' + (parseInt(momentObj.get('month')) + 1);
			}
			else
			{
				mes = '' + (parseInt(momentObj.get('month')) + 1);
			}
			return momentObj.get('year') + '-' + mes + '-' + momentObj.get('date');
		}
	}

})();