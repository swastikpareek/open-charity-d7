/**
 * @file
 * Gulp file for compiling css 
 * Task: Compile: Sass.
 */

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var sassGlob = require('gulp-sass-glob');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('compile:sass', function() {
  gulp.src([
    'sass/**.scss'
  ])
  .pipe(sourcemaps.init())
  .pipe(sassGlob())
  .pipe(sass({
    errLogToConsole: true,
    outputStyle: 'expanded',
    includePaths: ['./node_modules/breakpoint-sass/stylesheets']
  })
  .on('error', sass.logError))
  .pipe(autoprefixer({
    browsers: ['last 2 versions', 'iOS >=6'],
    cascade: false,
  }))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('css/'));
});
gulp.task('watch:sass', ['compile:sass'], function(){
  gulp.watch(['sass/**/*.scss'], ['compile:sass']);
});

gulp.task('default', ['compile:sass']);
