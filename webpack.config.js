var Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    .copyFiles({
        from: './assets/img',
        
        // optional target path, relative to the output dir
        to: 'img/[path][name].[ext]',
        
        // if versioning is enabled, add the file hash too
        //to: 'imgs/[path][name].[hash:8].[ext]',
        
        // only copy files matching this pattern
        pattern: /\.(png|jpg|jpeg|gif)$/
    })

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */

    .addEntry('js/front/app', './assets/js/front/app.js')
    .addEntry('js/admin/app', './assets/js/admin/app.js')
    .addEntry('adminjs', './vendor/easycorp/easyadmin-bundle/assets/js/app.js')
    .addStyleEntry('css/main', './assets/css/csskit.scss')
    .addStyleEntry('css/front/app', './assets/css/front/app.scss')
    .addStyleEntry('css/front/style', './assets/css/front/style.scss')
    .addStyleEntry('css/admin/app', './assets/css/front/app.scss')
    .addStyleEntry('css/admin/style', './assets/css/front/style.scss')
    .addStyleEntry('admincss', './vendor/easycorp/easyadmin-bundle/assets/css/app.scss')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    //.splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    // enables Sass/SCSS support
    .enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()

    // uncomment if you use API Platform Admin (composer req api-admin)
    //.enableReactPreset()
    //.addEntry('admin', './assets/js/admin.js')

;

var config = Encore.getWebpackConfig();
config.externals.jquery = 'jQuery'

module.exports = config;