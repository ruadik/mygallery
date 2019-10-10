const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

///////////Admin///////////
mix.styles([
    'resources/assets/admin/css/bootstrap.min.css',
    'resources/assets/admin/css/font-awesome.min.css',
    'resources/assets/admin/css/ionicons.min.css',
    'resources/assets/admin/css/dataTables.bootstrap.min.css',
    'resources/assets/admin/css/AdminLTE.min.css',
    'resources/assets/admin/css/skin-purple.min.css',
    'resources/assets/admin/css/select2.min.css',
], 'public/css/admin.css').version();
//
mix.scripts([
    'resources/assets/admin/js/jquery.min.js',
    'resources/assets/admin/js/bootstrap.min.js',
    'resources/assets/admin/js/jquery.dataTables.min.js',
    'resources/assets/admin/js/dataTables.bootstrap.min.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/select2.full.min.js',
    'resources/assets/admin/js/custom.js'
], 'public/js/admin.js').version();
//
mix.copy('resources/assets/admin/fonts', 'public/fonts');
mix.copy('resources/assets/admin/img', 'public/img');



///////////Front///////////