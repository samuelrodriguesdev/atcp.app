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

/*
elixir(function(mix) {
    mix.styles([
        "theme/bootstrap/css/bootstrap.min.css",
        "theme/plugins/ionicons-2.0.1/css/ionicons.min.css",
        "theme/plugins/select2/select2.min.css",
        "theme/plugins/iCheck/flat/green.css",
        "theme/plugins/datepicker/datepicker3.css",
        "theme/plugins/datatables/dataTables.bootstrap.css",
        "theme/dist/css/AdminLTE.min.css",
        "theme/dist/css/skins/skin-green.min.css"
    ]," public/compiled/css/app.css", "public/");
});
*/

elixir(function(mix) {
    mix.scripts([
        "theme/plugins/jQuery/jQuery-2.1.4.min.js",
        "theme/plugins/jQueryUI/jquery-ui.min.js",
        "theme/bootstrap/js/bootstrap.min.js",
        "theme/plugins/select2/select2.full.min.js",
        "theme/plugins/datepicker/bootstrap-datepicker.js",
        "theme/plugins/datepicker/locales/bootstrap-datepicker.pt.js",
        "theme/plugins/slimScroll/jquery.slimscroll.min.js",
        "theme/plugins/fastclick/fastclick.js",
        "theme/plugins/bootstrap-validator/validator.min.js",
        "theme/plugins/iCheck/icheck.min.js",
        "theme/plugins/datatables/jquery.dataTables.js",
        "theme/plugins/datatables/dataTables.bootstrap.min.js",
        "theme/dist/js/app.min.js"
    ]," public/compiled/js/app.js", "public/");
});


