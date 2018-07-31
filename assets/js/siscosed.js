// APLICACIÓN
var modulo = angular.module('sis',['ngRoute']);

// GESTIÓN DE CONTROLADORES
modulo.controller('rrhh', rrhh);
modulo.controller('manageCV', manageCV);
modulo.controller('prueba', prueba);
modulo.controller('dms_controller', dms_controller);

// INYECCION EN LOS CONTROLADORES
rrhh.$inject = ['$scope', '$http'];
manageCV.$inject = ['$scope', '$http'];
prueba.$inject = ['$scope', '$http'];
dms_controller.$inject = ['$scope', '$http'];

function prueba($scope, $http) {
	// $scope.$watch('algo',function () {		
	// 	var config = {
	// 		method: "GET",
	// 		url: $scope.algo
	// 	}
	// 	var response = $http(config);
	// 	response.success(function (data) {
	// 		$scope.campeonato = data;
	// 	});
	// });	
}

//CONTROLADORES
function rrhh($scope, $http) {	
	$scope.LoadMdlAddUser = function (url) {
		$scope.AddUser = url;	
	};
	$scope.LoadMdlEdit = function (url) {
		$scope.EditUser = url;
	};	
}

function manageCV($scope, $http) {	
	$scope.LoadDatosPersonales = function (url) {
		$scope.editDatosPersonales = url;
	}
	$scope.LoadAddContrato = function (url) {
		$scope.addContrato = url;
	}
	$scope.LoadEditContrato = function (url) {
		$scope.editContrato = url;
	}
	$scope.LoadAddFormacion = function (url) {
		$scope.addFormacion = url;
	}
	$scope.LoadEditFormacion = function (url) {
		$scope.editFormacion = url;
	}
	$scope.LoadAddExperiencia = function (url) {
		$scope.addExperiencia = url;
	}
	$scope.LoadEditExperiencia = function (url) {
		$scope.editExperiencia = url;
	}
	$scope.LoadAddRelacion = function (url) {
		$scope.addRelacion = url;
	}
	$scope.LoadEditRelacion = function (url) {
		$scope.editRelacion = url;
	}
	
	// $scope.addFila = function (url, $event) {
	// 	$event.preventDefault();
	// 	$http.post(url,this.formData)
	// 		.success(function (data) {
	// 			console.log(this.formData);
	// 		});
	// }
}

function dms_controller($scope, $http) {
	$scope.ruta = [];
	$scope.bien = function (url) {		
		var texto = $scope.txtBuscar;
		console.log(texto);
		$http.post(url, { buscar: texto })
			.success(function (data) {
				$scope.ruta = eval(data);
				console.log(data);
			})
			.error(function(data) {
				console.log('Error' + data);
			});
	}
}
// FUNCIONES DE CONFIGURACION
//modulo.config(['$routeProvider', rutaSiscosed]);

//Rutas
// function rutaSiscosed($routeProvider) 
// {
// 	$routeProvider
// 		.when('/', { templateURL: 'hola'})	
// }

