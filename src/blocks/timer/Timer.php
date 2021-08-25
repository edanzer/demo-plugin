<?php

namespace conference\blocks\timer;

/**
 * Exit if accessed directly.
 */
defined( 'ABSPATH' ) || exit;

class Timer
{    
	public function __construct()
	{
        add_action( 'init', array( $this, 'register' ) );
	}

	/**
     * Registers the `conference/timer` block on server.
     */
	public function register() 
	{
        register_block_type(
            'conference/timer',
            array(
                'attributes' => array(
                    'countdownTo' => array(
                        'type'      => 'string',
                        'default'   => 'custom',
                    ),
                    'sessionId' => array(
                        'type'      => 'string',
                        'default'   => '',
                    ),
                    'completedContent' => array(
                        'type'      => 'string',
                        'default'   => '',
                    ),
                    'style' => array(
                        'type'      => 'string',
                        'default'   => 'default',
                    ),
                ),
                'render_callback' => array( $this, 'render' ),
            )
        );
    }	
    
    /**
     * Renders the `conference/timer` block on server.
     *
     * @param array $attributes The block attributes.
     *
     * @return string Returns a list of speakers.
     */
    function render( $attributes ) 
    {
        // Additional classes
        $classes = isset( $attributes['className'] ) ? $attributes['className'] : '';

        // Render the final block html
        $block_content = sprintf(
            '<div id="' . $attributes['id'] . '" class="wp-block-conference-timer ' . $classes . ' conference-block ' . $attributes['style'] . '">
                <div class="attributes" style="display: none;">' . json_encode( $attributes ) . '</div>
                <div class="render-block"></div>
            </div>'
        );
    
        return $block_content;
    }
}
