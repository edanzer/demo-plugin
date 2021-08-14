/*
 *
 * Following @wordpress/scripts standards, this src/index.js file is the entry
 * point for all JS and CSS processing. The resulting compile JS file will be 
 * at build/index.js.
 * 
 * This JS file also looks for and generates two CSS files. The index.scss file
 * and all related styles will become build/index.css. This is for block editor-only css. 
 * The style.scss file and all connected styles will become style.css and is for 
 * style applying to both front end and block editor. 
 * 
 */

/* 
 * Import CSS 
 * 
 * Again following @wordpress/scripts standards, we import and generates two CSS files. 
 * The index.scss file and all related styles will become build/index.css. This is for 
 * block editor-only css. The style.scss file and all connected styles will become 
 * style.css and is for style applying to both front end and block editor. 
 * 
 */
import './index.scss';
import './style.scss';

/*
 * Import JS
 */