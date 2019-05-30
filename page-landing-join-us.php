<?php
/**
 * Template Name: Landing > Join Us
 * Template Post Type: post, page, event
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>





<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero hero-light join-hero vertical-center-parent">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h1 class="hero-title">Davidson Lands Conservancy is protecting the natural environments you love. With your help, we can do more!</h1>
				<a class="btn btn-info hero-title-btn" href="<?php echo home_url(); ?>/join-us/give_today/">GIVE TODAY</a>
            </div>
        </div>
    </div>
</div>






<div class="wrapper wrapper-tan">
   <div class="container">

       <div class="row">
           <div class="col-12 text-center">
               <h3>Find Your Calling at Davidson Lands Conservancy</h3>
           </div>
       </div>


        <div class="row">
            <div class="col-sm-3 col-xs-6 text-center mt-4">
				<a class="link-on-light-bg" href="<?php echo home_url(); ?>/">
	                <div class="circle-callout-image">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-lenny-with-frog-600sq.jpg" alt="Education & Outreach">
	                </div>
	                <div class="circle-callout-text">
	                  	Education & Outreach
	                </div>
				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
				<a class="link-on-light-bg" href="<?php echo home_url(); ?>/join-us/run-for-green/">
					<div class="circle-callout-image">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-run-for-green-600sq.jpg" alt="Run for Green">
	                </div>
	                <div class="circle-callout-text">
	                  	Run for Green
	                </div>
				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
				<a class="link-on-light-bg" href="<?php echo home_url(); ?>/explore-nature/trees-davidson/">
	                <div class="circle-callout-image">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-Tree-Planting6-427sq.jpg" alt="TreesDavidson">
	                </div>
	                <div class="circle-callout-text">
	                  	TreesDavidson
	                </div>
				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
				<a class="link-on-light-bg" href="<?php echo home_url(); ?>/">
	                <div class="circle-callout-image">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-img_4959-600sq.jpg" alt="Communications">
	                </div>
	                <div class="circle-callout-text">
	                  Communications
	                </div>
				</a>
            </div>

        </div>


		<div class="row">
			<div class="col-md-10 offset-md-1 text-center wrapper-sm">
				<a class="btn btn-info-dark-green hero-title-btn" href="<?php echo home_url(); ?>/join-us/volunteer/">VOLUNTEER TODAY</a>
			</div>
		</div>


    </div>
</div>




<?php include(get_theme_file_path() . '/sections/event-section.php'); ?>




<?php

// data for a 3x callout section
$data_params_3x = array(
    array(
        'image' => get_stylesheet_directory_uri() . "/img/home-callout-volunteer.jpg", 
        'text' => "Honor someone who loves nature",
        'btn-link' => '/join-us/tribute-gift/',
        'btn-text' => 'MAKE A TRIBUTE GIFT'
    ),
    array(
        'image' => get_stylesheet_directory_uri() . "/img/home-callout-gift.jpg", 
        'text' => "Time to balance your portfolio",
        'btn-link' => '/join-us/gifts-of-stock/',
        'btn-text' => 'MAKE A GIFT OF STOCK'
    ),
    array(
        'image' => get_stylesheet_directory_uri() . "/img/join-page-callout-bonfire.jpg", 
        'text' => "Protect natural space forever",
        'btn-link' => '/join-us/forever-fund/',
        'btn-text' => 'SUPPORT LAND ACQUISITION'
    ),
);
// display parameters for callout section
$display_params_3x = array(
    'wrapper_bg_color' => "tan",
    'callout_bg_color' => "light-green",
    'heading' => "",
    'subheading' => ""
);
// write a 3x callout section
write_3x_callouts($data_params_3x, $display_params_3x);

?>







<?php 

$search_params_1x = array(
    'numberposts' => 1,
    'tag' => "feature",
    'category' => "",
    'featureimage' => true
);
include(get_theme_file_path() . '/sections/featured-articles-1xhero.php'); 

?>




<?php get_footer(); ?>
