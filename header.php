<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<!-- meta -->
<meta name='description' content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
<meta name="keywords" content="Davidson, Lands, Conservancy, DLC, nature, trails, conservation">
<meta name="author" content="Owen Mundy and Critical Web Design">

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php bloginfo( 'name' ); ?>">
<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>">
<meta name="twitter:creator" content="@owenmundy">
<meta name="twitter:image" content="<?php echo esc_url( home_url( '/' ) ); ?>wp/wp-content/themes/davidsonlands-theme/_identity/logos/png/dlc-tree-dk-green-transparent-600w.png">

<!-- Open Graph data -->
<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>" />
<meta property="og:image" content="<?php echo esc_url( home_url( '/' ) ); ?>wp/wp-content/themes/davidsonlands-theme/_identity/logos/png/dlc-tree-dk-green-transparent-600w.png" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="600" />
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />

<!-- favicons -->
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	
<!--
<input class="rfg-button" type="button" onclick="window.open('https://davidsonlands.org/wp/rfg-signup');" value="Run for Green 2019 Sign Ups">
-->
	

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content">
			<?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-light">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>



				<h1 class="navbar-brand mb-0 ">
					<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
						<!-- <?php bloginfo( 'name' ); ?> -->
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-green.svg" alt="Davidson Lands Conservancy logo" class="header-logo">
					</a>
				</h1>


				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>


				<ul class="nav nabar-nav mr-auto">

					<li class="menu-item headerOpenSearch">
	                    <a class="nav-link header-search-btn" href="#"><i class="fa fa-search headerSearchIcon"></i></a>
	                </li>

					<li>
						<div class="headerSearchDiv">
							<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
								<input class="field form-control headerSearchFormInput" id="s" name="s" type="text" placeholder="Search …" value="">
							</form>
							<div class="headerCloseSearch">X</div>
						</div>
					</li>
					<li><a class="btn btn-primary nav-link header-join-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>join-us/give-today">GIVE TODAY</a></li>
				</ul>


			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
