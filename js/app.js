(function(){

var prueba = {name:'soy un test',from:'angular.js'};
var app= angular.module('test',[]);

app.controller('Prueba',function(){
this.product= prueba;

});

app.controller("ApiController", [ '$scope', '$http', '$location',
	function($scope, $http, $location) {
		$http({
			method : 'GET',
			url : 'index.php/User/'
		}).success(function(data, status, headers, config) {
			$scope.profiles = data;
						$scope.itemsPerPage = 10;
			$scope.currentPage = 0;
		}).error(function(data, status, headers, config) {
			alert( "failure");
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
    return Math.ceil($scope.profiles.length/$scope.itemsPerPage)-1;
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

	$scope.edit = function(id){

		 window.location= 'auth/edit_user/'+id;

	};

	$scope.delete = function(id){

	     var r = confirm("¿Estas seguro que deseas eliminar este elemento?");

	     if (r == true) {
	    	$http({
				method : 'DELETE',
				url : 'index.php/User/remove/' + id
			});
			location.reload();
	     }else{}
	};

	$scope.createNewUser = function(){

		 window.location= 'auth/create_user';

	};

	$scope.createNewGroup = function(){

		 window.location= 'auth/create_group';

	};


}]);

angular.module('test').filter('pagination', function()
{
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});

})();