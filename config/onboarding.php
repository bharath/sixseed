<?php
/**
 * Sixseed.
 *
 * Onboarding config to load plugins and homepage content on theme activation.
 *
 * @package Sixseed
 * @author  Bharath
 * @license GPL-2.0-or-later
 * @link    https://bharath.dev/
 */

$sixseed_shared_content = genesis_get_config( 'onboarding-shared' );

return [
	'starter_packs' => [
		'black-white' => [
			'title'       => __( 'Black & White', 'sixseed' ),
			'description' => __( 'A pack with a homepage designed with black and white images.', 'sixseed' ),
			'thumbnail'   => get_stylesheet_directory_uri() . '/config/import/images/thumbnails/home-black-white.jpg',
			'demo_url'    => 'https://github.com/bharath/sixseed/sixseed/',
			'config'      => [
				'dependencies'     => [
					'plugins' => $sixseed_shared_content['plugins'],
				],
				'content'          => array_merge(
					[
						'homepage' => [
							'post_title'     => 'Homepage',
							'post_content'   => require dirname( __FILE__ ) . '/import/content/home-black-white.php',
							'post_type'      => 'page',
							'post_status'    => 'publish',
							'comment_status' => 'closed',
							'ping_status'    => 'closed',
							'meta_input'     => [
								'_genesis_layout'     => 'full-width-content',
								'_genesis_hide_title' => true,
								'_genesis_hide_breadcrumbs' => true,
								'_genesis_hide_singular_image' => true,
							],
						],
					],
					$sixseed_shared_content['content']
				),
				'navigation_menus' => $sixseed_shared_content['navigation_menus'],
				'widgets'          => $sixseed_shared_content['widgets'],
			],
		],
		'color'       => [
			'title'       => __( 'Color', 'sixseed' ),
			'description' => __( 'A pack with a homepage designed with color images.', 'sixseed' ),
			'thumbnail'   => get_stylesheet_directory_uri() . '/config/import/images/thumbnails/home-color.jpg',
			'demo_url'    => 'https://github.com/bharath/sixseed/sixseed/home-color/',
			'config'      => [
				'dependencies'     => [
					'plugins' => $sixseed_shared_content['plugins'],
				],
				'content'          => array_merge(
					[
						'homepage' => [
							'post_title'     => 'Homepage',
							'post_content'   => require dirname( __FILE__ ) . '/import/content/home-color.php',
							'post_type'      => 'page',
							'post_status'    => 'publish',
							'comment_status' => 'closed',
							'ping_status'    => 'closed',
							'meta_input'     => [
								'_genesis_layout'     => 'full-width-content',
								'_genesis_hide_title' => true,
								'_genesis_hide_breadcrumbs' => true,
								'_genesis_hide_singular_image' => true,
							],
						],
					],
					$sixseed_shared_content['content']
				),
				'navigation_menus' => $sixseed_shared_content['navigation_menus'],
				'widgets'          => $sixseed_shared_content['widgets'],
			],
		],
	],
];
