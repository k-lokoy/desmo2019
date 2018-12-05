const gulp    = require( 'gulp' )
const plumber = require( 'gulp-plumber' )
const sass    = require( 'gulp-sass' )
const prefix  = require( 'gulp-autoprefixer' )
const wpPot   = require( 'gulp-wp-pot' )
const sort    = require( 'gulp-sort' )
const zip     = require( 'gulp-zip' )

const info = {
  name:      'desmo2019',
  slug:      'desmo2019',
  version:   '1.0.1',
  author:    'Lokøy Design',
  email:     'kennethlokoy@gmail.com',
  bugReport: 'https://github.com/lokoydesign/desmo2019/issues'
}

// CSS
gulp.task( 'css', () => {
  gulp.src('./scss/*.scss')
    .pipe(plumber())
    .pipe(sass({ outputStyle: 'expanded', includePaths: ['scss'] }))
    .pipe(prefix(['last 30 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
    .pipe(gulp.dest('./'))
} )

// Pot
gulp.task('pot', () => {
  return gulp.src('./**/*.php')
    .pipe(plumber())
    .pipe(sort())
    .pipe(wpPot({
        domain: info.slug,
        package: info.slug,
        bugReport: info.bugReport,
        lastTranslator: `${info.author} <${info.email}>`,
        team: `${info.author} <${info.email}>`
    }))
    .pipe(gulp.dest(`./languages/${info.slug}.pot`))
})

// Package
gulp.task( 'package', () => {
  gulp.src( [
    './**/*.*',
    '!./.git',
    '!./node_modules/**/*.*',
    '!./releases/**/*.*',
    '!./scss/**/*.*',
    '!./.gitignore',
    '!./gulpfile.js',
    '!./package.json',
    '!./package-lock.json',
  ], {
    base: '..'
  } ).pipe( zip( `${info.slug}_${info.version}.zip` ) )
     .pipe( gulp.dest( './releases' ) )
} )

// Watch
gulp.task('watch', () => {
  gulp.watch( 'scss/*.scss', { cwd: './' }, [ 'css' ] )
  gulp.watch( '**/*.php',           { cwd: './' }, [ 'pot' ] )
})

gulp.task('default', [ 'watch', 'css', 'pot' ]);