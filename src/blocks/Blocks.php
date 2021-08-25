<?php

namespace my_plugin\blocks;

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

class Blocks {    
    public static $blocks =  array(
        simple\Simple::class,
        //advanced\Advanced::class
    );

	public function __construct() {
        //add_filter( 'block_categories', [ $this, 'block_categories' ], 10, 2 );
        
        foreach ( self::$blocks as $block ) {
            ( new $block );
		}
	}

	/**
	 * Add block categories if they doesn't exist
	 */
	// public function block_categories( $categories ) 
	// {
    //     $category_slugs = wp_list_pluck( $categories, 'slug' );
        
    //     return in_array( 'my-plugin-blocks', $category_slugs, true ) ? $categories : array_merge(
    //         $categories,
    //         array(
    //             array(
    //                 'slug'  => 'my-plugin-blocks',
    //                 'title' => __( 'My Plugin' )
    //             ),
    //         )
    //     );
	// }	
}
