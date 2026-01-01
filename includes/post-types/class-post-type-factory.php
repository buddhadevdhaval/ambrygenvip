<?php
/**
 * Post Type factory helper.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\Post_Types;

defined( 'ABSPATH' ) || exit;

final class Post_Type_Factory {

	/**
	 * Register a custom post type.
	 *
	 * @param string $post_type Post type slug.
	 * @param string $singular  Singular label.
	 * @param string $plural    Plural label.
	 * @param array  $extra     Extra arguments to override defaults.
	 *
	 * @return void
	 */
	public static function register(
		string $post_type,
		string $singular,
		string $plural,
		array $extra = array()
	): void {

		$labels = array(
			'name'                  => _x( $plural, 'Post type general name', 'ambrygen' ),
			'singular_name'         => _x( $singular, 'Post type singular name', 'ambrygen' ),
			'menu_name'             => __( $plural, 'ambrygen' ),
			'name_admin_bar'        => __( $singular, 'ambrygen' ),
			'add_new'               => __( 'Add New', 'ambrygen' ),
			'add_new_item'          => sprintf( __( 'Add New %s', 'ambrygen' ), $singular ),
			'new_item'              => sprintf( __( 'New %s', 'ambrygen' ), $singular ),
			'edit_item'             => sprintf( __( 'Edit %s', 'ambrygen' ), $singular ),
			'view_item'             => sprintf( __( 'View %s', 'ambrygen' ), $singular ),
			'all_items'             => sprintf( __( 'All %s', 'ambrygen' ), $plural ),
			'search_items'          => sprintf( __( 'Search %s', 'ambrygen' ), $plural ),
			'not_found'             => sprintf( __( 'No %s found.', 'ambrygen' ), strtolower( $plural ) ),
			'not_found_in_trash'    => sprintf( __( 'No %s found in Trash.', 'ambrygen' ), strtolower( $plural ) ),
		);

		$defaults = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => $post_type,
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'supports'           => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
			),
		);

		$args = wp_parse_args( $extra, $defaults );

		register_post_type( $post_type, $args );
	}
}
