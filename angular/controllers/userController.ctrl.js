/*
User controller
*/
function globalvars() {
    return {
        baseURL : 'http://37.230.100.79/dashb/api/',
        userAPI : 'apis/userAPI'
    };
}
function split( val ) {
  return val.split( /,\s*/ );
}
function extractLast( term ) {
  return split( term ).pop();
}
function leoAuto(id,data) {
    $(id).bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          response( $.ui.autocomplete.filter(
            data, extractLast( request.term ) ) );
        },
        focus: function() {
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          terms.pop();
          terms.push( ui.item.value );
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
}

app.controller('userController', [ '$http', '$scope', function ($http, $scope) {
    var table = '';
    var baseURL = globalvars().baseURL;
    
    if ( $.fn.dataTable.isDataTable( '#data-table' ) ) {
            table.destroy();
    }

    $http.post(baseURL+'user_list',{hash: modhash}).success(function(data) {
        $scope.json = data.data;
        setTimeout(function(){
            table=$('#data-table').DataTable({
                    responsive: true
            });
            /* console.info('Table initialized.'); */
            $('.preloader').hide(200);
            $('.show-btn').show();
        },100);
    });
    $scope.creationMsg = '';
    
    $http.post(baseURL+'area_list',{hash: modhash})
            .success (function (response) {
            $scope.areaList = response.data;
        });
    
    $scope.createUser = function () {
        $http.post(baseURL+'add_user',JSON.stringify($scope.user))
            .success (function (response) {
            $scope.creationMsg = response.response;
            //console.log(response);
        });
	 };
    
    $scope.edUser = function (p) {
        $scope.ed = p;
        console.log(p);
        $('#edit-user-modal').modal('show');
    };
    
    $scope.rmUser = function (p) {
        $scope.ed = p;
        if(confirm("This action cannot be undone. Are you sure?")){
            $('.preloader').show(50);
            if ( $.fn.dataTable.isDataTable( '#data-table' ) ) {
                table.destroy();
            }
            
            $http.post(baseURL+'remove_user',{hash:modhash, username: p[0]})
            .success (function (response) {
                $scope.creationMsg = response.response;
                
                $http.post(baseURL+'user_list',{hash: modhash}).success(function(data) {
                    $scope.json = data.data;
                    setTimeout(function(){
                        table=$('#data-table').DataTable({
                                responsive: true
                        });
                        /* console.info('Table initialized.'); */
                        $('.preloader').hide(200);
                        $('.show-btn').show();
                    },100);
                });
            });
        }
    };
    
    $scope.upUser = function (p) {
        console.log(p);
        $http.post(userAPI,p)
            .success (function (response) {
            $('#edit-user-modal').modal('hide');
            console.log('Data saved!');
        });
    };
    
}]);

app.controller('queryController', [ '$http', '$scope', function ($http, $scope) {
    var table = '';
    var actions = '';
    $scope.creationMsg = '';
    $scope.querySavedMsg = '';
    $scope.showBtn = false;
    $scope.query = {};
    var baseURL = globalvars().baseURL;
    
    // Get Area List
    $http.post(baseURL+'area_list',{hash: modhash})
            .success (function (response) {
            $scope.areaList = response.data;
    });
    
    // Create Query
    $scope.createQuery = function(query){
        $('.preloader').show(50);
        $scope.query.query = 'true'; // For testing DB Name
        $scope.query.dbid = curdb; // For testing DB ID
        
        $http.post(baseURL+'query_db',query).success(function(data){
            
            if(data.code==1) {
                if ( $.fn.dataTable.isDataTable( '#data-table' ) ) {
                    table.destroy();
                }
                
                $scope.json = data.data;
                setTimeout(function(){
                    table=$('#data-table').DataTable({
                            responsive: true
                    });
                    /* console.info('Table initialized.'); */
                    $('.preloader').hide(200);
                    $('.show-btn').show();
                },100);
            }
            else alert(data.response);
        });
    };
    
    // Save Query
    $scope.saveQuery = function(){
        var title = prompt('Please enter a query title:');
        if(title!=null && title.length){
            $scope.query.query = 'save';
            $scope.query.title = title;
            $http.post(baseURL+'query_db',$scope.query).success(function(data){
                $scope.querySavedMsg = data.message;
                alert(data.message);
            });
        }
    };
    
    // Autocomplete
    $http.post(baseURL+'gerant_list',{hash: modhash}).success(function(data){
        leoAuto("#gerantid",data.data);
    });
    $http.post(baseURL+'product_list',{hash: modhash}).success(function(data){
        leoAuto("#productid",data.data);
    });
    $http.post(baseURL+'flow_list',{hash: modhash}).success(function(data){
        leoAuto("#flowid",data.data);
    });
    $http.post(baseURL+'answer_list',{hash: modhash}).success(function(data){
        leoAuto("#answer",data.data);
    });
    $http.post(baseURL+'post_list',{hash: modhash}).success(function(data){
        leoAuto("#postid",data.data);
        leoAuto("#nextpost",data.data);
        leoAuto("#prevpost",data.data);
    });
    $http.post(baseURL+'category_list',{hash: modhash, dbid: curdb}).success(function(data){
        leoAuto("#categoryid",data.data);
    });
    $http.post(baseURL+'tag_list',{hash: modhash}).success(function(data){
        leoAuto("#taglist",data.data);
    });
    $http.post(baseURL+'alternative_list',{hash: modhash}).success(function(data){
        leoAuto("#alternateid",data.data);
    });
    $http.post(baseURL+'action_list',{hash: modhash, dbid: curdb}).success(function(data){
        $scope.actionList = data;
        actions = data;
    });
    
    // Document ready
    $(document).ready(function(){
        $("#gerantid").keyup(function() {
            if($("#gerantid").val().length>0) {
                $("select[name='areaselector']").prop('disabled', true).val('');
                $("input[name='starflow']").prop('disabled', true).val('');
            }
            else {
                $("select[name='areaselector']").prop('disabled', false);
                $("input[name='starflow']").prop('disabled', false);
            }
        });
        $("input[name='starflow']").keyup(function() {
            if($("input[name='starflow']").val().length>0) {
                $("select[name='areaselector']").prop('disabled', true).val('');
                $("#gerantid").prop('disabled', true).val('');
            }
            else {
                $("select[name='areaselector']").prop('disabled', false);
                $("#gerantid").prop('disabled', false);
            }
        });
    });
    
}]);

app.controller('queryManageController', [ '$http', '$scope', function ($http, $scope) {
    var table='';
    var querytable = '';
    $scope.creationMsg = '';
    $scope.query = {};
    var baseURL = globalvars().baseURL;
    
    // Query list
    $http.post(baseURL+'user_query',{hash: modhash})
            .success (function (response) {
            $scope.queryList = response.data.item;
        
            $scope.json2 = response.data;
            setTimeout(function(){
                querytable=$('#query-table').DataTable({
                        responsive: true
                });
            },100);
    });
    
    // Assigned Query table
    $http.post(baseURL+'user_query_list',{hash: modhash})
        .success (function (response) {
        $scope.json = response.data;
        if ( $.fn.dataTable.isDataTable( '#data-table' ) ) {
            if(typeof table.destroy !== 'undefined')
            table.destroy();
        }
        setTimeout(function(){
            table=$('#data-table').DataTable({
                    responsive: true
            });
            /* console.info('Table initialized.'); */
            $('.preloader').hide(200);
            $('.show-btn').show();
        },100);
    });
    
    // User list
    $http.post(baseURL+'user_list',{hash: modhash}).success(function(data){
        $scope.userList = data.data.item;
    });

    // Assign Query
    $scope.assignQuery = function(query){
        $('.preloader').show(50);
        if ( $.fn.dataTable.isDataTable( '#data-table' ) ) {
            table.destroy();
        }
        
        $scope.query.query = 'true';
        $scope.query.dbid = curdb;
        
        $http.post(baseURL+'assign_query',query).success(function(data){
            $scope.creationMsg = data.response;
            
            $http.post(baseURL+'user_query_list',{hash: modhash})
            .success (function (response) {
                $scope.json = response.data;
                setTimeout(function(){
                    table=$('#data-table').DataTable({
                            responsive: true
                    });
                    /* console.info('Table initialized.'); */
                    $('.preloader').hide(200);
                    $('.show-btn').show();
                },100);
            });
        });
    };
    
    // Delete Assigned Query
    $scope.rmAss = function(userid, queryid) {
        if(confirm("This action cannot be undone. Are you sure?")){
            $('.preloader').show(50);
            if ( $.fn.dataTable.isDataTable( '#data-table' ) ) {
                table.destroy();
            }
            var aquery= {
                userid : userid,
                queryid : queryid,
                query : 'true',
                dbid : curdb
}
            $http.post(baseURL+'remove_assign',aquery).success(function(data){
                $scope.creationMsg = data.response;

                $http.post(baseURL+'user_query_list',{hash: modhash})
                .success (function (response) {
                    $scope.json = response.data;
                    setTimeout(function(){
                        table=$('#data-table').DataTable({
                                responsive: true
                        });
                        /* console.info('Table initialized.'); */
                        $('.preloader').hide(200);
                        $('.show-btn').show();
                    },100);
                });
            });
        }
    };
    
    // Delete Query
    $scope.rmQuery = function(el){
        
        if(confirm("This action cannot be undone. Are you sure?")){
            if ( $.fn.dataTable.isDataTable( '#query-table' ) ) {
                querytable.destroy();
            }
            var aquery= {
                queryid : el[0],
                query : 'true',
                dbid : curdb
            }
           $http.post(baseURL+'remove_query',aquery).success(function(data){
                $scope.creationMsg = data.response;

                $http.post(baseURL+'user_query',{hash: modhash})
                .success (function (response) {
                    $scope.json2 = response.data;
                    setTimeout(function(){
                        querytable=$('#query-table').DataTable({
                                responsive: true
                        });
                        $('.preloader').hide(200);
                        $('.show-btn').show();
                    },100);
                });
            });
        }
    };
    
}]);

app.controller('reportController', [ '$http', '$scope', function ($http, $scope) {
    var table = '';
    $scope.creationMsg = '';
    $scope.query = {};
    var baseURL = globalvars().baseURL;
    
    $http.post(baseURL+'user_query_list',{hash: modhash})
            .success (function (response) {
            $scope.reports = response.data.item;
            console.log(response.data.item);
    });
    
    $scope.showReport = function(id){
        $('.preloader').show(50);
        if ( $.fn.dataTable.isDataTable( '#data-table' ) ) {
            table.destroy();
        }
        
        $http.post(baseURL+'query_db',{queryid:id,dbid: curdb, query:'true'}).success(function(data){
            $scope.json = data.data;
            setTimeout(function(){
                table=$('#data-table').DataTable({
                        responsive: true
                });
                /* console.info('Table initialized.'); */
                $('.preloader').hide(200);
            },100);
        });
    };
}]);

app.controller('userTableController',[ '$http', '$scope', function($http, $scope) {}]);

app.controller('dashboardController', [ '$http', '$scope', function($http, $scope) {}]);