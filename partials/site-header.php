<?php
/**
 * Site header partial.
 *
 * @package Ambrygen
 */

use Ambrygen\Theme\Core\Theme_Options;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( Theme_Options::class ) ) {
	return;
}

// Prefixed variables
$ambrygen_header_enabled = Theme_Options::get( 'ambrygen_show_header', true );
$ambrygen_header_logo_id = Theme_Options::get( 'ambrygen_header_logo' );

if ( ! $ambrygen_header_enabled ) {
	return;
}
?>

<header id="header-section" class="header-section" role="banner">

	<div class="header-wrapper header-inner d-flex align-items-center justify-content-between">

		<div class="header-logo logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
				<?php
				if ( $ambrygen_header_logo_id ) {
					echo wp_get_attachment_image(
						(int) $ambrygen_header_logo_id,
						'admin-landscape',
						false,
						array(
							'class'   => 'site-logo',
							'loading' => 'lazy',
						)
					);
				} else {
					echo esc_html( get_bloginfo( 'name' ) );
				}
				?>
			</a>
		</div>

		<div class="right-header header-navigation">
			<nav class="header-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'ambrygen' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'fallback_cb'    => false,
						'menu_class'     => 'header-menu',
					)
				);
				?>
			</nav>

			<button class="menu-btn" aria-label="<?php esc_attr_e( 'Toggle menu', 'ambrygen' ); ?>">
				<span></span><span></span><span></span>
			</button>
		</div>

	</div>

</header>
