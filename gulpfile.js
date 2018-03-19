const gulp = require('gulp'),
	gulp_rename = require('gulp-rename'),
	gulp_rm = require('gulp-rm'),
	gulp_plumber = require ('gulp-plumber'),
	gulp_sourcemaps = require ('gulp-sourcemaps'),
	gulp_notify = require('gulp-notify'),
	// index 
	gulp_pug = require('gulp-pug'),
	// CSS/SCSS dependencies
	gulp_autoprefixer = require ('gulp-autoprefixer'),
	gulp_sass = require('gulp-sass'),
	gulp_responsive = require('gulp-responsive'),
	// JS/ES6 dependencies
	gulp_concat = require('gulp-concat'),
	// Images
	gulp_imagemin = require('gulp-imagemin'),
	// Browserify
	gutil = require('gulp-util'),
	browserify = require('browserify'),
	babelify = require('babelify'),
	source = require('vinyl-source-stream'),
	env = require('babel-preset-env')

const config = {
	dist: 'dist/',
	src : 'src/',
	assets: 'dist/assets/'
}

// Watch by default
gulp.task('default', ['watch'], () => {})

// SASS to SCSS, compress & prefix styles
gulp.task('styles', () => {
	return gulp.src([`${config.src}styles/**/*.scss`, `!${config.src}styles/vendor/*`])
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Styles error:  <%= error.message %>')}))
		.pipe(gulp_sourcemaps.init())
		.pipe(gulp_concat('style.min.css'))
		.pipe(gulp_sass({
			outputStyle: 'compressed'}).on('error', gulp_sass.logError))
		.pipe(gulp_autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp_sourcemaps.write())
		.pipe(gulp.dest(`${config.assets}css`))
})

gulp.task('vendor', () => {
	return gulp.src(`${config.src}styles/vendor/*`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Fonts error:  <%= error.message %>')}))
		.pipe(gulp.dest(`${config.assets}css/vendor`))
})

// Concat, minify & babel
gulp.task('scripts', () => {
	browserify({
		entries: `${config.src}scripts/app.js`,
		debug: true
	})
		.transform(babelify, { presets: [env] })
		.bundle()
		.on('error', gutil.log)
		.pipe(source('app.js'))
		.on('error', gutil.log)
		.pipe(gulp_rename('app.js'))
		.pipe(gulp.dest(`${config.assets}js`))
})

gulp.task('index', () => {
	return gulp.src(`${config.src}*.php`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Copy error:  <%= error.message %>')}))
		.pipe(gulp.dest(`${config.dist}`))  
})

gulp.task('components', () => {
	return gulp.src(`${config.src}components/**/*.php`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Copy error:  <%= error.message %>')}))
		.pipe(gulp.dest(`${config.dist}components`))  
})

gulp.task('fonts', () => {
	return gulp.src(`${config.src}fonts/*`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Fonts error:  <%= error.message %>')}))
		.pipe(gulp.dest(`${config.assets}fonts`))
})

gulp.task('lib', () => {
	return gulp.src(`${config.src}lib/**`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Lib error:  <%= error.message %>')}))
		.pipe(gulp.dest(`${config.assets}lib`))
})

gulp.task('actions', () => {
	return gulp.src(`${config.src}actions/**`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Action error:  <%= error.message %>')}))
		.pipe(gulp.dest(`${config.dist}actions`))
})

gulp.task('htaccess', () => {
	return gulp.src(`${config.src}.htaccess`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('htaccess error:  <%= error.message %>')}))
		.pipe(gulp.dest(`${config.dist}`))
})

gulp.task('images', () => {
	return gulp.src(`${config.src}images/**`)
		.pipe(gulp_plumber({errorHandler: gulp_notify.onError('Image error:  <%= error.message %>')}))
		// .pipe(gulp_imagemin([
		// 	gulp_imagemin.gifsicle({interlaced: true}),
		// 	gulp_imagemin.jpegtran({progressive: true}),
		// 	gulp_imagemin.optipng({optimizationLevel: 5}),
		// 	gulp_imagemin.svgo({
		// 		plugins: [
		// 			{removeViewBox: true},
		// 			{cleanupIDs: false}
		// 		]
		// 	})
		// ], {
		// 	verbose: true
		// }))
		.pipe(gulp.dest(`${config.assets}images/src`))
})

// Manual function
gulp.task('clean', () => {
	return gulp.src(`${config.dist}**/*`, { read: false })
		.pipe(gulp_rm())
})

// Wath changes
gulp.task('watch', ['index', 'components', 'styles', 'vendor', 'scripts', 'fonts', 'lib', 'images', 'actions', 'htaccess'], () => {
  gulp.watch(`${config.src}*.php`, ['index'])
  gulp.watch(`${config.src}components/**/*.php`, ['components'])
	gulp.watch(`${config.src}views/**/*.php`, ['views'])
	gulp.watch(`${config.src}actions/**/*.php`, ['actions'])
	gulp.watch([`${config.src}styles/**/*.scss`, `!${config.src}styles/vendor`], ['styles'])
	gulp.watch(`${config.src}styles/vendor/*.css`, ['vendor'])
	gulp.watch([`${config.src}scripts/**/*.js`, `!${config.src}styles/vendor`], ['scripts'])
	gulp.watch(`${config.src}images/**`, ['images'])
	gulp.watch(`${config.src}fonts/**`, ['fonts'])
	gulp.watch(`${config.src}lib/**`, ['lib'])
})