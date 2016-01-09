/* angular/ -> app.js file, Angular app file */
var app = angular.module('shahriar',[]);

app.filter('tag', function() {
  return function(input) {
    return (typeof input=='undefined')?'':input.replace(" ", ",");
  };
});