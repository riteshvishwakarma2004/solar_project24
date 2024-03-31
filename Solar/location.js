// Check if browser supports geolocation
if ("geolocation" in navigator) {
    // Get user's current position
    navigator.geolocation.getCurrentPosition(function(position) {
        // Get latitude and longitude
        var latitude = 18.989912;
        var longitude = 73.128640;

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: latitude, lng: longitude},
            zoom: 8
        });

        // Add marker for user's position
        var marker = new google.maps.Marker({
            position: {lat: latitude, lng: longitude},
            map: map,
            title: 'Your Location'
        });
    });
} else {
    // Geolocation is not supported by this browser
    alert("Geolocation is not supported by your browser.");
}
