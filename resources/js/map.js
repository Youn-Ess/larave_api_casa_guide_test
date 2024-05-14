function initMap() {

    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {
            lat: 33.57,
            lng: -7.60
        },

    });
    map.addListener('click', function (event) {
        const clickLat = event.latLng.lat();
        const clickLng = event.latLng.lng();
        addMarker(map, clickLat, clickLng);
    });

    let flightPath = [{
        lat: 33.79865868853624,
        lng: -6.504663119465121
    },
    {
        lat: 33.67532025292561,
        lng: -6.768334994465121
    },
    {
        lat: 33.70724185962538,
        lng: -6.798461723666651
    }
    ];


    let line = new google.maps.Polyline({
        path: flightPath,
        strokeColor: '#FF0000',
        strokeWeight: 4,
        map: map
    });

}

let markers = [];

let LatsLngs = []

function addMarker(map, lat, lng) {
    const marker = new google.maps.Marker({
        position: {
            lat: lat,
            lng: lng
        },
        map: map,
        title: "Hello World!",
    });

    marker.addListener('click', function () {
        marker.setMap(null);
        markers = markers.filter(m => m !== marker);
    });
    markers.push(marker);
}




document.getElementById('submit').addEventListener('click', () => {
    // LatsLngs = []
    // markers.forEach(marker => {
    //     const LatLng = {
    //         lat: marker.position.lat(),
    //         lng: marker.position.lng()
    //     }
    //     LatsLngs.push(LatLng)
    // });
    LatsLngs = markers.map(marker => {
        return {
            lat: marker.position.lat(),
            lng: marker.position.lng()
        }
    });
});

window.onload = initMap;