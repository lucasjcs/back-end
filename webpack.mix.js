let mix = require('laravel-mix');



mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/style.scss', 'public/css')
   .copyDirectory('resources/assets/img', 'public/img');


mix.browserSync({
    proxy: 'localhost:8000'
});