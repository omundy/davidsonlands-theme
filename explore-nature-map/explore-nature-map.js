
var baseUrl = 'http://davidsonlands.dreamhosters.com';


// create map
var map = L.map('map').setView([35.488571, -80.802308], 13);

// add tiles
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
        // after loading data, load public data
        addDataToMap(data);
    });
}
getData( baseUrl + "/wp/wp-content/themes/davidsonlands-theme/explore-nature-map/explore-nature-data.json");

// add data to map
function addDataToMap(data) {
    var dataLayer = L.geoJson(data, {
        style: propertyStyle,
        //filter: publicAccessFilter,
        onEachFeature: onEachFeature,
    });
    dataLayer.addTo(map);
    // show a random default


showRandomProperty(data.features);

    //map.fitBounds(dataLayer.getBounds());
}
// style for polygons
var propertyStyle = {
    "fillColor": "#6d9f71",
    "fillOpacity": 0.5,
    "color": "#337357", // stroke
    "weight": 1.5,
    "opacity": 0.65
};

// only show "Public" properties (not in use)
function publicAccessFilter(feature, layer) {
    //console.log(feature)
    if (feature.properties.website.access == "Public") return true;
}

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

var trackDuplicates = [];


function showRandomProperty(data){
	var keys = Object.keys(data);
    var randomProp = data[keys[ keys.length * Math.random() << 0]];
    //console.log(randomProp)
    showPropertyData(randomProp);
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
        str += '<div class="mt-4 vertical-center-parent text-center"><a class="btn btn-primary" href="' + baseUrl + data.link + '">More information</a></div>';



    $('.explore-map-data').html(str);

}



function onEachFeature(feature, layer) {

	var data = feature.properties.website;
    if (!data.name) return;


	if (trackDuplicates.indexOf(data.name) > -1){
		// hide layer, don't add marker or make it clickable
		layer.setStyle({
            'weight': 0,
            'fillOpacity': 0
        });
	} else {
		// not a duplicate
	    trackDuplicates.push(data.name);


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
	        }).addTo(map).on('click', function(ev) {
	            //console.log(ev);
	            showPropertyData(feature, layer);
	        });

	    } else {
	        layer.on({
	            click: (function(ev) {
	                showPropertyData(feature, layer);
	            }).bind(this)
	        });
	    }

    }
	//console.log(trackDuplicates);
}