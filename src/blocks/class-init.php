<?php

namespace conference\blocks;

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

class Init
{    
    public static $blocks =  array(
        session\Session::class,
        speaker\Speaker::class,
        exhibitor\Exhibitor::class,
        timer\Timer::class,
    );

	public function __construct()
	{
        add_filter( 'block_categories', array( $this, 'block_categories' ), 10, 2 );
        
        foreach ( self::$blocks as $block ) {
            ( new $block );
		}
	}

	/**
	 * Add block categories if they doesn't exist
	 */
	public function block_categories( $categories ) 
	{
        $category_slugs = wp_list_pluck( $categories, 'slug' );
        
        return in_array( 'conference-blocks', $category_slugs, true ) ? $categories : array_merge(
            $categories,
            array(
                array(
                    'slug'  => 'conference-blocks',
                    'title' => __( 'Conference' )
                ),
            )
        );
	}	
}
