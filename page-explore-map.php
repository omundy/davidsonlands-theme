<?php
/**

 * Template Name: Explore Map
 * Template Post Type: post, page, event

 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>



<!--
<h1 class="entry-title"><?php the_title(); ?></h1>
<?php
while ( have_posts() ) : the_post(); ?>
    <div class="entry-content-page">
        <?php the_content(); ?>
    </div>

<?php
endwhile;
wp_reset_query();
?>
-->





<div class="wrapper wrapper-hero">
	<div class="container-fluid">

		<div class="row">

			<div class="col-12 text-center">

				<div id="map" style="height:650px"></div>


			</div>

		</div>
	</div>
</div>



<script src="<?php echo get_stylesheet_directory_uri(); ?>/explore-nature-map/leaflet/leaflet.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/explore-nature-map/leaflet/leaflet.css" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/explore-nature-map/geojson.js" type="text/javascript"></script>

<script>
	var map = L.map('map').setView([35.499249,-80.848488], 15);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.light'
	}).addTo(map);

	// var baseballIcon = L.icon({
	// 	iconUrl: 'baseball-marker.png',
	// 	iconSize: [32, 37],
	// 	iconAnchor: [16, 37],
	// 	popupAnchor: [0, -28]
	// });
	//
	// function onEachFeature(feature, layer) {
	// 	var popupContent = "<p>I started out as a GeoJSON " +
	// 			feature.geometry.type + ", but now I'm a Leaflet vector!</p>";
	//
	// 	if (feature.properties && feature.properties.popupContent) {
	// 		popupContent += feature.properties.popupContent;
	// 	}
	//
	// 	layer.bindPopup(popupContent);
	// }

	// L.geoJSON([bicycleRental, campus], {
	//
	// 	style: function (feature) {
	// 		return feature.properties && feature.properties.style;
	// 	},
	//
	// 	onEachFeature: onEachFeature,
	//
	// 	pointToLayer: function (feature, latlng) {
	// 		return L.circleMarker(latlng, {
	// 			radius: 8,
	// 			fillColor: "#ff7800",
	// 			color: "#000",
	// 			weight: 1,
	// 			opacity: 1,
	// 			fillOpacity: 0.8
	// 		});
	// 	}
	// }).addTo(map);

	// L.geoJSON(freeBus, {
	//
	// 	filter: function (feature, layer) {
	// 		if (feature.properties) {
	// 			// If the property "underConstruction" exists and is true, return false (don't render features under construction)
	// 			return feature.properties.underConstruction !== undefined ? !feature.properties.underConstruction : true;
	// 		}
	// 		return false;
	// 	},
	//
	// 	onEachFeature: onEachFeature
	// }).addTo(map);

	// var coorsLayer = L.geoJSON(coorsField, {
	//
	// 	pointToLayer: function (feature, latlng) {
	// 		return L.marker(latlng, {icon: baseballIcon});
	// 	},
	//
	// 	onEachFeature: onEachFeature
	// }).addTo(map);

</script>

<?php get_footer(); ?>
