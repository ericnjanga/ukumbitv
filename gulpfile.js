var elixir = require('laravel-elixir');

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


elixir.config.css.autoprefix = {
    enabled: true, //default, this is only here so you know how to disable
    options: {
        cascade: true,
        browsers: ['last 2 versions', '> 1%']
    }
};

elixir(function(mix) {
	mix.sass([
        'resources/assets/sass/style.scss' 
    ], 'public/r/css/style.css');

    // mix.sass(['style.scss', 'media.scss'],'resources/assets/css/scss.css').less(['menu.less'], 'resources/assets/css/less.css')
    //     .styles(['/resources/assets/css/scss.css', 'resources/assets/css/less.css'],'public/r/css/style.css');
});
