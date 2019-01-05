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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/navbar.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/first.scss', 'public/css')
    .sass('resources/sass/second.scss', 'public/css')
    .sass('resources/sass/third.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/admin-sidebar.scss', 'public/css');
mix.copy('resources/themes/first.png', 'public/images')
    .copy('resources/themes/second.png', 'public/images')
    .copy('resources/themes/third.png', 'public/images');