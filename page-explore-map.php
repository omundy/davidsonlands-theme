<?php
/**

 * Template Name: Explore Map
 * Template Post Type: post, page, event

 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>



<!--
<h1 class="entry-title"><?php the_title(); ?></h1>
<?php
while ( have_posts() ) : the_post(); ?>
    <div class="entry-content-page">
        <?php the_content(); ?>
    </div>

<?php
endwhile;
wp_reset_query();
?>
-->





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
