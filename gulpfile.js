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

elixir(function (mix) {

    mix.less('app.less')

    mix.stylesIn('public/css/vendor', 'public/css/vendor.css');

    mix.version([
        'public/css/app.css',
        'public/css/vendor.css'
    ]);

});
