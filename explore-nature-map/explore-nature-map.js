
/**
 *  Davidson Lands Conservancy - Map of Conserved Lands
 *  2019 Owen Mundy and Critical Web Design
 */


// base url - so they default to root
var baseUrl = ""
    geojson = {}; 

// create map
var map = L.map('map',{
    "zoomSnap": 0.1
}).setView([35.488571, -80.802308], 13);

// add tiles to map
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.light'
}).addTo(map);

// load geojson data
function getData(url) {
    $.getJSON(url, function(data) {
        //console.log(data);
        // save after data loads
        geojson = data;
        // load public data
        addDataToMap();
    });
}
getData( baseUrl + "/wp/wp-content/themes/davidsonlands-theme/explore-nature-map/explore-nature-data.json");

// add data to map
function addDataToMap() {
    var dataLayer = L.geoJson(geojson, {
        style: propertyStyle,
        //filter: publicAccessFilter,
        onEachFeature: onEachFeature,
    });
    dataLayer.addTo(map);
    // show a random by default
    //showRandomProperty();
    // or show a specific property
    showProperty("fisher-farm-park");
}
// pick a random feature from the saved geojson
function showRandomProperty(){
    var keys = Object.keys(geojson.features);
    var randomProp = geojson.features[keys[ keys.length * Math.random() << 0]];
    //console.log(randomProp)
    showPropertyData(randomProp);
}
// pick a specific feature from the saved geojson
function showProperty(slug){
    // loop through the array of features
    for (var i=0; i<geojson.features.length; i++){
        // save reference
        var feature = geojson.features[i];
        //console.log( feature.properties.website.slug, slug );
        // if the slugs match
        if ( feature.properties.website.slug == slug){
            // this is the property to show
            showPropertyData(feature);
            break;
        }
    }
}



// style for polygons
var propertyStyle = {
    "fillColor": "#6d9f71",
    "fillOpacity": 0.5,
    "color": "#337357", // stroke
    "weight": 1.5,
    "opacity": 0.65
};
// style for polygons (select)
var propertyStyleSelected = {
    "fillColor": "#6d9f71",
    "fillOpacity": 0.85,
    "color": "#337357", // stroke
    "weight": 1.5,
    "opacity": 0.95
};

// only show "Public" properties (not in use)
function publicAccessFilter(feature, layer) {
    //console.log(feature)
    if (feature.properties.website.access == "Public") return true;
}




// show the data for a property
function showPropertyData(feature, layer) {

    var data = feature.properties.website,
        str = "";

    if (data.image)
        str += '<img src="' + baseUrl + data.image + '" class="map-data-image pb-2 img-fluid">';
    if (data.name)
        str += '<h5>' + data.name + '</h5>';
    if (data.unique)
        str += '<div>' + data.unique + '</div>';
    // list
    if (data.access || data.year || data.size || data.location)
        str += '<table class="table table-sm table-hover mt-2 mb-1">';
    if (data.access)
        str += '<tr><th>Access</th><td>' + data.access + '</td></tr>';
    if (data.year)
        str += '<tr><th>Year</th><td>' + data.year + '</td></tr>';
    if (data.size)
        str += '<tr><th>Size</th><td>' + data.size + '</td></tr>';
    if (data.location)
        str += '<tr><th>Location</th><td>' + data.location + '</td></tr>';
    if (data.access || data.year || data.size || data.location)
        str += '</table>';

    if (data.conservation)
        str += '<div>' + data.conservation + '</div>';
    // if (data.text)
    // 	str += '<div>'+ data.text +'</div>';

    if (data.link)
        str += '<div class="mt-3 vertical-center-parent text-center"><a class="btn btn-primary" href="' + baseUrl + data.link + '">More information</a></div>';

    $('.explore-map-data').html(str);
}


var prevLayerSelected = null, 
    prevMarkerSelected = null,
    trackDuplicates = [];

// marker icon for "Not publicly accessible" properties
var markerIcon = L.icon({
    iconUrl: baseUrl + "/wp/wp-content/themes/davidsonlands-theme/explore-nature-map/marker.svg",
    shadowUrl: baseUrl + "/wp/wp-content/themes/davidsonlands-theme/explore-nature-map/leaflet/images/marker-shadow.png",
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    shadowSize: [41, 41],
    shadowAnchor: [13, 46],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28]
});
// selected version of marker icon for "Not publicly accessible" properties
var markerIconSelected = L.icon({
    iconUrl: baseUrl + "/wp/wp-content/themes/davidsonlands-theme/explore-nature-map/marker-selected.svg",
    shadowUrl: baseUrl + "/wp/wp-content/themes/davidsonlands-theme/explore-nature-map/leaflet/images/marker-shadow.png",
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    shadowSize: [41, 41],
    shadowAnchor: [13, 46],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28]
});

// add click functions
function onEachFeature(feature, layer) {
    // save reference
	var data = feature.properties.website;
    // confirm data
    if (!data.name) return;
    // do not show duplicate markers (two different properties with same names)
	if (trackDuplicates.indexOf(data.name) > -1){
		// hide layer, don't add marker or make it clickable
		layer.setStyle({
            'weight': 0,
            'fillOpacity': 0
        });
	} else {
		// not a duplicate so track it
	    trackDuplicates.push(data.name);
        // if not public add marker in center of polygon
	    if (data.access == "Not publicly accessible" && feature.geometry.type === 'Polygon') {
	        // Don't stroke and do opaque fill
	        layer.setStyle({
	            'weight': 0,
	            'fillOpacity': 0
	        });
	        // Get bounds of polygon
	        var bounds = layer.getBounds();
	        // Get center of bounds
	        var center = bounds.getCenter();
	        // Use center to put marker on map
	        var marker = L.marker(center, { 
	        	icon: markerIcon 
	        }).addTo(map).on('click', function(e) {
                // reset all previous layer styles / previous markers
                resetAllPreviousLayers(e.target);
                // center and zoom
                centerLeafletMapOnMarker(map,e.target);
                // show property data
	            showPropertyData(feature, layer);
                // change marker to show which is selected
                e.target.setIcon(markerIconSelected);
                // save layer for next time
                prevMarkerSelected = e.target;
	        });
	    } else {
            // else just add it
	        layer.on({
	            click: (function(e) {
                    // reset all previous layer styles / previous markers
                    resetAllPreviousLayers(e.target);
                    // center and zoom
                    map.fitBounds(e.target.getBounds(), {padding: [220,220]});
                    // show property data
	                showPropertyData(feature, layer);
                    // change polygon style to show which is selected
                    layer.setStyle(propertyStyleSelected);
                    // save it for next time
                    prevLayerSelected = e.target;

	            }).bind(this)
	        });
	    }
    }
	//console.log(trackDuplicates);
}
// reset style or marker on previously selected properties
function resetAllPreviousLayers(){
    // if previous layer not null then set previous to not selected style
    if (prevLayerSelected != null)
       prevLayerSelected.setStyle(propertyStyle);
    // if previous marker not null then set previous to original marker
    if (prevMarkerSelected != null)
       prevMarkerSelected.setIcon(markerIcon);
    // reset both just in case
    prevLayerSelected = null;
    prevMarkerSelected = null;
}
// center on marker
function centerLeafletMapOnMarker(map, marker) {
    var latLngs = [ marker.getLatLng() ];
    var bounds = L.latLngBounds(latLngs);
    if (bounds.getSouthWest().equals(bounds.getNorthEast())) {
        // Only a single point feature to view.
        map.panTo(bounds.getCenter());
    } else {
        // Some area to fit bounds to.
        map.fitBounds(bounds);
    }
}







