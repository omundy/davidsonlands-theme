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
    wp_enqueue_style('critical-web-design-events-styles', get_stylesheet_directory_uri() . '/css/styles-events.css', $the_theme->get('Version'));
    wp_enqueue_style('critical-web-design-styles', get_stylesheet_directory_uri() . '/css/styles.css', $the_theme->get('Version'));
    //wp_enqueue_style('critical-web-design-icons', get_stylesheet_directory_uri() . '/css/fontawesome-all.css', $the_theme->get('Version'));



    // scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper-scripts', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
    wp_enqueue_script('critical-web-design-scripts', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get('Version'), true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
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
 *  Trim string to nearest sentence based on limit
 *  Source: https://stackoverflow.com/a/42613482/441878
 */
function sentenceTrim($string, $maxLength = 300) {
    $string = preg_replace('/\s+/', ' ', trim($string)); // Replace new lines (optional)

    if (mb_strlen($string) >= $maxLength) {
        $string = mb_substr($string, 0, $maxLength);

        $puncs  = array('. ','.<', '! ', '? '); // Possible endings of sentence
        $maxPos = 0;

        foreach ($puncs as $punc) {
            $pos = mb_strrpos($string, $punc);

            if ($pos && $pos > $maxPos) {
                $maxPos = $pos;
            }
        }

        if ($maxPos) {
            return mb_substr($string, 0, $maxPos + 1);
        }

        return rtrim($string) . '&hellip;';
    } else {
        return $string;
    }
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
