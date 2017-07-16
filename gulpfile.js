/// <binding ProjectOpened='watch-tasks' />

/*
This file in the main entry point for defining Gulp tasks and using Gulp plugins.
Click here to learn more. http://go.microsoft.com/fwlink/?LinkId=518007
*/

/* ---------------------------------------------
*    Load dependecies
*  ---------------------------------------------
*/
var gulp = require('gulp');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var notify = require('gulp-notify');
var gutil = require('gulp-util');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();
var rename = require('gulp-rename');
var ignore = require('gulp-ignore');
var replace = require('gulp-replace');
var uglify = require('gulp-uglify');


/* ---------------------------------------------
*    Load globals
*  ---------------------------------------------
*/

var paths = {
    thirdParty: "./js"
};

var input = './assets/scss/*.scss';
var output = './public/css';


/* 1.0
* browserSync Tasks
* Click here to learn more. https://www.npmjs.com/package/browser-sync
* Keep multiple browsers & devices in sync when building websites.
*/

/// Reload task
gulp.task('browser-reload', function () {
    browserSync.reload();
});

/// Prepare Browser-sync for localhost 
gulp.task('browser-sync', function () {
    browserSync.init(['public/css/*.css', 'public/js/*.js', 'application/view/**/*.php'], {
        proxy: 'http://localhost:9101'
    });
});

/* 2.0
* Minify Tasks
* Click here to learn more. https://developers.google.com/speed/docs/insights/MinifyResources
* Minify Resources (HTML, CSS, and JavaScript);
* Minification refers to the process of removing unnecessary or redundant data without affecting how the resource is processed by the 
* browser - e.g. code comments and formatting, removing unused code, using shorter variable and function names, and so on.
*/

/// Minify depedencies JS
/// Click here to learn more. https://www.npmjs.com/package/gulp-concat
/// Proper order must be applied when adding new scripts
/// <reference path="node_modules/bootstrap-sass/assets/javascripts/bootstrap.js" />
gulp.task('minify-vendor-scripts', function () {
    return gulp.src([
            './node_modules/jquery/dist/jquery.js',
            './node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'
    ])
        .pipe(concat('vendor.scripts.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/js/'))
        .pipe(notify('Vendor scripts concated and minified'));
});

/* 4.0
*  SASS2CSS tasks
*  Click here to learn more. https://www.npmjs.com/package/gulp-sass
*  Less is a CSS pre-processor, meaning that it extends the CSS language, adding features that allow variables, mixins, 
*  functions and many other techniques that allow you to make CSS that is more maintainable, themeable and extendable.
*/

gulp.task('sass-compile', function () {
    return gulp
      .src(input)
      .pipe(sass({ outputStyle: 'compressed' }))
      .pipe(gulp.dest(output));
});

/* 12.0
*  Watch tasks
*  Click here to learn more. https://www.npmjs.com/package/gulp-watch
*  Watch is part of the API of gulp. It will watch files for changes, 
*  addition or deletion and trigger tasks.
*/
gulp.task('watch-tasks', function () {
    gulp.watch('./public/css/*.scss', ['sass-compile']); // Watch all the .less files, then run the less task
});

/* 14.0
*  Error Handling
*  Click here to learn more. https://www.npmjs.com/package/gulp-plumber
*  Will prevent Gulp breaking caused by errors.
*/
var onError = function (err) {
    console.log('An error occurred:', gutil.colors.magenta(err.message));
    gutil.beep();
    this.emit('end');
};