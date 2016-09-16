<div id="map" style="height:500px;"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCqZ-WnMPMCIsgEStVdw75c5ytzG69ySos"></script>
    <script>
    function initialize() {

      var styles = [
	{
		"featureType": "landscape",
		"stylers": [
			{
				"hue": "#0039FF"
			},
			{
				"saturation": 50.400000000000006
			},
			{
				"lightness": 5.6000000000000085
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.highway",
		"stylers": [
			{
				"hue": "#0084FF"
			},
			{
				"saturation": 22.799999999999997
			},
			{
				"lightness": 13.200000000000017
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
			{
				"hue": "#0030FF"
			},
			{
				"saturation": 0
			},
			{
				"lightness": 0
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
			{
				"hue": "#0028FF"
			},
			{
				"saturation": 0
			},
			{
				"lightness": 0
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "water",
		"stylers": [
			{
				"hue": "#0078FF"
			},
			{
				"saturation": 0
			},
			{
				"lightness": 0
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "poi",
		"stylers": [
			{
				"hue": "#0061FF"
			},
			{
				"saturation": -20.599999999999994
			},
			{
				"lightness": 0
			},
			{
				"gamma": 1
			}
		]
	}
];

      
		
      var styledMap = new google.maps.StyledMapType(styles,
        {name: "Styled Map"});
		
      var mapOptions = {
        zoom: 14,
        center: new google.maps.LatLng(42.442391, 19.246054),
        mapTypeControlOptions: {
          mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        }
      };
	  
      var map = new google.maps.Map(document.getElementById('map'),mapOptions);
      map.mapTypes.set('map_style', styledMap);
      map.setMapTypeId('map_style');
	  
	  
	   var marker = new google.maps.Marker({
            position: new google.maps.LatLng(42.442391, 19.246054),
            icon: "<?php echo get_template_directory_uri(); ?>/images/pointer.png",
            map: map
      });
	  
	  marker.setAnimation(google.maps.Animation.BOUNCE);
	
    };
	
    initialize();
    </script>
