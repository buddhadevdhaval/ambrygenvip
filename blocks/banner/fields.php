<?php
use Ambrygen\Theme\ACF\Field_Factory;

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group(
	array(
		'key'      => 'group_banner_block',
		'title'    => 'Banner Block',
		'fields'   => array(
			Field_Factory::text( 'field_banner_title', 'Banner Title', 'amb_banner_title' ),
			Field_Factory::wysiwyg( 'field_banner_desc', 'Description', 'amb_banner_description' ),
			Field_Factory::link( 'field_banner_btn_1', 'Button 1', 'amb_button_1' ),
			Field_Factory::link( 'field_banner_btn_2', 'Button 2', 'amb_button_2' ),
			Field_Factory::image( 'field_banner_image', 'Banner Image', 'amb_banner_image' ),
		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/banner',
				),
			),
		),
	)
);
