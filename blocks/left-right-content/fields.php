<?php
/**
 * Get Started block fields (no repeater, with image & button toggles).
 *
 * @package Ambrygen
 */

use Ambrygen\Theme\ACF\Field_Factory;

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group(
	array(
		'key'    => 'group_left_right_content',
		'title'  => 'Block – Left Right Content',
		'fields' => array(
			// Block Headline
			Field_Factory::text(
				'field_left_right_content_main_headline',
				'Headline',
				'ch_left_right_content_main_headline',
				array(
					'wrapper' => array(
						'width' => 50,
					),
				)
			),

			// Heading Tag
			Field_Factory::select(
				'field_left_right_content_item_heading',
				'Heading Tag',
				'ch_left_right_content_item_heading',
				array(),
				array(
					'default_value' => 'normal',
					'wrapper'       => array(
						'width' => 50,
					),
				)
			),

			// Image
			Field_Factory::image(
				'field_get_started_item_image',
				'Image',
				'ch_get_started_item_image',
				array(
					'wrapper' => array(
						'width' => 50,
					),
				)
			),

			// Image Position Toggle
			Field_Factory::true_false(
				'field_get_started_image_position',
				'Image on Right?',
				'ch_get_started_image_position',
				array(
					'message' => 'Enable to place image on the right side',
					'ui'      => 1,
					'wrapper' => array(
						'width' => 50,
					),
				)
			),

			// Description
			Field_Factory::wysiwyg(
				'field_get_started_item_desc',
				'Description',
				'ch_get_started_item_desc',
				array(
					'wrapper' => array(
						'width' => 100,
					),
				)
			),

			// Button
			Field_Factory::link(
				'field_get_started_item_button',
				'Button',
				'ch_get_started_item_button',
				array(
					'wrapper' => array(
						'width' => 50,
					),
				)
			),

			// Button Style Toggle (Light / Dark)
			Field_Factory::true_false(
				'field_get_started_button_dark',
				'Dark Button?',
				'ch_get_started_button_dark',
				array(
					'message' => 'Enable for dark button style',
					'ui'      => 1,
					'wrapper' => array(
						'width' => 50,
					),
				)
			),
		),

		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/left-right-content',
				),
			),
		),

		'style' => 'block',
	)
);
