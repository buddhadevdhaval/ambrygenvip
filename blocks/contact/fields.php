<?php
/**
 * Contact block fields with repeater.
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
		'key'    => 'group_contact_block',
		'title'  => 'Block – Contact',
		'fields' => array(

			// Repeater.
			Field_Factory::repeater(
				'field_contact_items',
				'Contact Items',
				'ch_contact_items',
				array(

					// Image field.
					Field_Factory::image(
						'field_contact_item_image',
						'Image',
						'ch_contact_item_image'
					),
				)
			),

			// Main headline.
			Field_Factory::text(
				'field_hero_headline',
				'Headline',
				'ch_hero_headline',
				array(
					'instructions' => 'Enter the headline text for the Hero block',
					'wrapper'      => array(
						'width' => 50,
					),
				)
			),

			// Heading dropdown.
			Field_Factory::select(
				'field_hero_item_heading',
				'Heading Tag',
				'ch_hero_item_heading',
				array(),
				array(
					'default_value' => 'normal',
					'wrapper'       => array(
						'width' => 50,
					),
				)
			),

			// Description.
			Field_Factory::wysiwyg(
				'field_hero_item_desc',
				'Description',
				'ch_hero_item_desc'
			),

			// Buttons.
			Field_Factory::link(
				'field_banner_btn_1',
				'Button 1',
				'amb_button_1'
			),
			Field_Factory::link(
				'field_banner_btn_2',
				'Button 2',
				'amb_button_2'
			),

			// Background color.
			Field_Factory::button_group(
				'field_hero_background_color',
				'Background Color',
				'ch_hero_background_color',
				array(
					'light' => 'Light',
					'dark'  => 'Dark',
				),
				array(
					'default_value' => 'light',
				)
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/contact',
				),
			),
		),
	)
);
