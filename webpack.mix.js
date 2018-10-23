let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');


mix.js('resources/assets/js/main.js', 'public/js/main.js')
.js('resources/assets/js/funcoes.js', 'public/js/funcoes.js')
.js('resources/assets/js/cep-automatico.js', 'public/js/cep-automatico.js')
.js('resources/assets/js/select-busca.js', 'public/js/select-busca.js');

mix.styles('resources/assets/css/style.css','public/css/style.css')
    .styles('resources/assets/css/print.css','public/css/print.css')
   
;