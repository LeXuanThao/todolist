const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/libraries/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js', 'public/js')
    .sass('resources/assets/libraries/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .extract(['jquery','bootstrap-sass'])
    .version();
