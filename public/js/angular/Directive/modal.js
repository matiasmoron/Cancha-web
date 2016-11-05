(function(){
	'use strict';

	angular
		.module('adminModule')
		.directive('makeModal', makeModal);

	function makeModal() {

		var linkModal = function (scope, element, attrs) {
			
			$('#refModal').leanModal();

			$('#refModal').on('click');
		}

		return {
			restrict:'E',
			link: linkModal
		}
	}

})();