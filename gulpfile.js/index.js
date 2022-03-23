"use strict";

let gulp = require("gulp"),
    HubRegistry = require('gulp-hub');


/**
 * Register all the tasks
 */
// load some files into the registry
let hub = new HubRegistry(['tasks/*.js']);

// tell gulp to use the tasks just loaded
gulp.registry(hub);

/**
 * Watches the changes
 */
function watchFiles() {
    const baseAssets = 'resources/';

    gulp.watch(baseAssets + "css/**/*", gulp.series('compileSaas'));
    gulp.watch(baseAssets + "js/**/*", gulp.series("compileJs"));
}

/**
 * Default tasks
 */

// watch all changes
gulp.task("watch", gulp.parallel(watchFiles));

// default
gulp.task('default', gulp.series('copyAssets', 'compileSaas', 'compileJs', 'copyLibs', 'watch'), function (done) {
    done();
});


// build
gulp.task("build", gulp.series('copyAssets', 'compileSaas', 'compileJs', 'copyLibs'));

