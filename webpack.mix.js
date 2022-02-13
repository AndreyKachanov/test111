require('dotenv').config();
const mix = require('laravel-mix');
let webpack = require('webpack');
const env = process.env.APP_ENV;

if (env === 'production' || env === 'dev') {
    mix
        .js('resources/js/app.js', 'public/js')
        .sass('resources/sass/app.scss', 'public/css')
        .version();
    //env = local
} else {
    mix
        .setPublicPath('public/build')
        .setResourceRoot('/build/')
        .js('resources/js/app.js', 'js')
        .sass('resources/sass/app.scss', 'css')
        .version();
}

// mix.webpackConfig(
//     {
//         plugins: [
//             new webpack.IgnorePlugin(/^codemirror$/)
//         ]
//     }
// );


// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
