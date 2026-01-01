<?php
/**
 * 404 template.
 *
 * @package Ambrygen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="error-404">
	<h1><?php esc_html_e( 'Page not found', 'ambrygen' ); ?></h1>
	<p><?php esc_html_e( 'The page you are looking for does not exist.', 'ambrygen' ); ?></p>
</section>

<?php
get_footer();
