(function(){

var app= angular.module('informe',[]);

var INTEGER_REGEXP = /^\-?\d+$/;
app.directive('integer', function() {
  return {
    require: 'ngModel',
    link: function(scope, elm, attrs, ctrl) {
      ctrl.$parsers.unshift(function(viewValue) {
        if (INTEGER_REGEXP.test(viewValue)) {
          // it is valid
          ctrl.$setValidity('integer', true);
          return viewValue;
        } else {
          // it is invalid, return undefined (no model update)
          ctrl.$setValidity('integer', false);
          return undefined;
        }
      });
    }
  };
});

app.controller("informeController", [ '$scope', '$http', '$location',
	function($scope, $http, $location) {
	$scope.informes = '';
		$http({
			method : 'GET',
			url : 'index.php/api/Informe_api/'
		}).success(function(data, status, headers, config) {
			$scope.informes = data;
			$scope.itemsPerPage = 10;
			$scope.currentPage = 0;
		}).error(function(data, status, headers, config) {
			alert( "Error! no se pudo obtener los datos solicitados");
		});
		
	$scope.range= function(){

		var rangeSize = 5;
	    var ps = [];
	    var start;

	    start = $scope.currentPage;
	       //  console.log($scope.pageCount(),$scope.currentPage)
	    if ( start > $scope.pageCount()-rangeSize ) {
	      start = $scope.pageCount()-rangeSize+1;
	    }

	    for (var i=start; i<start+rangeSize; i++) {
	      if(i>=0)
	         ps.push(i);
	    }
	    return ps;

	};

	$scope.prevPage = function() {
    if ($scope.currentPage > 0) {
      $scope.currentPage--;
    }
  };

  $scope.DisablePrevPage = function() {
    return $scope.currentPage === 0 ? "disabled" : "";
  };

  $scope.pageCount = function() {
    return Math.ceil($scope.informes.length/$scope.itemsPerPage)-1;
  };

  $scope.nextPage = function() {
    if ($scope.currentPage < $scope.pageCount()) {
      $scope.currentPage++;
    }
  };

  $scope.DisableNextPage = function() {
    return $scope.currentPage === $scope.pageCount() ? "disabled" : "";
  };

  $scope.setPage = function(n) {
    $scope.currentPage = n;
  };

    $scope.firstPage = function(n) {
    $scope.currentPage = 0;
  };

    $scope.lastPage = function(n) {
    $scope.currentPage = $scope.pageCount();
  };

	$scope.addEntity = function(){

		 window.location= 'Informe/agregar';

	};

	$scope.view = function(id){

		window.location= 'Informe/ver/'+id;

	};

	$scope.edit = function(id){

		window.location= 'Informe/editar/'+id;

	};
	
	$scope.viewInforme = function(id){

		window.open('Informe/show_informe/'+id,'_blank');

	};

	$scope.delete = function(id){

	     var r = confirm("¿Estas seguro que deseas eliminar este elemento?");

	     if (r == true) {
	    	$http({
				method : 'DELETE',
				url : 'index.php/api/Informe_api/remove/' + id
			});
			location.reload();
	     }else{}
	};


}]);

angular.module('informe').filter('pagination', function()
{
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});

})();