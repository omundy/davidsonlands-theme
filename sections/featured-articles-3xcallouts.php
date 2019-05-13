<?php

// query for feature posts
$args = array(
    'numberposts' => '3',
	'post_type' => 'post',
    'post_status' => 'publish',
    'tag' => 'feature',
    'meta_query' => array(
        array(
         'key' => '_thumbnail_id',
         'compare' => 'EXISTS'
        ),
    )
);
if (isset($include_vars['tag']))
    $args['tag'] = $include_vars['tag'];
if (isset($include_vars['category']))
    $args['category'] = $include_vars['category'];

$recent_posts = wp_get_recent_posts( $args );


$arr = array(
    array(
        'image' => "", 
        'text' => "",
        'btn-link' => '',
        'btn-text' => ''
    ),
    array(
        'image' => "", 
        'text' => "",
        'btn-link' => '',
        'btn-text' => ''
    ),
    array(
        'image' => "", 
        'text' => "",
        'btn-link' => '',
        'btn-text' => ''
    ),
);

$i = 0;

if(count($recent_posts) > 0){
    foreach( $recent_posts as $recent ){
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail($recent['ID']) ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent['ID'] ), 'single-post-thumbnail' );
            //print_r($image);
            $arr[$i]['image'] = $image[0];
        }

        $arr[$i]['text'] = sentenceTrim($recent['post_title'],40);
        $arr[$i]['btn-link'] = get_permalink($recent['url']);
        $arr[$i]['btn-text'] = "CONTINUE READING";

        $i++;
    }

    write_3x_callouts($arr,"wrapper-dark","light-green","World of Wonder","Check out our kids programs!");
}

?>

