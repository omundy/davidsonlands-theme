<?php

/**
 *  The following writes a "3x callout section"
 */

// get the posts using the params from the including file
$recent_posts = om_query_image_posts($search_params_3x);

// if there are at least three posts
if(count($recent_posts) >= 3):

    // testing
    // print "<pre>";
    // print_r($recent_posts);
    // print "</pre>";

    // set up array for the 3x
    $data_params_3x = array(
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

    // track the post num
    $i = 0;

    // loop through posts and build array
    foreach( $recent_posts as $recent ){
        //print_r($recent);
        //print $i .". ".  $recent['ID'] ." ". $recent['post_title'] ."<br>";
      
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail($recent['ID']) ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent['ID'] ), 'single-post-thumbnail' );
            //print_r($image);
            $data_params_3x[$i]['image'] = $image[0];

            if ($recent['post_excerpt'] == '') {
                $data_params_3x[$i]['text'] = '<p>'. sentenceTrim($recent['post_title']) .'</p>';
            } else {
                $data_params_3x[$i]['text'] = '<p>'. sentenceTrim($recent['post_excerpt']) .'</p>';
            }
            

            //$data_params_3x[$i]['text'] = sentenceTrim($recent['post_title'],40);
            $data_params_3x[$i]['btn-link'] = get_permalink($recent['ID']);
            $data_params_3x[$i]['btn-text'] = "CONTINUE READING";

            $i++;
        }
    }
    write_3x_callouts($data_params_3x,$display_params_3x);


?>
<?php endif; ?>



