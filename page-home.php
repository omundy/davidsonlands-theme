<?php
/**
 *  The main template file.
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();
$container   = get_theme_mod('understrap_container_type');
?>

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>




<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero hero-light home-hero vertical-center-parent">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h1 class="hero-title">Protecting, exploring, and supporting<br>Davidson’s natural environments</h1>
                <a class="btn btn-info hero-title-btn" href="<?php echo get_site_url(); ?>/join-us">JOIN US</a>
            </div>
        </div>
    </div>
</div>


<div class="wrapper wrapper-dark">
   <div class="container">
        <div class="row mb-2">
            <div class="col-3 text-center">
                <div class="number-row-number">
                    463
                </div>
                <div class="number-row-text">
                    ACRES <br>
                    CONSERVED
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="number-row-number">
                    19
                </div>
                <div class="number-row-text">
                    MILES OF <br>
                    TRAILS & GREENWAYS
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="number-row-number">
                    552
                </div>
                <div class="number-row-text">
                    TREES<br>
                    PLANTED
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="number-row-number">
                    3,434
                </div>
                <div class="number-row-text">
                    VOLUNTEER <br>HOURS LAST YEAR
                </div>
            </div>
        </div>
    </div>
</div>


<div class="wrapper wrapper-dark-green">
   <div class="container">

       <div class="row">
           <div class="col-12 text-center">
               <h3>Protecting & Exploring Nature</h3>
               <div>
                   We focus our efforts on these key areas:
               </div>
           </div>
       </div>


        <div class="row">
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/conserve-land">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-conserving.jpg" alt="Conserving Land">
                    </div>
                    <div class="circle-callout-text">
                        Conserving Land
                    </div>
                </a> 
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/category/wildlife/">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-wildlife.jpg" alt="Wildlife & Habitats">
                    </div>
                    <div class="circle-callout-text">
                        Wildlife & Habitats
                    </div>
                </a>    
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/category/worldofwonder/">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-teaching.jpg" alt="Teaching & Learning">
                    </div>
                    <div class="circle-callout-text">
                        Teaching & Learning
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/explore-nature/map-of-conserved-lands/">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-trails.jpg" alt="Trails & Greenways">
                    </div>
                    <div class="circle-callout-text">
                        Trails & Greenways
                    </div>
                </a>    
            </div>
        </div>
    </div>
</div>






<?php

// data for a 3x callout section
$data_params_3x = array(
    array(
        'image' => get_stylesheet_directory_uri() . "/img/home-callout-join.jpg", 
        'text' => "Help us protect the land you love.",
        'btn-link' => '/join-us/give-today/',
        'btn-text' => 'GIVE TODAY'
    ),
    array(
        'image' => get_stylesheet_directory_uri() . "/img/home-callout-gift.jpg", 
        'text' => "Honor someone who loves nature.",
        'btn-link' => '/join-us/tribute-gift',
        'btn-text' => 'MAKE A TRIBUTE GIFT'
    ),
    array(
        'image' => get_stylesheet_directory_uri() . "/img/home-callout-volunteer.jpg", 
        'text' => "Find your calling at DLC",
        'btn-link' => '/join-us/volunteer',
        'btn-text' => 'VOLUNTEER TODAY'
    ),
);
// display parameters for 3x callout section
$display_params_3x = array(
    'wrapper_bg_color' => "tan",
    'callout_bg_color' => "light-green",
    'heading' => "",
    'subheading' => ""
);
// write a 3x callout section
write_3x_callouts($data_params_3x, $display_params_3x);

?>

<input class="rfg-button" type="button" onclick="location.href='https://runsignup.com/Race/NC/Davidson/RunForGreen';" value="Run for Green 2019 Sign Ups">






<?php 

$search_params_1x = array(
    'numberposts' => 1,
    'tag' => "feature",
    'category' => "",
    'featureimage' => true
);
include(get_theme_file_path() . '/sections/featured-articles-1xhero.php'); 

?>



<?php include(get_theme_file_path() . '/sections/email-signup.php'); ?>
<?php include(get_theme_file_path() . '/sections/event-section.php'); ?>
<?php get_footer(); ?>


