var elixir = require('laravel-elixir');
config.css.autoprefix.options.browsers =  ['last 15 versions'] ;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

//Development mode:
//type: gulp

//Production mode:
//type: gulp --production (will also minify "css" and "js" files)



elixir(function(mix) {
	//Compile all "scss" files into a "style.css" file
	mix.sass([
        'resources/assets/sass/style.scss' 
    ], 'public/r/css/style0365.css');

    
	//Concatenating local librairies and main js files 
	mix.scripts([
		//Local libraries
		// '/libs/jQuery.YoutubeBackground.js', 
		'/libs/anchor-smooth-scroll.js', 
		'/libs/ng-password.js', //<-- Angularjs password comparison directive
		// '/libs/angular-lazy-loader.js', //<-- lazy loading images controlled by AngularJS
		//main js files
		'main.js', 
		'forms-validation.js',
		'morphSearch.js'], 
	'public/js/app0365.js')
});



 
