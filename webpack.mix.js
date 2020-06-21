const { mix } = require('laravel-mix');

mix
    .sass('client/src/alert.scss', 'client/dist').sourceMaps()
    .copy('client/src/alert.js', 'client/dist')
