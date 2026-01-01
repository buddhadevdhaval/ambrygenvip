<?php
/**
 * Asset loader.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Assets {

	public static function init(): void {
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue' ] );
	}

	public static function enqueue(): void {
		wp_enqueue_style(
			'ambrygen-theme',
			get_template_directory_uri() . '/assets/css/theme.css',
			[],
			'1.0.0'
		);
	}
}
