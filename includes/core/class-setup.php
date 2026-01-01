<?php
/**
 * Theme setup and asset loading.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Time format constant.
 */
define( 'AMBRYGEN_THEME_DATE_FORMAT', 'F j, Y' );

final class Setup {

	/**
	 * Initialize theme setup.
	 *
	 * @return void
	 */
	public static function init(): void {

		/**
		 * Theme supports.
		 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'menus' );

		/**
		 * Menus.
		 */
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'ambrygen' ),
				'footer'  => __( 'Footer Menu', 'ambrygen' ),
			)
		);

		/**
		 * Hooks.
		 */
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_frontend_assets' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_assets' ) );

		/**
		 * Cleanup.
		 */
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}

	/**
	 * Enqueue frontend assets.
	 *
	 * @return void
	 */
	public static function enqueue_frontend_assets(): void {

		wp_enqueue_style(
			'ambrygen-theme',
			get_template_directory_uri() . '/assets/build/styles.min.css',
			array(),
			null
		);

		if ( function_exists( 'jetpack_is_mobile' ) && jetpack_is_mobile() ) {
			wp_enqueue_style(
				'ambrygen-theme-mobile',
				get_template_directory_uri() . '/assets/build/mobile.min.css',
				array(),
				null
			);
		}

		if ( ! is_user_logged_in() ) {
			wp_deregister_style( 'dashicons' );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script(
			'ambrygen-scripts',
			get_template_directory_uri() . '/assets/build/scripts.min.js',
			array( 'jquery' ),
			null,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);

		/**
		 * VIP-preferred inline config (instead of wp_localize_script).
		 */
		wp_add_inline_script(
			'ambrygen-scripts',
			'window.ambrygenConfig = ' . wp_json_encode(
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'ajax_nonce' ),
				)
			),
			'before'
		);

		wp_enqueue_script(
			'ambrygen-header',
			get_template_directory_uri() . '/assets/build/header.min.js',
			array( 'jquery' ),
			null,
			array(
				'in_footer' => false,
				'strategy'  => 'defer',
			)
		);
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @return void
	 */
	public static function enqueue_admin_assets(): void {

		wp_enqueue_script(
			'ambrygen-admin',
			get_template_directory_uri() . '/assets/build/vendors/admin-scripts.js',
			array( 'jquery' ),
			null,
			true
		);

		/**
		 * VIP-preferred admin inline config.
		 */
		wp_add_inline_script(
			'ambrygen-admin',
			'window.ambrygenAdminConfig = ' . wp_json_encode(
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'admin_ajax_nonce' ),
				)
			),
			'before'
		);

		wp_enqueue_style(
			'ambrygen-editor',
			get_template_directory_uri() . '/assets/build/editor.min.css',
			array(),
			null
		);
	}
}
