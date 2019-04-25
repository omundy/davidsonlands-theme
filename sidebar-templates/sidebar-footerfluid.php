<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'footerfluid' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper">

		<div class="container-fluid" id="footer-full-content" tabindex="-1">

			<div class="row">
hello1
				<?php dynamic_sidebar( 'footerfluid' ); ?>
hello2
			</div>

		</div>

	</div>

<?php endif; ?>
