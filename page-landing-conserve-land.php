<?php
/**
 * Template Name: Landing > Conserve Land
 * Template Post Type: post, page, event
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>






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






<div class="wrapper wrapper-tan">
   <div class="container">
        <div class="row mb-2">
            <div class="col-12 col-md-8">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/explore-nature-map-feature.png" alt="Map">
            </div>

            <div class="col-12 col-md-4 vertical-center-parent">
                <h2>We’ve conserved more than 400 acres of land in the Davidson area.</h2>
                <a href="<?php echo home_url(); ?>/explore-nature/map-of-conserved-lands/" class="btn btn-primary mx-2">Explore each property</a>
            </div>
        </div>
    </div>
</div>




<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero vertical-center-parent hero-light conserve-map-hero">
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h2>Forests, farm land, and natural spaces are disappearing quickly in the Davidson area, as new roads are built, new houses rise, new schools fill, and commercial areas bustle with business. Do you have land you want to protect from development pressures?</h2>
				<a class="btn btn-info mt-3" href="<?php echo home_url(); ?>/conserve-land/is-conservation-an-option-for-you/">OUR STEP-BY-STEP GUIDE</a>
				<a class="btn btn-info mt-3" href="<?php echo home_url(); ?>/conserve-land/conservation-faq/">CONSERVATION FAQ</a>
            </div>
        </div>
    </div>
</div>







<?php

// data for a 3x callout section
$data_params_3x = array(
    array(
        'image' => get_stylesheet_directory_uri() . "/../../uploads/2019/01/2019-Board-Retreat-Group-Shot.jpg", 
        'text' => "With your help we can do more",
        'btn-link' => '/join-us/give-today',
        'btn-text' => 'GIVE TODAY'
    ),
    array(
        'image' => get_stylesheet_directory_uri() . "/img/conserve-page-tree-planting.jpg", 
        'text' => "Dig deep and get involved",
        'btn-link' => '/join-us/volunteer',
        'btn-text' => 'VOLUNTEER TODAY'
    ),
    array(
        'image' => get_stylesheet_directory_uri() . "/../../uploads/2011/03/Kayakers-in-Lake-Davidson-1.jpg", 
        'text' => "Share your love of nature",
        'btn-link' => '/events',
        'btn-text' => 'ATTEND AN EVENT'
    ),
);
// display parameters for 3x callout section
$display_params_3x = array(
    'wrapper_bg_color' => "tan",
    'callout_bg_color' => "light-green",
    'heading' => "You don’t have to own acres of land to support land conservation in the Davidson area. ",
    'subheading' => "Support The Cause in the ways that work for you!"
);
// write a 3x callout section
write_3x_callouts($data_params_3x, $display_params_3x);

?>








<?php include(get_theme_file_path() . '/sections/event-section.php'); ?>

<?php get_footer(); ?>
