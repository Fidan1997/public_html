// JavaScript Document
// <![CDATA[
mapboxgl.accessToken = 'pk.eyJ1IjoiZW50b25lZSIsImEiOiJHdVBsTmdrIn0.2vXZdjRHpSQoIWrrocUnhg';
var map = new mapboxgl.Map({
    container: 'map', 
    style: 'mapbox://styles/mapbox/satellite-v9',
    center: [47.912,40.173], 
    zoom: 7
}); 

$(document).ready(function(){
		$('.region-selector').change(function(){ 
			if($(this).val() == 'yasamal'){
				$('#' + $(this).val()).show('slow');
				$('#' + $(this).val()).addClass('showing');
				
				map.flyTo({
				center: [49.798,40.376],
				zoom: 15,
				bearing: 0, 

				speed: 0.4,  
				curve: 2,  


					easing: function (t) {
						return t;
					}
				});
			}else if($(this).val() == 'hovsan'){
				$('.showing').hide('slow');
				map.flyTo({
				center: [50.072,40.382],
				zoom: 15,
				bearing: 0,

				speed: 0.5,  
				curve: 2,  


					easing: function (t) {
						return t;
					}
				});
			}else if($(this).val() == '-'){
				$('.showing').hide('slow');
				map.flyTo({
				center: [47.912,40.173],
				zoom: 7,
				bearing: 0,

				speed: 0.5,  
				curve: 2,  


					easing: function (t) {
						return t;
					}
				});
			}
		})
	})
	 

map.on('load', function () {
	
    map.addSource('maine', {
        'type': 'geojson',
        'data': {
            'type': 'Feature',
            'properties': {
                'name': 'Maine'
            },
            "geometry": {
        "type": "Polygon",
        "coordinates": [
          [
            [
              49.79977011680603,
              40.37505913073455
            ],
            [
              49.79809641838074,
              40.37865535090195
            ],
            [
              49.79605793952942,
              40.378516409596635
            ],
            [
              49.79570388793945,
              40.378254872244604
            ],
            [
              49.79263544082641,
              40.37557405585068
            ],
            [
              49.793879985809326,
              40.37529616024506
            ],
            [
              49.79377269744873,
              40.37470767164974
            ],
            [
              49.795886278152466,
              40.37457689570838
            ],
            [
              49.79619741439819,
              40.37541876138882
            ],
            [
              49.79977011680603,
              40.37505913073455
            ],             [
              50.06675720214844,
              40.378263045302226
            ],
            [
              50.074567794799805,
              40.37927649676307
            ],
            [
              50.0736665725708,
              40.38231675967638
            ],
            [
              50.068087577819824,
              40.3812052816193
            ],
            [
              50.06675720214844,
              40.378263045302226
            ]
          ]
        ]
      }
        }
    });

    map.addLayer({
        'id': 'route',
        'type': 'fill',
        'source': 'maine',
        'layout': {},
        'paint': {
            'fill-color': '#FFB900',
            'fill-opacity': 0.6
        }
    });
});
// ]]>