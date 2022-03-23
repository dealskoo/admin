let gulp = require("gulp");

const copyLibs = function () {
    let srcLibs = [
        './node_modules/editor.md/lib/**/*'
    ];

    let outLibs = 'public/js/vendor/lib/';

    let srcPlugins = [
        './node_modules/editor.md/plugins/**/*'
    ];

    let outPlugins = 'public/js/vendor/plugins/';

    let srcFonts = [
        './node_modules/editor.md/fonts/**/*'
    ];

    let outFonts = 'public/css/fonts/';

    let srcImages = [
        './node_modules/editor.md/images/*.gif'
    ];
    let outImages = 'public/css/images/';

    gulp.src(srcPlugins).pipe(gulp.dest(outPlugins));

    gulp.src(srcFonts).pipe(gulp.dest(outFonts));

    gulp.src(srcImages).pipe(gulp.dest(outImages));

    return gulp.src(srcLibs).pipe(gulp.dest(outLibs));
}

gulp.task(copyLibs);
