<?php

/**
 * Template part for displaying posts
 *
 * @package Ambrygen
 */

defined( 'ABSPATH' ) || exit;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/content' ); ?>
</div>