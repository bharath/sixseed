<?php
/**
 * Sixseed.
 *
 * This file adds functions to the Sixseed Theme.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'sixseed_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function sixseed_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 1.0.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'sixseed_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function sixseed_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

}

add_action( 'after_setup_theme', 'sixseed_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 1.0.0
 */
function sixseed_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'sixseed_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 1.0.0
 */
function sixseed_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'sixseed_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 1.0.0
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function sixseed_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'sixseed_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function sixseed_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'sixseed_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 1.0.0
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function sixseed_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}


/**
 * Include required files.
 */

// Custom Functions.
require_once get_stylesheet_directory() . '/inc/custom-functions.php';

// WordPress Changes.
require_once get_stylesheet_directory() . '/inc/wordpress-changes.php';

// Genesis Changes.
require_once get_stylesheet_directory() . '/inc/genesis-changes.php';

// Customizer Options.
// phpcs:disable
// require_once get_stylesheet_directory() . '/inc/customizer.php';
// phpcs:enable

// Editor Color palette and fonts.
require_once get_stylesheet_directory() . '/inc/editor-theme-support.php';

// Gutenberg Options.
require_once get_stylesheet_directory() . '/inc/gutenberg.php';

// Woocommerce Options.
require_once get_stylesheet_directory() . '/inc/woocommerce.php';

// Automattic Options.
require_once get_stylesheet_directory() . '/inc/automattic.php';

// ACF Options.
require_once get_stylesheet_directory() . '/inc/acf.php';
