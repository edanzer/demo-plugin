/**
 * Block icon
 */
const icon = 'clock';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InspectorControls } = wp.blockEditor;

/**
 * Custom block components
 */
import Timer from './components/Timer';
import TimerSettings from './components/TimerSettings';

/**
 * Register: a Gutenberg Block.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully registered; otherwise `undefined`.
 */
export default registerBlockType( 'conference/timer', {
	title: __( 'Timer' ),
	description: __( 'Countdown timer block.' ),
	category: 'conference-blocks',
	icon: icon,
	keywords: [
		__( 'Timer', 'Count', 'Countdown', 'Countdown Timer' ),
	],
	attributes: {
		id: {
			type: 'string',
        },
        countdownTo: {
            type: 'string',
            default: 'custom',
        },
        date: {
			type: 'string',
        },
        sessionId: {
            type: 'string',
            default: '',
		},
		completedContent: {
            type: 'string',
            default: '',
		},
		style: {
			type: 'string',
            default: 'default',
		},
	},
	edit: ( props ) => {
		const {
			attributes,
			className, 
			setAttributes,
		} = props;

		return ( [
			<InspectorControls key='timer-controls'>
				<TimerSettings
					attributes={ attributes }
					setAttributes={ setAttributes } 
				/>
			</InspectorControls>,
			
			<div className={ className + ' conference-block ' + attributes.style } key='timer-block-editor'>       
				<Timer 
                    attributes={ attributes }
					setAttributes={ setAttributes } 
                />
			</div>
		] );
	},
	save: () => null,
} );
