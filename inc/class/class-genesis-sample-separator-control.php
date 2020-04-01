<?php
/**
 * Register custom customizer controls/fields.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

/**
 * Custom Controls
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	// Separator Control.
	if ( ! class_exists( 'Genesis_Sample_Separator_Control' ) ) :
		/**
		 * Separator for customizer options.
		 */
		class Genesis_Sample_Separator_Control extends WP_Customize_Control {

			/**
			 * Displays the control content.
			 */
			public function render_content() {
				echo '<hr/>';
			}

		}
	endif;

endif;
