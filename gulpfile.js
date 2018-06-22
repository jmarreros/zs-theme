var gulp 	= require('gulp');
var sass 	= require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var pump = require('pump');

//convertir estilos
gulp.task('convertirCSS', function() {
    return gulp.src('./src/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'));
});

//Tarea para monitorear cambios en los archivos sass
gulp.task('watch_scss',function(){
    gulp.watch(['src/**/*.scss'],['convertirCSS']);
});


//Default task
gulp.task('default',['watch_scss']);








// gulp.task('convertirCSSMiniCurso',function(){
//   return gulp.src('dev/video-curso.scss')
//         .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
//         .pipe(gulp.dest('./css/'));
// });

//concatenar con comentarios.css
// gulp.task('concatenar',['convertirCSS'], function () {
//    return gulp.src('./dev/*.css')
//      .pipe(concat("./style.css"))
//      .pipe(gulp.dest('./'));
// });



// //Para Javascript
// gulp.task('comprimirJS', function (cb) {
//   pump([
//         gulp.src('dev/*.js'),
//         uglify(),
//         gulp.dest('./js')
//     ],
//     cb
//   );
// });


