//SCROLL DIRECTIVE
//app declarated in controller
app.directive('scroll',function($window)
{
	return function(scope,element,attrs)
	{
		angular.element($window).bind('scroll',function()
		{
			if (this.pageYOffset >= 500) {
			// if (true ) {
				scope.fixHeader={'position':'fixed','z-index':'200'};
				// console.log('bye header');
			} else {
				scope.fixHeader={};
				// console.log('hello header');
			}
			scope.$apply();
		});
	};
});
app.directive('compile', ['$compile', function ($compile) {
    return function(scope, element, attrs) {
      scope.$watch(
        function(scope) {
          // watch the 'compile' expression for changes
          return scope.$eval(attrs.compile);
        },
        function(value) {
          // when the 'compile' expression changes
          // assign it into the current DOM
          element.html(value);

          // compile the new DOM and link it to the current
          // scope.
          // NOTE: we only compile .childNodes so that
          // we don't get into infinite loop compiling ourselves
          $compile(element.contents())(scope);
        }
    );
  };
}]);