<?php
/**
 * Archive template.
 *
 * @package Ambrygen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<header class="archive-header">
	<h1><?php the_archive_title(); ?></h1>
</header>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'archive-item' ); ?>>
			<h2>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
		</article>
		<?php
	endwhile;
endif;

get_footer();
