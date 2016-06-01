/**
 * Gulpfile.
 *
 * Create theme via gulp.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 *
 * @since 1.0.0
 * @author Philipp Timmalog (phil@t7lab.com)
 */

// Project related.
var project = 'fischer truck theme';
var projectURL = 'localhost/fischertruck';
var productURL = './';

var pathdir = {
    'src': './src',
    'dist': './dist',
    'js': './src/js/**/*.js',
    'sass': './src/sass/**/*.scss',
    'php': './src/**/*.php',
    'languages': './src/languages/**'
};

var vendorLibs = {
  'jQuery': 'bower_components/jQuery/dist/jquery.js',
  'bootstrap': 'bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js'
};

// Translation related.
var text_domain = 'VR';
var destFile = 'VR.pot';
var package = 'VR';
var bugReport = 'http://WPTie.com/contact/';
var lastTranslator = 'Philipp Timmalog <phil@t7lab.com>';
var team = 'fischerwerke GmbH & Co. KG';
var translatePath = './languages';


// Images related.
var imagesSRC = pathdir.src + '/assets/img/raw/**/*.{png,jpg,gif,svg}'; // Source folder of images which should be optimized.
var imagesDestination = pathdir.dist + '/assets/img/'; // Destination folder of optimized images. Must be different from the imagesSRC folder.


// Browsers you care about for autoprefixing.
// Browserlist https://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
];


/**
 * Load Plugins.
 *
 * Load gulp plugins and assing them semantic names.
 */
var gulp = require('gulp');

// SASS related plugins.
var sass = require('gulp-sass');
var minifycss = require('gulp-uglifycss');
var autoprefixer = require('gulp-autoprefixer');
var mmq = require('gulp-merge-media-queries');

// JS related plugins.
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

// Image realted plugins.
var imagemin = require('gulp-imagemin');

// Utility related plugins.
var rename = require('gulp-rename');
var gutil = require('gulp-util');
var lineec = require('gulp-line-ending-corrector');
var filter = require('gulp-filter');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var del = require('del');
var ftp = require('vinyl-ftp');
var minimist = require('minimist');
var args = minimist(process.argv.slice(2));

/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * This task does the following:
 *    1. Sets the project URL
 *    2. Sets inject CSS
 *    3. You may define a custom port
 *    4. You may want to stop the browser from openning automatically
 */
gulp.task('browser-sync', function() {
    browserSync.init({

        // For more options
        // @link http://www.browsersync.io/docs/options/

        notify: false,

        // Project URL.
        proxy: projectURL,

        // `true` Automatically open the browser with BrowserSync live server.
        // `false` Stop the browser from automatically opening.
        open: true,

        // Inject CSS changes.
        // Commnet it to reload browser for every CSS change.
        injectChanges: true

        // Use a specific port (instead of the one auto-detected by Browsersync).
        // port: 7000,

    });
});


/**
 * Task: `styles`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    3. Writes Sourcemaps for it
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix .min.css
 *    6. Minifies the CSS file and generates style.min.css
 *    7. Injects CSS or reloads the browser via browserSync
 */
gulp.task('styles', function() {
  return gulp.src(pathdir.sass)
        .pipe(sourcemaps.init())
        .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'compact',
            //outputStyle: 'compressed',
            // outputStyle: 'nested',
            // outputStyle: 'expanded',
            precision: 10
        }))
        .on('error', console.error.bind(console))
        .pipe(sourcemaps.write({ includeContent: false }))
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))

    .pipe(sourcemaps.write(pathdir.dist))
        .pipe(lineec())
        .pipe(gulp.dest(pathdir.dist))

    .pipe(filter('**/*.css'))
        .pipe(mmq({ log: true }))

    .pipe(browserSync.stream())

    .pipe(rename({ suffix: '.min' }))
        .pipe(minifycss({
            maxLineLen: 10
        }))
        .pipe(lineec())
        .pipe(gulp.dest(pathdir.dist))

    .pipe(filter('**/*.css'))
        .pipe(browserSync.stream());
});


/**
 * Task: `customJS`.
 *
 * Concatenate and uglify custom JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS custom files
 *     2. Concatenates all the files and generates custom.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates custom.min.js
 */
gulp.task('js', function() {
  return gulp.src([vendorLibs.jQuery, vendorLibs.bootstrap, pathdir.js])
        .pipe(concat('main.js'))
        .pipe(lineec())
        .pipe(gulp.dest(pathdir.dist))
        .pipe(rename({
            basename: 'main',
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(lineec())
        .pipe(gulp.dest(pathdir.dist+'/js/'));
});


/**
 * Task: `images`.
 *
 * Minifies PNG, JPEG, GIF and SVG images.
 *
 * This task does the following:
 *     1. Gets the source of images raw folder
 *     2. Minifies PNG, JPEG, GIF and SVG images
 *     3. Generates and saves the optimized images
 *
 * This task will run only once, if you want to run it
 * again, do it with the command `gulp images`.
 */
gulp.task('images', function() {
  return gulp.src(imagesSRC)
        .pipe(imagemin({
            progressive: true,
            optimizationLevel: 3, // 0-7 low-high
            interlaced: true,
            svgoPlugins: [{ removeViewBox: false }]
        }))
        .pipe(gulp.dest(pathdir.dist+'/assets/img/'));
});


/**
 * WP POT Translation File Generator.
 *
 * * This task does the following:
 *     1. Gets the source of all the PHP files
 *     2. Sort files in stream by path or any custom sort comparator
 *     3. Applies wpPot with the variable set at the top of this file
 *     4. Generate a .pot file of i18n that can be used for l10n to build .mo file
 */
gulp.task('translate', function() {
    return gulp.src(projectPHPWatchFiles)
        .pipe(sort())
        .pipe(wpPot({
            domain: text_domain,
            destFile: destFile,
            package: package,
            bugReport: bugReport,
            lastTranslator: lastTranslator,
            team: team
        }))
        .pipe(gulp.dest(translatePath))
});


/**
 * Clean Tasks.
 *
 * Clean dist folder before copying new files over.
 */
gulp.task('clean:dist', function() {
  return del.sync([
    pathdir.dist+'/**/*'
  ]);
});


/**
 * Copy Tasks.
 *
 * Copy certain files and folders to dist folder
 */
gulp.task('copy:php', function () {
  return gulp.src([pathdir.php])
    .pipe(gulp.dest(pathdir.dist));
});

gulp.task('copy:languages', function () {
  return gulp.src([pathdir.languages])
    .pipe(gulp.dest(pathdir.dist+'/languages/'));
});

gulp.task('copy:misc', function () {
  return gulp.src([pathdir.src+'/*.{png,txt,md}'])
    .pipe(gulp.dest(pathdir.dist));
});

gulp.task('copy',[
  'copy:php',
  'copy:languages',
  'copy:misc'
]);


/**
 * Serve Tasks.
 *
 * Provide different ways to serve content
 */
gulp.task('serve', ['clean:dist', 'styles', 'js', 'images', 'copy', 'browser-sync', 'watch'], function() {

});

gulp.task('watch', function () {
  gulp.watch('/src/**/*.php', ['copy']);
  gulp.watch('/src/**/*.sass', ['styles']);
  gulp.watch('/src/**/*.js', ['js']);

  gulp.watch([
    pathdir.php,
    pathdir.sass,
    pathdir.js
  ]).on('change', browserSync.reload);
});

/**
 * Build Tasks.
 *
 * Task to build production version.
 */
gulp.task('build', [
  'clean:dist',
  'styles',
  'js',
  'images',
  'copy']
);


/**
 * Watch Tasks.
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task('default', ['build']);


/**
 * Deploy Tasks.
 *
 * Tasks to deploy dist folder to remote host via ftp.
 */
gulp.task('deploy:theme', function() {
  var remotePath = '/wp-content/themes/fischerTruck/';
  var conn = ftp.create({
    host: 't7lab.com',
    user: args.user,
    password: args.password,
    log: gutil.log
  });

  return gulp.src([pathdir.dist+'/**/*'])
    .pipe(conn.newer(remotePath))
    .pipe(conn.dest(remotePath));
});

gulp.task('deploy:plugin', function() {
  var remotePath = '/wp-content/plugins/';
  var conn = ftp.create({
    host: 't7lab.com',
    user: args.user,
    password: args.password,
    log: gutil.log
  });

  return gulp.src([pathdir.dist+'/fischer-posttypes.php'])
    .pipe(conn.newer(remotePath))
    .pipe(conn.dest(remotePath));
});

gulp.task('deploy', ['deploy:theme', 'deploy:plugin']);
