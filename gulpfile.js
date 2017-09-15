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




elixir(function(mix) {
	//Compile all "scss" files into a "style.css" file
	mix.sass([
        'resources/assets/sass/style.scss' 
    ], 'public/r/css/style.css');

    
	//Compile all "scss" files into a "style.css" file
	mix.scripts(['main.js', 'forms-validation.js'], 'public/js/app.js')

    
});
