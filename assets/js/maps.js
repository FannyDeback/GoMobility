var map;
var initialize;
var calculate;
var direction;
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();

// Récupère les coordonnées de l'expérience et affiche la map
function show_itineraire(experience_id)
{
	$.ajax({
		type: 'GET',
		url: '../experience_ajax/' + experience_id,
		dataType: 'json',
		success: function(data) {
			initialize();

		    origin		= data.start;
		    destination	= data.arrival;

		    var request = {
		    	origin: origin,
		    	destination: destination,
		    	travelMode: google.maps.TravelMode['WALKING']
		    };
	        var directionsService = new google.maps.DirectionsService();
	        directionsService.route(request, function(response, status){
	            if(status == google.maps.DirectionsStatus.OK) {
	                direction.setDirections(response);
	            }
	        });
		}
	});
}

function show_marker()
{
	$.ajax({
		type: 'GET',
		url: 'experience/dixExperienceAjax',
		dataType: 'json',
		success: function(data) {
			var map = new google.maps.Map(document.getElementById('map-canvas'), {
				zoom: 5,
				center: new google.maps.LatLng(44.759629, 4.562443),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var processed = 0;
			var locations = [];
			var experiences = data;

			$.each(data, function(i, v) {
				geocoder.geocode({'address': v.start}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK)
					{
						locations[i] = results[0].geometry.location;
					}
					if (++processed >= locations.length)
					{
						marker = new google.maps.Marker({
							position: locations[i],
							map: map,
							title: experiences[i].titre
						});

						google.maps.event.addListener(marker, 'click', (function(marker, i) {
							return function() {
								content = '<div>'+
										experiences[i].description+
										'</div>'+
										'<div>'+
										'<a href="experience/'+experiences[i].id+'">Lire la suite</a>'+
										'</div>';
								infowindow.setContent(content);
								infowindow.open(map, marker);
							}
						})(marker, i));
					}
				});

			});

		}
	});
}

function initialize() {
	direction = new google.maps.DirectionsRenderer({
	    map   : map
	});
	map = new google.maps.Map(document.getElementById("map-canvas"));
	direction.setMap(map);
	// direction.setPanel(document.getElementById("map-panel")); // 
}
