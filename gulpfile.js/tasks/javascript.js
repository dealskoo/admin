let gulp = require("gulp"),
    uglify = require("gulp-uglify"),
    lodash = require("lodash"),
    sourcemaps = require("gulp-sourcemaps"),
    concat = require("gulp-concat"),
    rename = require("gulp-rename");
// compile and concate js
const
    compileJs = function () {
        const out = "public/js/";
        const baseAssets = 'resources/';

        // optional components
        let componentsAssets = {
            js: [
                baseAssets + "js/ui/component.dragula.js",
                baseAssets + "js/ui/component.fileupload.js",
                baseAssets + "js/ui/component.chat.js",
                baseAssets + "js/ui/component.todo.js",
                baseAssets + "js/ui/component.range-slider.js",
                baseAssets + "js/ui/component.rating.js",
                baseAssets + "js/ui/component.scrollbar.js"
            ]
        };

        lodash(componentsAssets).forEach(function (assets, type) {
            gulp.src(assets)
                .pipe(uglify())
                .on("error", function (err) {
                    console.log(err.toString());
                })
                .pipe(gulp.dest(out + "ui"));
        });

        // creating separate vendor js file

        // It's important to keep files at this order
        // so that `app.min.js` can be executed properly
        return gulp
            .src([baseAssets + "js/layout.js", baseAssets + "js/hyper.js"])
            .pipe(sourcemaps.init())
            .pipe(concat("app.js"))
            .pipe(gulp.dest(out))
            .pipe(
                rename({
                    // rename app.js to app.min.js
                    suffix: ".min"
                })
            )
            .pipe(uglify())
            .on("error", function (err) {
                console.log(err.toString());
            })
            .pipe(sourcemaps.write("./"))
            .pipe(gulp.dest(out));
    }

gulp.task(compileJs);
