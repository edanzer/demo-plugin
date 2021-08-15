<?php

namespace my_plugin;

/**
 * The main plugin file.
 * 
 * @package     My Plugin
 * @author      Erick Danzer
 * @license     GPL2+
 *
 * @wordpress-plugin
 * Plugin Name:       My Plugin
 * Plugin URI:        www.example.com
 * Description:       A short description of what the plugin does. 
 * Version:           1.0.0
 * Author:            Erick Danzer
 * Author URI:        www.erickdanzer.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       my-plugin
 * Domain Path:       /languages
 */

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

/**
 * Defined constant for plugin version.
 */
define( 'MY_PLUGIN_VERSION', '1.0.0' );

/**
 * Define constants for plugin root path and url.
 */
define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Require composer autoload.php. 
 * This handles loading of all PHP classes. You do not need to include or require php files.
 * Note that the plugin uses the PSR-4 autoloading standard, which imposes very specific
 * rules for organizing and naming files and classes to ensure autoloading works. 
 */
require_once MY_PLUGIN_DIR . '/vendor/autoload.php';

/* 
 * Define main plugin class
 */
class My_Plugin {

    /* 
     * Plugin constructor functions. Runs immediately when plugin is loaded.
     */
    function __construct() {

        $this->add_hooks();

    }

    /* 
     * Add all action and filter hooks here.
     */
    function add_hooks() {

        if ( is_admin() ) {

            // Add admin-only hooks
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets') );

        } else {

            // Add front-end-only hooks here
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets') );

        }
    
    }

    /*
     * Register and enqueue frontend styles and scripts.
     */
    public function enqueue_frontend_assets() 
    {

        wp_register_style(
            'my-plugin-css', 
            MY_PLUGIN_URL . 'build/style-index.css'
        );
        
        wp_register_script(
            'my-plugin-js', 
            MY_PLUGIN_URL . 'build/index.js',
            '',
            '',
            true
        );

        wp_enqueue_style( 'my-plugin-css' );
        wp_enqueue_script( 'my-plugin-js' );

    }

    /*
     * Register and enqueue backend styles and scripts.
     */
    public function enqueue_admin_assets() 
    {

        wp_register_style(
            'my-plugin-admin-css', 
            MY_PLUGIN_URL . 'build/index.css'
        );

        wp_register_script(
            'my-plugin-admin-js', 
            MY_PLUGIN_URL . 'build/index.js',
            '',
            '',
            true
        );

        wp_enqueue_style( 'my-plugin-admin-css' );
        wp_enqueue_script( 'my-plugin-admin-js' );

    }

}

new My_Plugin();