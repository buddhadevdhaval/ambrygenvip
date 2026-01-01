<?php
/**
 * Banner block template.
 *
 * @package Ambrygen
 */

defined( 'ABSPATH' ) || exit;

/**
 * Block data
 */
$ambrygen_data = isset( $block['data'] ) && is_array( $block['data'] )
	? $block['data']
	: array();

/**
 * ACF field values (from data)
 */
$ambrygen_title       = $ambrygen_data['am_banner_title'] ?? '';
$ambrygen_description = $ambrygen_data['amb_banner_description'] ?? '';

if ( empty( $ambrygen_title ) && empty( $ambrygen_description ) ) {
	return;
}
?>

<section class="ambrygen-banner">
	<?php if ( $ambrygen_title ) : ?>
		<h1 class="ambrygen-banner__title">
			<?php echo esc_html( $ambrygen_title ); ?>
		</h1>
	<?php endif; ?>

	<?php if ( $ambrygen_description ) : ?>
		<div class="ambrygen-banner__description">
			<?php
			// WYSIWYG content – allow safe HTML
			echo wp_kses_post( $ambrygen_description );
			?>
		</div>
	<?php endif; ?>
</section>
