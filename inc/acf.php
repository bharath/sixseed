<?php
/**
 * This file adds Gutenberg functions to your Theme.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

add_filter( 'block_categories', 'sixseed_block_categories' );
/**
 * Add Custom Blocks Panel in Gutenberg.
 *
 * @param array $categories adds custom category.
 */
function sixseed_block_categories( $categories ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'sixseed-blocks',
				'title' => __( 'Sixseed Custom Blocks', 'sixseed' ),
				'icon'  => 'layout',
			],
		]
	);
}
