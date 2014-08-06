<?php
	$latStart = substr($start, 0, strrpos($start, ";"));
	$lngStart = substr($start, strrpos($start, ";") + 1, strlen($start));
	$latArrival = substr($arrival, 0, strrpos($arrival, ";"));
	$lngArrival = substr($arrival, strrpos($arrival, ";") + 1, strlen($arrival));
?>
<script type="text/javascript">
	var map;
	var panel;
	var initialize;
	var calculate;
	var direction;

	calculate = function() {
		initialize();
	    origin      = new google.maps.LatLng(<?php echo $latStart; ?>, <?php echo $lngStart; ?>);
	    destination = new google.maps.LatLng(<?php echo $latArrival; ?>, <?php echo $lngArrival; ?>);

	    if(origin && destination) {
	        var request = {
	            origin      : origin,
	            destination : destination,
	            travelMode  : google.maps.DirectionsTravelMode.DRIVING
	        }
	        var directionsService = new google.maps.DirectionsService();
	        directionsService.route(request, function(response, status){
	            if(status == google.maps.DirectionsStatus.OK) {
	            	console.log(response);
	                direction.setDirections(response);
	            }
	        });
	    }

	};

	function initialize() {
		direction = new google.maps.DirectionsRenderer({
		    map   : map, 
		    panel : panel 
		});
		var map = new google.maps.Map(document.getElementById("map-canvas"), direction);
	}

	google.maps.event.addDomListener(window, 'load', calculate);
</script>

<div id="content">
	<div class="bloc">
		<h1>Derni&egrave;re Exp&eacute;rience</h1>
		<div id="map-canvas">
			<p>Veuillez patienter pendant le chargement de la carte...</p>
		</div>

	</div>
</div>
