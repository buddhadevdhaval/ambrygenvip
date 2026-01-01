<?php
/**
 * Theme options (ACF).
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\Core;

use Ambrygen\Theme\ACF\Field_Factory;

defined( 'ABSPATH' ) || exit;

final class Theme_Options {

	/**
	 * Static cache for option values.
	 */
	public static function get( string $key, $default = null ) {

		static $ambrygen_cache = array();

		if ( isset( $ambrygen_cache[ $key ] ) ) {
			return $ambrygen_cache[ $key ];
		}

		$value = $default;

		if ( function_exists( 'get_field' ) ) {
			$value = get_field( $key, 'option' );
		}

		$ambrygen_cache[ $key ] = $value;

		return $value;
	}

	/**
	 * Initialize theme options.
	 */
	public static function init(): void {

		if ( ! function_exists( 'acf_add_options_page' ) || ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		// Add Theme Options page
		acf_add_options_page(
			array(
				'page_title' => __( 'Theme Options', 'ambrygen' ),
				'menu_title' => __( 'Theme Options', 'ambrygen' ),
				'menu_slug'  => 'theme-options',
				'capability' => 'manage_options',
				'redirect'   => false,
			)
		);

		// -----------------------------
		// Header + Footer Fields
		// -----------------------------
		acf_add_local_field_group(
			array(
				'key'    => 'ambrygen_group_theme_options',
				'title'  => __( 'Theme Options', 'ambrygen' ),
				'fields' => array(
					// Header
					Field_Factory::tab( 'ambrygen_tab_header', __( 'Header', 'ambrygen' ) ),
					Field_Factory::image( 'ambrygen_header_logo', __( 'Header Logo', 'ambrygen' ), 'ambrygen_header_logo' ),
					Field_Factory::text( 'ambrygen_header_phone', __( 'Phone Number', 'ambrygen' ), 'ambrygen_header_phone' ),
					Field_Factory::true_false( 'ambrygen_show_header', __( 'Show Header', 'ambrygen' ), 'ambrygen_show_header', array( 'default_value' => 1 ) ),

					// Footer
					Field_Factory::tab( 'ambrygen_tab_footer', __( 'Footer', 'ambrygen' ) ),
					Field_Factory::image( 'ambrygen_footer_logo', __( 'Footer Logo', 'ambrygen' ), 'ambrygen_footer_logo' ),
					Field_Factory::wysiwyg( 'ambrygen_footer_text', __( 'Footer Text', 'ambrygen' ), 'ambrygen_footer_text' ),
					Field_Factory::text( 'ambrygen_footer_copyright', __( 'Copyright Text', 'ambrygen' ), 'ambrygen_footer_copyright' ),
				),
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'theme-options',
						),
					),
				),
			)
		);

		// -----------------------------
		// Page-wise Breadcrumb Settings
		// -----------------------------
		acf_add_local_field_group(
			array(
				'key'    => 'ambrygen_group_page_breadcrumb',
				'title'  => __( 'Breadcrumb Settings', 'ambrygen' ),
				'fields' => array(
					Field_Factory::true_false( 'ambrygen_page_enable_breadcrumb', __( 'Enable Breadcrumb', 'ambrygen' ), 'ambrygen_page_enable_breadcrumb', array( 'default_value' => 1 ) ),
					Field_Factory::text( 'ambrygen_page_breadcrumb_title', __( 'Breadcrumb Title Override', 'ambrygen' ), 'ambrygen_page_breadcrumb_title' ),
				),
				'location' => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '!=',
							'value'    => 'attachment',
						),
					),
				),
			)
		);
	}
}
