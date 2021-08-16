<?php

namespace demo_plugin\src;

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

final class Init
{
	public static $services =  array(
		config\Enqueue::class,
		//pages\Settings::class,
		//cpt\Recipe::class,
		//blocks\Blocks::class,
	);
        
	/**
	 * Register and activate services
	 */
	public static function register_services() 
	{
		foreach ( self::$services as $class ) {
            ( new $class );
		}

		add_action( 'init', 'flush_rewrite_rules' );
	}
}