<?php
/**
 * Get Started block fields with repeater.
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
		'key'    => 'group_get_started',
		'title'  => 'Block – Get Started',
		'fields' => array(

			//Block Headline.
				Field_Factory::text(
					'field_get_started_main_headline',
					'Headline',
					'ch_get_started_main_headline',
					array(
						'wrapper' => array(
							'width' => 50,
						),
					)
				),

				// Heading Tag.
				Field_Factory::select(
					'field_get_started_item_heading',
					'Heading Tag',
					'ch_get_started_item_heading',
					array(),
					array(
						'default_value' => 'normal',
						'wrapper'       => array(
							'width' => 50,
						),
					)
				),
				
			/**
			 * Repeater: Get Started Items
			 */

			Field_Factory::repeater(
				'field_get_started_items',
				'Get Started Items',
				'ch_get_started_items',
				array(

					// Image.
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

					// Headline.
					Field_Factory::text(
						'field_get_started_item_headline',
						'Headline',
						'ch_get_started_item_headline',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),

					

					// Description.
					Field_Factory::wysiwyg(
						'field_get_started_item_desc',
						'Description',
						'ch_get_started_item_desc',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),

					// Button.
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
				),
			array(
				'layout' => 'block',
			)
			),
		),

		/**
		 * Block Location
		 */
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/get-started',
				),
			),
		),
	)
);
