<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="leaflet.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="leaflet.js"></script>
	<script type="text/javascript" src="simpleheat.js"></script>
	<script type="text/javascript" src="HeatLayer.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<style type="text/css">
		#map
		{
			height: 610px;
		}


    .info.legend {
        background-color: white;
        padding: 5px;
    }

	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="map"></div>
			</div>
		</div>
		<div>
			Created By Hamza M.Hassan
		</div>
	</div>




<script type="text/javascript">
	 // initialize the map on the "map" div with a given center and zoom
		var map = L.map('map', {
		    center: [30.033333, 31.233334],
		    zoom: 7
		});

		/* NOTES : TWO WAYS TO ADD MAP AS BACKGROUN */
		
		/* FIRST ONE */
		// L.tileLayer(
  		//     'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		//     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
		//     maxZoom: 18,
		//     }).addTo(map);

		/* SECOND ONE*/

		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar'}).addTo(map);


		var heat = L.heatLayer([
		[30.033333, 31.233334,1],
		[30.043333, 31.233334,0.2],
		[30.053333, 31.233334,1],
		[30.063333, 31.233334,1],
		[31.073333, 31.233334,0.6],
		[31.033333, 31.233334,1],
		[31.043333, 31.233334,0.4],
		[31.053333, 31.233334,0.2],
		[31.063333, 31.233334,0.2],
		[31.073333, 31.233334,0.2],
		[31.083333, 31.233334,0.2],
		[31.153333, 31.333334,0.2],
		[31.253333, 31.233334,0.2],
		[31.353333, 31.333334,0.5],
		[31.453333, 31.433334,0.2],
		[31.553333, 31.233334,0.8],
		[30.073333, 29.233334,0.8],
		[31.633333, 31.233334,0.9],
		[28.633333, 31.233334,0.4],
		[22.633333, 31.533334,1],
		[23.633333, 30.533334,1]],  
		{minOpacity: 0.7},
		{radius: 30},
		{blur: 15},
		{maxZoom: 7},
		{max: 1.0},
		{0: "green",0.5: "yellow",1: "red"})
		.addTo(map);

		
		function getColor(d) {
		        return d === 'Heigh'  ? "red" :
		               d === 'Low'  ? "green" :
		               d === 'Intermediate' ? "yellow" :
		                            "#ff7f00";
		    }


		// Add legend to map
		var legend = L.control({position: 'bottomleft'});
		    legend.onAdd = function (map) {

		    var div = L.DomUtil.create('div', 'info legend');
		    labels = ['<strong>Categories</strong>'],
		    categories = ['Heigh','Intermediate','Low'];

		    for (var i = 0; i < categories.length; i++) {

		            div.innerHTML += 
		            labels.push(
		                '<i class="fa fa-circle" style="color:' + getColor(categories[i]) + '"></i> ' +
		            (categories[i] ? categories[i] : '+'));

		        }
		        div.innerHTML = labels.join('<br>');
		    return div;
		    };
		    legend.addTo(map);

</script>
</body>
</html>