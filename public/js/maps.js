var lat;
var lng;

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        lat = position.coords.latitude;
        lng = position.coords.longitude;
        var map = L.map('map').setView([lat, lng], 14);
        console.log('default : ' + lat, lng);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'LaundryApp'
        }).addTo(map);
        
        var markerLayer = L.layerGroup().addTo(map);
        var currentMarker = L.marker([-7.412294, 109.352724]).addTo(markerLayer);
        
        function onMapClick(e) {
            // Menghapus marker sebelumnya
            markerLayer.clearLayers();
            // Menambahkan marker baru pada posisi yang diklik
            var newMarker = L.marker(e.latlng).addTo(markerLayer);
            lat = e.latlng.lat;
            lng = e.latlng.lng;
        }

        map.on('click', onMapClick);

        map.on('click', function() {
            console.log('Lat : ' + lat);
            console.log('Lang : ' + lng);
        })
    });
} else {
    alert('Geolocation is not supported by this browser.');
}