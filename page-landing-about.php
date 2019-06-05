<?php
/**
 * Template Name: Landing > About
 * Template Post Type: post, page, event
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>





<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero vertical-center-parent hero-light about-hero">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h1 class="hero-title">Our Mission</h1>
                <h3>Davidson Lands Conservancy protects natural lands and open spaces</h3>
            </div>
        </div>
    </div>
</div>






<div class="wrapper wrapper-white">
   <div class="container">
        <div class="row mb-2">
            <div class="col-6">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2014/10/Monarch_by_Christine_Lisewski.jpg" alt="Butterfly" class="img-fluid">
            </div>

            <div class="col-6">
				<h2>Our Goals</h2>
                  <ul>
                    <li>To preserve ecologically valuable lands: to protect diverse wildlife habitat and environmental balance</li>
                    <li>To maintain open space: to conserve woodlands, wetlands, productive farms, timberlands, and open spaces in town</li>
                    <li>To sustain water and air quality: protect stream corridors and lake front; to protect walking and cycling</li>
                    <li>To enhance the lives of residents: to inform land holders and others of conservation advantages; to preserve historic and aesthetic sites; to develop trails and greenways to offer opportunities for educational, artistic, and recreational activities in natural spaces to all people in the Conservancy area.</li>
                  </ul>
                  <a href="<?php echo home_url(); ?>/join-us" class="btn btn-primary mx-2">JOIN US</a>
				  <a href="<?php echo home_url(); ?>/about/history" class="btn btn-primary mx-2">HISTORY</a>
            </div>
        </div>
    </div>
</div>






<div class="wrapper wrapper-dark-green">
   <div class="container">

       <div class="row">
           <div class="col-12 text-center">
               <h3>Protecting Our Communities Assets</h3>
               <div>We focus our efforts on these key areas:</div>
           </div>
       </div>


        <div class="row">
            <div class="col-sm-3 col-xs-6 text-center mt-4">
      				<a class="link-on-dk-green" href="<?php echo home_url(); ?>/explore-nature/map-of-conserved-lands/">
                <div class="circle-callout-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-callout-Lake-Davidson-Nature-Preserve.jpg" alt="Conserving Land">
                </div>
                <div class="circle-callout-text">
                  We are helping protect more than 450 acres of public and private land in the Davidson area. Check the map!
                </div>
      				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
        				<a class="link-on-dk-green" href="<?php echo home_url(); ?>/conserve-land/land-conservation-offers-big-benefits/">
        					<div class="circle-callout-image">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-callout-grey-road-easement.png" alt="Teaching & Learning">
                  </div>
                  <div class="circle-callout-text">
                    We work closely with landowners to preserve the land they love. Is conservation right for you?
                  </div>
        				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
        				<a class="link-on-dk-green" href="/wp/wp-content/uploads/2019/06/2018-DLC-US-Tax-Return-1.pdf">
                  <div class="circle-callout-image">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-callout-two-women-and-a-tree.jpg" alt="Wildlife & Habitats">
                  </div>
                  <div class="circle-callout-text">
                    We're proud of our financial stewardship and transparency too. Take a look at our latest financial statements.
                  </div>
        				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
      				<a class="link-on-dk-green" href="<?php echo home_url(); ?>/explore-nature/map-of-conserved-lands/">
                <div class="circle-callout-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-callout-Bikers-on-Path.jpg" alt="Trails & Greenways">
                </div>
                <div class="circle-callout-text">
                  Looking for hiking or biking trails? Are you a watersports buff? Get some fresh air - our trails map shows you where!
                </div>
      				</a>
            </div>
        </div>
    </div>
</div>






<?php 

$search_params_1x = array(
    'numberposts' => 1,
    'tag' => "feature",
    'category' => "",
    'featureimage' => true
);
include(get_theme_file_path() . '/sections/featured-articles-1xhero.php'); 

?>




<div class="wrapper wrapper-light-green">
   <div class="container">
	   <div class="row mb-2">
		   <div class="col-12 col-md-8">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2019/01/2019-Board-Retreat-Group-Shot.jpg" alt="Photo of the current board members" class="img-fluid">
            </div>
            <div class="col-12 col-md-4 vertical-center-parent">
              <h3 class="callout mb-4">We are on a mission to protect Davidson's natural environments. Meet the staff and volunteers who lead our effort.</h3>
              <a href="<?php echo home_url(); ?>/about/leadership" class="btn btn-primary">MEET OUR STAFF & BOARD</a>
            </div>
        </div>
    </div>
</div>




<?php include(get_theme_file_path() . '/sections/email-signup.php'); ?>




<div class="wrapper wrapper-light-green">
   <div class="container">
	   <div class="row mb-2">
            <div class="col-12 order-md-2 col-md-8">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-Farmers-Market-Tent.jpg" alt="Volunteers running a booth for the Davidson Land Conservancy" class="img-fluid">
            </div>
			<div class="col-12 order-md-1 col-md-4 vertical-center-parent">
				<h3 class="callout mb-4">You could be our next great volunteer, intern, or staffer.</h3>
				<a href="<?php echo home_url(); ?>/join-us/volunteer/" class="btn btn-primary mb-2">JOIN THE TEAM!</a>
			</div>
        </div>
    </div>
</div>



<?php get_footer(); ?>
