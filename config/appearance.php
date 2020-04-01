<?php
/**
 * Sixseed appearance settings.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

$sixseed_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];

$sixseed_link_color = get_theme_mod(
	'sixseed_link_color',
	$sixseed_default_colors['link']
);

$sixseed_accent_color = get_theme_mod(
	'sixseed_accent_color',
	$sixseed_default_colors['accent']
);

$sixseed_link_color_contrast   = sixseed_color_contrast( $sixseed_link_color );
$sixseed_link_color_brightness = sixseed_color_brightness( $sixseed_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $sixseed_link_color,
	'button-color'         => $sixseed_link_color_contrast,
	'button-outline-hover' => $sixseed_link_color_brightness,
	'link-color'           => $sixseed_link_color,
	'default-colors'       => $sixseed_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', 'sixseed' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $sixseed_link_color,
		],
		[
			'name'  => __( 'Accent color', 'sixseed' ),
			'slug'  => 'theme-secondary',
			'color' => $sixseed_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'sixseed' ),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'sixseed' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'sixseed' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'sixseed' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
