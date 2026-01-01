<?php
/**
 * Assign testimonial fields to multiple post types.
 *
 * @package Ambrygen
 */

defined( 'ABSPATH' ) || exit;

use Ambrygen\Theme\ACF\Field_Factory;

add_action( 'acf/init', 'ambrygen_register_testimonial_fields' );

function ambrygen_register_testimonial_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	/**
	 * LOAD the fields
	 * This is where $fields comes from
	 */
	$fields = require get_template_directory() . '/includes/acf/fields/testimonial-fields.php';

	/**
	 * ASSIGN fields to multiple post types
	 */
	Field_Factory::assign_group(
		'group_ambrygen_testimonial',
		'Testimonial Fields',
		$fields,
		array( 'testimonial' )
	);
}