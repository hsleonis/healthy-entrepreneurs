/* angular/ -> app.js file, Angular app file */
var app = angular.module('shahriar',[]);

app.filter('tag', function() {
  return function(input) {
    return (typeof input=='undefined')?'':input.replace(" ", ",");
  };
});

app.directive('ngPattern', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, modelCtrl) {
      modelCtrl.$parsers.push(function(inputValue) {
        var transformedInput = inputValue.match(/^[<>]\=?\d+(\s+(and|or)\s+[<>]\=?\d+)?$/ig);

        if (transformedInput !== null) {
          element.parent().addClass('correct-pattern');
        }
        else{
          element.parent().removeClass('correct-pattern');
        }
        return inputValue;
      });
    }
  };
});