<?php
/**
 * Site breadcrumb partial (VIP safe).
 *
 * @package Ambrygen
 */

defined( 'ABSPATH' ) || exit;

if ( is_front_page() ) {
	return;
}

$ambrygen_separator = '/';
?>

<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'ambrygen' ); ?>">
	<ol class="breadcrumb-list">

		<li class="breadcrumb-item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Home', 'ambrygen' ); ?>
			</a>
		</li>

		<?php if ( is_page() ) : ?>

			<?php
			$ambrygen_ancestors = array_reverse(
				get_post_ancestors( get_the_ID() )
			);

			foreach ( $ambrygen_ancestors as $ambrygen_ancestor_id ) :
				?>
				<li class="breadcrumb-separator">
					<?php echo esc_html( $ambrygen_separator ); ?>
				</li>
				<li class="breadcrumb-item">
					<a href="<?php echo esc_url( get_permalink( $ambrygen_ancestor_id ) ); ?>">
						<?php echo esc_html( get_the_title( $ambrygen_ancestor_id ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>

			<li class="breadcrumb-separator">
				<?php echo esc_html( $ambrygen_separator ); ?>
			</li>
			<li class="breadcrumb-item current" aria-current="page">
				<?php echo esc_html( get_the_title() ); ?>
			</li>

		<?php elseif ( is_singular() && ! is_page() ) : ?>

			<?php
			$ambrygen_post_type_obj = get_post_type_object( get_post_type() );

			if ( $ambrygen_post_type_obj && ! empty( $ambrygen_post_type_obj->has_archive ) ) :
				?>
				<li class="breadcrumb-separator">
					<?php echo esc_html( $ambrygen_separator ); ?>
				</li>
				<li class="breadcrumb-item">
					<a href="<?php echo esc_url( get_post_type_archive_link( $ambrygen_post_type_obj->name ) ); ?>">
						<?php echo esc_html( $ambrygen_post_type_obj->labels->name ); ?>
					</a>
				</li>
			<?php endif; ?>

			<li class="breadcrumb-separator">
				<?php echo esc_html( $ambrygen_separator ); ?>
			</li>
			<li class="breadcrumb-item current" aria-current="page">
				<?php echo esc_html( get_the_title() ); ?>
			</li>

		<?php elseif ( is_category() || is_tax() ) : ?>

			<?php
			$ambrygen_current_term = get_queried_object();

			if ( $ambrygen_current_term && ! is_wp_error( $ambrygen_current_term ) ) :

				$ambrygen_ancestors = array_reverse(
					get_ancestors(
						$ambrygen_current_term->term_id,
						$ambrygen_current_term->taxonomy
					)
				);

				foreach ( $ambrygen_ancestors as $ambrygen_ancestor_id ) :

					$ambrygen_ancestor = get_term(
						$ambrygen_ancestor_id,
						$ambrygen_current_term->taxonomy
					);

					$ambrygen_term_link = get_term_link( $ambrygen_ancestor_id );

					if ( is_wp_error( $ambrygen_ancestor ) || is_wp_error( $ambrygen_term_link ) ) {
						continue;
					}
					?>
					<li class="breadcrumb-separator">
						<?php echo esc_html( $ambrygen_separator ); ?>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php echo esc_url( $ambrygen_term_link ); ?>">
							<?php echo esc_html( $ambrygen_ancestor->name ); ?>
						</a>
					</li>
				<?php endforeach; ?>

				<li class="breadcrumb-separator">
					<?php echo esc_html( $ambrygen_separator ); ?>
				</li>
				<li class="breadcrumb-item current" aria-current="page">
					<?php echo esc_html( $ambrygen_current_term->name ); ?>
				</li>

			<?php endif; ?>

		<?php elseif ( is_archive() ) : ?>

			<li class="breadcrumb-separator">
				<?php echo esc_html( $ambrygen_separator ); ?>
			</li>
			<li class="breadcrumb-item current" aria-current="page">
				<?php echo esc_html( post_type_archive_title( '', false ) ); ?>
			</li>

		<?php elseif ( is_search() ) : ?>

			<li class="breadcrumb-separator">
				<?php echo esc_html( $ambrygen_separator ); ?>
			</li>
			<li class="breadcrumb-item current" aria-current="page">
				<?php
				printf(
					/* translators: %s: Search query. */
					esc_html__( 'Search results for "%s"', 'ambrygen' ),
					esc_html( get_search_query() )
				);
				?>

			</li>

		<?php endif; ?>

	</ol>
</nav>
