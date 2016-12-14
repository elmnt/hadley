'use strict';

// ----------- Dependencies

var gulp        = require('gulp'),
    browserSync = require('browser-sync'),
    sass        = require('gulp-sass'),
    del         = require('del'),
    cache       = require('gulp-cache');

// ----------- Variables

var reload    = browserSync.reload,
    themePath = 'wp-content/themes/hadley';

// ----------- Server

gulp.task('browser-sync', function() {
  var files = [
  themePath + '/style.css',
  themePath + '/**/*.php'
  ];
  browserSync.init(files, {
  proxy: 'hadley.dev:8888',
  notify: false
  });
});

// ----------- Watch Sass files

gulp.task('sass', function () {
  return gulp.src(themePath + '/sass/*.scss')
    .pipe(sass())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest(themePath))
    .pipe(reload({stream:true}));
});

// ----------- Cleanup

gulp.task('clean', function(callback) {
  del(themePath + '/style.css');
  return cache.clearAll(callback);
});

// ----------- Default

gulp.task('default', ['sass', 'browser-sync'], function () {
  gulp.watch(themePath + '/sass/**/*.scss', ['sass']);
});
