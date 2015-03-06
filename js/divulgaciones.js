
(function(){

var app= angular.module('divulgaciones',[]);

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

	app.controller("addDivController", ['$scope', '$http', '$location',
        function ($scope, $http, $location) {
		
                
                $scope.addDiv = function () {
				
					var time = $.now();
					
                    $(".result").append('<tr id="'+ time +'" class="test">'+
					'<td>'+
						'<input id="radio_'+ time +'" onclick="radioOp(radioOptions_'+ time +')" type="checkbox">&nbsp; Radio</input>'+
						'<div id="radioOptions_'+ time +'">'+
							'<p>'+
								'<label style="font-size: 12px;" for="emisora">Emisora:</label><br>'+
								'<input id="emisoras_'+ time +'" maxlength="20" class="auth-input" type="text" value="" name="emisoras[]"></input>'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;" for="dial">Dial:</label><br>'+
								'<input id="dial_'+ time +'" maxlength="6" class="auth-input" type="text" value="" name="dial[]"></input>'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;" for="hora">Hora de emision:</label><br>'+
								'<input id="horaR_'+ time +'" class="auth-input" readonly type="text" value="" name="horaR[]"></input>'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;" for="tDiv">Tipo de Divulgacion:</label><br>'+
								'<select id="tipDiv_'+ time +'" class="auth-input" name="tipDiv[]" style="max-width: 300px !important; text-align: center;">'+
									'<option value="" selected>Seleccione..</option>'+
									$.get("index.php/api/Divulgaciones_api/getRadiojs").done(function (data) {
										$('#tipDiv_'+time).html(data);
									}) +
								'</select>'+
							'</p>'+
						'</div>'+
					'</td>'+
					'<td>'+
						'<input id="tv_'+ time +'" type="checkbox" onclick="tvOp(tvOptions_'+time+')">&nbsp; Televisi&oacute;n</input>'+
						'<div id="tvOptions_'+ time +'">'+
							'<p>'+
								'<label style="font-size: 12px;" for="nomTv">Nombre del programa:</label><br>'+
								'<input id="nombreTv_'+ time +'" maxlength="40" class="auth-input" type="text" value="" name="nombreTv[]"></input>'+
								'</p>'+
							'<p>'+
								'<label style="font-size: 12px;" for="canal">Canal:</label><br>'+
								'<input id="canal_'+ time +'" maxlength="20" class="auth-input" type="text" value="" name="canal[]"></input>'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;" for="horaTv">Hora del Programa:</label><br>'+
								'<input id="horatv_'+ time +'" class="auth-input" readonly type="text" value="" name="horatv[]"></input>'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;" for="divT">Tipo de Divulgacion:</label><br>'+
								'<select id="tipDivTv_'+ time +'" class="auth-input" name="tipDivTv[]" style="max-width: 300px !important; text-align: center;">'+
									'<option value="" selected>Seleccione..</option>'+
									$.get("index.php/api/Divulgaciones_api/getTvjs").done(function (data) {
										$('#tipDivTv_'+time).html(data);
									}) +
								'</select>'+
							'</p>'+
						'</div>'+
					'</td>'+
					'<td>'+
						'<input id="prensa_'+ time +'" onclick="prensaOp(prensaOptions_'+time+')" type="checkbox">&nbsp; Prensa</input>'+
						'<div id="prensaOptions_'+ time +'">'+
							'<p>'+
								'<label style="font-size: 12px;" for="nombre">Nombre del Medio:</label><br>'+
								'<input id="nombrePrensa_'+ time +'" maxlength="40" class="auth-input" type="text" value="" name="nombrePrensa[]"></input>'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;" for="nombre">Fecha de la Noticia:</label><br>'+
								'<input name="fecha[]"class="auth-input" type="text" id="fecha'+ time +'" readonly >'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;">Tipo de Divulgacion:</label><br>'+
								'<select onChange="getPrensa(this)" id="tipDivPrensa_'+ time +'" class="auth-input" name="tipDivPrensa[]" style="max-width: 300px !important; text-align: center;">'+
									'<option value="" selected>Seleccione..</option>'+
									'<option value="fisica">Fisica </option>'+
									'<option value="digital">Digital </option>'+
								'</select>'+
							'</p>'+
							'<p>'+
								'<label style="font-size: 12px;">Seleccione:</label><br>'+
								'<select id="tipDivPrensaSel_'+ time +'" class="auth-input" name="tipDivPrensaSel[]" style="max-width: 300px !important; text-align: center;">'+
								'<option value="" selected>Seleccione..</option>'+
								'</select>'+
							'</p>'+
						'<div>'+
					'</td>'+
					'<td>'+
					'<a onclick="eliminar('+time+')" class="fa fa-minus btn btn-danger rem"></a>'+
					'</td>'+
					'</tr>');
					
					$('#radioOptions_'+ time).hide();
					$('#tvOptions_'+ time).hide();
					$('#prensaOptions_'+ time).hide();
					$("#fecha"+ time).datepicker();
					$("#horaR_"+ time).timepicker();
					$("#horatv_"+ time).timepicker();
                };

            $('form').submit(function (e) {

                $('.disp').prop('disabled',false);

                var values = $('input[name="transacc[]"]').map(function () {
                    return this.value;
                }).toArray();

                var hasDups = !values.every(function (v, i) {
                    return values.indexOf(v) == i;
                });
                if (hasDups) {
                    // having duplicate value
                    $('.response').append(
                        "<div class='alert alert-danger info' role='alert'>"+
                        "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>"+
                        "<span class='sr-only'>Error:</span>Una o mas cuotas estan repetidas, por favor, verifique e intente de nuevo"+
                        "</div>");
                    e.preventDefault();
                } else {
                    var configu = $("#myWizard").serialize();
                    var datos = {
                        serialize: configu
                    };
                    $.post("index.php/api/Contribuyente_api/vere", datos, function (data) {
                        window.open('Auth/Contribuyente_comprobante/' + data);
                        window.location = 'Auth/Contribuyente';
                    });
                }

            });
			
		}]);

app.controller("divulgacionesController", [ '$scope', '$http', '$location',
	function($scope, $http, $location) {
		$http({
			method : 'GET',
			url : 'index.php/api/Divulgaciones_api/'
			
		}).success(function(data, status, headers, config) {
			$scope.divulgaciones = data;
			console.log(data);
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
    return Math.ceil($scope.divulgaciones.length/$scope.itemsPerPage)-1;
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

		 window.location= 'Divulgaciones/agregar';

	};

	$scope.view = function(id){

		window.location= 'Divulgaciones/ver/'+id;

	};
	
	$scope.viewInforme = function(id){

		window.open('Divulgaciones/show_informe/'+id,'_blank');

	};

	$scope.edit = function(id){

		window.location= 'Divulgaciones/editar/'+id;

	};

	$scope.delete = function(id){
	     var r = confirm("¿Estas seguro que deseas eliminar este elemento?");

	     if (r == true) {
	    	$http({
				method : 'DELETE',
				url : 'index.php/api/Divulgaciones_api/remove/' + id
			})
			location.reload();
	     }
	};


}]);

angular.module('divulgaciones').filter('pagination', function()
{
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});

	app.filter('nombreDivR', function () {
	  return function (item) {
		  if (item!=null){
			  item= 'Radio';
		  }else if(item ==0){
			item='';
		  }
		  return item;
	  };
	});
	app.filter('nombreDivTv', function () {
	  return function (item) {
		  if (item!=null){
			  item= 'Television';
		  }else if(item ==0){
			item='';
		  }
		  return item;
	  };
	});
	app.filter('nombreDivP', function () {
	  return function (item) {
		  if (item!=null){
			  item= 'Prensa';
		  }else if(item ==0){
			item='';
		  }
		  return item;
	  };
	});

})();