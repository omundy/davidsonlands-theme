<?php
// query for feature posts
$args = array(
    'numberposts' => '1',
	'post_type' => 'post',
    'post_status' => 'publish',
    'tag' => 'feature'
);
$recent_posts = wp_get_recent_posts( $args );
if(count($recent_posts) > 0):
    foreach( $recent_posts as $recent ){
        // the background image from the post
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

            <?php echo '<h3><a href="' . get_permalink($recent['url']) . '">'. $recent['post_title'] .'</a></h3>'; ?>
            <?php echo '<p>'. sentenceTrim($recent['post_content']) .'</p>'; ?>
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
// $args = array(
//     'posts_per_page' => 1, // we need only the latest post, so get that post only
//     'cat' => 384, // Use the category id, can also replace with category_name which uses category slug
//     //'category_name' => 'SLUG OF FOO CATEGORY,
// );
// $q = new WP_Query( $args);
//
// if ( $q->have_posts() ) {
//     while ( $q->have_posts() ) {
//     $q->the_post();
//         //Your template tags and markup like:
//         the_title();
//     }
//     wp_reset_postdata();
// }

// $args = array(
//     'post_type' => 'tribe_events',
//         'posts_per_page' => 3,
//             'published' => true,
// );
// $p = get_posts();
// print_r($p);

 ?>
