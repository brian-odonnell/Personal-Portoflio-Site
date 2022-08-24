(function() {
	/**
	 * @exports APP.controllers.home
	 * @requires HBS
	 */
	var module = {};

	module.init = function() {
		console.log('Hi from home.init()');
	};

	module.examplePage = function() {
		console.log('Hi from home.examplePage()');
		
	};

	HBS.namespace('APP.controllers.home', module);
}());