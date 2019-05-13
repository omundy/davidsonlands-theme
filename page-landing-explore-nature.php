<?php
/**

 * Template Name: Landing > Explore Nature
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








<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero vertical-center-parent hero-light explore-nature-health-hero">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h1 class="hero-title">Studies show time in nature is often the best medicine.</h1>
                <a class="btn btn-info hero-title-btn" href="<?php echo home_url(); ?>/outdoor-resources/a-mind-is-a-terrible-thing-to-waste/">Read More</a>
            </div>
        </div>
    </div>
</div>




<?php 
    $include_vars = array("tag"=>"","category"=>"World of Wonder"); 
    include(get_theme_file_path() . '/sections/featured-articles-3xcallouts.php'); 
?>




<div class="wrapper wrapper-tan">
   <div class="container">
        <div class="row mb-2">
            <div class="col-12 col-md-8">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/explore-nature-map-feature.png" alt="Map">
            </div>

            <div class="col-12 col-md-4 vertical-center-parent">
                <h2>We’ve conserved more than 400 acres of land in the Davidson area.</h2>
                <a href="<?php echo home_url(); ?>/explore-nature/quizzes" class="btn btn-primary mx-2">Explore each property</a>
            </div>
        </div>
    </div>
</div>







<div class="wrapper wrapper-dark-green">
   <div class="container">

       <div class="row">
           <div class="col-12 text-center">
               <h3>Build Your Nature Knowledge</h3>
               <div>
                   And learn to protect and respect the nature around you:
               </div>
           </div>
       </div>


        <div class="row">
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/category/wildlife/" title="Learn more">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/explore-nature-IMG_2695.jpg" alt="Conserving Land">
                    </div>
                    <div class="circle-callout-text">
                        Wildlife
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/?s=pollinators&submit=Search" title="Learn more">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/explore-nature-2butterflies.jpg" alt="Wildlife & Habitats">
                    </div>
                    <div class="circle-callout-text">
                       Pollinators
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/category/plantlife/" title="Learn more">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/explore-nature-Backyard-Wildlife-Habitat-Sunflowers.jpg" alt="Teaching & Learning">
                    </div>
                    <div class="circle-callout-text">
                        Plants & Habitats
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <a class="link-on-dk-green" href="<?php echo home_url(); ?>/category/nature-reading/" title="Learn more">
                    <div class="circle-callout-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/explore-nature-Girl_Reading.jpg" alt="Trails & Greenways">
                    </div>
                    <div class="circle-callout-text">
                        Nature Reading
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>









<?php include(get_theme_file_path() . '/sections/event-section.php'); ?>






<div class="wrapper wrapper-white">
   <div class="container">
        <div class="row mb-2">
            <div class="col-12 col-md-4 vertical-center-parent">
                <h2>Can you ace our Nature Quizzes?</h2>
                <a href="<?php echo home_url(); ?>/explore-nature/quizzes" class="btn btn-primary mx-2">Take a quiz!</a>
            </div>
            <div class="col-12 col-md-8">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/quiz-section-image.png" alt="Quizzes">
            </div>

        </div>
    </div>
</div>











<?php get_footer(); ?>
