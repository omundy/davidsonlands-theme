<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
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




<div class="wrapper wrapper-xxl wrapper-no-padding-bottom wrapper-hero home-hero-light vertical-center-parent">
   <div class="container-fluid ">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center wrapper-sm hero-content">
                <h1 class="hero-title">Protecting, exploring, and supporting<br>Davidson’s natural environments</h1>
                <a class="btn btn-info hero-title-btn" href="#">JOIN US</a>
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
                <div class="circle-callout-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-conserving.jpg" alt="Conserving Land">
                </div>
                <div class="circle-callout-text">
                    Conserving Land
                </div>
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <div class="circle-callout-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-wildlife.jpg" alt="Wildlife & Habitats">
                </div>
                <div class="circle-callout-text">
                    Wildlife & Habitats
                </div>
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <div class="circle-callout-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-teaching.jpg" alt="Teaching & Learning">
                </div>
                <div class="circle-callout-text">
                    Teaching & Learning
                </div>
            </div>
            <div class="col-6 col-sm-3 text-center mt-4">
                <div class="circle-callout-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-conserve-circle-trails.jpg" alt="Trails & Greenways">
                </div>
                <div class="circle-callout-text">
                    Trails & Greenways
                </div>
            </div>
        </div>
    </div>
</div>







<div class="wrapper wrapper-tan">
   <div class="container">

        <div class="row">
            <div class="col-12 col-sm-4 text-center">
                <div class="callout-wrapper-light-green">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-callout-join.jpg" alt="Help us protect the land you love." class="img-fluid">
                    <div class="callout-text">Help us protect the land you love.</div>
                    <button class="btn btn-primary btn-callout">BECOME A MEMBER</button>
                </div>
            </div>
            <div class="col-12 col-sm-4 text-center">
                <div class="callout-wrapper-light-green">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-callout-gift.jpg" alt="Honor someone who loves nature." class="img-fluid">
                    <div class="callout-text">Honor someone who loves nature.</div>
                    <button class="btn btn-primary btn-callout">MAKE A TRIBUTE GIFT</button>
                </div>
            </div>
            <div class="col-12 col-sm-4 text-center">
                <div class="callout-wrapper-light-green">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-callout-volunteer.jpg" alt="Find your calling at DLC." class="img-fluid">
                    <div class="callout-text">Find your calling at the DLC.</div>
                    <button class="btn btn-primary btn-callout">VOLUNTEER TODAY</button>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include(get_theme_file_path() . '/sections/featured-news-article.php'); ?>
<?php include(get_theme_file_path() . '/sections/email-signup.php'); ?>
<?php include(get_theme_file_path() . '/sections/event-section.php'); ?>









<?php /*

<div class="wrapper" id="index-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check and opens the primary div -->
            <?php get_template_part('global-templates/left-sidebar-check'); ?>

            <main class="site-main" id="main">

                <?php if (have_posts()) : ?>

                    <?php // Start the Loop
                    ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php

                        // Include the Post-Format-specific template for the content.
                        // If you want to override this in a child theme, then include a file
                        // called content-___.php (where ___ is the Post Format name) and that will be used instead.
                        get_template_part('loop-templates/content', get_post_format());
                        ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part('loop-templates/content', 'none'); ?>

                <?php endif; ?>

            </main><!-- #main -->

            <!-- The pagination component -->
            <?php understrap_pagination(); ?>

        <!-- Do the right sidebar check -->
        <?php get_template_part('global-templates/right-sidebar-check'); ?>


        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

*/ ?>





<?php get_footer(); ?>
