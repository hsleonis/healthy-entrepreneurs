/* angular/directives/ -> main.dic.js file */

app.directive('ngDataTable', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            angular.element(element).ready(function() {
                /*setTimeout(function(){
                    $(element).DataTable({
                            responsive: true
                    });
                    console.info('Table initialized.');
                },100);*/
            });
        },
        templateUrl: 'templates/table.tpl.html',
        controller: 'tableController',
        controllerAs: 'tblCtrl'
    }
});

// User table
app.directive('ngUserTable', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            angular.element(element).ready(function() {
                
            });
        },
        templateUrl: 'templates/user-table.tpl.html',
        controller: 'userTableController',
        controllerAs: 'tblCtrl'
    }
});

// User table
app.directive('ngQueryTable', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            angular.element(element).ready(function() {
                
            });
        },
        templateUrl: 'templates/user-table.tpl.html',
        controller: 'queryController',
        controllerAs: 'tblCtrl'
    }
});

// Query assignment table
app.directive('ngQassTable', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            angular.element(element).ready(function() {
                
            });
        },
        templateUrl: 'templates/queryass-table.tpl.html'
    }
});

// Query table
app.directive('ngQuTable', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            angular.element(element).ready(function() {
                
            });
        },
        templateUrl: 'templates/query-table.tpl.html'
    }
});

app.directive('ngLogout', function() {
    return{
        restrict: 'A',
        link: function(scope, element, attrs){
            
        },
        controller: function($http,$scope) {
            $scope.logout = function(){
                $http.post('apis/loginAPI',{code: '7'}).success(function(data){
                    $http.post('http://37.230.100.79/dashb/api/logout',data).success(function(data){
                        $http.post('admin/logout',data).success(function(data){
                            window.self.location.href = 'http://dcastalia.com/projects/web/dashboard/login';
                        });
                    });
                });
            }
        }
    }
});

app.directive('editUserModal', function() {
    return{
        restrict: 'A',
        link: function(scope, element, attrs){
            
        },
        controller: function($http,$scope) {
            $scope.edit = function(user){
                /*$http.post('admin/logout',{auth: 'false'}).success(function(data){
                    window.self.location('login');
                });*/
                console.log(user);
            }
        }
    }
});