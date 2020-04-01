<?php
/**
 * This file adds custom functions to your Theme Customizer.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

// Include customizer controls.
require_once get_stylesheet_directory() . '/inc/class/class-sixseed-separator-control.php';
require_once get_stylesheet_directory() . '/inc/class/class-sixseed-reset-control.php';


/**
 * Returns the default settings.
 *
 * @param  array $theme_mod setting option.
 * @return array $default_options
 */
function sixseed_get_customiser_default( $theme_mod ) {

	$defaults = [
		'sixseed_align_wide'        => true,
		'sixseed_color_palette'     => true,
		'sixseed_editor_font_sizes' => true,
		'sixseed_custom_font_sizes' => false,
		'sixseed_custom_colors'     => false,
		'sixseed_editor_styles'     => true,
		'sixseed_dark_backgrounds'  => false,
		'sixseed_wp_block_styles'   => false,
		'sixseed_responsive_embeds' => true,
		'primary_color'                    => '#0467c6',
		'secondary_color'                  => '#004990',
		'primary_alt_color'                => '#ff0014',
		'secondary_alt_color'              => '#b3000e',
		'black_color'                      => '#000',
		'dark_gray_01_color'               => '#333',
		'dark_gray_02_color'               => '#666',
		'light_gray_02_color'              => '#eee',
		'light_gray_01_color'              => '#f5f5f5',
		'white_color'                      => '#fff',
		'primary_dark_color'               => '#03a577',
		'secondary_dark_color'             => '#02684c',
		'primary_alt_dark_color'           => '#ff0014',
		'secondary_alt_dark_color'         => '#b3000e',
		'regular_font_size'                => '14',
		'xx_small_font_size'               => '14',
		'x_small_font_size'                => '15',
		'small_font_size'                  => '16',
		'normal_font_size'                 => '18',
		'medium_font_size'                 => '20',
		'large_font_size'                  => '24',
		'xx_large_font_size'               => '27',
		'xx_large_font_size'               => '30',

	];

	return isset( $defaults[ $theme_mod ] ) ? $defaults[ $theme_mod ] : false;

}

/**
 * Registers settings and controls with the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function sixseed_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'sixseed_gutenberg_options',
		[
			'title'       => __( 'Gutenberg Theme Support', 'sixseed' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set <a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/">Gutenberg Theme Support</a> opt-in features for Sixseed theme.', 'sixseed' ),
			'panel'       => 'genesis',
		]
	);

	$wp_customize->remove_section( 'colors' );

	$dark_mode_color_palette_section_link = "javascript:wp.customize.section( 'sixseed_dark_color_options' ).focus()";

	$wp_customize->add_section(
		'sixseed_color_options',
		[
			'title'       => __( 'Gutenberg Color Palette', 'sixseed' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			// translators: Section description with link to another section.
			'description' => sprintf( __( 'Allows you to set <a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes">Block color palette</a> for Sixseed theme. If you are looking to change colors for Dark Color Scheme, go <a href="%s">here</a>.', 'sixseed' ), $dark_mode_color_palette_section_link ),
			'panel'       => 'genesis',
		]
	);

	$wp_customize->add_section(
		'sixseed_font_options',
		[
			'title'       => __( 'Gutenberg Font Sizes', 'sixseed' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'description' => __( 'Allows you to set <a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes">Block Font sizes</a> for Sixseed theme.', 'sixseed' ),
			'panel'       => 'genesis',
		]
	);

	$gutenberg_color_palette_section_link = "javascript:wp.customize.section( 'sixseed_color_options' ).focus()";

	$wp_customize->add_section(
		'sixseed_dark_color_options',
		[
			'title'       => __( 'Dark Color Scheme Color Palette', 'sixseed' ),
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			// translators: Section description with link to another section.
			'description' => sprintf( __( 'Allows you to set color palette for <a target="_blank" href="https://drafts.csswg.org/mediaqueries-5/#prefers-color-scheme">Dark Color Scheme</a> in Sixseed theme. If you are looking to change colors for Block color palette, go <a href="%s">here</a>.', 'sixseed' ), $gutenberg_color_palette_section_link ),
			'panel'       => 'genesis',
		]
	);

	// Enable wide and full alignments.
	$wp_customize->add_setting(
		'sixseed_align_wide',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_align_wide' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_align_wide',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_align_wide',
			'priority' => 10,
			'label'    => __( 'Wide Alignment.', 'sixseed' ),
			'type'     => 'checkbox',
			// -- 'description' => __( '<a target="_blank" href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment"><code>align-wide</code></a>', 'sixseed' ),
		]
	);

	// Enable Block Color Palettes.
	$wp_customize->add_setting(
		'sixseed_color_palette',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_color_palette' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_color_palette',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_color_palette',
			'priority' => 10,
			'label'    => __( 'Block Color Palettes.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Disable custom colors in block Color Palettes.
	$wp_customize->add_setting(
		'sixseed_custom_colors',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_custom_colors' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_custom_colors',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_custom_colors',
			'priority' => 10,
			'label'    => __( 'Disable custom colors in Block Color Palettes.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Enable Block font sizes.
	$wp_customize->add_setting(
		'sixseed_editor_font_sizes',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_editor_font_sizes' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_editor_font_sizes',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_editor_font_sizes',
			'priority' => 10,
			'label'    => __( 'Block Font Sizes.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Disable custom font sizes.
	$wp_customize->add_setting(
		'sixseed_custom_font_sizes',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_custom_font_sizes' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_custom_font_sizes',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_custom_font_sizes',
			'priority' => 10,
			'label'    => __( 'Disable custom font sizes in Block Font Sizes.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Enable editor styles.
	$wp_customize->add_setting(
		'sixseed_editor_styles',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_editor_styles' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_editor_styles',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_editor_styles',
			'priority' => 10,
			'label'    => __( 'Editor styles.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Enable a dark theme style.
	$wp_customize->add_setting(
		'sixseed_dark_backgrounds',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_dark_backgrounds' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_dark_backgrounds',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_dark_backgrounds',
			'priority' => 10,
			'label'    => __( 'Dark backgrounds.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Enable default block styles.
	$wp_customize->add_setting(
		'sixseed_wp_block_styles',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_wp_block_styles' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_wp_block_styles',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_wp_block_styles',
			'priority' => 10,
			'label'    => __( 'Default block styles.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Enable responsive embedded content.
	$wp_customize->add_setting(
		'sixseed_responsive_embeds',
		[
			'default'           => sixseed_get_customiser_default( 'sixseed_responsive_embeds' ),
			'sanitize_callback' => 'sixseed_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		'sixseed_responsive_embeds',
		[
			'section'  => 'sixseed_gutenberg_options',
			'settings' => 'sixseed_responsive_embeds',
			'priority' => 10,
			'label'    => __( 'Responsive embedded content.', 'sixseed' ),
			'type'     => 'checkbox',
		]
	);

	// Separator.
	$wp_customize->add_setting(
		'sixseed_separator',
		[
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		]
	);

	$wp_customize->add_control(
		new Genesis_Sample_Separator_Control(
			$wp_customize,
			'sixseed_separator',
			[
				'section' => 'sixseed_gutenberg_options',
			]
		)
	);

	// Gutenberg Colors.
	$wp_customize->add_setting(
		'primary_color',
		[
			'default'           => sixseed_get_customiser_default( 'primary_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			[
				'label'   => __( 'Primary Color', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_color',
		[
			'default'           => sixseed_get_customiser_default( 'secondary_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			[
				'label'   => __( 'Secondary Color', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'primary_alt_color',
		[
			'default'           => sixseed_get_customiser_default( 'primary_alt_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_alt_color',
			[
				'label'   => __( 'Primary Alt Color', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_alt_color',
		[
			'default'           => sixseed_get_customiser_default( 'secondary_alt_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_alt_color',
			[
				'label'   => __( 'Secondary Alt Color', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'black_color',
		[
			'default'           => sixseed_get_customiser_default( 'black_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'black_color',
			[
				'label'   => __( 'Black', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'dark_gray_01_color',
		[
			'default'           => sixseed_get_customiser_default( 'dark_gray_01_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dark_gray_01_color',
			[
				'label'   => __( 'Dark Gray One', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'dark_gray_02_color',
		[
			'default'           => sixseed_get_customiser_default( 'dark_gray_02_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dark_gray_02_color',
			[
				'label'   => __( 'Dark Gray Two', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'light_gray_02_color',
		[
			'default'           => sixseed_get_customiser_default( 'light_gray_02_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'light_gray_02_color',
			[
				'label'   => __( 'Light Gray Two', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'light_gray_01_color',
		[
			'default'           => sixseed_get_customiser_default( 'light_gray_01_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'light_gray_01_color',
			[
				'label'   => __( 'Light Gray One', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'white_color',
		[
			'default'           => sixseed_get_customiser_default( 'white_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'white_color',
			[
				'label'   => __( 'White', 'sixseed' ),
				'section' => 'sixseed_color_options',
			]
		)
	);

	// Gutenberg Dark Colors.
	$wp_customize->add_setting(
		'primary_dark_color',
		[
			'default'           => sixseed_get_customiser_default( 'primary_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_dark_color',
			[
				'label'   => __( 'Primary Dark Color', 'sixseed' ),
				'section' => 'sixseed_dark_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_dark_color',
		[
			'default'           => sixseed_get_customiser_default( 'secondary_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_dark_color',
			[
				'label'   => __( 'Secondary Dark Color', 'sixseed' ),
				'section' => 'sixseed_dark_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'primary_alt_dark_color',
		[
			'default'           => sixseed_get_customiser_default( 'primary_alt_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_alt_dark_color',
			[
				'label'   => __( 'Primary Alt Dark Color', 'sixseed' ),
				'section' => 'sixseed_dark_color_options',
			]
		)
	);

	$wp_customize->add_setting(
		'secondary_alt_dark_color',
		[
			'default'           => sixseed_get_customiser_default( 'secondary_alt_dark_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			// -- 'transport'         => 'postMessage',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_alt_dark_color',
			[
				'label'   => __( 'Secondary Alt Dark Color', 'sixseed' ),
				'section' => 'sixseed_dark_color_options',
			]
		)
	);

	// Gutenberg Fonts.
	$wp_customize->add_setting(
		'regular_font_size',
		[
			'default'           => sixseed_get_customiser_default( 'regular_font_size' ),
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		new Genesis_Sample_Reset_Control(
			$wp_customize,
			'regular_font_size',
			[
				'section' => 'sixseed_font_options',
				'label'   => __( 'Regular Font size (px).', 'sixseed' ),
				'type'    => 'number',
			]
		)
	);

	// Gutenberg Font Sizes.
	$wp_customize->add_setting(
		'xx_small_font_size',
		[
			'default'           => '14',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'xx_small_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'XX Small Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'x_small_font_size',
		[
			'default'           => '15',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'x_small_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'X Small Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'small_font_size',
		[
			'default'           => '16',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'small_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'Small Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'normal_font_size',
		[
			'default'           => '18',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'normal_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'Normal Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'medium_font_size',
		[
			'default'           => '20',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'medium_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'Medium Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'large_font_size',
		[
			'default'           => '24',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'large_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'Large Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'x_large_font_size',
		[
			'default'           => '27',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'x_large_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'X Large Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

	$wp_customize->add_setting(
		'xx_large_font_size',
		[
			'default'           => '30',
			'sanitize_callback' => 'absint',
		]
	);

	$wp_customize->add_control(
		'xx_large_font_size',
		[
			'section'  => 'sixseed_font_options',
			'priority' => 10,
			'label'    => __( 'XX Large Font size (px).', 'sixseed' ),
			'type'     => 'number',
		]
	);

}
add_action( 'customize_register', 'sixseed_customize_register' );


/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function sixseed_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}


/**
 * Add custom body class to give some more weight to our styles.
 *
 * @since 1.0.0
 * @access public
 * @param  array $classes customizer body classes.
 * @return array
 */
function sixseed_body_class( $classes ) {
	return array_merge( $classes, [ 'gsc' ] );
}


/**
 * This will output the custom WordPress settings to the live theme's WP head.
 *
 * Used by hook: 'wp_head'
 *
 * @see add_action('wp_head',$func)
 * @since 1.0.0
 */
function sixseed_customizer_header_output() {

	?>
	<style type="text/css">

		:root {

			/* -- Custom Color Palette
			--------------------------------------------- */

			--ccp-primary: <?php echo esc_attr( get_theme_mod( 'primary_color', sixseed_get_customiser_default( 'primary_color' ) ) ); ?>;
			--ccp-secondary: <?php echo esc_attr( get_theme_mod( 'secondary_color', sixseed_get_customiser_default( 'secondary_color' ) ) ); ?>;
			--ccp-primary-alt: <?php echo esc_attr( get_theme_mod( 'primary_alt_color', sixseed_get_customiser_default( 'primary_alt_color' ) ) ); ?>;
			--ccp-secondary-alt: <?php echo esc_attr( get_theme_mod( 'secondary_alt_color', sixseed_get_customiser_default( 'secondary_alt_color' ) ) ); ?>;
			--ccp-black: <?php echo esc_attr( get_theme_mod( 'black_color', sixseed_get_customiser_default( 'black_color' ) ) ); ?>;
			--ccp-grey-01: <?php echo esc_attr( get_theme_mod( 'grey_01_color', sixseed_get_customiser_default( 'grey_01_color' ) ) ); ?>;
			--ccp-grey-02: <?php echo esc_attr( get_theme_mod( 'grey_02_color', sixseed_get_customiser_default( 'grey_02_color' ) ) ); ?>;
			--ccp-grey-03: <?php echo esc_attr( get_theme_mod( 'grey_03_color', sixseed_get_customiser_default( 'grey_03_color' ) ) ); ?>;
			--ccp-grey-04: <?php echo esc_attr( get_theme_mod( 'grey_04_color', sixseed_get_customiser_default( 'grey_04_color' ) ) ); ?>;
			--ccp-white: <?php echo esc_attr( get_theme_mod( 'white_color', sixseed_get_customiser_default( 'white_color' ) ) ); ?>;

			/* -- Custom Font Sizes
			--------------------------------------------- */

			--font-size-r: <?php echo esc_attr( get_theme_mod( 'regular_font_size', '14' ) ); ?>px;
			--font-size-xxs: <?php echo esc_attr( get_theme_mod( 'xx_small_font_size', '14' ) ); ?>px;
			--font-size-xs: <?php echo esc_attr( get_theme_mod( 'x_small_font_size', '15' ) ); ?>px;
			--font-size-s: <?php echo esc_attr( get_theme_mod( 'small_font_size', '16' ) ); ?>px;
			--font-size-n: <?php echo esc_attr( get_theme_mod( 'normal_font_size', '18' ) ); ?>px;
			--font-size-m: <?php echo esc_attr( get_theme_mod( 'medium_font_size', '20' ) ); ?>px;
			--font-size-l: <?php echo esc_attr( get_theme_mod( 'large_font_size', '24' ) ); ?>px;
			--font-size-xl: <?php echo esc_attr( get_theme_mod( 'x_large_font_size', '27' ) ); ?>px;
			--font-size-xxl: <?php echo esc_attr( get_theme_mod( 'xx_large_font_size', '30' ) ); ?>px;

		}

		@media (prefers-color-scheme: dark) {

			:root {

				/* -- Custom Color Palette
				--------------------------------------------- */

				--ccp-primary: <?php echo esc_attr( get_theme_mod( 'primary_dark_color', sixseed_get_customiser_default( 'primary_dark_color' ) ) ); ?>;
				--ccp-secondary: <?php echo esc_attr( get_theme_mod( 'secondary_dark_color', sixseed_get_customiser_default( 'secondary_dark_color' ) ) ); ?>;
				--ccp-primary-alt: <?php echo esc_attr( get_theme_mod( 'primary_alt_dark_color', sixseed_get_customiser_default( 'primary_alt_dark_color' ) ) ); ?>;
				--ccp-secondary-alt: <?php echo esc_attr( get_theme_mod( 'secondary_alt_dark_color', sixseed_get_customiser_default( 'secondary_alt_dark_color' ) ) ); ?>;

			}

		}

	</style>
	<?php

}
add_action( 'wp_head', 'sixseed_customizer_header_output' );


/**
 * Enqueue script for custom customize control.
 */
function sixseed_customizer_controls_enqueue() {

	wp_enqueue_script( genesis_get_theme_handle() . '-customizer-controls-script', get_stylesheet_directory_uri() . '/assets/js/customizer-controls.js', [ 'jquery', 'customize-controls' ], genesis_get_theme_version(), true );

	wp_register_style( genesis_get_theme_handle() . '-customizer-controls-style', get_stylesheet_directory_uri() . '/assets/css/customizer-controls.css', [], wp_date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/customizer-controls.css' ) ), 'all' );

	wp_enqueue_style( genesis_get_theme_handle() . '-customizer-controls-style' );

}
add_action( 'customize_controls_enqueue_scripts', 'sixseed_customizer_controls_enqueue' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sixseed_customize_preview_js() {

	wp_enqueue_script( genesis_get_theme_handle() . '-customizer-preview-script', get_stylesheet_directory_uri() . '/assets/js/customizer-preview.js', [ 'jquery', 'customize-preview' ], genesis_get_theme_version(), true );

}
add_action( 'customize_preview_init', 'sixseed_customize_preview_js' );


/**
 * Enqueue the customizer stylesheet.
 */
function sixseed_customizer_stylesheet() {

	wp_register_style( genesis_get_theme_handle() . '-customizer-styles', get_stylesheet_directory_uri() . '/assets/css/customizer.css', [], wp_date( 'dmyHis', filemtime( get_stylesheet_directory() . '/assets/css/customizer.css' ) ), 'all' );
	wp_enqueue_style( genesis_get_theme_handle() . '-customizer-styles' );

}
add_action( 'customize_controls_print_styles', 'sixseed_customizer_stylesheet' );
