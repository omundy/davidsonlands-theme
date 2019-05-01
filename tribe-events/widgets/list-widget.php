<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 4.5.13
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

$posts = tribe_get_list_widget_events();


?>

<div class="event-sidebar">


	<div class="row mt-3">
		<div class="col-12">
			<h3>DLC Events</h3>
		</div>
	</div>

<?php

// Check if any event posts are found.
if ( $posts ) :
	//print_r($posts);


	// Setup the post data for each event.
	foreach ( $posts as $post ) :
		//setup_postdata( $post );
		//print_r($post);
?>


			<a href="<?php the_permalink(); ?>" class="event-link" title="<?php the_title(); ?>">
				<div class="row mt-4 date-event">
					<div class="col-3 col-sm-2 col-md-12 col-lg-3">
						<div class="date-box float-left">
							<div class="date-day text-center">
								<?php echo getDayWithZero($post->event_date);  ?>
							</div>
							<div class="date-month text-center">
								<?php echo getMonthShort($post->event_date); ?>
							</div>
						</div>
					</div>
					<div class="col-9 col-sm-10 col-md-12 col-lg-9">
						<div class="event-title">
							<?php echo removeTags($post->post_title); ?>
						</div>
						<div class="event-content">
							<?php echo sentenceTrim($post->post_content,100); ?>
						</div>
						<?php /*echo print_r($post);*/ ?>
					</div>
				</div>
			</a>



			<!-- BOOTSTRAP SNIPPET | EVENT INFO SIDEBAR AND FOOTER SETUP
			<div class="container tribe-events-info-block">
				<div class="row">
					<div class="col-3">
						<div class="block-date">
							<span class="event-month"><?php echo tribe_get_start_date ( $post, $display_time = false, $date_format = d );  ?></span>
							<span class="event-day"><?php echo tribe_get_start_date ( $post, $display_time = false, $date_format = M );  ?></span>
						</div>
					</div>
					<div class="col-9">
						<div class="event-info">


							<h4 class="tribe-event-title">
								<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h4>

							<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>

							<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

							<span class="time"><?php echo tribe_get_start_time ( $event_id, 'g:i A'); ?></span>

							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>
-->



		<?php
		endforeach;
		?>

	<div class="row my-4">
		<div class="col-12 d-flex justify-content-center">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>events" title="Events">SEE ALL EVENTS</a>
		</div>
	</div>



<?php // No events were found
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>



<?php
endif;
?>
</div>
