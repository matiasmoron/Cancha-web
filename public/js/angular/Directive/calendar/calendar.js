(function(){

    angular
        .module('ui-calendar')
        .directive("calendarUi", [function () {
            return {
                restrict: 'E',
                selected: "=",
                defaultView:"@",
                turnosAdmin: "=",
                turnosUser: "=",
                getTurnoAdminCancha: "&",
                openOptionTurno: "&",
                require: "^calendarUi",
                controller:['$scope', function($scope) {
                    this.nextNew = function() {
                        $scope.todayAvailable = false;
                    }
                }],
                controllerAs:'calendarCtrl',
                transclude: true,
                templateUrl: '../js/angular/Templates/calendar.html',

                link: function (scope, element, attrs, controller) {
                    var calendarCtrl = controller;
                    
                    console.log(scope);

                    if(scope.defaultView){
                        scope.selectedView = scope.defaultView;
                    }else{
                        scope.selectedView = 'day';
                    }

                    scope.next = function(){
                        calendarCtrl.next = true;
                    };

                    scope.previous = function(){
                        calendarCtrl.previous = true;
                    };

                    scope.gotoToday = function () {
                        calendarCtrl.selected = moment();

                    };

                    scope.selectView = function(view){
                        scope.selectedView = view;
                    };
                }
            };
        }]);
})();
