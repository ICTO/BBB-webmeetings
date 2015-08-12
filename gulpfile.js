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
    mix.less([
        'app.less',
        '../bower/components-font-awesome/less/font-awesome.less'
    ]);
    mix.coffee([
        'alerts.coffee',
        'meetings.coffee',
        'header-scroll.coffee'
    ]);
    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/bootstrap/dist/js/bootstrap.js',
        '../bower/vue/dist/vue.js',
        '../bower/vue-resource/dist/vue-resource.js'
    ], 'public/js/vendor.js');


    mix.version(['css/app.css', 'js/vendor.js', 'js/app.js'])

    mix.copy('resources/assets/bower/bootstrap/fonts', 'public/build/fonts');
    mix.copy('resources/assets/bower/components-font-awesome/fonts', 'public/build/fonts');
    mix.copy('resources/assets/img', 'public/img');
});
