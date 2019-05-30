<?php

/**
 *  The following writes a "1x hero callout section"
 */

// get the posts using the params from the including file
$recent_posts = om_query_image_posts($search_params_1x);

// if there is at least one post
if(count($recent_posts) > 0):

    // testing
    // print "<pre>";
    // print_r($recent_posts);
    // print "</pre>";

    // loop through posts
    foreach( $recent_posts as $recent ){
        // var for the background image from the post
        $bgimage = "";
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail($recent['ID']) ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent['ID'] ), 'single-post-thumbnail' );
            //print_r($image);
            $bgimage = "style='background-image:url(". $image[0] .");'";
        }

?>

<div class="wrapper wrapper-dark wrapper-news-section text-center" <?php echo $bgimage ?>>
   <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

            <?php echo '<h3><a href="' . get_permalink($recent['ID']) . '">'. $recent['post_title'] .'</a></h3>'; ?>
            <?php echo '<p>'. sentenceTrim($recent['post_content']) .'</p>'; ?>

<?php 
//echo get_the_excerpt() 
?> 

            <?php echo '<a class="btn btn-info" href="' . get_permalink($recent['ID']) . '">CONTINUE READING</a>'; ?>
            <?php echo '<a class="btn btn-info" href="' . get_site_url() . '/?post_type=post">MORE NEWS</a>'; ?>


            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>

<?php } ?>
<?php endif; ?>



<?php

// TESTING
// 
// $args = array(
//     'post_type' => 'post',
//     'published' => true,
//     'posts_per_page' => 1, 
//     'tag' => 'feature',
// );
// //$q = new WP_Query( $args);

// // The Query
// $query = new WP_Query( $args );
// $posts = $query->posts;
// print_r($posts);

?>
