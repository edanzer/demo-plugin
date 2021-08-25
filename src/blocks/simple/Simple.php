<?php

namespace my_plugin\blocks\simple;

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

class Simple
{    
	public function __construct() {
        add_action( 'init', [ $this, 'register_block' ] );
	}

	/**
     * Registers the `conference/timer` block on server.
     */
	public function register_block() {
        register_block_type(
            'my-plugin/simple',
            array(
                'attributes' => [],
            )
        );
    }	

}
