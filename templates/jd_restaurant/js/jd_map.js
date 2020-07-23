 google.maps.event.addDomListener(window, 'load', jd_init);
 
function jd_init() {
    document.querySelectorAll('.jd_map [id^=sppb-addon-gmap-]').forEach(function(_map){
        var dynamicElementId = _map.id;
        var mapElement = document.getElementById(dynamicElementId);
        var _lat = mapElement.getAttribute('data-lat');
        var _lng = mapElement.getAttribute('data-lng');
        var _infowindow = mapElement.getAttribute('data-infowindow');
        var _maptype = mapElement.getAttribute('data-maptype');
        var mousewheel = mapElement.getAttribute('data-mousescroll');
        var jdmap = mapElement.getAttribute('data-jdmap');
        var mapzoom = mapElement.getAttribute('data-mapzoom');
        _mousewheel = mousewheel=='false'?false:true;
        _jdmap = jdmap=='false'?false:true;


        var _styles = [];
        if(_jdmap){
			switch(_maptype){
				case 'ROADMAP':
            _styles = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];
			break;
			case 'HYBRID':
			_styles = [{"featureType":"all","elementType":"all","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":-30}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#353535"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#656565"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#505050"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#808080"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#454545"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#66cc33"}]}];
			break;
			case 'SATELLITE':
			_styles = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#959292"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#aabfa7"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"color":"#a2ca9c"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"color":"#c9d9c6"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#c8b5b5"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#76c05e"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#646363"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#a02222"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#dee4df"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#dee4df"}]},{"featureType":"transit","elementType":"geometry.fill","stylers":[{"color":"#f25353"}]},{"featureType":"transit","elementType":"geometry.stroke","stylers":[{"color":"#fbd6d6"},{"weight":"2.21"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#f0f0d3"}]},{"featureType":"transit.station.rail","elementType":"geometry.fill","stylers":[{"color":"#af3e3e"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#759dc8"}]}];
			break;
			case 'TERRAIN':
			_styles = [{"featureType":"all","elementType":"geometry","stylers":[{"saturation":"-100"},{"gamma":".5"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#505050"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"saturation":"-25"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#505050"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#b3d1ff"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"}]}];
			break;
			default:
			 _styles = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];
			break;
			}
        }

        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: Number(mapzoom),
            scrollwheel: _mousewheel,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(_lat, _lng), // New York

            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: _styles
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(_lat, _lng),
			map: map
		});
		
		
		if (_infowindow!="") {
		  var infowindow = new google.maps.InfoWindow({
			content: atob(_infowindow)
		  });
		  marker.addListener('click', function() {
			infowindow.open(map, marker);
		  });
		}
		
	});
}
 
