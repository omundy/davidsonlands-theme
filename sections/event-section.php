<?php

/**
 *  A custom script to show events from The Event Calendar plugin as a full-width section
 */

// query for events
$args = array(
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'post_type' => 'tribe_events',
    'order'=> 'ASC',
    'orderby' => '',
    'meta_query' => array(
        array(
            'key' => '_EventOrigin',
            'value' => 'events-calendar',
            'compare' => '=',
        )
    ),
);
$query = new WP_Query($args);
$posts = $query->posts;
//print_r($query);

// if there are posts, display the section
if (count($posts) > 0){ ?>

    <div class="wrapper-hero wrapper-light-green px-0">
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block pl-0 section-events-image"></div>
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3>DLC Events</h3>
                        </div>
                    </div>
<?php
    foreach ( $posts as $post ){
        // if there is post data
        if ($post->post_title && $post->post_title == "") continue;
            //print_r($post);
            //print_r($post->post_title);
            //echo the_permalink();
            // make postdata available, not needed?
            //setup_postdata( $post );
?>
                    <a href="<?php the_permalink(); ?>" class="event-link" title="<?php the_title(); ?>">
                        <div class="row date-event">
                            <div class="col-2">
                                <div class="date-box">
                                    <div class="date-day text-center">
                                        <?php echo getDayWithZero($post->EventStartDate); ?>
                                    </div>
                                    <div class="date-month text-center">
                                        <?php echo getMonthShort($post->EventStartDate); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="event-title">
                                    <?php the_title(); ?>
                                </div>
                                <div class="event-content">
                                    <?php echo sentenceTrim($post->post_content); ?>
                                </div>
                                <?php /*echo print_r($post);*/ ?>
                            </div>
                        </div>
                    </a>
<?php } /* /foreach */ ?>

                    <div class="row my-4">
                        <div class="col-12 d-flex justify-content-center">
                            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>events" title="Events">SEE ALL EVENTS</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php } /* /if */ ?>
