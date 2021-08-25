/**
 * Block icon
 */
const icon = 'editor-paragraph';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register: a Gutenberg Block.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully registered; otherwise `undefined`.
 */
export default registerBlockType( 'my-plugin/simple', {
	title: __( 'Simple' ),
	description: __( 'Simple block.' ),
	category: 'my-plugin-blocks',
	icon: icon,
	keywords: [
	],
	attributes: {
	},
	edit: ( props ) => {
		return (	
			<div className={ props.className } >     
				<p>Hello from the editor!</p>  
			</div>
		);
	},
	save: ( props ) => {
		return (	
			<div className={ props.className } >     
				<p>Hello from the front end!</p>  
			</div>
		);
	},
} );
