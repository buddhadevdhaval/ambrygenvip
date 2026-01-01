<?php
/**
 * Site footer partial.
 *
 * @package Ambrygen
 */

use Ambrygen\Theme\Core\Theme_Options;

defined( 'ABSPATH' ) || exit;

// Get footer options safely
$ambrygen_footer_logo_id   = Theme_Options::get( 'ambrygen_footer_logo' );
$ambrygen_footer_text      = Theme_Options::get( 'ambrygen_footer_text' );
$ambrygen_footer_copyright = Theme_Options::get( 'ambrygen_footer_copyright' );
?>

<footer class="site-footer">

	<div class="site-footer__inner">

		<?php if ( $ambrygen_footer_logo_id ) : ?>
			<div class="footer-logo">
				<?php
				echo wp_get_attachment_image(
					(int) $ambrygen_footer_logo_id,
					'full',
					false,
					array(
						'class'   => 'footer-logo',
						'loading' => 'lazy',
					)
				);
				?>
			</div>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer Menu', 'ambrygen' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<?php if ( $ambrygen_footer_text ) : ?>
			<div class="footer-text">
				<?php echo wp_kses_post( $ambrygen_footer_text ); ?>
			</div>
		<?php endif; ?>

		<div class="footer-copyright">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			<?php if ( $ambrygen_footer_copyright ) : ?>
				- <?php echo esc_html( $ambrygen_footer_copyright ); ?>
			<?php endif; ?>
		</div>
	</div>
</footer>
