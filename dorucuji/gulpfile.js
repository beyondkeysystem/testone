var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass('app.scss', 'resources/css');

    mix.styles([
        'libs/bootstrap.min.css',
        'app.css'
    ]);

    mix.scripts([
        'libs/jquery-2.1.3.min.js',
        'libs/bootstrap.min.js',
        'login-lost-password.js'
    ]);

    mix.version(["css/all.css", "js/all.js"]);

    mix.phpUnit();
});
