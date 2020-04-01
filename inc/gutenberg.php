<?php
/**
 * This file adds Gutenberg related functions to your Theme.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

add_filter( 'render_block', 'sixseed_custom_button_classes', 5, 2 );
/**
 * Add Custom classes to Button block link. For example fancybox.
 *
 * @param array $block_content remove allowed button link classes from the button container first.
 * @param array $block button block.
 */
function sixseed_custom_button_classes( $block_content, $block ) {

	if ( 'core/button' === $block['blockName'] && isset( $block['attrs']['className'] ) ) {

		// Setting up a subset of custom button link classes.
		$allowed_button_link_classes = [
			'fancybox',
			'another-custom-class',
			'example-custom-class',
			// ...
		];

		// Remove allowed button link classes from the button container first.
		$block_content = str_replace(
			$allowed_button_link_classes,
			'',
			$block_content
		);

		// Get custom button classes set for the block.
		$custom_classes = explode( ' ', $block['attrs']['className'] );

		// Apply allowed custom button link classes.
		$block_content = str_replace(
			'wp-block-button__link',
			'wp-block-button__link ' . implode( ' ', array_intersect( $custom_classes, $allowed_button_link_classes ) ),
			$block_content
		);

	}

	return $block_content;

}

/**
 * Default Block Styles.
 *
 * @link https://github.com/WordPress/gutenberg/pull/16532
 */
function sixseed_default_block_styles() {
	add_theme_support(
		'editor-default-block-styles',
		[
			'core/quote'     => 'large',
			'core/pullquote' => 'solid-color',
		]
	);
}
add_action( 'after_setup_theme', 'sixseed_default_block_styles' );
