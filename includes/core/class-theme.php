<?php
/**
 * Theme core bootstrap.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\Core;

use Ambrygen\Theme\ACF\ACFConfig;
use Ambrygen\Theme\Post_Types\Post_Types;

defined( 'ABSPATH' ) || exit;

final class Theme {

	/**
	 * Initialize theme.
	 *
	 * @return void
	 */
	public static function init(): void {

		// Load required core classes.
		require_once get_template_directory() . '/includes/core/class-setup.php';
		require_once get_template_directory() . '/includes/core/class-blocks.php';
		require_once get_template_directory() . '/includes/core/class-theme-options.php';

		// Load ACF helpers.
		require_once get_template_directory() . '/includes/acf/acfconfig.php';
		require_once get_template_directory() . '/includes/acf/class-field-factory.php';

		// Load Post Type helpers.
		require_once get_template_directory() . '/includes/post-types/class-post-type-factory.php';
		require_once get_template_directory() . '/includes/post-types/class-post-types.php';


		// Lifecycle hooks.
		add_action( 'after_setup_theme', array( __CLASS__, 'setup' ) );
		add_action( 'acf/init', array( __CLASS__, 'load_components' ) );

		// Load post types.
		Post_Types::init();

	}

	/**
	 * Theme setup.
	 *
	 * @return void
	 */
	public static function setup(): void {
		Setup::init();
	}

	/**
	 * Load ACF-related components.
	 *
	 * @return void
	 */
	public static function load_components(): void {

		ACFConfig::init();
		Blocks::init();
		Theme_Options::init();
	}
}
