var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var sourcemaps = require('gulp-sourcemaps');
var spritesmith = require('gulp.spritesmith');
var browser = require('browser-sync');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var pleeease = require('gulp-pleeease');
var rename = require('gulp-rename');
var changed = require('gulp-changed');
var ftp = require('gulp-ftp');
var cache = require('gulp-cached');
var jade = require('gulp-jade');
var prettify = require('gulp-prettify');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var gutil = require('gulp-util');
var ftp = require('vinyl-ftp');
var autoprefixer = require('gulp-autoprefixer');
var del = require('del');
var gulpwatch = require('gulp-watch');
var FrontNote = require('frontnote');
var note = new FrontNote({
  out: 'public/dev/styleguide',
  css: '/p/common/css/style.css',
  script: '/p/common/js/script.js'
});


// server
gulp.task('server', function(){
	browser.init({
		proxy: "a.love-crossover.com"
	})
});

// jade
gulp.task('jade', function(){
	gulp.src(['public/dev/**/*.jade','!public/dev/**/_*.jade','!public/dev/**/include/*.jade'])
	.pipe(plumber())
	.pipe(jade({
		pretty: true
	}))
	.on('error', notify.onError(function (error) {
		return "Error: " + error.message;
	}))
	.pipe(cache())
	.pipe(rename({
		extname: '.php'
	}))
	.pipe(gulp.dest('public/'))
});
gulp.task('inc', function(){
	gulp.src('public/dev/**/include/*.jade')
	.pipe(plumber())
	.pipe(jade({
		pretty: true
	}))
	.on('error', notify.onError(function (error) {
		return "Error: " + error.message;
	}))
	.pipe(cache())
	.pipe(rename({
		extname: '.inc'
	}))
	.pipe(gulp.dest('public/'))
})

gulp.task('frontnote', function () {
	note.render('public/dev/**/*.scss', function () {
	});
});

// sassのコンパイル
gulp.task('sass', function() {
	sass( "public/dev/common/sass/**/*.scss" , {
		style: 'compressed',
		// sourcemap: true,
		emitCompileError: true,
		compass: false
	})
	.on('error', notify.onError(function (error) {
		return "Error: " + error.message;
	}))
	.pipe(autoprefixer())
	.pipe(sourcemaps.init())
	.pipe(pleeease({
		"minifier": false
	}))
	// .pipe(sourcemaps.write())
	.pipe(gulp.dest('public/common/css/'))
	.pipe(browser.reload({stream:true}))
});

// 削除
gulp.task('del', function(cb){
	gulpwatch('public/dev/**/*', function(file){
		if(file.event === 'unlink') {
			del(file.path.replace('dev/','').replace('.jade','.php'), cb);
		}
	})
})

// 画像圧縮
gulp.task('img', function(){
	gulp.src('public/dev/**/*.+(jpg|jpeg|png|gif|svg)')
	.pipe(cache())
	.pipe(imagemin({
		progressive: true,
		svgoPlugins: [{removeViewBox: false}],
		use: [pngquant()]
	}))
	.pipe(gulp.dest( 'public/' ));
});

// ファイルコピー
gulp.task('copy', function(){
	gulp.src('public/dev/**/*.+(inc|css|php|js|json|jsonp|svg|eot|ttf|woff)')
	.pipe(cache())
	.pipe(gulp.dest('public/'))
});

// 監視
gulp.task('watch', function(){
	gulp.watch('public/**/*.+(htm|html|php|inc|js)').on('change', browser.reload);
	gulp.watch('public/**/*.+(scss)',['sass']);
	gulp.watch('public/dev/**/*.+(inc|css|php|js|json|jsonp)',['copy']);
	gulp.watch('public/dev/**/*.+(jade)',['jade','inc']);
	gulp.watch('public/dev/**/*.+(jade|jpg|jpeg|png|svg|inc|js|gif)',['del']);
	gulp.watch('public/dev/**/*.+(png|jpg|jpeg|svg|gif)',['img']);
});

// デフォルトタスク
gulp.task('default',['watch','server']);
