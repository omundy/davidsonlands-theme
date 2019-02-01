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

// Check if any event posts are found.
if ( $posts ) : ?>

	<ol class="tribe-list-widget">
		<?php
			// Setup the post data for each event.
			foreach ( $posts as $post ) :
				setup_postdata( $post );
		?>
		<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">

			<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>

			<!-- BOOTSTRAP SNIPPET | EVENT INFO SIDEBAR AND FOOTER SETUP-->
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

							<!-- Event Title -->
							<h4 class="tribe-event-title">
								<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h4>

							<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>

							<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

							<!-- Event Time -->
							<span class="time"><?php echo tribe_get_start_time ( $event_id, 'g:i A'); ?></span>

							<!-- Event description (which adds the 'read more' button) -->
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="tribe-event-duration">
				<?php echo tribe_events_event_schedule_details(); ?>
			</div> -->

			<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>

			<!-- here we're trying a regular expression to find and replace 
			the big annoying 'read more' button -->
			<?php $map = preg_replace('/<a class="btn btn-secondary understrap-read-more-link"[^>]*>.*?</a>/s','',$map); ?>
		</li>
		<?php
		endforeach;
		?>
	</ol><!-- .tribe-list-widget -->

	<p class="tribe-events-widget-link">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( esc_html__( 'See All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;
