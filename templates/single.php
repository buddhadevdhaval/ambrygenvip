<?php
/**
 * Single post template.
 *
 * @package Ambrygen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'single-content' ); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
			<?php
			endwhile;
			?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
