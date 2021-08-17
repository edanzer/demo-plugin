<?php 

namespace dp\src\config;

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

class Enqueue
{
	public function __construct() 
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );
		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_assets' ) );
	}
	
	/**
     * Enqueue plugin frontend styles and scripts
     */
	public function frontend_assets() 
	{
		wp_register_style(
			'demo-plugin-css',
			DEMO_PLUGIN_URL . 'src/assets/min/frontend.min.css'
		);
		
		wp_register_script(
			'demo-plugin-js',
			DEMO_PLUGIN_URL . 'src/assets/min/frontend.min.js',
			'',
			'',
			true
		);

        wp_enqueue_style( 'demo-plugin-css' );
        wp_enqueue_script( 'demo-plugin-js' );
	}

	/**
     * Enqueue plugin admin styles and scripts
     */
	public function admin_assets() 
	{
        wp_register_style(
			'demo-plugin-admin-css',
			DEMO_PLUGIN_URL . 'src/assets/min/admin.min.css'
		);
		
		wp_register_script(
			'demo-plugin-admin-js',
			DEMO_PLUGIN_URL . 'src/assets/min/admin.min.js',
			'',
			'',
			true
		);

        wp_enqueue_style( 'demo-plugin-admin-css' );
        wp_enqueue_script( 'demo-plugin-admin-js' );

	}

	/**
	 * Enqueue frontend block assets.
	 */
	public function block_assets() 
	{

        wp_register_style(
			'demo-plugin-block-css',
			DEMO_PLUGIN_URL . 'src/assets/min/frontend-block.min.css'
		);
		
		wp_register_script(
			'demo-plugin-block-js',
			DEMO_PLUGIN_URL . 'src/assets/min/frontend-block.min.js',
			'',
			'',
			true
		);

        wp_enqueue_style( 'demo-plugin-block-css' );
        wp_enqueue_script( 'demo-plugin-admin-js' );

	}

	/**
	 * Enqueue block editor only assets.
	 */
	public function block_editor_assets() 
	{

        wp_register_style(
			'demo-plugin-editor-css',
			DEMO_PLUGIN_URL . 'src/assets/min/editor-block.min.css'
		);
		
		wp_register_script(
			'demo-plugin-editor-js',
			DEMO_PLUGIN_URL . 'src/assets/min/editor-block.min.js',
			'',
			'',
			true
		);

        wp_enqueue_style( 'demo-plugin-editor-css' );
        wp_enqueue_script( 'demo-plugin-editor-js' );

	}
}
