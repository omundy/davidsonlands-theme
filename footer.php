<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>



<?php
// events widget
//get_template_part( 'sidebar-templates/sidebar', 'footerfluid' );
?>




<div class="wrapper wrapper-dark-green" id="wrapper-footer">

	<div class="<?php echo esc_attr($container); ?>">

		<div class="row">

			<?php

            $items = wp_get_nav_menu_items('main-nav-2019');
            // print "<pre>";
            // print_r($items);
            // print "</pre>";
            if ($items) {
                $first_run = true;
                $parent = null;


                // start new col
                echo '<div class="col-12 col-md-2">';
                echo '<ul class="footer-menu pb-3">';

                //echo '<ul id="menu-main-top-navigation">';
                foreach ($items as $index => $item) {

                    // if we are starting a new column...
                    if ($item->menu_item_parent == 0) {
                        $parent = $item->ID;

                        if ($first_run == false) {
                            // close previous col
                            echo '</ul>';
                            echo '</div>';
                            // open new col
                            echo '<div class="col-12 col-md-2 pb-3">';
                            echo '<ul class="footer-menu">';
                        }
                        // reset
                        $first_run = false;
                    }

                    // if this is a parent or a child of the parent (not a grandchild)
                    if ($item->menu_item_parent == 0 || $parent == $item->menu_item_parent) {
                        // add link
                        echo '<li class="footer-menu-item';
                        if ($item->menu_item_parent == 0) {
                            // add header class
                            echo ' footer-menu-item-header';
                        }
                        echo '"><a href="' . $item->url .'" title="'. $item->title .'">';
                        echo $item->title . '</a></li>';
                    }

                    // print "<pre>";
                    // print_r($item);
                    // print "</pre>";
                }
                echo '</ul>';
                echo '</div>';
            }
            ?>



			<div class="col-md-4">

				<ul class="share_links">
            		<li><a href="https://www.instagram.com/davidsonlands/" target="_blank">
						<i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            		<li><a href="https://www.facebook.com/ProtectLand/" target="_blank">
						<i class="fab fa-facebook" aria-hidden="true"></i></a></li>
            		<li><a href="https://www.flickr.com/photos/davidsonlands/" target="_blank">
						<i class="fab fa-flickr" aria-hidden="true"></i></a></li>
            		<li><a href="<?php echo esc_url(home_url('/')); ?>about/contact-us/">
						<i class="far fa-envelope" aria-hidden="true"></i></a></li>
            		<li><a href="<?php echo esc_url(home_url('/')); ?>about/contact-us/">
						Contact Us</a></li>
                </ul>



				<div class="footer-email-signup clearfix">

					<p>Get our latest news and find out how we’re protecting land in Davidson, NC</p>

					<!-- <form class="form-inline" action="post">
						<div class="form-group mr-2 mb-2">
							<label for="emailSignupFooter" class="sr-only">Email</label>
							<input type="text" class="form-control" id="emailSignupFooter" placeholder="EMAIL ADDRESS">
						</div> -->
						<button type="submit" class="btn btn-primary mb-2" onclick="location.href='/join-us/get-news/'">SIGNUP</button>
					<!-- </form> -->

				</div>

			</div>
		</div>



		<div class="row">
			<div class="col-6 col-md-3 mt-5">

				<p>
					<a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-tan.svg" alt="Davidson Lands Conservancy logo" class="img-fluid">
					</a>
				</p>
PO Box 1952, Davidson, NC 28036<br>704-892-1910 | <a href="<?php echo esc_url(home_url('/')); ?>about/contact-us/">Contact us</a>
			</div>
			<div class="col-12 col-md-7 mt-5">



<p>© <?php echo date("Y"); ?> Davidson Lands Conservancy</p>

<p>Davidson Lands Conservancy is a 501 ( c ) ( 3 ) organization holding NC Charitable Solicitation License #SLOO4342. <a href="/wp/wp-content/uploads/2019/06/2018-DLC-US-Tax-Return-1.pdf">Read our most recent Reviewed Financial Statements</a>.</p>

<p>Website designed and developed by <a href="https://owenmundy.com/site/critical-web-design" target="_blank">Critical Web Design</a> at Davidson College</p>

			</div>
			<div class="col-6 col-md-2 mt-5">

				<p>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lta_seal_white.svg" alt="LTA logo" class="img-fluid" style="max-width:85%">
				</p>

			</div>



		</div>




	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20405644-1']);
  _gaq.push(['_setDomainName', '.davidsonlands.org']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>

</html>
