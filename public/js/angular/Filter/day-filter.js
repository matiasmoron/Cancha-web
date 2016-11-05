(function(){
	'use strict';

	angular
		.module('ui-calendar')
		.filter('dayfilter', dayfilter);

		 function dayfilter(){
				return function(input,scope)
				{
					var day = scope.selectedDate.date.day();
					var result = [];

					angular.forEach(input, function(value,key){
						if((value.id_dia % 7) == day){
							result.push(value);
						}
					});

					return result;
				}				
			};
})();