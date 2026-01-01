<?php
namespace Ambrygen\Theme\Core;

defined( 'ABSPATH' ) || exit;

final class Blocks {

	/**
	 * Initialize block registration.
	 */
	public static function init(): void {

		// If ACF already loaded, register immediately.
		if ( did_action( 'acf/init' ) ) {
			self::register_blocks();
			return;
		}

		// Otherwise, wait for ACF to initialize.
		add_action( 'acf/init', array( __CLASS__, 'register_blocks' ) );
	}

	/**
	 * Register all blocks in the /blocks directory.
	 */
	public static function register_blocks(): void {

		// Make sure required functions exist.
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		$blocks_dir = get_template_directory() . '/blocks/*/block.json';

		// Get all block.json files safely.
		$ambrygen_blocks = glob( $blocks_dir );

		if ( ! is_array( $ambrygen_blocks ) || empty( $ambrygen_blocks ) ) {
			return; // Nothing to register.
		}

		foreach ( $ambrygen_blocks as $block_json ) {

			$dir = dirname( $block_json );
			// Register the block using block.json.
			register_block_type( $dir );

			// Load PHP field groups (ACF) safely.
			$fields_file = $dir . '/fields.php';
			if ( file_exists( $fields_file ) ) {
				require_once $fields_file;
			}
		}
	}
}
