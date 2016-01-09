/*
Register controller
*/

var regAPI = 'apis/registerAPI';

app.controller('regController',[ '$http', '$scope', function($http, $scope) {
    $scope.reg=function() {
		  	$http.post(regAPI,{auth: 'true', username: $scope.user.username, email: $scope.user.email, password: $scope.user.password, password2: $scope.user.password2})
		  	.success(function (response) {
                $scope.regForm.$setPristine();
                $scope.user = {};
                $scope.msg = response.message;
	   		});
	 };
}]);