//SCROLL DIRECTIVE
//app declarated in controller
app.directive('scroll',function($window)
{
	return function(scope,element,attrs)
	{
		angular.element($window).bind('scroll',function()
		{
			if (this.pageYOffset >= 130) {
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