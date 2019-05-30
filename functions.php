<?php

// MIGHT NEED THIS TO IMPORT FUNCTIONS
// if ( !function_exists('wp_safe_redirect')) {
//         require_once (ABSPATH . WPINC . '/inc/class-wp-bootstrap-navwalker.php');
//      }



function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Get the theme data
    $the_theme = wp_get_theme();

    // styles
    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
    /* add events stylesheet */
    wp_enqueue_style('cwd-events-styles', get_stylesheet_directory_uri() . '/css/styles-events.css', $the_theme->get('Version'));
    wp_enqueue_style('cwd-styles', get_stylesheet_directory_uri() . '/css/styles.css', $the_theme->get('Version'));
    //wp_enqueue_style('cwd-icons', get_stylesheet_directory_uri() . '/css/fontawesome-all.css', $the_theme->get('Version'));



    // scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper-scripts', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
    wp_enqueue_script('cwd-scripts', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get('Version'), true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $id = $post->ID;
    $template_name = get_page_template_slug( $id );


    if ($template_name == "page-explore-map.php"){
        wp_enqueue_style('cwd-leaflet-styles', get_stylesheet_directory_uri() . '/explore-nature-map/leaflet/leaflet.css', $the_theme->get('Version'));
        wp_enqueue_script('cwd-leaflet-script', get_stylesheet_directory_uri() . '/explore-nature-map/leaflet/leaflet.js', array(), $the_theme->get('Version'), true);
        wp_enqueue_script('cwd-explore-nature-map-script', get_stylesheet_directory_uri() . '/explore-nature-map/explore-nature-map.js', array(), $the_theme->get('Version'), true);
    }




}




// remove type from css / js links for validation
add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);
function myplugin_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}




function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');











/**
 *  Returns array of posts with images based on parameters
 */

// query for feature posts
function om_query_image_posts($post_params){

    // testing
    // print "<pre>";
    // print_r($post_params);
    // print "</pre>";

    $args = array(
        // only return posts
        'post_type' => 'post',
        // only return published posts
        'post_status' => 'publish', 
        // number of posts to return, or default
        'numberposts' => !empty($post_params['numberposts']) ? (int)$post_params['numberposts'] : 1, 
        // which tags to return, or default
        'tag' => !empty($post_params['tag']) ? $post_params['tag'] : '',
        // which categories to return, or default
        'category_name' => !empty($post_params['category']) ? $post_params['category'] : '',
        // only return posts with featured images
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            )
        )
    );
    // testing
    // print "<pre>";
    // print_r($args);
    // print "</pre>";

    $posts = wp_get_recent_posts( $args );

    // this also mostly works but returns objects instead of arrays
    // $query = new WP_Query( $args );
    // $posts = $query->posts;

    // testing
    // print "<pre>";
    // print_r($posts);
    // print "</pre>";
    
    // foreach( $posts as $recent ){
    //     print $i .". ".  $recent['ID'] ." ". $recent['post_title'] ."<br>";
    // }  

    return $posts;
}




/**
 * Prints HTML for 3x callouts
 */

function write_3x_callouts($arr,$display_params){

    $str = '<div class="wrapper wrapper-'. $display_params['wrapper_bg_color'] .'">';
    $str .= '<div class="container">';

    if ($display_params['heading'] != ""){
        $str .= '<div class="row">';
        $str .= '<div class="col-12 text-center">';
        $str .= '<h3>'. $display_params['heading'] .'</h3>';
        $str .= '<div>'. $display_params['subheading'] .'</div>';
        $str .= '</div>';
        $str .= '</div>';
    }

    $count = 0;
    $str .= '<div class="row">';
    foreach($arr as $callout){
        $str .= '<div class="col-12 col-sm-4 text-center">';
        $str .= '<div class="callout-wrapper callout-wrapper-'. $display_params['callout_bg_color'] .'">';
        $str .= '<div class="callout-image" style="background-image: url('. $callout['image'] .')"></div>';
        //$str .= '<img src="'. $callout['image'] .'" alt="'. $callout['text'] .'" class="img-fluid">';
        $str .= '<div class="callout-text">'. $callout['text'] .'</div>';
        $str .= '<a href="'. $callout['btn-link'] .'" class="btn btn-primary btn-callout">'. $callout['btn-text'] .'</a>';
        $str .= '</div>';
        $str .= '</div>';

        // only allow 3
        if (++$count >= 3) break;
    }
    $str .= '</div>';
    $str .= '</div>';
    $str .= '</div>';

    print $str;
}



/**
 * Prints HTML with meta information for the current post-date/time and author. Copied from parent/inc/template-tags.php
 */

function understrap_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>'; // <time class="updated" datetime="%3$s"> (%4$s) </time>
    }
    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );
    $posted_on   = apply_filters(
        'understrap_posted_on', sprintf(
            '<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
            esc_html_x( 'Posted on', 'post date', 'understrap' ),
            esc_url( get_permalink() ),
            apply_filters( 'understrap_posted_on_time', $time_string )
        )
    );
    $byline      = apply_filters(
        'understrap_posted_by', sprintf(
            '<span class="byline"> %1$s<span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
            $posted_on ? esc_html_x( 'by', 'post author', 'understrap' ) : esc_html_x( 'Posted by', 'post author', 'understrap' ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_html( get_the_author() )
        )
    );
    echo $posted_on . $byline; // WPCS: XSS OK.
}



/**
 *  Trim string to nearest sentence based on limit
 *  Source: https://stackoverflow.com/a/42613482/441878
 */
function sentenceTrim($str, $maxLength = 300) {
    $str = preg_replace('/\s+/', ' ', trim($str)); // Replace new lines (optional)

    $str = removeTags($str);

    if (mb_strlen($str) >= $maxLength) {
        $str = mb_substr($str, 0, $maxLength);

        $puncs  = array('. ','.<', '! ', '? '); // Possible endings of sentence
        $maxPos = 0;

        foreach ($puncs as $punc) {
            $pos = mb_strrpos($str, $punc);

            if ($pos && $pos > $maxPos) {
                $maxPos = $pos;
            }
        }

        if ($maxPos) {
            return mb_substr($str, 0, $maxPos + 1);
        }

        return rtrim($str) . '&hellip;';
    } else {
        return $str;
    }
}

function removeTags($str){
    // remove all link and link content
    $str = preg_replace('#<a.*?>.*?</a>#i','', $str);
    // remove all tags
    $str = strip_tags($str);
    return $str;
}



function getYear($date){
    return date("Y", strtotime($date));
}
function getMonthShort($date){
    return date("M", strtotime($date));
}
function getDayWithZero($date){
    return date("d", strtotime($date));
}
