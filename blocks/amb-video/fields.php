<?php
/**
 * Video Block – ACF fields.
 *
 * @package Ambrygen
 */

use Ambrygen\Theme\ACF\Field_Factory;

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group(
	array(
		'key'    => 'group_amb_video_block',
		'title'  => 'Video Block',
		'fields' => array(
			Field_Factory::text(
				'field_video_title',
				'Video Title',
				'amb_video_title',
			),
			Field_Factory::oembed(
				'field_video_embed',
				'Video URL',
				'amb_video_embed',
				array(
					'wrapper' => array(
						'width' => '50',
					),
				)
			),
			Field_Factory::wysiwyg(
				'field_video_desc',
				'Description',
				'amb_video_description',
				array(
					'wrapper' => array(
						'width' => '50',
					),
				)
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/amb-video',
				),
			),
		),
	)
);
