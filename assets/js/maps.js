var map;
var initialize;
var calculate;
var direction;
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow({
	maxWidth: 150,
	maxHeight: 150
});

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
		success: function(exps) {
			// Initialisation de la map
			var map = new google.maps.Map(document.getElementById('map-canvas'), {
				zoom: 5,
				center: new google.maps.LatLng(44.759629, 4.562443),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var processed = 0;
			// Utile pour stocker toutes les localisations car geocode asynchrone
			var locations = [];

			// Pour chaque experience contenu dans exps
			$.each(exps, function(i, experience) {
				// On récupère la localisation de l'expérience (Lat, Lng)
				geocoder.geocode({'address': experience.start}, function(results, status) {
					// Si le retour de geocode est OK, on procède au stockage des localisations
					if (status == google.maps.GeocoderStatus.OK)
					{
						// On stock toutes les localisations
						locations[i] = results[0].geometry.location;
					}
					if (++processed >= locations.length)
					{
						// Création d'un nouveau marker avec le titre de l'expérience
						marker = new google.maps.Marker({
							position: locations[i],
							map: map,
							title: exps[i].titre
						});

						/**
						** Ajout d'un évenement click sur le marker
						** Lorsque l'on clique sur le marker, on remplit le content de l'info bulle (infowindow)
						** Puis elle est ouverte
						*/
						google.maps.event.addListener(marker, 'click', (function(marker, i) {
							return function() {
								content = '<div style="width:150px;height:150px">'+
										'<h2>'+exps[i].titre+'</h2>'+
										exps[i].description+
										'<br/><a href="experience/'+exps[i].id+'">Lire la suite</a>'+
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