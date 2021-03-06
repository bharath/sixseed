<?php
/**
 * Genesis related changes.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

// Remove Edit link.
add_filter( 'genesis_edit_post_link', '__return_false' );

// Remove Genesis Favicon (use site icon instead).
remove_action( 'wp_head', 'genesis_load_favicon' );

// Remove Header Description.
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

add_theme_support( 'genesis-lazy-load-images' );
