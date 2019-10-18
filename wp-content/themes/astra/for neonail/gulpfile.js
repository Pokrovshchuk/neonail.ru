'use strict';

var gulp        = require('gulp'),
    watch       = require('gulp-watch'),
    sass        = require('gulp-sass'),
    sourcemaps  = require('gulp-sourcemaps'),
    cleanCSS    = require('gulp-clean-css'),
    uglify      = require('gulp-uglify'),
    prefixer    = require('gulp-autoprefixer'),
    rename      = require('gulp-rename'),
    imagemin    = require('gulp-imagemin'),
    pngquant    = require('imagemin-pngquant'),
    browserSync = require("browser-sync"),
    reload      = browserSync.reload;

var path = {
    build: { //Куда складывать готовые после сборки файлы
        html: 'dist',
        js: '../assets/js/',
        css: '../assets/css/',
        img: '../assets/images/',
        fonts: '../assets//fonts/'
    },
    src: { //Пути откуда брать исходники
        html: 'app/*.html', //Путь для html
        js: 'app/js/**/*.js',//Путь для JS
        style: 'app/styles/*.sass',//Путь для SASS
        img: 'app/img/**/*.*', //Путь для img
        fonts: 'app/fonts/**/*.*'
    },
    watch: { //За изменением каких файлов мы хотим наблюдать
        html: 'app/**/*.html',
        js: 'app/js/**/*.js',
        style: 'app/**/*.sass',
        img: 'app/img/**/*.*',
        fonts: 'app/fonts/**/*.*'
    },
    clean: './build'
};

//Запуск сервера (в папке app)
gulp.task('browser-sync', function () {
    browserSync({
        server: {
            baseDir: "./dist"
        },
        notify: false,
        tunnel: true,
        host: 'localhost',
        port: 9000,
        logPrefix: "Frontend_Roman"
    });
});

gulp.task('html:build', function () {
    gulp.src(path.src.html)
        .pipe(gulp.dest(path.build.html))
        .pipe(reload({stream: true}));
});

// SASS compiled
gulp.task('style:build', function () {
    return gulp.src(path.src.style)
        .pipe(sourcemaps.init()) //Для генерации style.css.map
        .pipe(sass({
            sourceMap: true,
            errLogToConsole: true
        })) //Скомпилируем
        .pipe(prefixer()) //Добавим вендорные префиксы
        .pipe(cleanCSS()) //Сожмем
        .pipe(sourcemaps.write())// Куда положить .map
        .pipe(gulp.dest(path.build.css)) //куда положить css
        .pipe(reload({stream: true}));
});
// JS COMPRESSED
gulp.task('js:build', function () {
    // gulp.src(path.src.js)
    gulp.src([
        'app/libs/jquery/dist/jquery.js',
        'app/libs/bootstrap/dist/js/bootstrap.js',
        'app/libs/wow.js',
        path.src.js
    ])
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.build.js))
        .pipe(reload({stream: true}));
});

//Images min
gulp.task('image:build', function() {
    gulp.src(path.src.img)
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(path.build.img))
        .pipe(reload({stream: true}));
});

//Fonts build
gulp.task('fonts:build', function() {
    gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts))
});

gulp.task('build', [
    'html:build',
    'js:build',
    'style:build',
    'fonts:build',
    'image:build'
]);

//Следим за изменениями
gulp.task('watch', function(){
    watch([path.watch.html], function(event, cb) {
        gulp.start('html:build');
    });
    watch([path.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js:build');
    });
    watch([path.watch.img], function(event, cb) {
        gulp.start('image:build');
    });
    watch([path.watch.fonts], function(event, cb) {
        gulp.start('fonts:build');
    });
});

//Дефолтный таск, который будет запускать всю нашу сборку
gulp.task('default', ['build', 'browser-sync', 'watch']);