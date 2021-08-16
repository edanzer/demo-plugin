/*
 *--------------------------------------------------------------------------
 * Mix Asset Management
 *--------------------------------------------------------------------------
 *
 * Mix provides a clean, fluent API for defining Webpack build steps
 * for Laravel applications. This plugin leverages it to compiling 
 * Sass files and to bundle and prepare JS files.
 *
 */

// Set directories
let plugin_dir = 'demo-plugin';
let build_dir = 'dist';

// Require build dependencies
const del = require( 'del' );
const fs = require( 'fs' );
const archiver = require( 'archiver' );

// Create plugin dir if not exist to prevent for "no mix-manifest" error
if ( ! fs.existsSync( build_dir ) ) {
    fs.mkdirSync( build_dir );
}

// Delete plugin directory if it exists
if ( fs.existsSync( `${build_dir}/${plugin_dir}` ) && 'production' === process.env.NODE_ENV ) {
    del( `${build_dir}/${plugin_dir}` );
}

// Require laravel mix
const { mix } = require( 'laravel-mix' ); 

// Set the public map to compile vendors to the right place
mix.setPublicPath( 'src/assets/min' );

// Set resource path for fonts to prevent 404 no found fonts
mix.setResourceRoot( '' );

// Compile plugin assets
mix
    .sass( 'src/assets/sass/admin.scss', 'src/assets/min/admin.min.css' )
    .sass( 'src/assets/sass/frontend.scss', 'src/assets/min/frontend.min.css' )
    .sass( 'src/assets/sass/editor-block.scss', 'src/assets/min/editor-block.min.css' )
    .sass( 'src/assets/sass/frontend-block.scss', 'src/assets/min/frontend-block.min.css' )

    .js( 'src/assets/js/admin.js', 'src/assets/min/admin.min.js' )
    .js( 'src/assets/js/editor-block.js', 'src/assets/min/editor-block.min.js' )
    .js( 'src/assets/js/frontend-block.js', 'src/assets/min/frontend-block.min.js' )
    .js( 'src/assets/js/frontend.js', 'src/assets/min/frontend.min.js' );

// Disable build notifications
mix.disableNotifications();

// Copy all plugin files to build directory
// Delete dev files from build directory
// Create a zip of build directory with the current plugin version
if ( 'production' === process.env.NODE_ENV ) {
    mix.copy( 'src/', `${build_dir}/${plugin_dir}/src`, false );

    mix.copy( 'vendor', `${build_dir}/${plugin_dir}/vendor`, false );

    mix.copy( [ 'composer.json', 'index.php', 'demo-plugin.php' ], `${build_dir}/${plugin_dir}`, false )
        .then( () => {
            // delete dev files before zipping 
            del( `${build_dir}/${plugin_dir}/src/assets/sass` );
            del( `${build_dir}/${plugin_dir}/src/assets/js` );

            // create a folder to stream archive data to.
            let output = fs.createWriteStream( `${build_dir}/${plugin_dir}-${process.env.npm_package_version}.zip` );
            let archive = archiver( 'zip', {
                zlib: { level: 9 } // Sets the compression level.
            } );

            // pipe archive data to the file
            archive.pipe( output );

            // append files and putting its contents at the root of archive
            archive.directory( `${build_dir}/${plugin_dir}/`, plugin_dir );

            // finalize the archive 
            archive.finalize();
    } );
}
