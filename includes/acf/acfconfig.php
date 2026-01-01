<?php
/**
 * ACF configuration.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\ACF;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class ACFConfig {

	public static function init(): void {
		add_filter( 'acf/settings/show_admin', '__return_false' );
		add_filter( 'acf/settings/save_json', '__return_false' );
		add_filter( 'acf/settings/load_json', '__return_false' );
	}
}
