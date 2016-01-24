/*
Login controller
*/
function loginvars(){
    return {
        baseURL : 'http://37.230.100.79/dashb/api/',
        loginAPI : 'apis/loginAPI'
    };
}

app.controller('loginController', [ '$http', '$scope', function ($http, $scope) {
    var baseURL = loginvars().baseURL;
    var loginAPI = loginvars().loginAPI;
    $scope.login = function () {
        $http.post(baseURL+'login',{auth: '9xcvm', username: $scope.email, password: $scope.password})
            .success (function (response) {
                $http.post(loginAPI,response)
                .success (function (response) {
                    if (response.success == 1) {
                        window.self.location.reload();
                    }
                    else{
                        alert(response.message);
                    }
                });
        });
	 };
}]);