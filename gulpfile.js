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

elixir(function(mix) {
    mix.sass(['style.scss'],'resources/assets/css/scss.css').less(['menu.less'], 'resources/assets/css/less.css')
        .styles(['/resources/assets/css/scss.css', 'resources/assets/css/less.css'],'public/r/css/style.css');
});
