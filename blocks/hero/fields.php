<?php
/**
 * Hero block fields.
 *
 * @package Ambrygen
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

// Register fields
acf_add_local_field_group( array(
    'key' => 'group_hero_block',
    'title' => 'Block - Hero',
    'fields' => array(
        array(
            'key' => 'field_hero_headline',
            'label' => 'Headline',
            'name' => 'ch_hero_headline',
            'type' => 'text',
            'instructions' => 'Enter the headline text for the Hero block',
            'required' => 0,
        ),
        array(
            'key' => 'field_hero_background_color',
            'label' => 'Background Color',
            'name' => 'ch_hero_background_color',
            'type' => 'button_group',
            'choices' => array(
                'light' => 'Light',
                'dark'  => 'Dark',
            ),
            'default_value' => 'light',
            'layout'        => 'horizontal',
        ),
    ),
    'location' => array(
        array(
            array(
                'param'    => 'block',
                'operator' => '==',
                'value'    => 'acf/hero',
            ),
        ),
    ),
));