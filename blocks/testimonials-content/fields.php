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
		'key'    => 'group_testimonials_content',
		'title'  => 'Block – Testimonials Content',
		'fields' => array(

			//Block Headline.
				Field_Factory::text(
					'field_testimonials_content_main_headline',
					'Headline',
					'ch_testimonials_content_main_headline',
					array(
						'wrapper' => array(
							'width' => 50,
						),
					)
				),

				// Heading Tag.
				Field_Factory::select(
					'field_testimonials_content_item_heading',
					'Heading Tag',
					'ch_testimonials_content_item_heading',
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
				'field_testimonials_items',
				'Testimonials Items',
				'ch_testimonials_items',
				array(

					// Image
					Field_Factory::image(
						'field_testimonials_content_item_image',
						'Image icon',
						'ch_testimonials_content_item_image_icon',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),
					
					// Company Logo
					Field_Factory::image(
						'field_testimonials_content_company_logo',
						'Company logo',
						'ch_testimonials_content_company_logo',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),

					// Description.
					Field_Factory::wysiwyg(
						'field_testimonials_content_item_content_desc',
						'Description',
						'ch_testimonials_content_item_content_desc',
						array(
							'wrapper' => array(
								'width' => 100,
							),
						)
					),

					// Testimonial Name.
					Field_Factory::text(
						'field_testimonials_name',
						'Testimonial Name',
						'ch_testimonials_name',
						array(
							'wrapper' => array(
								'width' => 50,
							),
						)
					),

					// Testimonial Designation.
					Field_Factory::text(
						'field_testimonials_designation',
						'Testimonial Designation',
						'ch_testimonials_designation',
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
					'value'    => 'acf/testimonials-content',
				),
			),
		),
	)
);
