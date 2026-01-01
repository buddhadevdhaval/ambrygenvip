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
		'key'    => 'group_features',
		'title'  => 'Block – Features',
		'fields' => array(

			//Block Headline.
				Field_Factory::text(
					'field_features_main_headline',
					'Headline',
					'ch_features_main_headline',
					array(
						'wrapper' => array(
							'width' => 50,
						),
					)
				),

				// Heading Tag.
				Field_Factory::select(
					'field_features_item_heading',
					'Heading Tag',
					'ch_features_item_heading',
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
				'field_features_items',
				'Features Items',
				'ch_features_items',
				array(

					// Image icon
					Field_Factory::image(
						'field_features_item_image_icon',
						'Image icon',
						'ch_features_item_image_icon',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),
					
					// Image icon
					Field_Factory::image(
						'field_features_item_image',
						'Image',
						'ch_features_item_image',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),

					// Headline.
					Field_Factory::text(
						'field_features_item_headline',
						'Headline',
						'ch_features_item_headline',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),
					// Description.
					Field_Factory::wysiwyg(
						'field_features_item_desc',
						'Description',
						'ch_features_item_desc',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),

					// Button.
					Field_Factory::link(
						'field_features_item_button',
						'Button',
						'ch_features_item_button',
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
					'value'    => 'acf/features',
				),
			),
		),
	)
);
