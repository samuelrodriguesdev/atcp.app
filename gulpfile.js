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
    mix.styles([
        "theme/bootstrap/css/bootstrap.min.css",
        "theme/plugins/font-awesome-4.5.0/css/font-awesome.min.css",
        "theme/plugins/ionicons-2.0.1/css/ionicons.min.css",
        "theme/plugins/select2/select2.min.css",
        "theme/plugins/iCheck/flat/green.css",
        "theme/plugins/datepicker/datepicker3.css",
        "theme/plugins/datatables/dataTables.bootstrap.css",
        "theme/dist/css/AdminLTE.min.css",
        "theme/dist/css/skins/skin-green.min.css"
    ]," public/compile/css/output.css", "public/");
});
