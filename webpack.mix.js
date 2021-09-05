const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');
require('laravel-mix-purgecss');
const purgecssWordpress = require('purgecss-with-wordpress');
const path = require('path');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix
  .setPublicPath('./public')
  .browserSync('alra.test');

mix
  .sass('resources/styles/app.scss', 'styles')
  .sass('resources/styles/editor.scss', 'styles')
  .options({
    processCssUrls: false,
  })
  .purgeCss({
    enabled: true,
    extend: {
      content: [path.join(__dirname, '*.php')],
      safelist: {
        standard: [
          ...purgecssWordpress.safelist,
          /menu-item$/,
          /justify-content-center/,
          /mb-48/,
          /mb-lg-28/,
          /pb-64/,
          /mb-32/,
          /swiper-button-prev/,
          /swiper-button-next/,
          /btn-primary/,
          /collapsing/,
          /border-0/,
          /modal-backdrop/,
          /modal-open/,
          /btn-light-blue/,
          /btn-transparent/,
          /text-break/,
        ],
        greedy: [
          /swiper-container$/,
          /swiper-wrapper$/,
          /swiper-slide$/,
          /^select2/,
          /alert$/,
        ],
      },
    },
  });

mix
  .js('resources/scripts/app.js', 'scripts')
  .js('resources/scripts/customizer.js', 'scripts')
  .blocks('resources/scripts/editor.js', 'scripts')
  .autoload({ jquery: ['$', 'window.jQuery'] })
  .extract();

mix
  .copyDirectory('resources/images', 'public/images')
  .copyDirectory('resources/video', 'public/video')
  .copyDirectory('resources/fonts', 'public/fonts');

mix
  .sourceMaps( true )
  .version()
  .extract();
