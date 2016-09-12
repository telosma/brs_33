var gulp = require('gulp');
//var rename = require('gulp-rename');
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');
});

gulp.task("copyfiles", function () {

    // Copy jQuery
    gulp.src("vendor/bower_dl/jquery/dist/jquery.min.js")
            .pipe(gulp.dest("public/js"));

    // Copy metisMenu
    gulp.src("vendor/bower_dl/metisMenu/dist/metisMenu.min.css")
            .pipe(gulp.dest("public/css"));
    gulp.src("vendor/bower_dl/metisMenu/dist/metisMenu.min.js")
            .pipe(gulp.dest("public/js"));

    // Copy Bootstrap
    gulp.src("vendor/bower_dl/bootstrap/dist/css/bootstrap.min.css")
            .pipe(gulp.dest("public/css"));
    gulp.src("vendor/bower_dl/bootstrap/dist/css/bootstrap.min.css.map")
            .pipe(gulp.dest("public/css"));
    gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.min.js")
            .pipe(gulp.dest("public/js"));
    gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**")
            .pipe(gulp.dest("public/fonts"));

    // Copy FontAwesome
    gulp.src("vendor/bower_dl/font-awesome/css/font-awesome.min.css")
            .pipe(gulp.dest("public/css"));
    gulp.src("vendor/bower_dl/font-awesome/fonts/**")
            .pipe(gulp.dest("public/fonts"));

    // Copy datatables
    var dtDir = 'vendor/bower_dl/datatables-plugins/integration/';
    gulp.src("vendor/bower_dl/datatables/media/js/jquery.dataTables.min.js")
            .pipe(gulp.dest('public/js'));
    gulp.src("vendor/bower_dl/datatables/media/css/jquery.dataTables.min.css")
            .pipe(gulp.dest('public/css'));
    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.css')
            .pipe(gulp.dest('public/css'));
    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.min.js')
            .pipe(gulp.dest('public/js'));
    gulp.src('vendor/bower_dl/datatables.net-select-dt/css/select.dataTables.min.css')
            .pipe(gulp.dest('public/css'));
    gulp.src('vendor/bower_dl/datatables.net-select/js/dataTables.select.min.js')
            .pipe(gulp.dest('public/js'));

    // Copy sb-admin
    gulp.src('vendor/bower_dl/sb-admin-2/css/sb-admin-2.css')
            .pipe(gulp.dest('public/css'));
    gulp.src('vendor/bower_dl/sb-admin-2/js/sb-admin-2.js')
            .pipe(gulp.dest('public/js'));
});
