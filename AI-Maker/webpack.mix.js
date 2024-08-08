const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/image_generator.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version();
