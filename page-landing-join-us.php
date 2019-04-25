<?php
/**

 * Template Name: Landing > Join Us
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
// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?>
    <div class="entry-content-page">
        <?php the_content(); ?>
    </div>

<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query
?>
-->


<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero hero-light join-hero vertical-center-parent">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h1 class="hero-title">Davidson Lands Conservancy is protecting the natural environments you love. With your help, we can do more!</h1>
				<a class="btn btn-info hero-title-btn" href="<?php echo home_url(); ?>/join-us/become-a-member/">BECOME A MEMBER</a>
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
				<a class="light-green" href="<?php echo home_url(); ?>/">
	                <div class="circle-callout-image">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-lenny-with-frog-600sq.jpg" alt="Education & Outreach">
	                </div>
	                <div class="circle-callout-text">
	                  	Education & Outreach
	                </div>
				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
				<a href="<?php echo home_url(); ?>/join-us/run-for-green/">
					<div class="circle-callout-image">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-run-for-green-600sq.jpg" alt="Run for Green">
	                </div>
	                <div class="circle-callout-text">
	                  	Run for Green
	                </div>
				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
				<a href="<?php echo home_url(); ?>/explore-nature/trees-davidson/">
	                <div class="circle-callout-image">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-Tree-Planting6-427sq.jpg" alt="TreesDavidson">
	                </div>
	                <div class="circle-callout-text">
	                  	TreesDavidson
	                </div>
				</a>
            </div>
            <div class="col-sm-3 col-xs-6 text-center mt-4">
				<a href="<?php echo home_url(); ?>/">
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
				<a class="btn btn-info-dark-green hero-title-btn" href="<?php echo home_url(); ?>/join-us/volunteer/" target="_blank">VOLUNTEER TODAY</a>
			</div>
		</div>


    </div>
</div>








<?php include(get_theme_file_path() . '/sections/event-section.php'); ?>



<div class="wrapper wrapper-tan">
   <div class="container">

        <div class="row">
            <div class="col-12 col-sm-4 text-center">
                <div class="callout-wrapper-light-green">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-callout-volunteer.jpg" alt="Help us protect the land you love." class="img-fluid">
                    <div class="callout-text">Honor someone who loves nature</div>
                    <a href="<?php echo home_url(); ?>/join-us/tribute-gift/" class="btn btn-primary btn-callout">MAKE A TRIBUTE GIFT</a>
                </div>
            </div>
	        <div class="col-12 col-sm-4 text-center">
                <div class="callout-wrapper-light-green">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-callout-gift.jpg" alt="Honor someone who loves nature." class="img-fluid">
                    <div class="callout-text">Time to balance your portfolio</div>
                    <a href="<?php echo home_url(); ?>/join-us/gifts-of-stock/" class="btn btn-primary btn-callout">MAKE A GIFT OF STOCK</a>
                </div>
            </div>
            <div class="col-12 col-sm-4 text-center">
                <div class="callout-wrapper-light-green">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/join-page-callout-bonfire.jpg" alt="Find your calling at DLC." class="img-fluid">
                    <div class="callout-text">Protect natural space forever</div>
                    <a href="<?php echo home_url(); ?>/join-us/forever-fund/" class="btn btn-primary btn-callout">SUPPORT LAND ACQUISITION</a>
                </div>
            </div>
        </div>
    </div>
</div>







<?php include(get_theme_file_path() . '/sections/featured-news-article.php'); ?>

<?php get_footer(); ?>
