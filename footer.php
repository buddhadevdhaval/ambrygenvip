<?php
/**
 * Theme footer.
 *
 * @package Ambrygen
 */

defined( 'ABSPATH' ) || exit;
?>

</main><!-- #main -->

<?php
// Load the site footer partial
get_template_part( 'partials/site', 'footer' );

// WP Footer hook
wp_footer();
?>

</body>
</html>
