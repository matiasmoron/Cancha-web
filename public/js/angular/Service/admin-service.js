(function(){
	'use strict';

	angular
		.module('adminModule')
		.service('adminService', adminService);

	adminService.$inject = ['$http'];

	function adminService($http)
	{
		//Declaración de metodos de servicio servios

		//Get Data User
	    this.getDataForUser = function () {
	        return $http.get("/Cancha-web/public/admin/user");
	    }

		//Get Turnos Admin
	    this.getTurnoAdminForCancha = function (idCancha,api_token) {
	        return $http.get("/CanchaYa-WebAPI/public/api/turnoadmin/getForCancha/" + idCancha + "?api_token=" + api_token);
	    }

	    //Get Turnos Admin por Id
	    this.getTurnoAdminForId = function (idTurnoAdmin,api_token) {
	        return $http.get("/CanchaYa-WebAPI/public/api/turnoadmin/" + idTurnoAdmin + "?api_token=" + api_token);
	    }

	    //Get Establecimientos User
	    this.getEstablecimientoForUser = function (idUser,api_token) {
	        return $http.get("/CanchaYa-WebAPI/public/api/establecimiento/getForUser/" + idUser + "?api_token=" + api_token);
	    }

	    //Get Cancha por Establecimiento
	    this.getCanchaForEstabl = function (idEstabl,api_token) {
	        return $http.get("/CanchaYa-WebAPI/public/api/cancha/getForEstablecimiento/" + idEstabl + "?api_token=" + api_token);
	    }

	    //Get Turnos User por Dia
	    this.getTurnoUserForDate = function (date,idDia,idCancha,api_token) {
	        return $http.get("/CanchaYa-WebAPI/public/api/turnousuario/getForDate/" + date + "/" + idDia + "/" + idCancha +"?api_token=" + api_token);
	    }

	}

})();