<?php
/**
 * The main template file
 *
 * @package Ambrygen
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section id="page-section" class="page-section">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">
				<?php
				if ( is_home() && ! is_front_page() ) {
					single_post_title();

				} elseif ( is_archive() ) {
					the_archive_title();
				} elseif ( is_search() ) {
					printf(
						/* translators: %s is the search query */
						esc_html__( 'Search Results for: %s', 'ambrygen' ),
						'<span>' . get_search_query() . '</span>'
					);
				} else {
					esc_html_e( 'Posts', 'ambrygen' );
				}
				?>
			</h1>
		</header>

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;

		the_posts_pagination(
			array(
				'prev_text' => esc_html__( 'Previous', 'ambrygen' ),
				'next_text' => esc_html__( 'Next', 'ambrygen' ),
			)
		);

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</section><!-- #page-section -->

<?php
// Removed get_sidebar() since we don't need it
get_footer();
