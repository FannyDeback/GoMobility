<script type="text/javascript" src="<?php echo js_url('jquery-min') ?>"></script>  

<script type="text/javascript">
	var map;
	var initialize;
	var calculate;
	var direction;

	// Récupère les coordonnées de l'expérience et affiche la map
	$(function() {
		$.ajax({
			type: 'GET',
			url: '../experience_ajax/' + $("#experience-id").text(),
			dataType: 'json',
			success: function(data) {
				initialize();
				var latStart	= data.start.substr(0, data.start.indexOf(";"));
				var lngStart	= data.start.substr(data.start.indexOf(";") + 1, data.start.length);
				var latArrival	= data.arrival.substr(0, data.arrival.indexOf(";"));
				var lngArrival	= data.arrival.substr(data.arrival.indexOf(";") + 1, data.arrival.length);

			    //origin      = new google.maps.LatLng(latStart, lngStart);
			    //destination = new google.maps.LatLng(latArrival, lngArrival);
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
	});

	function initialize() {
		direction = new google.maps.DirectionsRenderer({
		    map   : map
		});
		map = new google.maps.Map(document.getElementById("map-canvas"));
		direction.setMap(map);
		// direction.setPanel(document.getElementById("map-panel")); // 
	}
</script>

<div id="content">
	<div id="col-gauche">
		<section class="derniere-experience">
			<h1>Exp&eacute;rience <span id="experience-id"><?php echo $id; ?></span></h1>
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
			<?php echo image('appli-mobile.gif'); ?>
			<a href="#" id="appli-mobile">
				Télécharger<br/>
				<span class="f15 light">L'application Mobile</span>
			</a>
		</section>

		<section class="derniere-actualite">
			<h1><strong>Dernière</strong> actualité</h1>
			<?php echo image('img-actualite.jpg'); ?>
			<h3><a href="#"><strong>Plus</strong> d'infos</a></h3>
			<footer>
				Titre acutalité
			</footer>
		</section> 

		<section class="facebook">
			<a href="#">
				<?php echo image('bouton-facebook.png'); ?>
			</a>
		</section>
	</aside>

	<div class="clear"></div>
</div>


<!-- TODO panel d'affichage de la route  -->
<!--<div id="map-panel"></div>-->