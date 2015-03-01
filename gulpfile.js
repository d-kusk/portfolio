'use strict';

var gulp     = require('gulp');
var slim     = require("gulp-slim");
var sass     = require('gulp-ruby-sass');
var uncss    = require('gulp-uncss');
var csso     = require('gulp-csso');
var rename   = require('gulp-rename');
var plumber  = require('gulp-plumber');
var uglify   = require("gulp-uglify");
var browser  = require("browser-sync");

gulp.task('slim', function(){
  gulp.src("slim/**/*.slim")
    .pipe(plumber())
    .pipe(slim({
      pretty: true
    }))
    .pipe(gulp.dest("./"))
    .pipe(browser.reload({stream:true}));
});

gulp.task('sass', function() {
  gulp.src('scss/**/*.scss')
    .pipe(plumber())
    .pipe(sass({
        style: 'expanded',
        compass : true
    }))
    .pipe(gulp.dest('css/')) 
    .pipe(browser.reload({stream:true}));
});

// アップロード前に実行する
gulp.task('css-set', function() {
    return gulp.src('css/style.css')
        .pipe(uncss({
            html: ['index.html']// 審査元のHTMLを記述
        }))
        .pipe(gulp.dest('css/'))
        .pipe(csso())// CSSの圧縮
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('css/'));
});

// アップロード前に実行する
gulp.task('js', function() {
  gulp.src('js/**/*.js')
    .pipe(plumber())
    .pipe(uglify())
    .pipe(rename('script.min.js'))
    .pipe(gulp.dest('js/'))
    .pipe(browser.reload({stream:true}));
});

gulp.task("server", function() {
    browser({
        server: {
            baseDir: "./"
        }
    });
});

gulp.task('watch',["server"], function () {
    gulp.watch('slim/**/*.slim', ['slim']);
    gulp.watch('scss/**/*.scss', ['sass']);
});
