<?php
/**
 * Register all custom post types using Post_Type_Factory.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\Post_Types;

defined( 'ABSPATH' ) || exit;

final class Post_Types {

	/**
	 * Register CPTs immediately on init.
	 *
	 * @return void
	 */
	public static function register(): void {

		Post_Type_Factory::register(
			'job', // post type slug
			'Job', // singular label
			'Jobs', // plural label
			array(
				'menu_icon' => 'dashicons-id', // optional menu icon
				'supports'  => array( 'title', 'editor', 'thumbnail' ), // optional fields for Job CPT
			)
		);

		Post_Type_Factory::register(
			'testimonial', // post type slug
			'Testimonial', // singular label
			'Testimonials', // plural label
			array(
				'has_archive' => false,
				'supports'    => array( 'title', 'editor', 'thumbnail' ), // add 'thumbnail' to enable featured image
			)
		);
	}

	/**
	 * Hook into WordPress.
	 *
	 * @return void
	 */
	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register' ), 0 );
	}
}
