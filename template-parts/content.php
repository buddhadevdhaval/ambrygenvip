<?php
/**
 * Template part for displaying the_content()
 *
 * @package Ambrygen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
the_content(
	sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ambrygen' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	)
);

wp_link_pages(
	array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'ambrygen' ),
		'after'  => '</div>',
	)
);
