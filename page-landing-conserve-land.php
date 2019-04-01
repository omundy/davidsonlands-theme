<?php
/**

 * Template Name: Landing > Conserve Land
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



<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero vertical-center-parent hero-light conserve-hero">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h1 class="hero-title">With Your Help We Can Do More</h1>
                <h3>Davidson Lands Conservancy works with each landowner to maximize the benefits of land conservation.</h3>
				<a class="btn btn-info hero-title-btn" href="<?php echo home_url(); ?>/conserve-land/land-conservation-offers-big-benefits/">TOP 5 BENEFITS</a>
            </div>
        </div>
    </div>
</div>




<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero hero-light conserve-map-section">
	<div class="container-fluid h-100">
		<div class="row h-100 ">
			<div class="col-12 col-md-7"></div>
			<div class="col-12 col-md-5 text-background-light h-100 vertical-center-parent">

				<div class="map-description">
					<h1 style="color:#337357">Find Our Lands</h1>

					<h5>Davidson Lands Conservancy currently stewards
						463 acres of land in the Davidson area that has been protected from the
						pressures of future development. Some of these lands are open to the public.</h5>

					<button class="btn btn-primary btn-callout">LEARN MORE</button>
				</div>
			</div>
		</div>

	</div>
</div>



<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero vertical-center-parent hero-light conserve-map-hero">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h2>Forests, farm land, and natural spaces are disappearing quickly in the Davidson area, as new roads are built, new houses rise, new schools fill, and commercial areas bustle with business. Do you have land you want to protect from development pressures?</h2>
				<a class="btn btn-info mt-3" href="<?php echo home_url(); ?>/conserve-land/is-conservation-an-option-for-you/">OUR STEP-BY-STEP GUIDE</a>
				<a class="btn btn-info mt-3" href="<?php echo home_url(); ?>/conserve-land/conservation-faq/">CONSERVATION FAQ</a>
            </div>
        </div>
    </div>
</div>







<div class="wrapper wrapper-tan">
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h3>You don’t have to own acres of land to support land conservation in the Davidson area. Support The Cause in the ways that work for you!</h3>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-4 col-xs-12 text-center">
				<div id="calloutnk" class="callout-wrapper-light-green">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2019/01/2019-Board-Retreat-Group-Shot.jpg" alt="With your help, we can do so much more" class="img-fluid">
					<div class="callout-text">With your help we can do more</div>
					<a class="btn btn-primary btn-callout" href="<?php echo home_url(); ?>/join-us/become-a-member/">BECOME A MEMBER</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 text-center">
				<div class="callout-wrapper-light-green">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/conserve-page-tree-planting.jpg" alt="Dig deep and get involved" class="img-fluid">
					<div class="callout-text">Dig deep and get involved</div>
					<a class="btn btn-primary btn-callout" href="<?php echo home_url(); ?>/join-us/volunteer/">VOLUNTEER TODAY</a>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 text-center">
				<div class="callout-wrapper-light-green">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2011/03/Kayakers-in-Lake-Davidson-1.jpg" alt="Find others who share your love of nature" class="img-fluid">
					<div class="callout-text">Share your love of nature</div>
					<a class="btn btn-primary btn-callout" href="<?php echo home_url(); ?>/events/">ATTEND AN EVENT</a>
				</div>
			</div>
		</div>
	</div>
</div>











<?php include(get_theme_file_path() . '/sections/event-section.php'); ?>

<?php get_footer(); ?>
