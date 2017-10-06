// Requiring plugins
const gulp 			= require('gulp'),
	  sass 			= require('gulp-sass'),
	  browserSync 	= require('browser-sync').create(),
	  uglify 		= require('gulp-uglify'),
	  cssnano 		= require('gulp-cssnano'),
	  rename		= require('gulp-rename'),
	  imagemin 		= require('gulp-imagemin'),
	  cache 		= require('gulp-cache'),
	  del 			= require('del'),
	  runSequence 	= require('run-sequence'),
	  sourceMaps	= require('gulp-sourcemaps'),
	  autoprefixer	= require('gulp-autoprefixer'),
	  concat		= require('gulp-concat');

// Defining files source
const sassSrc 	= 'app/scss/**/*.scss',
	  jsSrc 	= 'app/js/**/*.js',
	  htmlSrc 	= '*.html',
	  imageSrc 	= 'app/images/**/*.+(png|jpg|jpeg|gif|svg)',
	  destCSS 	= 'app/css',
	  destJS	= 'app/js';


// Sass task
gulp.task('sass', function() {
	return gulp
		.src(sassSrc) // Defining sass source that will execute the first taks
		.pipe(sourceMaps.init()) // Initing sourcemaps plugin
		.pipe(sass()) // Executing Sass task to compile scss into css files
		.pipe(sourceMaps.write()) // Writing sourcemaps into CSS files
		.pipe(autoprefixer()) // Applying Autoprefixer
		.pipe(gulp.dest(destCSS)) // Sending single css file to app/css folder
		.pipe(cssnano()) // Minifying css
		.pipe(rename({ 
            suffix: '.min' // renaming to .min file
        }))
		.pipe(gulp.dest('dist/css')) // Transfering minified file to distribution
		.pipe(browserSync.reload({ // watching with BrowserSync
	      stream: true
	    }))
});


gulp.task('js', function() {
	return gulp
		.src(jsSrc) // Defining js source that will execute the first taks
		.pipe(concat('main.min.js')) // Concatenating js into a single file
		.pipe(uglify()) // Minifying single file
		.pipe(gulp.dest('dist/js')) // Transfering minified file to distribution
		.pipe(browserSync.reload({ // watching with BrowserSync
	      stream: true
	    }))
});


gulp.task('browserSync', function() {
	browserSync.init({ // Initing BrowserSync
		server: {
			baseDir: './' // Watching root folder
		}
	})
});


gulp.task('images', function(){
	return gulp
		.src(imageSrc) // Defining Images source path
		.pipe(cache(imagemin({ // Minifying images and creating cache
			interlaced: true
		})))
		.pipe(gulp.dest('dist/images')) // Transferring minified images to distribution
});


gulp.task('fonts', function() {
	return gulp
		.src('app/fonts/**/*') // Defining fonts source path
		.pipe(gulp.dest('dist/fonts')) // Transferring fonts to distribution
});


gulp.task('clean:dist', function() {
	return del.sync('dist'); // Cleaning distribution folder
});


gulp.task('watch', ['browserSync', 'sass', 'js'], function() {
	gulp.watch(sassSrc, ['sass']);
	gulp.watch(jsSrc, ['js']);
	gulp.watch(htmlSrc, browserSync.reload);
	gulp.watch(jsSrc, browserSync.reload);
});


gulp.task('build', function (callback) {
	runSequence('clean:dist', 
		['sass', 'js', 'images', 'fonts'],
		callback
	)
});


gulp.task('default', function (callback) {
	runSequence(['sass', 'js', 'images', 'browserSync', 'watch'],
		callback
	)
});