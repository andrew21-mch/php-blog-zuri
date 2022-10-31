var google;
function init() {
    // Basic options for a simple Google Map
    var myLatlng = new google.maps.LatLng(5.8383594538933385, 10.397752193219725);
    var mapOptions = {
        zoom: 16, // The latitude and longitude to center the map (always required)
        center: myLatlng, // The point to center the map on.
        scrollwheel: false, // Enable or Disable the mouse scroll wheel.
        mapTypeControl: true, // Enable or Disable the map type control.
        mapTypeControlOptions: { // Set the map type control options.
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU, // Set the map type control options.
        mapTypeIds: ["roadmap", "terrain", "hybrid", "satellite"], // Set the map type control options.
        },
        mapTypeId: 'satellite', // Set the map type to Satellite.
        styles: [
            {
                "featureType": "administrative.locality",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "simplified"
                    },
                    {
                        "hue": "#ff0000"
                    }
                ]
            }
        ]
    };// Get the HTML DOM element that will contain your map 
    var mapElement = document.getElementById('map-canvas'); // Create the Google Map using our element and options
    var map = new google.maps.Map(mapElement, mapOptions);   // Create the Google Map using out element and options defined above
    var addresses = ['Bafangi, Cameroon'];
    for (var x = 0; x < addresses.length; x++) {
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            new google.maps.Marker({
                position: latlng,
                map: map,
                icon: 'images/loc.png'
            });

        });
    }
    
}
google.maps.event.addDomListener(window, 'load', init);