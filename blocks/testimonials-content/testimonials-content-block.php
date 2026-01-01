<?php
/**
 * Hero block template.
 *
 * @package Ambrygen
 */

defined( 'ABSPATH' ) || exit;

// Get block data.
$ambrygen_data     = isset( $block['data'] ) ? $block['data'] : array();
$ambrygen_headline = isset( $ambrygen_data['ch_hero_headline'] ) ? $ambrygen_data['ch_hero_headline'] : '';
$ambrygen_bg_color = isset( $ambrygen_data['ch_hero_background_color'] ) ? $ambrygen_data['ch_hero_background_color'] : 'light'; // Default to light.

if ( ! $ambrygen_headline ) {
	return; // No headline, don't render.
}

// Prepare background class.
$ambrygen_bg_class = ( 'dark' === $ambrygen_bg_color ) ? 'hero-dark' : 'hero-light';
?>
<section class="ambrygen-hero <?php echo esc_attr( $ambrygen_bg_class ); ?>">
	<h1><?php echo esc_html( $ambrygen_headline ); ?></h1>
</section>
