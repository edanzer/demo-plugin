<?php

namespace demo_plugin;

/**
 * The main plugin file.
 * 
 * @package     Demo Plugin
 * @author      Erick Danzer
 * @license     GPL2+
 *
 * @wordpress-plugin
 * Plugin Name:       Demo Plugin
 * Plugin URI:        www.erickdanzer.com
 * Description:       A resource plugin with code snippets for common plugin tasks. 
 * Version:           1.0.0
 * Author:            Erick Danzer
 * Author URI:        www.erickdanzer.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       demo-plugin
 * Domain Path:       /languages
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define constants
define( 'DEMO_PLUGIN_VERSION', '1.0.0' );
define( 'DEMO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'DEMO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'DEMO_PLUGIN_DEV_MODE', false );

/**
 * Require composer autoload.php. 
 * This handles loading of all PHP classes. You do not need to include or require php files.
 * Note that the plugin uses the PSR-4 autoloading standard, which imposes very specific
 * rules for organizing and naming files and classes to ensure autoloading works. 
 */
require_once DEMO_PLUGIN_PATH . '/vendor/autoload.php';

/**
 * Initailize plugin
 */
if ( class_exists( '\demo_plugin\src\Init' ) ) {
	\demo_plugin\src\Init::register_services();
}