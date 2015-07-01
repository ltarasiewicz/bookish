'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

var config = {
    bootstrapDir: './web/assets/vendor/bootstrap-sass',
    publicDir: './web'
};

gulp.task('sass', function () {
    gulp.src('./web/assets/main.scss')
        .pipe(sass({ includePaths : [config.bootstrapDir + '/assets/stylesheets/'] }).on('error', sass.logError))
        .pipe(gulp.dest(config.publicDir + '/assets/dist/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('web/assets/*.scss', ['sass']);
});