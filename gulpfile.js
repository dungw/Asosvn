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

    //app.css
    mix.less('app.less');
    mix.stylesIn('vendor', 'public/css/app.css');

    //app.js
    mix.scriptsIn('vendor', 'public/js/app.js');

    //admin.css
    mix.styles([
        'vendor/main.css',
        'vendor/slide.css'
    ], 'public/css/admin.css');

    //manage version
    mix.version([
        'public/css/app.css',
        'public/css/vendor.css',
        'public/css/admin.css',
        'public/js/app.js'
    ]);

});
