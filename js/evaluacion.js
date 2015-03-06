(function(){

var app= angular.module('evaluacion',[]);

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

app.controller("evaluacionController", [ '$scope', '$http', '$location',
	function($scope, $http, $location) {
		
		$http({
			method : 'GET',
			url : 'index.php/api/Evaluacion_api/'
		}).success(function(data, status, headers, config) {
			$scope.detalles = data;
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
    return Math.ceil($scope.detalles.length/$scope.itemsPerPage)-1;
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

	$scope.addEvaluacion = function(id){
		
		 window.location= 'Evaluacion/agregar/'+id;

	};

	$scope.view = function(id){

		alert('mi id persona es ' + id);

	};
	
	$scope.download = function(id){

		 window.location= 'Evaluacion/excel/'+id;

	};

	$scope.edit = function(id){

		window.location= 'persona/editar/'+id;

	};

	$scope.delete = function(id){

	     var r = confirm("¿Estas seguro que deseas eliminar este elemento?");

	     if (r == true) {
	    	$http({
				method : 'DELETE',
				url : 'index.php/api/Personas_api/remove/' + id
			});
			location.reload();
	     }
	};
	
	$scope.respaldo = function(){

		 var r = confirm("¿Estas seguro que deseas hacer respaldo?");

	     if (r == true) {
	    	$http({
				method : 'POST',
				url : 'index.php/api/Personas_api/respaldo'
			});
			location.reload();
	     }

	};


}]);

angular.module('evaluacion').filter('pagination', function()
{
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});

})();