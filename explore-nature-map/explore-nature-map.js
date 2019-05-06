var map = L.map('map').setView([35.499249,-80.848488], 14);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	maxZoom: 18,
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	id: 'mapbox.light'
}).addTo(map);

	

var dataUrl = "http://davidsonlands.dreamhosters.com/wp/wp-content/themes/davidsonlands-theme/explore-nature-map/explore-nature-data.json";
function getData(url){
	$.getJSON(url,function(data) { 
		console.log(data);
		addDataToMap(data); 
	});
}
getData(dataUrl);
function addDataToMap(data){
	var dataLayer = L.geoJson(data,{
		style: msaStyle,
		onEachFeature: onEachFeature,
	});
    // var map = L.mapbox.map('map', 'mapbox.streets',{
    //     zoom: 5
    //     }).fitBounds(dataLayer.getBounds());
    dataLayer.addTo(map)




}
	var msaStyle = {
		"fillColor": "#337357",
		"fillOpacity": 0.5,
		"color": "#6d9f71", // stroke
		"weight": 2,
		"opacity": 0.65
	};



	function onEachFeature(feature, layer) {
		var popupContent = "<p>" + feature.properties.website.name + "</p>";
	
		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}
	
		layer.bindPopup(popupContent);
	}
	
	


    // function addDataToMap1(data, map) {
    //         var dataLayer = L.geoJson(data);
    //         var map = L.mapbox.map('map', 'mapbox.streets',{
    //             zoom: 5
    //             }).fitBounds(dataLayer.getBounds());
    //         dataLayer.addTo(map)
    //     }
    
    // function addDataToMap1(data, map) {
    //     var dataLayer = L.geoJson(data, {
    //         onEachFeature: function(feature, layer) {            var popupText = "<table><tr><th>COUNT: </th><td>" + feature.properties['COUNT']+"</td></tr>";             var popupText = popupText+ "<tr><th>LAT4: </th><td>" + feature.properties['LAT4']+"</td></tr>";             var popupText = popupText+ "<tr><th>LAT1: </th><td>" + feature.properties['LAT1']+"</td></tr>";             var popupText = popupText+ "<tr><th>LAT3: </th><td>" + feature.properties['LAT3']+"</td></tr>";             var popupText = popupText+ "<tr><th>LAT2: </th><td>" + feature.properties['LAT2']+"</td></tr>";             var popupText = popupText+ "<tr><th>LONG3: </th><td>" + feature.properties['LONG3']+"</td></tr>";             var popupText = popupText+ "<tr><th>LONG2: </th><td>" + feature.properties['LONG2']+"</td></tr>";             var popupText = popupText+ "<tr><th>LONG1: </th><td>" + feature.properties['LONG1']+"</td></tr>";             var popupText = popupText+ "<tr><th>LONG4: </th><td>" + feature.properties['LONG4']+"</td></tr>";             var popupText = popupText+ "<tr><th>HASH: </th><td>" + feature.properties['HASH']+"</td></tr>"; 
    //             layer.setStyle({color: '#1766B5', weight: 3, opacity: 1});
    //                     layer.bindPopup(popupText, {autoPan:false, maxHeight:500, maxWidth:350} ); }
    //             });
    //         dataLayer.addTo(map);
    //     console.log(map.fitBounds(dataLayer.getBounds()))};
    // };







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
	// 
	// 