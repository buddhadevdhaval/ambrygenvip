<?php
/**
 * Page template.
 *
 * @package Ambrygen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div id="primary" class="content-area">
<section id="page-section" class="page-section">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'page-content' ); ?>>
				<?php the_content(); ?>
			</article>
		<?php
		endwhile;
		?>

	</section><!-- #page-section -->
</div><!-- #primary -->

<?php
get_footer();
