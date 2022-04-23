require('dotenv').config();
const mix = require('laravel-mix');
const env = process.env.APP_ENV;

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

if (env === 'production' || env === 'dev') {
    mix
        .js('resources/js/app.js', 'public/js')
        .vue()
        .sass('resources/sass/app.scss', 'public/css')
        .version();
} else {
    mix
        .setPublicPath('public/build')
        .setResourceRoot('/build/')
        .js('resources/js/app.js', 'js')
        .vue()
        .sass('resources/sass/app.scss', 'css')
        .version();
}

