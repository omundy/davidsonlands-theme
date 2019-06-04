<?php
/**
 * Template Name: Explore Map
 * Used for the Explore Map page ONLY
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper wrapper-hero ">
	<div class="container-fluid ">


		<div class="row">
			<div class="col-12 text-center px-0">
				<h3>Davidson's Conserved Lands</h3>
			</div>
		</div>


		<div class="row wrapper-explore-map">
			<div class="col-12 text-center px-0">
				<div id="map" class="explore-map"></div>
			</div>

			<div class="background-white explore-map-data"></div>
		</div>


	</div>
</div>


<?php get_footer(); ?>
