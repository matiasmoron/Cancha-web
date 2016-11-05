<!DOCTYPE html>
<html>
<head>
	<title>Administración</title>

	<!-- CSS Calendar and others -->
	<link rel="stylesheet" href="../bower_components/animate.css/animate.css" />
	<link rel="stylesheet" href="../css/calendar/calendar.css">
	<link rel="stylesheet" href="../css/material.css">
	<link rel="stylesheet" href="../css/admin/adminTurnos.css">
	<link rel="stylesheet" href="../bower_components/sweetalert/dist/sweetalert.css" />
	<link rel="stylesheet" href="../bower_components/angular-material/angular-material.min.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- JS Calendar and Angular -->

		<!-- Calendar JS -->
	<script src="../bower_components/jquery/dist/jquery.js"></script>
	<script src="../bower_components/angular/angular.js"></script>
	<script src="../bower_components/angular-animate/angular-animate.js"></script>
	<script src="../bower_components/angular-route/angular-route.js"></script>
	<script src="../bower_components/materialize/bin/materialize.js"></script>
	<script src="../bower_components/moment/moment.js"></script>
	<script src="../bower_components/moment/locale/es.js"></script>
	<script src="../bower_components/angular-material/angular-material.min.js"></script>
	<script src="../bower_components/angular-aria/angular-aria.min.js"></script>
	<script src="../bower_components/angular-messages/angular-messages.min.js"></script>

		<!-- Angular JS -->
	<!--script type="text/javascript" src="../js/angular.min.js"></script-->
	<script type="text/javascript" src="../js/angular/calendar-module.js"></script>
	<script type="text/javascript" src="../js/angular/admin-module.js"></script>
	<script type="text/javascript" src="../js/angular/Service/admin-service.js"></script>
	<script type="text/javascript" src="../js/angular/Controller/admin-controller.js"></script>
	<script type="text/javascript" src="../js/angular/Controller/modal-controller.js"></script>
	<script type="text/javascript" src="../js/angular/Controller/sidenav-controller.js"></script>

		<!-- Directive -->
	<script src="../js/angular/Directive/calendar/calendar.js"></script>
	<script src="../js/angular/Directive/calendar/dayview.js"></script>
	<script src="../js/angular/Directive/calendar/monthview.js"></script>
	<script src="../js/angular/Directive/calendar/weekview.js"></script>
	<script src="../js/angular/Filter/day-filter.js"></script>
	<!--script src="../js/angular/Directive/calendar/datepicker.js"></script-->

</head>

<body ng-app="adminModule" ng-controller="adminController as admin">
	
	<div ng-controller="sidenavCtrl" ng-cloak>
		<md-toolbar class="md-theme-indigo" layout="row">
			<md-button ng-click="toggleLeft()"><md-icon md-font-library="material-icons">menu</md-icon></md-button>
			<h1 class="md-toolbar-tools">CanchaYa!</h1>
	    </md-toolbar>
	</div>
	

	<div layout="column" style="height: 500px;">
		<section layout="row" flex>
			<md-sidenav class="md-sidenav-left" md-component-id="left" md-disable-backdrop md-whiteframe="4">
				<md-toolbar class="md-theme-indigo" layout="row">
					<h1 class="md-toolbar-tools">Menu</h1>
					<div ng-controller="sidenavCtrl" ng-cloak>
						<md-button ng-click="toggleLeft()"><md-icon md-font-library="material-icons">undo</md-icon></md-button>
					</div>
				</md-toolbar>
				<md-content >
					<div layout-md="column" class="userView" style="height: 150px; margin: 0; position: relative; top: -15px;">
						<p class="" style="position: relative; top: 80px; color: white">Usuario: {{admin.currentUser.name}}</p>
			            <p class="" style="position: relative; top: 90px; color: white">Email: {{admin.currentUser.email}}</p>
					</div>
					<md-divider></md-divider>
					<md-content layout-margin>
						<p class="">Ver calendario por:</a>
					    <md-list>
					      <md-list-item class="md-3-line" ng-repeat="item in messages">
					        <div class="md-list-item-text" layout="column">
					        	<md-button class="md-primary md-raised" style="text-transform: capitalize;" ng-click="selectView('day')">Dia</md-button>
					        	<md-button class="md-primary md-raised" style="text-transform: capitalize;" ng-click="selectView('week')">Semana</md-button>
					        	<md-button class="md-primary md-raised" style="text-transform: capitalize;" ng-click="selectView('month')">Mes</md-button>
					        </div>
					      </md-list-item>
					    </md-list>
					</md-content>
					<md-divider></md-divider>					
					<div layout="column" layout-margin layout-padding>
						<md-input-container layout-margin>
				          	<label>Establecimiento</label>
							<md-select ng-model="admin.establ" ng-change="admin.getCanchaUser()">
								<md-option><em>Ninguno</em></md-option>
								<md-option ng-repeat="optionEstab in admin.establUser" ng-value="optionEstab.id" ng-disabled="$index === 1">
								  {{optionEstab.nombre}}
								</md-option>
							</md-select>
				        </md-input-container>
				        <md-input-container layout-margin>
				          	<label>Chanca</label>
							<md-select ng-model="admin.cancha" ng-disabled="admin.disableCanchaUser" ng-change="admin.getTurnoAdminCancha(this)">
								<md-option><em>Ninguno</em></md-option>
								<md-option ng-repeat="optionCancha in admin.canchaUser" ng-value="optionCancha.id">
								  {{optionCancha.nombre_cancha}}
								</md-option>
							</md-select>
				        </md-input-container>
				    </div>
				</md-content>
			</md-sidenav>
			<div layout-align="top center" flex>
  				<calendar-ui turnos-admin="admin.turnosAdmin" turnos-user="admin.turnosUser" open-option-turno="admin.openOptionTurno" get-turno-admin-cancha="admin.getTurnoAdminCancha" default-view="week"></calendar-ui>
  			</div>
		</section>
	</div>

</body>

</html>




