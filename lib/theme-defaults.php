<?php
/**
 * Sixseed.
 *
 * This file adds the default theme settings to the Sixseed Theme.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

add_filter( 'simple_social_default_styles', 'sixseed_social_default_styles' );
/**
 * Set Simple Social Icon defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
function sixseed_social_default_styles( $defaults ) {

	$args = genesis_get_config( 'simple-social-icons-settings' );

	return wp_parse_args( $args, $defaults );

}
