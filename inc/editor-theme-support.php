<?php
/**
 * This file adds custom functions to your Theme.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

/**
 * Gutenberg theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */
if ( ! function_exists( 'sixseed_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sixseed_setup() {

		// phpcs:disable
		// Add default block styles
		// add_theme_support( 'wp-block-styles' );
		// phpcs:enable

		// Disable the custom color picker.
		add_theme_support( 'disable-custom-colors' );

		/**
		 *
		 * Custom colors for use in the editor.
		 * Add support for custom color palettes in Gutenberg.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => esc_html__( 'Primary', 'sixseed' ),
					'slug'  => 'primary',
					'color' => 'var(--ccp-primary)',
				],
				[
					'name'  => esc_html__( 'Secondary', 'sixseed' ),
					'slug'  => 'secondary',
					'color' => 'var(--ccp-secondary)',
				],
				[
					'name'  => esc_html__( 'Primary Alt', 'sixseed' ),
					'slug'  => 'primary-alt',
					'color' => 'var(--ccp-primary-alt)',
				],
				[
					'name'  => esc_html__( 'Secondary Alt', 'sixseed' ),
					'slug'  => 'secondary-alt',
					'color' => 'var(--ccp-secondary-alt)',
				],
				[
					'name'  => esc_html__( 'Black', 'sixseed' ),
					'slug'  => 'black',
					'color' => 'var(--ccp-black)',
				],
				[
					'name'  => esc_html__( 'Grey One', 'sixseed' ),
					'slug'  => 'grey-one',
					'color' => 'var(--ccp-grey-01)',
				],
				[
					'name'  => esc_html__( 'Grey Two', 'sixseed' ),
					'slug'  => 'grey-two',
					'color' => 'var(--ccp-grey-02)',
				],
				[
					'name'  => esc_html__( 'Grey Three', 'sixseed' ),
					'slug'  => 'grey-three',
					'color' => 'var(--ccp-grey-03)',
				],
				[
					'name'  => esc_html__( 'Grey Four', 'sixseed' ),
					'slug'  => 'grey-four',
					'color' => 'var(--ccp-grey-04)',
				],
				[
					'name'  => esc_html__( 'White', 'sixseed' ),
					'slug'  => 'white',
					'color' => 'var(--ccp-white)',
				],
			]
		);

		// -- Disable custom font sizes
		add_theme_support( 'disable-custom-font-sizes' );

		/**
		 * Custom font sizes for use in the editor.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
		 */
		add_theme_support(
			'editor-font-sizes',
			[
				[
					'name'      => __( 'XX Small', 'sixseed' ),
					'shortName' => __( 'XXS', 'sixseed' ),
					'size'      => 14,
					'slug'      => 'xx-small',
				],
				[
					'name'      => __( 'X Small', 'sixseed' ),
					'shortName' => __( 'XS', 'sixseed' ),
					'size'      => 15,
					'slug'      => 'x-small',
				],
				[
					'name'      => __( 'Small', 'sixseed' ),
					'shortName' => __( 'S', 'sixseed' ),
					'size'      => 16,
					'slug'      => 'small',
				],
				[
					'name'      => __( 'Normal', 'sixseed' ),
					'shortName' => __( 'N', 'sixseed' ),
					'size'      => 18,
					'slug'      => 'normal',
				],
				[
					'name'      => __( 'Medium', 'sixseed' ),
					'shortName' => __( 'M', 'sixseed' ),
					'size'      => 20,
					'slug'      => 'medium',
				],
				[
					'name'      => __( 'Large', 'sixseed' ),
					'shortName' => __( 'L', 'sixseed' ),
					'size'      => 24,
					'slug'      => 'large',
				],
				[
					'name'      => __( 'X Large', 'sixseed' ),
					'shortName' => __( 'XL', 'sixseed' ),
					'size'      => 27,
					'slug'      => 'x-large',
				],
				[
					'name'      => __( 'XX Large', 'sixseed' ),
					'shortName' => __( 'XXL', 'sixseed' ),
					'size'      => 30,
					'slug'      => 'xx-large',
				],
			]
		);

		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( '/assets/css/style-editor.css' );

		add_theme_support(
			'editor-gradient-presets',
			[
				[
					'name'     => __( 'Light green cyan to vivid green cyan', 'sixseed' ),
					'gradient' => 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
					'slug'     => 'light-green-cyan-to-vivid-green-cyan',
				],
				[
					'name'     => __( 'Luminous vivid amber to luminous vivid orange', 'sixseed' ),
					'gradient' => 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
					'slug'     => 'luminous-vivid-amber-to-luminous-vivid-orange',
				],
				[
					'name'     => __( 'Luminous vivid orange to vivid red', 'sixseed' ),
					'gradient' => 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
					'slug'     => 'luminous-vivid-orange-to-vivid-red',
				],
				[
					'name'     => __( 'Very light gray to cyan bluish gray', 'sixseed' ),
					'gradient' => 'linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%)',
					'slug'     => 'very-light-gray-to-cyan-bluish-gray',
				],
				[
					'name'     => __( 'Blush light purple', 'sixseed' ),
					'gradient' => 'linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%)',
					'slug'     => 'blush-light-purple',
				],
				[
					'name'     => __( 'Midnight', 'sixseed' ),
					'gradient' => 'linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%)',
					'slug'     => 'midnight',
				],
			]
		);

	}

endif;
add_action( 'after_setup_theme', 'sixseed_setup' );


/**
 * Outputs front-end inline styles based on colors declared in config/appearance.php.
 *
 * @since 1.0.0
 */
function sixseed_inline_gutenberg_css() {

	$css = <<<CSS

	.ab-block-post-grid .ab-post-grid-items h2 a:hover {
		color: var(--ccp-primary);
	}

	.site-container .wp-block-button .wp-block-button__link {
		background-color: var(--ccp-primary);
	}

	.wp-block-button .wp-block-button__link:not(.has-background),
	.wp-block-button .wp-block-button__link:not(.has-background):focus,
	.wp-block-button .wp-block-button__link:not(.has-background):hover {
		color: var(--ccp-white);
	}

	.site-container .wp-block-button.is-style-outline .wp-block-button__link {
		color: var(--ccp-primary);
	}

	.site-container .wp-block-button.is-style-outline .wp-block-button__link:focus,
	.site-container .wp-block-button.is-style-outline .wp-block-button__link:hover {
		color: var(--ccp-white);
	}

CSS;

	$css .= sixseed_custom_font_sizes();
	$css .= sixseed_custom_color_palette();

	wp_add_inline_style( genesis_get_theme_handle() . '-custom-gutenberg', $css );

}
add_action( 'wp_enqueue_scripts', 'sixseed_inline_gutenberg_css', 11 );


/**
 * Outputs back-end inline styles based on colors declared in config/appearance.php.
 *
 * Note this will appear before the style-editor.css injected by JavaScript,
 * so overrides will need to have higher specificity.
 *
 * @since 1.0.0
 */
function sixseed_inline_gutenberg_admin_css() {

	$css = <<<CSS

	.ab-block-post-grid .ab-post-grid-items h2 a:hover,
	.block-editor__container .editor-block-list__block a {
		color: var(--ccp-primary);
	}

	.editor-styles-wrapper .editor-rich-text .button,
	.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
		background-color: var(--ccp-primary);
		color: var(--ccp-white);
	}

	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
		color: var(--ccp-primary);
	}

	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus,
	.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover {
		color: var(--ccp-white);
	}

CSS;

	wp_add_inline_style( genesis_get_theme_handle() . '-custom-gutenberg-fonts', $css );

}
add_action( 'enqueue_block_editor_assets', 'sixseed_inline_gutenberg_admin_css', 11 );


/**
 * Generate CSS for editor font sizes from the provided theme support.
 *
 * @since 1.0.0
 *
 * @return string The CSS for editor font sizes if theme support was declared.
 */
function sixseed_custom_font_sizes() {

	$css               = '';
	$editor_font_sizes = get_theme_support( 'editor-font-sizes' );

	if ( ! $editor_font_sizes ) {
		return '';
	}

	foreach ( $editor_font_sizes[0] as $font_size ) {
		$css .= <<<CSS

	.site-container .has-{$font_size['slug']}-font-size {
		font-size: {$font_size['size']}px;
	}

CSS;

	}

	return $css;

}


/**
 * Generate CSS for editor colors based on theme color palette support.
 *
 * @since 1.0.0
 *
 * @return string The editor colors CSS if `editor-color-palette` theme support was declared.
 */
function sixseed_custom_color_palette() {

	$css                  = '';
	$editor_color_palette = get_theme_support( 'editor-color-palette' );

	foreach ( $editor_color_palette[0] as $color_info ) {

		$css .= <<<CSS

	.site-container .has-{$color_info['slug']}-color,
	.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-color,
	.site-container .wp-block-button.is-style-outline .wp-block-button__link.has-{$color_info['slug']}-color {
		color: {$color_info['color']};
	}

	.site-container .has-{$color_info['slug']}-background-color,
	.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-background-color,
	.site-container .wp-block-pullquote.is-style-solid-color.has-{$color_info['slug']}-background-color {
		background-color: {$color_info['color']};
	}

CSS;

	}

	return $css;

}
