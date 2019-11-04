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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
   'public/css/classroom/overview.css',
   'public/css/classroom/topic.css',
   'public/css/dashboard/home.css',
   'public/css/dashboard/company/course-edit.css',
   'public/css/dashboard/company/course.css',
   'public/css/tutor/course-detail.css',
   'public/css/tutor/course.css',
   'public/css/visitor/course.css',
   'public/css/visitor/home.css',
   'public/css/app.css',
   'public/css/login.css',
   'public/css/register.css',
   'public/css/sweetalert.css',
   'public/css/template-2.css',
   
], 'public/css/all.css').version();

mix.scripts([
   'public/js/app.js',
   'public/js/custom-select.js',
   'public/js/sweetalert.min.js',
   'public/js/vue.js',
   
], 'public/js/all.js').version();