<?php
/**
 * ACF field factory helpers.
 *
 * @package Ambrygen
 */

namespace Ambrygen\Theme\ACF;

defined( 'ABSPATH' ) || exit;

final class Field_Factory {

	private static function base( array $args ): array {
		return wp_parse_args(
			$args,
			array(
				'aria-label'        => '',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'allow_in_bindings' => 0,
			)
		);
	}

	public static function text( string $key, string $label, string $name, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'   => $key,
					'label' => $label,
					'name'  => $name,
					'type'  => 'text',
				)
			)
		);
	}

	public static function wysiwyg( string $key, string $label, string $name, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'          => $key,
					'label'        => $label,
					'name'         => $name,
					'type'         => 'wysiwyg',
					'tabs'         => 'all',
					'toolbar'      => 'full',
					'media_upload' => 0,
				)
			)
		);
	}

	public static function link( string $key, string $label, string $name, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'           => $key,
					'label'         => $label,
					'name'          => $name,
					'type'          => 'link',
					'return_format' => 'array',
				)
			)
		);
	}

	public static function image( string $key, string $label, string $name, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'           => $key,
					'label'         => $label,
					'name'          => $name,
					'type'          => 'image',
					'return_format' => 'id',
					'preview_size'  => 'medium',
					'library'       => 'all',
				)
			)
		);
	}

	public static function button_group( string $key, string $label, string $name, array $choices, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'     => $key,
					'label'   => $label,
					'name'    => $name,
					'type'    => 'button_group',
					'choices' => $choices,
					'layout'  => 'horizontal',
				)
			)
		);
	}

	public static function true_false( string $key, string $label, string $name, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'           => $key,
					'label'         => $label,
					'name'          => $name,
					'type'          => 'true_false',
					'default_value' => 0,
					'ui'            => 1,
				)
			)
		);
	}

	public static function tab( string $key, string $label ): array {
		return self::base(
			array(
				'key'   => $key,
				'label' => $label,
				'type'  => 'tab',
			)
		);
	}

	public static function repeater( string $key, string $label, string $name, array $sub_fields, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'        => $key,
					'label'      => $label,
					'name'       => $name,
					'type'       => 'repeater',
					'sub_fields' => $sub_fields,
				)
			)
		);
	}

	public static function select( string $key, string $label, string $name, array $choices, array $extra = array() ): array {
		// Default heading choices when none are provided.
		if ( empty( $choices ) ) {
			$choices = array(
				'h1'     => 'H1',
				'h2'     => 'H2',
				'h3'     => 'H3',
				'h4'     => 'H4',
				'h5'     => 'H5',
				'h6'     => 'H6',
				'normal' => 'Normal',
			);
		}

		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'     => $key,
					'label'   => $label,
					'name'    => $name,
					'type'    => 'select',
					'choices' => $choices,
				)
			)
		);
	}

	public static function post_object( string $key, string $label, string $name, array $post_types, array $extra = array() ): array {
		// Default to 'post' if no post types are provided.
		if ( empty( $post_types ) ) {
			$post_types = array( 'post' );
		}

		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'           => $key,
					'label'         => $label,
					'name'          => $name,
					'type'          => 'post_object',
					'post_type'     => $post_types,
					'allow_null'    => 0,
					'multiple'      => 0,
					'return_format' => 'id',
					'ui'            => 1,
				)
			)
		);
	}

	public static function relationship( string $key, string $label, string $name, array $post_types, array $extra = array() ): array {
		// Default to 'post' if no post types are provided.
		if ( empty( $post_types ) ) {
			$post_types = array( 'post' );
		}

		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'           => $key,
					'label'         => $label,
					'name'          => $name,
					'type'          => 'relationship',
					'post_type'     => $post_types,
					'filters'       => array( 'search', 'post_type' ),
					'elements'      => array( 'featured_image' ),
					'return_format' => 'id',
				)
			)
		);
	}
	public static function assign_group( $group_key, $title, $fields, array $post_types ) {
		foreach ( $post_types as $post_type ) {
			acf_add_local_field_group(
				array(
					'key'    => "{$group_key}_{$post_type}",
					'title'  => $title,
					'fields' => $fields,
					'location' => array(
						array(
							array(
								'param'    => 'post_type',
								'operator' => '==',
								'value'    => $post_type,
							),
						),
					),
				)
			);
		}
	}

	public static function oembed( string $key, string $label, string $name, array $extra = array() ): array {
		return self::base(
			wp_parse_args(
				$extra,
				array(
					'key'   => $key,
					'label' => $label,
					'name'  => $name,
					'type'  => 'oembed',
					'width' => '',
					'height'=> '',
				)
			)
		);
	}


}