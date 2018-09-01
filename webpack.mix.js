let mix = require('laravel-mix');
let webpack = require('webpack')
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

mix
    .sass('_dev/scss/style.scss', 'wp-content/themes/future-child/css/custom.css')
    .browserSync({
        proxy: 'http://liseroma.test',
        browser: 'google chrome',
        port: 3013,
        files: [
            'wp-content/themes/**/*',
        ]
    })
    .webpackConfig({
        resolve: {
            alias: {
                // 'styles': path.resolve(__dirname, 'resources/assets/sass'),
                '~js': path.resolve(__dirname, 'resources/assets/js'),
                '~node_modules': path.resolve(__dirname, 'node_modules'),
            }
        },
        plugins: [
            new webpack.LoaderOptionsPlugin({
                options: {
                    loaders: [
                        {
                            test: /\.vue$/,
                            loader: 'vue-loader'
                        },
                    ],
                }
            })
        ]
    });
