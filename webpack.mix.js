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

var nodeDir = 'node_modules/';
var mdlCustomDir = 'resources/assets/js/laravel-mdl/';
var mdlNodeDir = nodeDir + 'material-design-lite/';

mix.js('resources/assets/js/app.js', 'public/js')
	.scripts([
		mdlNodeDir + 'material.js',
		mdlCustomDir + 'alerts.js',
		mdlCustomDir + 'dialogs.js',
		mdlCustomDir + 'spinners.js',
		mdlCustomDir + 'alerts.js',
		mdlCustomDir + 'mdl-selectfield.js',
		mdlCustomDir + 'jQuery.simpleWeather.js',
		mdlCustomDir + 'jQuery.animate-bg.js',
		nodeDir + 'mark.js/dist/jquery.mark.js',
		nodeDir + 'prismjs/prism.js',
		nodeDir + 'getmdl-select/src/js/getmdl-select.js',
		nodeDir + 'material-datetime-picker/dist/material-datetime-picker.js',
		mdlCustomDir + 'mdl-colorwheel.js'
	], 'public/js/mdl.js')
	.copy(mdlNodeDir + '/dist/**.css', 'public/css/mdl-themes/', true)
	.copy('node_modules/weather-icons/font/**', 'public/fonts/weather-icons/', true)
	.sass('resources/assets/sass/app.scss', 'public/css')
	.sass('resources/assets/sass/components/_materialFullCalendar.scss', 'public/css')
	.sass('node_modules/getmdl-select/src/scss/getmdl-select.scss', 'public/css')
	.copy('node_modules/material-datetime-picker/dist/material-datetime-picker.css', 'public/css')
	.version();
