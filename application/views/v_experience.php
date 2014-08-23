<?php
	$latStart = substr($start, 0, strrpos($start, ";"));
	$lngStart = substr($start, strrpos($start, ";") + 1, strlen($start));
	$latArrival = substr($arrival, 0, strrpos($arrival, ";"));
	$lngArrival = substr($arrival, strrpos($arrival, ";") + 1, strlen($arrival));
?>
<script type="text/javascript">
	var map;
	var initialize;
	var calculate;
	var direction;

	calculate = function() {
		initialize();
		var latStart = <?php echo $latStart; ?>;
		var lngStart = <?php echo $lngStart; ?>;
		var latArrival = <?php echo $latArrival; ?>;
		var lngArrival = <?php echo $lngArrival; ?>;

	    origin      = new google.maps.LatLng(latStart, lngStart);
	    destination = new google.maps.LatLng(latArrival, lngArrival);

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

	};

	function initialize() {
		direction = new google.maps.DirectionsRenderer({
		    map   : map
		});
		map = new google.maps.Map(document.getElementById("map-canvas"));
		direction.setMap(map);
		// direction.setPanel(document.getElementById("map-panel")); // 
	}

	google.maps.event.addDomListener(window, 'load', calculate);
</script>

<div id="content">
	<div id="col-gauche">
		<section class="derniere-experience">
			<h1>Derni&egrave;re Exp&eacute;rience</h1>
			<div id="map-canvas">
				<p>Un problème est survenue lors du chargement de la map...</p>
			</div>
		</section>
	</div>
	
	<aside>
		<section class="nombre-ecoacteur">
			<p><!--<?php echo $act; ?>--></p>
		</section>

		<section class="appli-mobile">
			<img src="<?php echo(IMG.'appli-mobile.gif'); ?>" />
			<a href="#" id="appli-mobile">
				Télécharger<br/>
				<span class="f15 light">L'application Mobile</span>
			</a>
		</section>

		<section class="derniere-actualite">
			<h1><strong>Dernière</strong> actualité</h1>
			<img src="<?php echo(IMG.'img-actualite.jpg'); ?>"/>
			<h3><a href="#"><strong>Plus</strong> d'infos</a></h3>
			<footer>
				Titre acutalité
			</footer>
		</section> 

		<section class="facebook">
			<a href="#">
				<img src="<?php echo(IMG.'bouton-facebook.png'); ?>"/>
			</a>
		</section>
	</aside>

	<div class="clear"></div>
</div>


<!-- TODO panel d'affichage de la route  -->
<!--<div id="map-panel"></div>-->