<?php 

namespace my_plugin\config;

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

class Enqueue {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_assets' ) );
	}
	
	/**
     * Enqueue plugin frontend styles and scripts
     */
	public function frontend_assets() {
		wp_register_style(
			'my-plugin-css',
			MY_PLUGIN_URL . 'build/frontend.css'
		);
		
		wp_register_script(
			'my-plugin-js',
			MY_PLUGIN_URL . 'build/frontend.js',
			'',
			'',
			true
		);

        wp_enqueue_style( 'my-plugin-css' );
        wp_enqueue_script( 'my-plugin-js' );
	}

	/**
	 * Enqueue block editor assets.
	 */
	public function block_editor_assets() {
		wp_register_style(
			'my-plugin-editor-css',
			MY_PLUGIN_URL . 'build/index.css'
		);
		
		wp_register_script(
			'my-plugin-editor-js',
			MY_PLUGIN_URL . 'build/index.js',
			'',
			'',
			true
		);

        wp_enqueue_style( 'my-plugin-editor-css' );
        wp_enqueue_script( 'my-plugin-editor-js' );
	}
}
