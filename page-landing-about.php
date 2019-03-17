<?php
/**

 * Template Name: Landing > About
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



<h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title -->
<?php
// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
    <div class="entry-content-page">
        <?php the_content(); ?> <!-- Page Content -->
    </div><!-- .entry-content-page -->

<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query
?>


<?php include(get_theme_file_path() . '/sections/featured-news-article.php'); ?>

<?php get_footer(); ?>
