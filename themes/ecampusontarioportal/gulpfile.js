// Gulp and node
const gulp = require('gulp');

// Basic workflow plugins
const sass = require('gulp-sass');

// Performance workflow plugins
const prefix = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const minify = require('gulp-minify'); //*-min.js

const src = {
  css: 'source/sass/style.sass',
  js: 'source/js/**/*.{js,css}',
  img: 'source/images/**/**/**/*.{png,jpg,svg}',
  fonts: 'source/fonts/*',
}
const dist = {
  css: 'assets/css',
  js: 'assets/js',
  img: 'assets/images',
  fonts: 'assets/fonts',
}

// Compile SASS/SCSS to CSS & Prefix
gulp.task('sass', function() {
  return gulp.src(src.css)
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded',
      includePaths: ['susy'],
    }))
    .pipe(prefix())
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest(dist.css))
    .pipe(gulp.dest('assets/css'));
});

// JS
gulp.task('js', function() {
  return gulp.src(src.js)
    .pipe(gulp.dest(dist.js))
	.pipe(minify())
	.pipe(gulp.dest(dist.js))
});

// Images
gulp.task('img', function() {
  return gulp.src(src.img)
    .pipe(gulp.dest(dist.img));
});

// Fonts
gulp.task('fonts', function() {
  return gulp.src(src.fonts)
    .pipe(gulp.dest(dist.fonts));
});

// Default Task
gulp.task('default', ['sass', 'js', 'img','fonts']);