require('dotenv').config();
const mix = require('laravel-mix');
const env = process.env.APP_ENV;

// Если в .env параметр APP_ENV = local, файлы компилируются в public/build,
// иначе в public/

// пути для окружения dev и production - (env === 'dev' || env === 'production')
let publicPath = 'public';
let resourceRoot = './';
let outputDir = 'public/';


if (env === 'local') {
    publicPath = 'public/build';
    resourceRoot = '/build/';
    outputDir = './';
}

mix
    .setPublicPath(publicPath)
    .setResourceRoot(resourceRoot)
    .js('resources/js/app.js', outputDir + 'js')
    // .js('resources/js/script.js', outputDir + 'js')
    // .autoload({
    //     jquery: ['$', 'window.jQuery', 'jQuery'],
    // })
    .vue()
    .sass('resources/sass/app.scss', outputDir + 'css')
    .version();

mix.browserSync({
    open: false,
    proxy: {
        target: "nginx", // replace with your web server container
        proxyReq: [
            function(proxyReq) {
                proxyReq.setHeader('HOST', 'larka_new.loc:4040'); // replace with your site host
            }
        ]
    },
    https: true,
    watchOptions: {
        usePolling: true,
        interval: 500,
        ignored: /node_modules/,
    },
    files: [
        'app/**/*.php',
        'resources/views/**/*.php',
        'resources/js/app.js',
        'resources/js/components/*.vue',
        'packages/mixdinternet/frontend/src/**/*.php',
        'public/js/**/*.js',
        'public/build/js/**/*.js',
        'public/css/**/*.css',
        'public/build/css/**/*.css',
    ],
    notify: true,
});
