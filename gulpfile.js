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
    //mix.sass('app.scss');
    // mix.sass('../../../public/css/admin/admin.scss','public/css/admin');
    // mix.sass('../../../public/css/canchas/todas.scss','public/css/canchas');
    // mix.sass('../../../public/css/commons/commons.scss','public/css/commons');
    // mix.sass('../../../public/css/inicio/form-elements.scss','public/css/inicio');
    // mix.sass('../../../public/css/inicio/inicio.scss','public/css/inicio');
    // mix.sass('../../../public/css/login/login.scss','public/css/login');
    mix.sass('../../../public/css/turnos/turnos.scss','public/css/turnos');
    // mix.sass('../../../public/css/_variables.scss','public/css');

     // mix.webpack('../../../public/js/inicio.js','public/js');

});
