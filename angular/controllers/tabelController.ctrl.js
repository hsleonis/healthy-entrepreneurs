/*
Table controller
*/

app.controller('tableController',[ '$http', '$scope', function($http, $scope) {
    $http.get('test.json?id=').success(function(data){
        $scope.json = data;
        setTimeout(function(){
            $('#data-table').DataTable({
                    responsive: true
            });
            console.info('Table initialized.');
            $('.preloader').hide(200);
        },100);
    });
}]);